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
function showNotification() {
  notification.style.display = 'block';
  setTimeout(() => {
      notification.style.display = 'none';
  }, 15000);
}

function closeNotification() {
  notification.style.display = 'none';
}
window.onload = showNotification;
closeButton.addEventListener('click', closeNotification);
