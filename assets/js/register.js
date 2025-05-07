const password = document.getElementById('password')

password.addEventListener('invalid', () => {
	password.setCustomValidity('')
})

password.addEventListener('input', () => {
	password.setCustomValidity('')
})

document.getElementById('register').addEventListener('click', register)

async function register() {
	const phoneNumber = document.querySelector('input#telephone').value
	const username = document.querySelector('input#username').value
	const password = document.querySelector('input#password').value
	const csrf_token = document.querySelector('input[name="csrf_token"]').value
	try {
		const response = await fetch("/pages/auth/auth_process.php", {
			method: "POST",
			headers: { "Content-Type": "application/json" },
			body: JSON.stringify({
				'telephone': phoneNumber,
				"username": username,
				// TODO: Security adding
				"password": password,
				"csrf_token": csrf_token
			})
		})
		const data = await response.json()

		if (data.code === 200) {
			window.location.href = "/index.php"
		} else {
			console.error("error in register: ", data.error)
		}
	} catch (error) {
		console.error("error in register (js): ", error)
	}
}