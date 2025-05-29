function openModal(contentType, dataId = null) {
	const modal = document.getElementById('modalWindow')

	// Сначала скрываем все возможные содержимые
	document.querySelectorAll('.modal-content > .content > div').forEach(el => {
		el.style.display = 'none'
	})

	// Показываем только выбранное содержимое
	const contentElement = document.getElementById(`${contentType}-content`)
	if (contentElement) {
		contentElement.style.display = 'inline'

		if (contentType === 'description' && dataId !== null) {
			const product = goodsData[dataId]
			contentElement.querySelector('p#modal-description').textContent = product.description
		}

		if (contentType === "delete" && dataId !== null) {
			const button = contentElement.querySelector("button#delete-card")
			// Удаляем старые обработчики перед добавлением нового
			button.replaceWith(button.cloneNode(true))
			const newButton = contentElement.querySelector("button#delete-card")

			newButton.addEventListener('click', async function (e) {
				e.preventDefault()
				try {
					const response = await (await fetch("/cart/delete", {
						method: "DELETE",
						headers: {
							"Content-Type": "application/json",
							"X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
						},
						body: JSON.stringify({ 'cart_item_id': dataId }),
					})).json()

					if (response.status === 200) {
						// Удаляем товар из selectedGoods если он там есть
						selectedGoods = selectedGoods.filter(item => item.id !== dataId)

						// Находим сам товар и следующий за ним разделитель (если есть)
						const productElement = document.querySelector(`div.product-card[data-cart_item_id="${dataId}"]`)
						if (productElement) {
							const nextElement = productElement.nextElementSibling

							// Если следующий элемент - разделитель, удаляем его
							if (nextElement && nextElement.classList.contains('w50-line')) {
								nextElement.remove()
							}

							// Удаляем сам товар
							productElement.remove()
						}


						const count = await countCart(e)
						if (count === 0) {
							window.location.href = "/market"
						} else {
							addNotification(newButton.dataset.alert, response.message)
						}
						closeModal()
						updateCountsInCart(e, count)
						updateCartSummary(e)
					}
				} catch (error) {
					console.error("Error in deleting: ", error)
				}
			})
		}
	}

	// Открываем модальное окно
	modal.style.display = 'flex'
	document.body.style.overflow = 'hidden'
}

let selectedGoods = []

async function toggleProductSelection(e, checkbox, productId) {
	e.preventDefault()
	if (checkbox.checked) {
		const product = goodsData[productId]
		if (!selectedGoods.some(item => item.id === productId)) {
			product['id'] = productId
			selectedGoods.push(product)
		}
	} else {
		selectedGoods = selectedGoods.filter(item => item.id !== productId)
	}
	updateCartSummary(e)
}

async function toggleLike(e, cartItemId, isLike) {
	e.preventDefault()
	try {
		const response = await (await fetch("/cart/likeProduct", {
			method: "POST",
			headers: {
				'Content-Type': 'application/json',
				'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").getAttribute('content')
			},
			body: JSON.stringify({ "cart_item_id": cartItemId, 'is_like': isLike })
		})).json()

		if (response.status === 200) {
			return
		} else {
			console.warn(response.error)
		}
	} catch (error) {
		console.error("Error in toggle like: ", error)
	}
}

const isLikeBtn = document.querySelector('button.like')
if (isLikeBtn) {
	isLikeBtn.addEventListener('click', async e => {
		e.preventDefault()
		isLikeBtn.classList.toggle('clicked')
		toggleLike(e, +isLikeBtn.dataset.cart_item_id, isLikeBtn.classList.contains('clicked'))
	})
}

