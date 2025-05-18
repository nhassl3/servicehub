const registerForm = document.getElementById('register')

registerForm.addEventListener('submit', async (e) => {
	e.preventDefault()

	const formData = {
		username: document.getElementById('username').value,
		email: document.getElementById('email').value,
		password: document.getElementById('password').value,
		password_confirmation: document.getElementById('password_confirmation').value
	}

	try {
		const response = await fetch('/auth/register', {
			method: 'POST',
			headers: {
				'Accept': 'application/json',
				'Content-Type': 'application/json',
				'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
			},
			body: JSON.stringify(formData)
		})

		const data = await response.json()

		console.log(data)

		if (response.ok && data) {
			console.log(data.redirect)
			if (data.success && data.redirect) {
				console.log("success registration")
				// window.location.href = data.redirect
			}
		} else {
			if (data && data.success === false) {
				addNotification(registerForm, "Не удалось зарегистрироваться")
				console.error("register error: " + data.message)
			} else {
				throw new Exception("No data for valid error")
			}
		}
	} catch (error) {
		console.error(error)
		addNotification(registerForm, "Произошла неизвестная ошибка")
	}
})
