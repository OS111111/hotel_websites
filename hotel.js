/* Room Reservation */

const rooms = document.querySelectorAll('.room');
const modal = document.getElementById('reservation-modal');
const closeBtn = document.querySelector('.close-btn');

rooms.forEach(room => {
  const reserveBtn = room.querySelector('button');
  reserveBtn.addEventListener('click', () => {
    modal.style.display = 'block';
  });
});

closeBtn.addEventListener('click', () => {
  modal.style.display = 'none';
});

window.addEventListener('click', (event) => {
  if (event.target === modal) {
    modal.style.display = 'none';
  }
});

/* Dining Reservation */

const restaurants = document.querySelectorAll('.restaurant');
const diningModal = document.getElementById('dining-modal');
const diningCloseBtn = document.querySelector('.dining-close-btn');

restaurants.forEach(restaurant => {
  const reserveBtn = restaurant.querySelector('button');
  reserveBtn.addEventListener('click', () => {
    diningModal.style.display = 'block';
  });
});

diningCloseBtn.addEventListener('click', () => {
  diningModal.style.display = 'none';
});

window.addEventListener('click', (event) => {
  if (event.target === diningModal) {
    diningModal.style.display = 'none';
  }
});