async function updateCartSummary(e) {
	e.preventDefault()
	const enabledSection = document.querySelector('section.enabled-order-box')
	const disabledSection = document.querySelector('section.disabled-order-box')

	if (!enabledSection || !disabledSection) return

	if (selectedGoods.length > 0) {
		enabledSection.style.display = 'block'
		disabledSection.style.display = 'none'

		const amountX = id => {
			const input = document.querySelector(`input.count-of-good[data-cart_item_id="${id}"]`)
			return input ? parseInt(input.value) || 0 : 0
		}

		const totalPrice = selectedGoods.reduce((sum, product) => sum + (product.price * amountX(product.id)), 0)
		const totalDiscountPrice = selectedGoods.reduce((sum, product) => sum + (product.discount_price * amountX(product.id)), 0)
		const totalWeight = selectedGoods.reduce((sum, product) => {
			const weight = product.unity_weight === "KB" ? product.weight / 1024 : product.weight
			return sum + (weight * amountX(product.id))
		}, 0)

		const countOfGoods = selectedGoods.reduce((sum, product) => sum + amountX(product.id), 0)

		if (document.querySelector("span#count-selected-goods")) {
			document.querySelector("span#count-selected-goods").textContent = `Товары (${countOfGoods})`
		}
		if (document.querySelector(".order-count-goods")) {
			document.querySelector(".order-count-goods").textContent = `${countOfGoods} товара • ${totalWeight.toFixed(1)} MB`
		}
		if (document.querySelector(".count-price-reg.price-without")) {
			document.querySelector(".count-price-reg.price-without").textContent = `${totalPrice.toLocaleString()} ₽`
		}
		if (document.querySelector(".count-price-reg.price-discount")) {
			document.querySelector(".count-price-reg.price-discount").textContent = `− ${(totalPrice - totalDiscountPrice).toLocaleString()} ₽`
		}
		if (document.querySelector("span#total")) {
			document.querySelector("span#total").textContent = `${totalDiscountPrice.toLocaleString()} ₽`
		}
		if (document.querySelector("span#total-modal")) {
			document.querySelector("span#total-modal").textContent = `${totalDiscountPrice.toLocaleString()}`
		}
		if (document.querySelector("span#discount-modal")) {
			document.querySelector("span#discount-modal").textContent = `${(totalPrice - totalDiscountPrice).toLocaleString()}`
		}
	} else {
		enabledSection.style.display = 'none'
		disabledSection.style.display = 'block'
	}
}

function closeModal() {
	document.getElementById("modalWindow").style.display = "none"
	document.body.style.overflow = 'auto' // Возвращаем прокрутку
	currentModalContent = null
	currentProductId = null
}

window.onclick = function (event) {
	const modal = document.getElementById("modalWindow")
	if (event.target === modal) {
		closeModal()
	}
}
document.addEventListener("keydown", event => {
	const modal = document.getElementById("modalWindow")
	if (event.key === "Escape" && modal.style.display === 'flex') {
		closeModal()
	}
})

async function updateButtons(e, countInput, minusBtn, plusBtn) {
	e.preventDefault()
	const value = parseInt(countInput.value)
	const min = parseInt(countInput.min)
	const max = parseInt(countInput.max)

	minusBtn.disabled = value <= min
	plusBtn.disabled = value >= max
	await updateCartSummary(e)
}

