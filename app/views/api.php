<?php require_once('template/head.php'); ?>
<body>
  <header class="header-wrapper">
    <div class="header-section header-fixed">
      <div class="header-bottom">
        <a href="#" class="logo"><img src="logo1.png" alt="Logo"></a>
        <button class="btn toggle-theme" onclick="toggleTheme()">Alternar Tema</button>
      </div>
    </div>
  </header>

  <main style="padding:2rem;">
    <h1>📘 Documentação da API</h1>
    <p>Use um token JWT (obtido via /login-aluno) para endpoints protegidos.</p>

    <!-- Login -->
    <section>
      <h2>🔐 Login</h2>
      <div class="endpoint">
        <span class="method">POST</span> <code>/api/LoginAluno</code>
        <p><strong>Parâmetros (form-data):</strong> <code>email_aluno</code>, <code>senha_aluno</code></p>
        <p><strong>Resposta 200:</strong> JSON com <code>mensagem</code>, <code>token</code>, <code>Aluno</code></p>
      </div>
    </section>

    <!-- Aluno -->
    <section>
      <h2>👨‍🎓 Aluno</h2>
      <div class="endpoint">
        <span class="method">GET</span> <code>/api/aluno</code>
        <p>Retorna dados do aluno autenticado (Bearer Token no header)</p>
      </div>
      <div class="endpoint">
        <span class="method">GET</span> <code>/api/ListarAluno/{id}</code>
        <p>Retorna dados do aluno autenticado (Bearer Token no header)</p>
      </div>
      <div class="endpoint">
        <span class="method">PATCH</span> <code>/api/aluno/{id}</code>
        <p>Atualiza dados do aluno (form-urlencoded ou JSON no corpo)</p>
      </div>
    </section>

    <!-- Cursos -->
    <section>
      <h2>📚 Cursos</h2>
      <div class="endpoint"><span class="method">GET</span> <code>/api/cursos</code> – todos em ordem alfabética</div>
      <div class="endpoint"><span class="method">GET</span> <code>/api/cursos/aleatorios</code> – cursos aleatórios</div>
      <div class="endpoint"><span class="method">GET</span> <code>/api/cursos/busca/{termo}</code> – busca por nome</div>
    </section>

    <!-- Empresas -->
    <section>
      <h2>🏢 Empresas</h2>
      <div class="endpoint"><span class="method">GET</span> <code>/api/empresas</code> – todas empresas</div>
    </section>

    <!-- Funcionários -->
    <section>
      <h2>👨‍🏫 Funcionários</h2>
      <div class="endpoint"><span class="method">GET</span> <code>/api/funcionarios</code> – todos com dados</div>
      <div class="endpoint"><span class="method">GET</span> <code>/api/funcionarios/cargo/{cargo}</code> – por cargo</div>
    </section>

    <!-- Projetos -->
    <section>
      <h2>🛠 Projetos</h2>
      <div class="endpoint">
        <span class="method">POST</span> <code>/api/projetos</code>
        <p><strong>Body:</strong> <code>titulo_projeto</code>, <code>descricao_projeto</code>, <code>id_professor</code>, <code>id_sigla</code>, <code>data_inicio_projeto</code>, <code>data_entrega_projeto</code>, <code>status_projeto</code>, <code>url_projeto</code></p>
      </div>
      <div class="endpoint">
        <span class="method">POST</span> <code>/api/projetos/participar</code>
        <p><strong>Body:</strong> <code>id_projeto</code>, <code>nome_aluno</code>, <code>nota_participacao_projeto</code>, <code>obs_participacao_projeto</code></p>
      </div>
    </section>

    <footer style="margin-top:4rem; font-size:0.9rem; color:var(--text-light);">
      Documentação gerada em <?php echo date('d/m/Y'); ?>
    </footer>
  </main>

  <script>
    function toggleTheme() {
      document.documentElement.classList.toggle('dark-theme');
      document.documentElement.classList.toggle('light-theme');
    }
  </script>
</body>
</html>
