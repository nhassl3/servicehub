if (document.querySelector('div.profile')) {
	const profileBtn = document.querySelector('.profile-btn')
	const profileList = document.querySelector('.profile-list')
	const profileLinks = document.querySelectorAll('.profile-link')

	const toggleAttributes = allowed => {
		profileBtn.setAttribute('aria-expanded', String(allowed))
		profileList.setAttribute('aria-hidden', String(!allowed))
		profileLinks.forEach(link => link.setAttribute('tabindex', String(allowed - 1)))
	}

	profileBtn.onclick = () => {
		profileBtn.classList.toggle('active')
		toggleAttributes(profileBtn.classList.contains('active'))
	}

	window.addEventListener('click', e => {
		const isActive = profileBtn.classList.contains('active')
		if (isActive && !e.target.classList.contains('profile-btn') && !e.target.classList.contains('svg-btn') && !e.target.classList.contains('path-btn')) {
			profileBtn.classList.toggle('active')
			toggleAttributes(isActive)
		}
	})
}

async function exitFromAccount() {
	const response = await fetch('/pages/exit_from_account.php', {
		method: "POST",
		headers: { "Content-Type": "application/json" },
	})
	const data = await response.json()
	if (data.success) {
		window.location.href = "/index.php"
	} else {
		console.error("error in exit from account: ", data.error)
	}
}
