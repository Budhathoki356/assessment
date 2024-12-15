const burgerMenu = document.querySelector(".burger__menu");
const smallMenu = document.querySelector(".menu__small");
const cancelBtn = document.querySelector(".cancel__button");
const menuItems = document.querySelectorAll(".menu__small .nav_item");

burgerMenu.addEventListener("click", (e) => {
  e.stopPropagation();
  cancelBtn.classList.remove("hidden");
  smallMenu.classList.remove("hidden");

  smallMenu.classList.add("show");
  cancelBtn.classList.add("show");
  burgerMenu.style.display = "none";
});

cancelBtn.addEventListener("click", (e) => {
  e.stopPropagation();
  closeMenu();
});

function closeMenu() {
  smallMenu.classList.remove("show");
  cancelBtn.classList.remove("show");

  cancelBtn.classList.add("hidden");
  smallMenu.classList.add("hidden");
  burgerMenu.style.display = "block";
}

window.addEventListener("resize", () => {
  if (window.innerWidth > 768) {
    smallMenu.classList.remove("show");
    cancelBtn.classList.remove("show");
    burgerMenu.style.display = "none";
  }
  if (window.innerWidth < 768) {
    burgerMenu.style.display = "block";
  }
});

menuItems.forEach((item) => {
  item.addEventListener("click", () => {
    closeMenu();
  });
});
