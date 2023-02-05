const navLinks = document.querySelectorAll(".navlink");

navLinks.forEach((link) => {
  if (link.getAttribute("href") === window.location.pathname) {
    link.classList.remove("text-gray-500");
    link.classList.add("font-bold");
  }
});

function navClick() {
  setTimeout(function () {
    mobileNavMenu.classList.toggle("invisible");
    mobileNavMenu.classList.replace("opacity-0", "opacity-100");

    if (mobileNavMenu.classList.contains("invisible")) {
      mobileNavMenu.classList.add("opacity-0");
    }
  }, 30);
}

const hamburgerBtn = document.getElementById("hamburger-btn");
const mobileNavMenu = document.getElementById("mobile-nav-menu");

hamburgerBtn.addEventListener("click", navClick);
mobileNavMenu.addEventListener("click", navClick);
