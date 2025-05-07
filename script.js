const handleClickOnCard = event => {
	window.location.href = "/pages/card.php"
}

document.querySelectorAll("section.card").forEach(item => {
	item.addEventListener("click", handleClickOnCard)
})
