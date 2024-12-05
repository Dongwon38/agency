const header = document.getElementById("masthead");

window.addEventListener("scroll", () => {
  if (window.scrollY > 0) {
    header.classList.add("scroll-activated");
  } else {
    header.classList.remove("scroll-activated");
  }
});
