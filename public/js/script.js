// Функция для обновления нескольких параметров
function updateUrlParams(params, baseUrl = window.location.href) {
	const url = new URL(baseUrl, window.location.origin)

	Object.entries(params).forEach(([key, value]) => {
		if (value !== null && value !== undefined) {
			url.searchParams.set(key, value)
		} else {
			url.searchParams.delete(key)
		}
	})

	window.location.href = url.toString()
}

document.querySelectorAll("section.card#clickable").forEach(item => {
	item.addEventListener("click", () => {
		updateUrlParams({
			productId: item.dataset.product_id
		}, '/card')
	})
})

async function countCart(e) {
	e.preventDefault()
	try {
		const data = await (await fetch("/cart/countCartItems", {
			method: "GET",
			headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": document.querySelector("meta[name='csrf-token']").getAttribute('content') }
		})).json()
		return data.status === 200 ? data.count : console.error("update cart (php): ", data.error)
	} catch (error) {
		console.error("update cart (js): ", error)
	}
}

const countInCarts = document.querySelectorAll('#counts-of-goods')
async function updateCountsInCart(e, count = null) {
	e.preventDefault()
	try {
		let n = count == null ? await countCart(e) : count
		countInCarts.forEach(async (cart) => {
			cart.innerText = n ?? ''
		})
	} catch (error) {
		console.error("error in printing count: ", error)
	}
}
