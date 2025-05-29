// Обработчики событий
document.querySelectorAll('button.offset-btn').forEach(btn => {
	btn.addEventListener('click', () => {
		updateUrlParams({ offset: +btn.textContent, page: 1 })
	})
})

document.querySelectorAll('li.offset-btn').forEach(li => {
	li.addEventListener('click', () => {
		updateUrlParams({ page: +li.textContent })
	})
})