document.addEventListener('DOMContentLoaded', async function (e) {
	e.preventDefault()

	// Находим все карточки товаров
	const productCards = document.querySelectorAll('.product-card')
	const sectionCards = document.querySelectorAll("section.card")
	const checkboxes = document.querySelectorAll('input[checkbox-id="checkbox-element"]:not(#selectAll)')

	// Для каждой секции делаем обработчик
	sectionCards.forEach(card => {
		card.addEventListener('click', async e => {
			e.preventDefault()
			// Если клик был по самому checkbox или его label, не обрабатываем
			if (e.target.tagName === 'INPUT' ||
				e.target.closest('label.custom-checkbox') ||
				e.target.closest('input[type="checkbox"]')) {
				return
			}

			const checkbox = card.querySelector('input[type="checkbox"]:not(#selectAll)')
			if (checkbox) {
				checkbox.checked = !checkbox.checked
				// Trigger событие change, чтобы вызвать toggleProductSelection
				const changeEvent = new Event('change')
				checkbox.dispatchEvent(changeEvent)
			}
		})
	})

	// Для каждого изменения checkbox
	checkboxes.forEach(checkbox => {
		checkbox.addEventListener("change", async e => {
			e.preventDefault()
			toggleProductSelection(e, checkbox, +checkbox.dataset.checkbox_id)
		})
	})

	// Обработчик для "Выбрать все"
	const selectAll = document.getElementById('selectAll')
	if (selectAll) {
		selectAll.addEventListener('change', async e => {
			e.preventDefault()

			const checkboxes = document.querySelectorAll('input[checkbox-id="checkbox-element"]:not(#selectAll)')
			const isChecked = selectAll.checked

			// Очищаем массив перед добавлением новых элементов
			selectedGoods = isChecked ? [] : selectedGoods

			checkboxes.forEach(checkBox => {
				checkBox.checked = isChecked
				if (isChecked) {
					toggleProductSelection(e, checkBox, +checkBox.dataset.checkbox_id)
				}
			})

			// Если снимаем выбор всех, очищаем массив
			if (!isChecked) {
				selectedGoods = []
				updateCartSummary(e)
			}
		})
	}

	// Для каждой карточки добавляем обработчики событий
	productCards.forEach(async card => {
		const minusBtn = card.querySelector('.minus-btn')
		const plusBtn = card.querySelector('.plus-btn')
		const countInput = card.querySelector('.count-of-good')
		const debounceTimers = {}

		// Обработчик для кнопки минус
		minusBtn.addEventListener('click', async e => {
			e.preventDefault()
			let value = parseInt(countInput.value)
			let min = parseInt(countInput.min)
			if (!isNaN(value) && value >= min) {
				countInput.value = value - 1
				const inputEvent = new Event('input', {
					bubbles: true
				})
				countInput.dispatchEvent(inputEvent)
			}
		})

		// Обработчик для кнопки плюс
		plusBtn.addEventListener('click', async e => {
			e.preventDefault()
			let value = parseInt(countInput.value)
			let max = parseInt(countInput.max)
			if (!isNaN(value) && value <= max) {
				countInput.value = value + 1
				const inputEvent = new Event('input', {
					bubbles: true
				})
				countInput.dispatchEvent(inputEvent)
			}
		})

		// Обработчик для прямого ввода в поле
		countInput.addEventListener('input', async e => {
			if (!countInput.classList.contains('count-of-good')) return

			e.preventDefault()
			const cartItemId = +countInput.dataset.cart_item_id

			updateButtons(e, countInput, minusBtn, plusBtn)

			clearTimeout(debounceTimers[cartItemId])

			debounceTimers[cartItemId] = setTimeout(() => {
				updateQuantityRequest(e, +countInput.value, cartItemId)
			}, 1000)
		})

		countInput.addEventListener('change', async e => {
			e.preventDefault()
			const value = parseInt(countInput.value)
			const min = parseInt(countInput.min)
			const max = parseInt(countInput.max)

			if (isNaN(value)) {
				countInput.value = min || 0
			} else if (value < min) {
				countInput.value = min
			} else if (value > max) {
				countInput.value = max
			}

			updateButtons(e, countInput, minusBtn, plusBtn)
		})
		updateButtons(e, countInput, minusBtn, plusBtn)
	})
	updateCartSummary(e)
})
async function handleQuantityChange(e, quantity, cartItemId) {
	clearTimeout(debounceTimer)

	debounceTimer = setTimeout(() => {
		updateQuantityRequest(e, quantity, cartItemId)
	}, 1000)
}

async function updateQuantityRequest(e, quantity, cartItemId) {
	e.preventDefault()
	try {
		const response = await (await fetch('/cart/updateQuantity', {
			method: "POST",
			headers: {
				'Content-Type': 'application/json',
				'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").getAttribute('content')
			},
			body: JSON.stringify({
				'cart_item_id': cartItemId,
				'quantity': quantity
			}),
		})).json()

		if (response.status === 200) {
			return
		}
		console.warn(response.error)
	} catch (error) {
		console.error("error in updating quantity: " + error)
	}
}
