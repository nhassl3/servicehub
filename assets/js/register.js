const password = document.getElementById('password')
password.addEventListener('invalid', () => {
	password.setCustomValidity('Пароль введён неправильно')
})

const registerBtn = document.getElementById('register')
registerBtn.addEventListener('click', async function () {
	const email = document.querySelector('input#email').value
	const username = document.querySelector('input#username').value
	const password = document.querySelector('input#password').value
	const csrf_token = document.querySelector('input[name="csrf_token"]').value
	try {
		const response = await fetch("/php/register_process.php", {
			method: "POST",
			headers: { "Content-Type": "application/json" },
			body: JSON.stringify({
				'email': email,
				"username": username,
				// TODO: Security adding
				"password": password,
				"csrf_token": csrf_token
			})
		})
		const data = await response.json()

		if (data.code === 200) {
			window.location.href = "/index.php"
		} else if (data.code === 401 && data.error_code === 1062) {
			addNotification(registerBtn, data.message)
		} else {
			console.error("error in register: ", data.error)
		}
	} catch (error) {
		console.error("error in register (js): ", error)
	}
})
