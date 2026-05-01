// ===============================
// EFEITO 1: Header muda no scroll
// ===============================
window.addEventListener('scroll', function () {
    const header.classList.toggle("scrolled", window.scrollY > 50);

    if (!header) return;

    if (window.scrollY > 50) {
        header.style.background = 'rgba(10, 20, 40, 0.98)';
        header.style.boxShadow = '0 4px 30px rgba(0, 0, 0, 0.4)';
    } else {
        header.style.background = 'rgba(10, 20, 40, 0.88)';
        header.style.boxShadow = 'none';
    }
});


// ===============================
// SAUDAÇÃO AUTOMÁTICA
// ===============================
function obterSaudacao() {
    const hora = new Date().getHours();

    if (hora >= 5 && hora < 12) {
        return "Bom dia! 🌅";
    } else if (hora >= 12 && hora < 19) {
        return "Boa tarde! ☀️";
    } else {
        return "Boa noite! 🌙";
    }
}

function aplicarSaudacao() {
    const titulo = document.querySelector('main h2');

    if (titulo) {
        titulo.innerHTML = `
            ${obterSaudacao()} Aprende mais.<br>
            <span class="destaque">Aprende melhor.</span>
        `;
    }
}

// Executa quando a página carregar
document.addEventListener('DOMContentLoaded', aplicarSaudacao);