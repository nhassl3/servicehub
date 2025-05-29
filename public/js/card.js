const toggleBtn = document.querySelector("#toggle-password-btn")
toggleBtn.addEventListener("click", () => {
	toggleBtn.classList.toggle("show-text")
})

document.querySelector("input.count-of-good").addEventListener('change', function () {
	const value = parseInt(this.value)
	const min = parseInt(this.min)
	const max = parseInt(this.max)

	if (isNaN(value)) {
		this.value = min || 0
	} else if (value < min) {
		this.value = min
	} else if (value > max) {
		this.value = max
	}
})

const addToCartBtn = document.querySelector("#success-adding-to-cart")
addToCartBtn.addEventListener('click', async (e) => {
	if (addToCartBtn.dataset.logged === '1') {
		e.preventDefault()
		try {
			const response = await fetch("/cart/update", {
				method: "POST",
				headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": document.querySelector("meta[name='csrf-token']").getAttribute('content') },
				body: JSON.stringify({ "productId": +addToCartBtn.dataset.product_id, 'amount': +document.querySelector('input.count-of-good').value }),
			})
			const data = await response.json()

			if (data.status === 200) {
				addNotification(addToCartBtn.dataset.alert, data.message)
				updateCountsInCart(e)
			} else {
				addNotification(addToCartBtn.dataset.alert, data.message)
			}
		} catch (error) {
			console.error("Error in adding good: ", error)
		}
	} else {
		window.location.href = "/auth/register"
	}
}
)

const fastBuyBtn = document.querySelector("#fast-buy-btn")
fastBuyBtn.addEventListener("click", () => {
	updateUrlParams({ productId: +fastBuyBtn.dataset.product_id }, '/gocheckout')
})