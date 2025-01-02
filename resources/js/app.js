import './bootstrap';

function openModal() {
  document.getElementById('weatherModal').classList.remove('hidden');
}

function closeModal() {
  document.getElementById('weatherModal').classList.add('hidden');
}

function getLocation() {
  document.getElementById('city-selector').addEventListener('change', async (event) => {
    const city = event.target.value;
    window.location.href = `?city=${city}`;
  });
}


document.addEventListener('DOMContentLoaded', () => {
  document.getElementById('openModal').addEventListener('click', openModal);

  document.getElementById('closeModal').addEventListener('click', closeModal);
  
  getLocation();

  const citySelector = document.getElementById('city-selector');
  const urlParams = new URLSearchParams(window.location.search);
  const selectedCity = urlParams.get('city');

  if (selectedCity) {
    citySelector.value = selectedCity;
  }
});

