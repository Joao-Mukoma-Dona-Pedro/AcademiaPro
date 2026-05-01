function filtrar() {
  const valor = document.getElementById("filtroCurso").value;
  const blocos = document.querySelectorAll(".bloco");

  blocos.forEach(b => {
    if (valor === "todos") {
      b.style.display = "block";
    } else {
      if (b.classList.contains(valor)) {
        b.style.display = "block";
      } else {
        b.style.display = "none";
      }
    }
  });
}

function filtrarPorURL() {
  const params = new URLSearchParams(window.location.search);
  const curso = params.get("curso");

  const blocos = document.querySelectorAll(".bloco");

  if (!curso) return;

  blocos.forEach(b => {
    if (b.classList.contains(curso)) {
      b.style.display = "block";
    } else {
      b.style.display = "none";
    }
  });
}

window.onload = filtrarPorURL;