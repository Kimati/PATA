const toggleButton = document.getElementsByClassName('toggle_button')[0]
const toggleItems = document.getElementsByClassName('toggle_items')[0]

toggleButton.addEventListener('click', ()=> {
	toggleItems.classList.toggle('active')
})