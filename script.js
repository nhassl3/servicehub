const handleClickOnCard = event => {
	window.location.href = "/pages/card.php"
}

document.querySelectorAll("section.card#clickable").forEach(item => {
	item.addEventListener("click", handleClickOnCard)
})

async function countCart(e) {
	e.preventDefault()
	try {
		const data = await (await fetch("/php/updateCart.php", {
			method: "POST",
			headers: { 'Content-Type': "application/json" }
		})).json()
		return data.code === 200 ? data.count : console.error("update cart (php): ", data.error)
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
