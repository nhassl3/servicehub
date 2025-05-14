const password = document.getElementById('password')

password.addEventListener('invalid', () => {
	password.setCustomValidity('')
})

password.addEventListener('input', () => {
	password.setCustomValidity('')
})

const loginBtn = document.getElementById('log-in')
loginBtn.addEventListener('click', async function () {
	const username = document.querySelector('input#username').value
	const password = document.querySelector('input#password').value
	const csrf_token = document.querySelector('input[name="csrf_token"]').value
	try {
		const response = await fetch("/php/login_process.php", {
			method: "POST",
			headers: { "Content-Type": "application/json" },
			body: JSON.stringify({
				"username": username,
				// TODO: Security adding
				"password": password,
				"csrf_token": csrf_token,
			})
		})
		const data = await response.json()

		if (data.code === 200) {
			window.location.href = "/index.php"
		} else if (data.code === 401 && data.error_code === 1061) {
			addNotification(loginBtn, data.message)
		} else {
			console.error("error in login: " + data.error)
		}
	} catch (error) {
		console.error("error in login (js): " + error)
	}
})
