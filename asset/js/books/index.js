const menu = document.querySelectorAll(".menu");
const onHover = document.querySelectorAll(".btn-left");
onHover.forEach((c) =>
  c.addEventListener("click", (e) => {
    e.stopPropagation();
    menu.forEach((c) => c.classList.toggle("active"));
  })
);

document.body.addEventListener("click", (e) => {
  e.stopPropagation();
  menu.classList.remove("active");
});

const Card = document.querySelectorAll(".card");
Card.forEach((card) => {
  card.addEventListener("click", (e) => {
    const id = card.getAttribute("data-id");
    window.location.href = `/books/detail/?id=${id}`;
  });
});

const siNav = document.querySelector(".nav-hamburger");
const siLine = document.querySelectorAll(".line");
const sidebar = document.querySelector(".nav-sidebar");

siNav.addEventListener("click", (e) => {
  e.stopPropagation();
  siLine[0].classList.toggle("active1");
  siLine[1].classList.toggle("active");
  siLine[2].classList.toggle("active2");
  sidebar.classList.add("active");
});
document.body.addEventListener("click", (e) => {
  siLine[0].classList.remove("active1");
  siLine[1].classList.remove("active");
  siLine[2].classList.remove("active2");
  sidebar.classList.remove("active");
});

const inputSearch = document.querySelector(".input");
inputSearch.addEventListener("click", (e) => {
  e.stopPropagation();
});

let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("hero-left");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
  setTimeout(showSlides, 2000);
}
