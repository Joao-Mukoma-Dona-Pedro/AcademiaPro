const courses = [
  {
    id: "enfermagem",
    name: "Enfermagem",
    icon: "ENF",
    description: "Curso voltado para o cuidado da saude, assistencia ao paciente e praticas clinicas.",
    color: "#22c55e",
    disciplines: [
      ["anatomia-humana", "Anatomia Humana", "Estrutura do corpo humano, sistemas e organizacao anatomica.", ["Livro-Novo-Anatomia.pdf"]],
      ["fisiologia", "Fisiologia", "Funcionamento dos sistemas do organismo humano.", ["Fisiologia-Humana.pdf"]],
      ["bioquimica", "Bioquimica", "Processos quimicos essenciais aos seres vivos.", ["LIVRO BIOQUIMICA.pdf", "BIOQUMICA GERAL - SEBENTA FINAL -2012-2013.pdf"]],
      ["microbiologia-parasitologia", "Microbiologia e Parasitologia", "Microrganismos, parasitas e relacao com a saude.", ["Introdução-Microbiologia-e-Parasitologia.pdf"]],
      ["farmacologia", "Farmacologia", "Medicamentos, efeitos terapeuticos e administracao segura.", ["Farmacologia.pdf", "18-24-27-ap0stilafarmac0l0gia.pdf"]],
      ["enfermagem-geral", "Enfermagem Geral", "Fundamentos da assistencia e procedimentos basicos.", ["Manual-de-Procedimentos-Básicos-de-Enfermagem.pdf"]],
      ["enfermagem-medico-cirurgica", "Enfermagem Medico-Cirurgica", "Cuidados ao paciente em contexto medico e cirurgico.", ["Enfermagem médico curigico.pdf"]],
      ["enfermagem-materno-infantil", "Enfermagem Materno-Infantil", "Assistencia a mulher, crianca e familia.", ["Enfermagem Materno Infantil21.pdf"]],
      ["saude-publica", "Enfermagem em Saude Publica", "Promocao, prevencao e saude coletiva.", ["e-book-Saúde-Pública-e-Saúde-Coletiva-2.pdf"]],
      ["psicologia-saude", "Psicologia aplicada a saude", "Comportamento humano e apoio emocional em saude.", ["Psicologia aplicada a saude.pdf"]],
      ["etica-deontologia", "Etica e Deontologia em Enfermagem", "Conduta profissional, responsabilidade e humanizacao.", ["livrocj_deontologia_2015_web.pdf"]],
      ["primeiros-socorros", "Primeiros Socorros", "Atendimento inicial em situacoes de urgencia.", ["manual-primeirossocorros.pdf"]],
      ["estagio-clinico", "Estagio Clinico", "Pratica supervisionada em ambiente de saude.", ["Estágio clinico.pdf"]]
    ]
  },
  {
    id: "analises-clinicas",
    name: "Analises Clinicas",
    icon: "ACL",
    description: "Curso focado em exames laboratoriais e diagnostico de doencas.",
    color: "#38bdf8",
    disciplines: [
      ["biologia-celular", "Biologia Celular", "Estrutura, funcao e organizacao das celulas.", ["Biologia-Celular.pdf"]],
      ["bioquimica-clinica", "Bioquimica Clinica", "Marcadores bioquimicos e interpretacao laboratorial.", ["LIVRO BIOQUIMICA.pdf"]],
      ["microbiologia", "Microbiologia", "Identificacao de microrganismos em laboratorio.", ["Introdução-Microbiologia-e-Parasitologia.pdf"]],
      ["parasitologia", "Parasitologia", "Estudo laboratorial de parasitas humanos.", ["Introdução-Microbiologia-e-Parasitologia.pdf"]],
      ["hematologia", "Hematologia", "Sangue, celulas sanguineas e exames hematologicos.", []],
      ["imunologia", "Imunologia", "Sistema imunitario e metodos imunologicos.", []],
      ["patologia-clinica", "Patologia Clinica", "Analise de alteracoes biologicas ligadas a doencas.", []],
      ["tecnicas-laboratoriais", "Tecnicas Laboratoriais", "Procedimentos, equipamentos e seguranca no laboratorio.", []],
      ["toxicologia", "Toxicologia", "Substancias toxicas e impacto no organismo.", []],
      ["controle-qualidade", "Controle de Qualidade Laboratorial", "Padronizacao, confiabilidade e validacao de resultados.", []],
      ["estatistica-aplicada", "Estatistica aplicada", "Leitura e analise de dados laboratoriais.", ["16062021071546Lista de Exercicios - Gases I.pdf"]],
      ["etica-profissional", "Etica Profissional", "Responsabilidade e sigilo no ambiente laboratorial.", ["livrocj_deontologia_2015_web.pdf"]],
      ["estagio-laboratorio", "Estagio em Laboratorio", "Vivencia supervisionada em laboratorio clinico.", []]
    ]
  },
  {
    id: "ciencias-fisicas-biologicas",
    name: "Ciencias Fisicas e Biologicas",
    icon: "CFB",
    description: "Curso voltado para ciencia, investigacao, pesquisa e ensino.",
    color: "#f59e0b",
    disciplines: [
      ["biologia-geral", "Biologia Geral", "Bases da vida, organismos e processos biologicos.", ["Biologia-Celular.pdf"]],
      ["zoologia", "Zoologia", "Estudo dos animais e sua classificacao.", []],
      ["botanica", "Botanica", "Estudo das plantas e seus sistemas.", []],
      ["genetica", "Genetica", "Hereditariedade, DNA e variabilidade biologica.", []],
      ["ecologia", "Ecologia", "Relacao entre seres vivos e ambiente.", []],
      ["fisica-geral", "Fisica Geral", "Movimento, energia, forcas e leis naturais.", []],
      ["quimica-geral", "Quimica Geral", "Materia, reacoes e propriedades quimicas.", ["BIOQUMICA GERAL - SEBENTA FINAL -2012-2013.pdf"]],
      ["matematica", "Matematica", "Fundamentos quantitativos aplicados as ciencias.", ["16062021071546Lista de Exercicios - Gases I.pdf"]],
      ["biofisica", "Biofisica", "Principios fisicos aplicados aos seres vivos.", []],
      ["evolucao", "Evolucao", "Mudancas biologicas e origem da diversidade.", []],
      ["metodologia-cientifica", "Metodologia Cientifica", "Pesquisa, escrita academica e investigacao.", []],
      ["didatica", "Didatica", "Metodos de ensino e pratica pedagogica.", []]
    ]
  },
  {
    id: "ciencias-economicas-juridicas",
    name: "Ciencias Economicas e Juridicas",
    icon: "CEJ",
    description: "Curso voltado para economia, gestao e direito.",
    color: "#a78bfa",
    disciplines: [
      ["introducao-economia", "Introducao a Economia", "Conceitos fundamentais de economia e sociedade.", []],
      ["microeconomia", "Microeconomia", "Mercados, escolhas individuais e empresas.", []],
      ["macroeconomia", "Macroeconomia", "Economia nacional, inflacao, emprego e crescimento.", []],
      ["matematica-financeira", "Matematica Financeira", "Juros, capitalizacao e analise financeira.", []],
      ["contabilidade", "Contabilidade", "Registos, demonstracoes e leitura financeira.", []],
      ["gestao", "Gestao", "Organizacao, lideranca e administracao.", []],
      ["direito-constitucional", "Direito Constitucional", "Estado, constituicao e direitos fundamentais.", []],
      ["direito-civil", "Direito Civil", "Relacoes juridicas privadas e obrigacoes.", []],
      ["direito-comercial", "Direito Comercial", "Atividade empresarial, contratos e sociedades.", []],
      ["direito-trabalho", "Direito do Trabalho", "Relacoes laborais, deveres e direitos.", []],
      ["estatistica", "Estatistica", "Dados, indicadores e analise aplicada.", ["16062021071546Lista de Exercicios - Gases I.pdf"]],
      ["financas-publicas", "Financas Publicas", "Receitas, despesas e gestao do Estado.", []],
      ["etica-cidadania", "Etica e Cidadania", "Valores, cidadania e responsabilidade social.", ["livrocj_deontologia_2015_web.pdf"]]
    ]
  }
].map(course => ({
  ...course,
  disciplines: course.disciplines.map(([id, name, description, files]) => ({
    id,
    name,
    description,
    materials: buildMaterials(name, files)
  }))
}));

