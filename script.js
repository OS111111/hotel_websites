const form = document.querySelector('form');
const nameInput = document.querySelector('#name');
const emailInput = document.querySelector('#email');
const messageInput = document.querySelector('#message');

form.addEventListener('submit', (event) => {
	event.preventDefault();
	// do something with the form data
	console.log(nameInput.value, emailInput.value, messageInput.value);
	form.reset();
});
