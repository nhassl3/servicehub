const handleClickOnCard = event => {
	window.location.href = "/pages/card.php"
}

document.querySelectorAll("section.card").forEach(item => {
	item.addEventListener("click", handleClickOnCard)
})

async function countCart(e) {
	e.preventDefault()
	try {
		const response = await fetch("/php/updateCart.php", {
			method: "POST",
			headers: { 'Content-Type': "application/json" }
		})
		const data = await response.json()
		if (data.code === 200) {
			return data.count
		} else {
			console.error("update cart (php): ", data.error)
		}
	} catch (error) {
		console.error("update cart: ", error)
	}
}

const countInCarts = document.querySelectorAll('#counts-of-goods')
async function updateCountsInCart(e) {
	try {
		countInCarts.forEach(async (cart) => {
			cart.innerText = await countCart(e)
		})
	} catch (error) {
		console.error("error in printing count: ", error)
	}
}