function buildMaterials(disciplineName, files) {
  const generated = [
    {
      title: `Guia de estudo - ${disciplineName}`,
      type: "Guia de estudo",
      description: "Roteiro para organizar leitura, revisao e pratica da disciplina.",
      href: "#"
    },
    {
      title: `Manual introdutorio - ${disciplineName}`,
      type: "Manual",
      description: "Resumo orientador preparado para futura expansao da biblioteca.",
      href: "#"
    }
  ];

  const fileMaterials = files.map(file => ({
    title: readableFileName(file),
    type: file.toLowerCase().endsWith(".pdf") ? "PDF" : "Livro digital",
    description: "Material academico disponivel na biblioteca digital.",
    href: `assets/${encodeURI(file)}`
  }));

  return [...fileMaterials, ...generated];
}

function readableFileName(file) {
  return file
    .replace(/\.pdf$/i, "")
    .replace(/[-_]/g, " ")
    .replace(/\s+/g, " ")
    .trim();
}

function getParams() {
  return new URLSearchParams(window.location.search);
}

function findCourse(id) {
  return courses.find(course => course.id === id) || courses[0];
}

function findDiscipline(courseId, disciplineId) {
  const course = findCourse(courseId);
  return {
    course,
    discipline: course.disciplines.find(item => item.id === disciplineId) || course.disciplines[0]
  };
}

