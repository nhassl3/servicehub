const addButton = document.getElementById("success-adding-to-cart")
const output = document.querySelector(".notifications")
const closeBtn = document.querySelector(".close-btn")

const message = document.createElement("div")
const success = document.createElement("div")
const danger = document.createElement("div")

let notifications = [
	message, success, danger
]

notifications.forEach(notification => {
	notification.classList.add('notification')
})

message.classList.add('info')
success.classList.add('success')
danger.classList.add('danger')

message.innerHTML = `
	<div>
		<span class='material-symbols-outlined icon'>
			chat_bubble
		</span>
		<div>
			<h3>John Doe</h3>
			<p>Great, thanks a lot for the quick reply!</p>
		</div>
		<span class='material-symbols-outlined close-btn'>
			close
		</span>
	</div>
`


success.innerHTML = `
	<div>
		<span class='material-symbols-outlined icon'>
			done
		</span>
		<div>
			<h3>Изменения сохранены!</h3>
			<p>Вы успешно сохранили товар в корзине</p>
		</div>
		<span class='material-symbols-outlined close-btn'>
			close
		</span>
	</div>
`

danger.innerHTML = `
	<div>
		<span class='material-symbols-outlined icon'>
			delete
		</span>
		<div>
			<h3>Изменения сохранены!</h3>
			<p>Вы успешно сохранили товар в корзине</p>
		</div>
		<span class='material-symbols-outlined close-btn'>
			close
		</span>
	</div>
`

function addNotification(element) {
	const id = element.dataset.alert
	const n = notifications[id].cloneNode(true)
	output.appendChild(n)
	output.style.display = 'flex'
}

window.addEventListener('animationend', e => {
	if (e.target.classList.contains('notification')) {
		e.target.remove()
		output.style.display = 'none'
	}
})

window.addEventListener('click', e => {
	if (e.target.classList.contains('close-btn')) {
		e.target.parentElement.parentElement.remove()
	}
})