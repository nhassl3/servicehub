window.addEventListener('pageshow', function() {
	const checkboxes = document.querySelectorAll('input[type="checkbox"]');
	checkboxes.forEach(checkbox => {
			checkbox.checked = false;
	});
});

function openModal(contentType, dataId = null) {
	const modal = document.getElementById('modalWindow');

	// Сначала скрываем все возможные содержимые
	document.querySelectorAll('.modal-content > .content > div').forEach(el => {
		el.style.display = 'none';
	})
	
	// Показываем только выбранное содержимое
	const contentElement = document.getElementById(`${contentType}-content`);
	if (contentElement) {
		contentElement.style.display = 'inline';

		if (contentType === 'description' && dataId !== null) {
			const product = goodsData[dataId];
			contentElement.querySelector('p#modal-description').textContent = product.description;
		}
	
		if (contentType === "delete" && dataId !== null) {
			contentElement.querySelector('button#delete-card').onclick = function() {
				deleteProduct(dataId);
			};
		}
	}

	// Открываем модальное окно
	modal.style.display = 'flex';
  document.body.style.overflow = 'hidden'; // Блокируем прокрутку страницы
}

let selectedGoods = [];

function toggleProductSelection(checkbox, productId) {
	const product = goodsData[productId];

	if (checkbox.checked) {
		selectedGoods.push(product)
	} else {
		selectedGoods = selectedGoods.filter(item => item.name !== product.name);
	}

	updateCartSummary();
}

async function toggleLike(button, id) {
	try {
		button.classList.toggle('clicked');
		const response = await fetch("/pages/like.php", {
			method: "POST",
			headers: {"Content-Type": "application/json"},
			body: JSON.stringify(id)
		});
		const data = await response.json();
		console.log(data);
	} catch (error) {
		console.error("Error in toggle like: ", error)
	}
}

async function deleteProduct(productId) {
	try {
		const response = await fetch("/pages/delete_product.php", {
			method: "POST",
			headers: {"Content-Type": "application/json"},
			body: JSON.stringify(productId),
		});
		const data = await response.json();

		if (data.success) {
			document.querySelector(`#product-data-${productId}`).remove();

			selectedGoods = selectedGoods.filter(item => item.id !== productId);
			updateCartSummary();

			closeModal();
			window.location.reload();
		}
	} catch (error) {
		console.error("Error in deleting: ", error);
	}
}

function updateCartSummary() {
	const enabledSection = document.querySelector('section.enabled-order-box');
	const disabledSection = document.querySelector('section.disabled-order-box');

	if (selectedGoods.length > 0) {
		enabledSection.style.display = 'block';
		disabledSection.style.display = 'none';

		const totalPrice = selectedGoods.reduce((sum, product) => sum + product.price*document.querySelector(`input#input-numeric-${product.id}`).value, 0);
		const totalDiscountPrice = selectedGoods.reduce((sum, product) => sum + product.discount_price*document.querySelector(`input#input-numeric-${product.id}`).value, 0);
		const totalWeight = selectedGoods.reduce((sum, product) => {
			const weight = product.unity_weight === "KB" ? product.weight / 1024 : product.weight;
			return sum + weight;
		}, 0);

		const countOfGoods = selectedGoods.length;
		document.querySelector("span#count-selected-goods").textContent = `Товары (${countOfGoods})`;
		document.querySelector(".order-count-goods").textContent = `${countOfGoods} товара • ${totalWeight.toFixed(1)} MB`;
		document.querySelector(".count-price-reg.price-without").textContent = `${totalPrice.toLocaleString()} ₽`;
		document.querySelector(".count-price-reg.price-discount").textContent = `− ${(totalPrice-totalDiscountPrice).toLocaleString()} ₽`;
		document.querySelector("span#total").textContent = `${totalDiscountPrice.toLocaleString()} ₽`;
		document.querySelector("span#total-modal").textContent = `${totalDiscountPrice.toLocaleString()}`;
		document.querySelector("span#discount-modal").textContent = `${(totalPrice-totalDiscountPrice).toLocaleString()}`;
	} else {
		enabledSection.style.display = 'none';
		disabledSection.style.display = 'block';
	}
}

function closeModal() {
	document.getElementById("modalWindow").style.display = "none";
	document.body.style.overflow = 'auto'; // Возвращаем прокрутку
  currentModalContent = null;
  currentProductId = null;
}