function normalize(value) {
  return value.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
}

function renderCoursesPage() {
  const grid = document.getElementById("coursesGrid");
  const search = document.getElementById("courseSearch");
  const total = document.getElementById("totalCursos");
  if (!grid) return;

  total.textContent = courses.length;

  function draw() {
    const query = normalize(search.value.trim());
    const filtered = courses.filter(course => {
      const content = `${course.name} ${course.description} ${course.disciplines.map(d => d.name).join(" ")}`;
      return normalize(content).includes(query);
    });

    grid.innerHTML = filtered.map(course => `
      <a class="course-card" href="biblioteca.html?curso=${course.id}" style="--course-color:${course.color}">
        <span class="course-icon">${course.icon}</span>
        <h2>${course.name}</h2>
        <p>${course.description}</p>
        <div class="course-meta">
          <span class="pill">${course.disciplines.length} disciplinas</span>
          <span class="pill">${countMaterials(course)} materiais</span>
        </div>
        <span class="card-action">Explorar</span>
      </a>
    `).join("") || `<div class="empty-state">Nenhum curso encontrado para a pesquisa.</div>`;
  }

  search.addEventListener("input", draw);
  draw();
}

function countMaterials(course) {
  return course.disciplines.reduce((total, discipline) => total + discipline.materials.length, 0);
}

function renderLibraryPage() {
  const tabs = document.getElementById("courseTabs");
  const shelves = document.getElementById("disciplineShelves");
  const title = document.getElementById("libraryTitle");
  const desc = document.getElementById("libraryDescription");
  const breadcrumb = document.getElementById("breadcrumbCourse");
  const stats = document.getElementById("libraryStats");
  const search = document.getElementById("librarySearch");
  const disciplineFilter = document.getElementById("disciplineFilter");
  const typeFilter = document.getElementById("typeFilter");
  if (!tabs || !shelves) return;

  let selectedCourse = findCourse(getParams().get("curso"));

  function drawTabs() {
    tabs.innerHTML = courses.map(course => `
      <button class="course-tab ${course.id === selectedCourse.id ? "active" : ""}" data-course="${course.id}">
        ${course.name}
      </button>
    `).join("");
  }

  function drawFilters() {
    disciplineFilter.innerHTML = `
      <option value="todas">Todas as disciplinas</option>
      ${selectedCourse.disciplines.map(d => `<option value="${d.id}">${d.name}</option>`).join("")}
    `;
    disciplineFilter.value = getParams().get("disciplina") || "todas";
  }

  function drawContent() {
    title.textContent = selectedCourse.name;
    desc.textContent = selectedCourse.description;
    breadcrumb.textContent = selectedCourse.name;
    stats.innerHTML = `
      <div class="stat"><strong>${selectedCourse.disciplines.length}</strong><span>disciplinas</span></div>
      <div class="stat"><strong>${countMaterials(selectedCourse)}</strong><span>materiais</span></div>
      <div class="stat"><strong>4</strong><span>tipos de conteudo</span></div>
    `;

    const query = normalize(search.value.trim());
    const selectedDiscipline = disciplineFilter.value;
    const selectedType = typeFilter.value;

    const disciplines = selectedCourse.disciplines
      .filter(d => selectedDiscipline === "todas" || d.id === selectedDiscipline)
      .map(discipline => ({
        ...discipline,
        materials: discipline.materials.filter(material => {
          const content = `${discipline.name} ${material.title} ${material.type} ${material.description}`;
          const matchesQuery = normalize(content).includes(query);
          const matchesType = selectedType === "todos" || material.type === selectedType;
          return matchesQuery && matchesType;
        })
      }))
      .filter(discipline => discipline.materials.length > 0 || query === "");

    shelves.innerHTML = disciplines.map(discipline => renderShelf(selectedCourse, discipline)).join("") ||
      `<div class="empty-state">Nenhum material encontrado com estes filtros.</div>`;
  }

  tabs.addEventListener("click", event => {
    const button = event.target.closest("[data-course]");
    if (!button) return;
    selectedCourse = findCourse(button.dataset.course);
    history.replaceState(null, "", `biblioteca.html?curso=${selectedCourse.id}`);
    search.value = "";
    typeFilter.value = "todos";
    drawTabs();
    drawFilters();
    drawContent();
  });

  [search, disciplineFilter, typeFilter].forEach(input => input.addEventListener("input", drawContent));

  drawTabs();
  drawFilters();
  drawContent();
}

