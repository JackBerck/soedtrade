// Navbar toggle for mobile
const navbarToggle = document.getElementById("navbar-toggle");
const navbarDefault = document.getElementById("navbar-default");

navbarToggle.addEventListener("click", () => {
  const expanded =
    navbarToggle.getAttribute("aria-expanded") === "true" || false;
  navbarToggle.setAttribute("aria-expanded", !expanded);
  navbarDefault.classList.toggle("hidden");
});

// Get the current year and set it in the footer
const getYear = document.getElementById("getYear");
getYear.innerText = new Date().getFullYear();