window.onclick = function(event) {
	const modal = document.getElementById("modalWindow");
	if (event.target === modal) {
		closeModal();
	}
}
document.addEventListener("keydown", event => {
	const modal = document.getElementById("modalWindow");
	if (event.key === "Escape" && modal.style.display === 'flex') {
		closeModal();
	}
})

function updateButtons(countInput, minusBtn, plusBtn) {
	const value = parseInt(countInput.value);
	const min = parseInt(countInput.min);
	const max = parseInt(countInput.max);
					
	minusBtn.disabled = value <= min;
	plusBtn.disabled = value >= max;
	updateCartSummary();
}

document.addEventListener('DOMContentLoaded', function() {
	// Находим все карточки товаров
	const productCards = document.querySelectorAll('.product-card');
	const sectionCards = document.querySelectorAll("section.card");
	const checkboxes = document.querySelectorAll('input[checkbox-id="checkbox-element"]:not(#selectAll)');

	// Для каждой секции делаем обработчик
	sectionCards.forEach(card => {
			card.addEventListener('click', function(event) {
					// Если клик был по самому чекбоксу или его label, не обрабатываем
					if (event.target.tagName === 'INPUT' || 
							event.target.closest('label.custom-checkbox') || 
							event.target.closest('input[type="checkbox"]')) {
							return;
					}
					
					const checkbox = this.querySelector('input[type="checkbox"]:not(#selectAll)');
					if (checkbox) {
							checkbox.checked = !checkbox.checked;
							// Триггерим событие change, чтобы вызвать toggleProductSelection
							const changeEvent = new Event('change');
							checkbox.dispatchEvent(changeEvent);
					}
			});
	});

	// Для каждого изменения checkbox
	checkboxes.forEach(checkbox => {
			checkbox.addEventListener("change", function() {
					toggleProductSelection(checkbox, checkbox.id.split("-")[1]);
			});
	});
	
	// Обработчик для "Выбрать все"
	document.getElementById('selectAll').addEventListener('change', function() {
			const checkboxes = document.querySelectorAll('input[checkbox-id="checkbox-element"]:not(#selectAll)');
			const isChecked = this.checked;
			
			// Очищаем массив перед добавлением новых элементов
			selectedGoods = isChecked ? [] : selectedGoods;
			
			checkboxes.forEach(checkBox => {
					checkBox.checked = isChecked;
					if (isChecked) {
							const productId = checkBox.id.split("-")[1];
							toggleProductSelection(checkBox, productId);
					}
			});
			
			// Если снимаем выбор всех, очищаем массив
			if (!isChecked) {
					selectedGoods = [];
					updateCartSummary();
			}
	});

	
	// Для каждой карточки добавляем обработчики событий
	productCards.forEach(card => {
			const minusBtn = card.querySelector('.minus-btn');
			const plusBtn = card.querySelector('.plus-btn');
			const countInput = card.querySelector('.count-of-good');
			
			// Обработчик для кнопки минус
			minusBtn.addEventListener('click', function() {
					let value = parseInt(countInput.value);
					let min = parseInt(countInput.min);
					if (!isNaN(value) && value >= min) {
						countInput.value = value - 1;
						updateButtons(countInput, minusBtn, plusBtn);
					}
			});
			
			// Обработчик для кнопки плюс
			plusBtn.addEventListener('click', function() {
					let value = parseInt(countInput.value);
					let max = parseInt(countInput.max);
					if (!isNaN(value) && value <= max) {
						countInput.value = value + 1;
						updateButtons(countInput, minusBtn, plusBtn);
					}
			});
			
			// Обработчик для прямого ввода в поле
			countInput.addEventListener('input', updateButtons(countInput, minusBtn, plusBtn));
      countInput.addEventListener('change', function() {
				const value = parseInt(this.value);
        const min = parseInt(this.min);
        const max = parseInt(this.max);
                
        if (isNaN(value)) {
					this.value = min || 0;
        } else if (value < min) {
					this.value = min;
        } else if (value > max) {
					this.value = max;
				}

				updateButtons(countInput, minusBtn, plusBtn);
			});
			
			updateButtons(countInput, minusBtn, plusBtn);
	});

	updateCartSummary();
});
