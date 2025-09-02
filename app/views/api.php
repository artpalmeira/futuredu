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
    <p>Utilize um token JWT (obtido via <code>/api/LoginAluno</code>) para acessar endpoints protegidos.</p>

    <!-- 🔐 LOGIN -->
    <section>
      <h2>🔐 Login</h2>
      <div class="endpoint">
        <span class="method">POST</span> <code>/api/LoginAluno</code>
        <p><strong>Body (form-data):</strong> <code>email_aluno</code>, <code>senha_aluno</code></p>
        <p><strong>Resposta 200:</strong> JSON com <code>mensagem</code>, <code>token</code></p>
      </div>
    </section>

    <!-- 👨‍🎓 ALUNO -->
    <section>
      <h2>👨‍🎓 Aluno</h2>

      <div class="endpoint">
        <span class="method">GET</span> <code>/api/ListarAluno/{id}</code>
        <p><strong>Header:</strong> Authorization: Bearer {token}</p>
        <p>Retorna dados do aluno autenticado.</p>
      </div>

      <div class="endpoint">
        <span class="method">PATCH</span> <code>/api/aluno/{id}</code>
        <p><strong>Body:</strong> Dados a atualizar (form-urlencoded)</p>
        <p>Atualiza os dados do aluno.</p>
      </div>

      <div class="endpoint">
        <span class="method">POST</span> <code>/api/recuperarSenha</code>
        <p>Envia e-mail com link para redefinir senha.</p>
      </div>

      <div class="endpoint">
        <span class="method">POST</span> <code>/api/resetarSenha</code>
        <p><strong>Body:</strong> <code>token</code>, <code>nova_senha</code></p>
        <p>Atualiza a senha do aluno após validação do token.</p>
      </div>

      <div class="endpoint">
        <span class="method">GET</span> <code>/api/ListarCursosDoAluno/{id}</code>
        <p><strong>Header:</strong> Authorization: Bearer {token}</p>
        <p>Retorna os cursos em que o aluno está matriculado.</p>
      </div>

      <div class="endpoint">
        <span class="method">GET</span> <code>/api/aluno/ListarNotasAlunoPorSigla/{idAluno}/{idSigla}</code>
        <p><strong>Header:</strong> Authorization: Bearer {token}</p>
        <p>Retorna as notas do aluno no curso identificado por <code>idSigla</code>.</p>
      </div>

      <div class="endpoint">
        <span class="method">GET</span> <code>/api/aluno/mediasAluno/{idAluno}</code>
        <p><strong>Header:</strong> Authorization: Bearer {token}</p>
        <p>Retorna a média das notas por curso do aluno informado.</p>
      </div>

      <div class="endpoint">
        <span class="method">GET</span> <code>/api/aluno/projetosAluno/{idAluno}</code>
        <p><strong>Header:</strong> Authorization: Bearer {token}</p>
        <p>Retorna os projetos em que o aluno participou.</p>
      </div>



    </section>

    <!-- 📚 CURSOS -->
    <section>
      <h2>📚 Cursos</h2>

      <div class="endpoint"><span class="method">GET</span> <code>/api/cursos</code> – Lista todos os cursos</div>
      <div class="endpoint"><span class="method">GET</span> <code>/api/cursos/aleatorios</code> – Cursos aleatórios</div>
      <div class="endpoint"><span class="method">GET</span> <code>/api/cursos/busca/{termo}</code> – Busca por nome</div>
    </section>

    <!-- 📝 NOTAS -->
    <section>
      <h2>📝 Notas</h2>
      <p>🚧 <em>Novos endpoints serão adicionados aqui</em></p>
    </section>

    <!-- 🛠 PROJETOS -->
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

      <div class="endpoint">
        <p>🚧 <em>Novos endpoints de visualização de participação em projetos virão aqui</em></p>
      </div>
    </section>

    <!-- 🏢 EMPRESAS -->
    <section>
      <h2>🏢 Empresas</h2>
      <div class="endpoint"><span class="method">GET</span> <code>/api/empresas</code> – Todas as empresas</div>
    </section>

    <!-- 👨‍🏫 FUNCIONÁRIOS -->
    <section>
      <h2>👨‍🏫 Funcionários</h2>
      <div class="endpoint"><span class="method">GET</span> <code>/api/funcionarios</code> – Todos os dados</div>
      <div class="endpoint"><span class="method">GET</span> <code>/api/funcionarios/cargo/{cargo}</code> – Filtrar por cargo</div>
    </section>

    <footer>
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