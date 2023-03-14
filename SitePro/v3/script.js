/* -- Carousel Navigation -- */

let activeIndex = 0;

const slides = document.getElementsByTagName("article");


/* -- Mobile Nav Toggle -- */

const nav = document.querySelector("nav");

const handleNavToggle = () => {  
  nav.dataset.transitionable = "true";
  
  nav.dataset.toggled = nav.dataset.toggled === "true" ? "false" : "true";
}

window.matchMedia("(max-width: 800px)").onchange = e => {
  nav.dataset.transitionable = "false";

  nav.dataset.toggled = "false";
};

function openForm() {
  document.getElementById("popupForm").style.display = "block";
  }
  function closeForm() {
  document.getElementById("popupForm").style.display = "none";
  }