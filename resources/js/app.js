import './bootstrap';

function getLocation() {
  document.getElementById('city-selector').addEventListener('change', async (event) => {
    const city = event.target.value;
    window.location.href = `?city=${city}`;
  });
}

document.addEventListener('DOMContentLoaded', () => {
  getLocation();
});

document.addEventListener('DOMContentLoaded', () => {
  const citySelector = document.getElementById('city-selector');
  const urlParams = new URLSearchParams(window.location.search);
  const selectedCity = urlParams.get('city');

  if (selectedCity) {
    citySelector.value = selectedCity;
  }

  citySelector.addEventListener('change', (event) => {
    const city = event.target.value;
    window.location.href = `?city=${city}`;
  });
});

window.getLocation = getLocation;