function renderShelf(course, discipline) {
  return `
    <article class="shelf">
      <div class="shelf-header">
        <div>
          <h2>${discipline.name}</h2>
          <p>${discipline.description}</p>
        </div>
        <a class="ghost-button" href="disciplina.html?curso=${course.id}&disciplina=${discipline.id}">Abrir disciplina</a>
      </div>
      <div class="material-row">
        ${discipline.materials.map(material => renderMaterial(material)).join("")}
      </div>
    </article>
  `;
}

function renderMaterial(material) {
  const isFile = material.href !== "#";
  return `
    <article class="material-card">
      <span class="material-type">${material.type}</span>
      <h3>${material.title}</h3>
      <p>${material.description}</p>
      <footer>
        <a class="material-action" href="${material.href}" ${isFile ? 'target="_blank" rel="noopener"' : ""}>
          ${isFile ? "Abrir material" : "Reservado"}
        </a>
      </footer>
    </article>
  `;
}

function renderDisciplinePage() {
  const page = document.getElementById("disciplinePage");
  if (!page) return;

  const params = getParams();
  const { course, discipline } = findDiscipline(params.get("curso"), params.get("disciplina"));
  const key = `progresso_${course.id}_${discipline.id}`;
  const progress = Number(localStorage.getItem(key) || 0);

  document.title = `${discipline.name} - AngoEDMAP`;
  page.innerHTML = `
    <section class="discipline-layout">
      <div>
        <div class="discipline-hero">
          <p class="breadcrumb">
            <a href="index.html">Inicio</a>
            <span>/</span>
            <a href="cursos.html">Cursos</a>
            <span>/</span>
            <a href="biblioteca.html?curso=${course.id}">${course.name}</a>
            <span>/</span>
            <strong>${discipline.name}</strong>
          </p>
          <h1>${discipline.name}</h1>
          <p>${discipline.description}</p>
        </div>
        <article class="summary-card">
          <h2>Plano de estudo</h2>
          <ul>
            <li>Ler o material introdutorio e marcar os conceitos principais.</li>
            <li>Consultar PDFs e manuais disponiveis na prateleira da disciplina.</li>
            <li>Rever com exercicios, apontamentos e futuras video-aulas.</li>
          </ul>
        </article>
        <article class="shelf">
          <div class="shelf-header">
            <div>
              <h2>Materiais da disciplina</h2>
              <p>Livros, PDFs, manuais e guias reunidos num unico espaco.</p>
            </div>
          </div>
          <div class="material-row">
            ${discipline.materials.map(material => renderMaterial(material)).join("")}
          </div>
        </article>
      </div>
      <aside>
        <article class="progress-card">
          <h2>Progresso</h2>
          <p><strong id="progressText">${progress}%</strong> concluido nesta disciplina.</p>
          <div class="progress-track"><div class="progress-fill" id="progressFill" style="width:${progress}%"></div></div>
          <div class="progress-buttons">
            <button data-progress="25">25%</button>
            <button data-progress="50">50%</button>
            <button data-progress="75">75%</button>
            <button data-progress="100">100%</button>
          </div>
        </article>
        <article class="summary-card">
          <h2>Outras disciplinas</h2>
          <div class="course-tabs">
            ${course.disciplines.slice(0, 8).map(item => `
              <a class="course-tab ${item.id === discipline.id ? "active" : ""}" href="disciplina.html?curso=${course.id}&disciplina=${item.id}">
                ${item.name}
              </a>
            `).join("")}
          </div>
        </article>
      </aside>
    </section>
  `;

  page.addEventListener("click", event => {
    const button = event.target.closest("[data-progress]");
    if (!button) return;
    const value = Number(button.dataset.progress);
    localStorage.setItem(key, value);
    document.getElementById("progressText").textContent = `${value}%`;
    document.getElementById("progressFill").style.width = `${value}%`;
  });
}

document.addEventListener("DOMContentLoaded", () => {
  const page = document.body.dataset.page;
  if (page === "cursos") renderCoursesPage();
  if (page === "biblioteca") renderLibraryPage();
  if (page === "disciplina") renderDisciplinePage();
});
