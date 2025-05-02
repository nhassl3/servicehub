function openModal(contentType) {
	const modal = document.getElementById('modalWindow');

	// Сначала скрываем все возможные содержимые
	document.getElementById('description-content').style.display = 'none';
	document.getElementById('delete-content').style.display = 'none';
	document.getElementById('more-detail-content').style.display = 'none';
	
	// Показываем только выбранное содержимое
	document.getElementById(contentType + '-content').style.display = 'inline';
	
	// Открываем модальное окно
	modal.style.display = 'flex';
}

function closeModal() {
	document.getElementById("modalWindow").style.display = "none";
}

window.onclick = function(event) {
	const modal = document.getElementById("modalWindow");
	if (event.target == modal) {
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
}

function toggleCheckBoxes(isChecked) {
	const items = document.querySelectorAll('input[checkbox-id="checkbox-element"]:not(#selectAll)');
	items.forEach(checkBox => checkBox.checked = isChecked);
}

document.getElementById('selectAll').onclick = function() {
	toggleCheckBoxes(this.checked);
}

document.addEventListener('DOMContentLoaded', function() {
	// Находим все карточки товаров
	const productCards = document.querySelectorAll('.product-card');
	const sectionCard = document.querySelectorAll("section.card")

	// Для каждой секции делаем обработчик
	sectionCard.forEach(card => {
		card.addEventListener('click', function() {
			const checkbox = this.querySelector('input[type="checkbox"]');
			if (checkbox) {
				checkbox.checked = !checkbox.checked;
			}
		});
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
			});
			
			updateButtons(countInput, minusBtn, plusBtn);
	});
});
