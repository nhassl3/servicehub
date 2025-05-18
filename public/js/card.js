function togglePassword(element) {
	element.classList.toggle("show-text")
}

const countInput = document.querySelector("input.count-of-good")
countInput.addEventListener('change', function () {
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

function gotoBuy(productId) {
	window.location.href = `/pages/gocheckout.php?productId=${productId}`
}

// adding to cart
addButton.addEventListener('click', async (e) => {
	{
		if (addButton.dataset.logged === '1') {
			e.preventDefault()
			try {
				const response = await fetch("/pages/add-to-cart.php", {
					method: "POST",
					headers: { "Content-Type": "application/json" },
				})
				const data = await response.json()

				if (data.status) {
					addNotification(addButton, "Товар успешно добавлен в корзину")
					updateCountsInCart(e)
				} else {
					alert("Не удалось добавить продукт в корзину!")
				}
			} catch (error) {
				console.error("Error in adding good: ", error)
			}
		} else {
			window.location.href = "/pages/auth/register.php"
		}
	}
})