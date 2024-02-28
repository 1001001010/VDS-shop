const notification = document.getElementById('notification');
const closeButton = document.getElementById('close-button');

// Function to show the notification
function showNotification() {
    notification.style.display = 'block';
    setTimeout(() => {
        notification.style.display = 'none';
    }, 15000); // Hides the notification after 15 seconds
}

// Function to close the notification
function closeNotification() {
    notification.style.display = 'none';
}

// Call the showNotification function when the page loads
window.onload = showNotification;

// Add an event listener to the close button
closeButton.addEventListener('click', closeNotification);

const icon = document.querySelector(".menu__icon"),
  menuBody = document.querySelector(".menu__body");

icon.addEventListener("click", function () {
  menuBody.classList.toggle("_active");
  icon.classList.toggle("_active");
});
document.addEventListener("click", function (event) {
  const target = event.target;
  const isClickInside = icon.contains(target);
  if (!isClickInside && menuBody.classList.contains("_active") && target.closest(".none") == null) {
    menuBody.classList.remove("_active");
    icon.classList.remove("_active");
  }
});


// var cpu = document.getElementById('cpu');
// var cpu_screen = document.getElementById('cpu_screen');
// var min_cpu = document.getElementById('min_cpu');
// var max_cpu = document.getElementById('max_cpu');

// cpu.addEventListener('input', function() {
//   cpu_screen.textContent = cpu.value;
// });

// var ram = document.getElementById('ram');
// var ram_screen = document.getElementById('ram_screen');
// var min_ram = document.getElementById('min_ram');
// var max_ram = document.getElementById('max_ram');

// ram.addEventListener('input', function() {
//   ram_screen.textContent = ram.value;
// });

// var hdd = document.getElementById('hdd');
// var hdd_screen = document.getElementById('hdd_screen');
// var min_hdd = document.getElementById('min_hdd');
// var max_hdd = document.getElementById('max_hdd');

// hdd.addEventListener('input', function() {
//   hdd_screen.textContent = hdd.value;
// });

// cpu_screen.textContent = cpu.value;
// min_cpu.textContent = cpu.min;
// max_cpu.textContent = cpu.max;
// ram_screen.textContent = ram.value;
// min_ram.textContent = ram.min;
// max_ram.textContent = ram.max;
// hdd_screen.textContent = hdd.value;
// min_hdd.textContent = hdd.min;
// max_hdd.textContent = hdd.max;