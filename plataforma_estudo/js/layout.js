const header = document.querySelector("header");

window.addEventListener("scroll", () => {
  if (!header) return;

  const isScrolled = window.scrollY > 50;
  header.classList.toggle("scrolled", isScrolled);
  header.style.background = isScrolled ? "rgba(10, 20, 40, 0.98)" : "rgba(10, 20, 40, 0.88)";
  header.style.boxShadow = isScrolled ? "0 4px 30px rgba(0, 0, 0, 0.4)" : "none";
});
