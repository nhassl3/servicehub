async function getTopThreeProducts() {
	const response = await (await fetch('/reviews/indexMainPage', {
		method: "GET",
		headers: {
			"Content-Type": "application/json",
			"X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
		}
	}
	)).json()

	if (response.status === 200) {
		
	}
}