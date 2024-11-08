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

// Swiper slider for the homepage
let swiper = new Swiper(".mySwiper", {
  pagination: {
    clickable: true,
    el: ".swiper-pagination",
  },
  loop: true,
  autoplay: {
    delay: 2500,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

// Dropdown menu for the category page
if (window.location.pathname === "/") {
  const dropdownButton = document.getElementById("dropdown-button");
  const dropdown = document.getElementById("dropdown");

  dropdownButton.addEventListener("click", () => {
    dropdown.classList.toggle("hidden");
    dropdown.classList.toggle("block");
  });
}

// Format the price to currency
const getPrice = document.querySelectorAll(".price");
const formatPrice = (price) => {
  return new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  }).format(price);
};
getPrice.forEach((price) => {
  price.innerText = formatPrice(price.innerText);
});

// Format truncate the description
const getDescription = document.querySelectorAll(".description");
const truncateDescription = (description) => {
  return description.substring(0, 50) + "...";
};

getDescription.forEach((description) => {
  description.innerText = truncateDescription(description.innerText);
});

// Aside menu toggle for mobile
const asideMenu = document.getElementById("asideMenu");
const asideToggle = document.getElementById("asideToggle");

asideToggle.addEventListener("click", () => {
  asideMenu.classList.toggle("-translate-x-full");
  asideToggle.classList.toggle("left-0");
  asideToggle.classList.toggle("left-64");
});
