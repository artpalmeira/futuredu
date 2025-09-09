<?php require_once('template/head.php'); ?>


<body>
  <header class="header-wrapper">
    <div class="header-section header-fixed">
      <div class="header-bottom">
        <a href="#" class="logo"><img src="logo1.png" alt="Logo FuturEdu"></a>
        <button class="btn toggle-theme" onclick="toggleTheme()">Alternar Tema</button>
      </div>
    </div>
  </header>

  <main style="padding:2rem;">
    <h1>📘 Documentação da API</h1>
    <p>Use um token JWT (obtido via <code>/api/LoginAluno</code>) para acessar rotas protegidas.</p>

    <!-- 🔐 LOGIN -->
    <section>
      <h2>🔐 Autenticação</h2>

      <div class="endpoint">
        <span class="method">POST</span> <code>/api/LoginAluno</code>
        <p><strong>Body (form-data):</strong> <code>email_aluno</code>, <code>senha_aluno</code></p>
        <p><strong>Resposta:</strong> JSON com <code>mensagem</code>, <code>token</code></p>
      </div>
    </section>

    <!-- 👨‍🎓 ALUNO -->
    <section>
      <h2>👨‍🎓 Endpoints do Aluno</h2>

      <div class="endpoint">
        <span class="method">GET</span> <code>/api/ListarAluno/{id}</code>
        <p><strong>Header:</strong> Authorization: Bearer {token}</p>
        <p>Retorna os dados do aluno autenticado.</p>
      </div>

      <div class="endpoint">
        <span class="method">PATCH</span> <code>/api/aluno/{id}</code>
        <p><strong>Body:</strong> Dados a atualizar (form-urlencoded)</p>
        <p>Atualiza parcialmente os dados do aluno.</p>
      </div>

      <div class="endpoint">
        <span class="method">POST</span> <code>/api/recuperarSenha</code>
        <p>Envia um e-mail com link de redefinição de senha.</p>
      </div>

      <div class="endpoint">
        <span class="method">POST</span> <code>/api/resetarSenha</code>
        <p><strong>Body:</strong> <code>token</code>, <code>nova_senha</code></p>
        <p>Atualiza a senha após validar o token enviado.</p>
      </div>

      <div class="endpoint">
        <span class="method">GET</span> <code>/api/ListarCursosDoAluno/{id}</code>
        <p><strong>Header:</strong> Authorization: Bearer {token}</p>
        <p>Lista os cursos que o aluno está matriculado.</p>
      </div>

      <div class="endpoint">
        <span class="method">GET</span> <code>/api/aluno/ListarNotasAlunoPorSigla/{idAluno}/{idSigla}</code>
        <p><strong>Header:</strong> Authorization: Bearer {token}</p>
        <p>Notas do aluno no curso correspondente à sigla.</p>
      </div>

      <div class="endpoint">
        <span class="method">GET</span> <code>/api/aluno/ListarMediasAluno/{idAluno}</code>
        <p><strong>Header:</strong> Authorization: Bearer {token}</p>
        <p>Média das notas por curso.</p>
      </div>

      <div class="endpoint">
        <span class="method">GET</span> <code>/api/aluno/ListarProjetosDoAluno/{idAluno}</code>
        <p><strong>Header:</strong> Authorization: Bearer {token}</p>
        <p>Lista os projetos em que o aluno participou.</p>
      </div>
    </section>

    <!-- 📚 CURSOS -->
    <section>
      <h2>📚 Endpoints de Cursos</h2>

      <div class="endpoint"><span class="method">GET</span> <code>/api/cursos</code> – Lista todos os cursos</div>
      <div class="endpoint"><span class="method">GET</span> <code>/api/cursos/aleatorios</code> – Retorna cursos aleatórios</div>
      <div class="endpoint"><span class="method">GET</span> <code>/api/cursos/busca/{termo}</code> – Busca por nome</div>
    </section>

    <!-- 📝 NOTAS -->
    <section>
      <h2>📝 Notas</h2>
      <p>🚧 <em>Em breve: novos endpoints para visualização, filtros e exportação de notas.</em></p>
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
        <p>🚧 <em>Visualização de participação será adicionada.</em></p>
      </div>
    </section>

    <!-- 🏢 EMPRESAS -->
    <section>
      <h2>🏢 Empresas</h2>
      <div class="endpoint"><span class="method">GET</span> <code>/api/empresas</code> – Retorna todas as empresas cadastradas</div>
    </section>

    <!-- 👨‍🏫 FUNCIONÁRIOS -->
    <section>
      <h2>👨‍🏫 Funcionários</h2>
      <div class="endpoint"><span class="method">GET</span> <code>/api/funcionarios</code> – Lista completa dos funcionários</div>
      <div class="endpoint"><span class="method">GET</span> <code>/api/funcionarios/cargo/{cargo}</code> – Lista por cargo</div>
    </section>

    <footer style="margin-top:2rem; font-size:0.9rem; color:gray;">
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

</html>