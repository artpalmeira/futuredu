<?php


class Aluno extends Model
{

    //Método para login do aluno
    public function postLoginAluno(string $email): ?array
    {
        $sql = "SELECT id_aluno, nome_aluno, email_aluno, senha_aluno
              FROM tbl_aluno
             WHERE email_aluno = :email_aluno
               AND status_aluno = 'Ativo'
             LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email_aluno', $email, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    // Método para listar todos os Aluno
    public function getTodosAlunos()
    {

        $sql = "SELECT * FROM tbl_aluno WHERE status_aluno = 'Ativo' order by nome_aluno asc";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Método para listar o aluno pelo ID
    public function getAlunoId($id)
    {
        $sql = "SELECT * FROM tbl_aluno WHERE status_aluno = 'Ativo' AND id_aluno = :cod_aluno";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':cod_aluno', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Método para atualizar os dados do aluno
    public function patchAtualizarAluno($dados, $id)
    {
        //Prepara uma array que reconheça os campos
        $campos = [];
        //Gerar um loop que carregue as informações dos campos
        foreach ($dados as $campo => $valor) {
            $campos[] = "$campo = :$campo";
        }

        //Query do UPDATE
        $sql = "UPDATE tbl_aluno SET " . implode(', ', $campos) . ", data_atualizacao_aluno = NOW() WHERE id_aluno = :id_aluno";
        $stmt = $this->db->prepare($sql);
        //Parametros que estão vindo da array $campos
        foreach ($dados as $campo => $valor) {
            $stmt->bindValue(":$campo", $valor);
        }
        $stmt->bindParam(":id_aluno", $id);
        return $stmt->execute();
    }

    //Método buscar aluno por e-mail
    public function buscarAlunoPorEmail($email)
    {
        $sql = "SELECT id_aluno, nome_aluno, email_aluno
                  FROM tbl_aluno
                 WHERE email_aluno = :email
                 LIMIT 1";
        $st = $this->db->prepare($sql);
        $st->bindValue(':email', $email, PDO::PARAM_STR);
        $st->execute();
        return $st->fetch(PDO::FETCH_ASSOC) ?: null;
    }


    /* API */

    /**
     * Listar as notificações em que um aluno está matriculado
     * @param int $idAluno
     * @return array
     */
    public function getCursosDoAluno(int $idAluno): array
    {
        $sql = "SELECT 
                tbl_sigla_curso.id_sigla, 
                nome_sigla, 
                nome_curso, 
                modalidade_curso, 
                carga_horaria_sigla, 
                foto_curso 
            FROM tbl_matricula
            INNER JOIN tbl_sigla_curso ON tbl_matricula.id_sigla = tbl_sigla_curso.id_sigla 
            INNER JOIN tbl_curso ON tbl_sigla_curso.id_curso = tbl_curso.id_curso
            WHERE id_aluno = :id;";
        $st = $this->db->prepare($sql);
        $st->bindValue(':id', $idAluno, PDO::PARAM_INT);
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * Retorna todas as notas do aluno no curso informado.
     * @param int $idAluno
     * @param int $idSigla
     * @return array
     */
    public function getNotasPorCurso(int $idAluno, int $idSigla): array
    {
        $sql = "SELECT 
                tbl_sigla_curso.id_sigla,
                nome_sigla,
                nome_curso,
                modalidade_curso,
                carga_horaria_sigla,
                tipo_nota,
                nota,
                data_nota,
                obs_nota,
                status_nota
            FROM tbl_matricula
            INNER JOIN tbl_sigla_curso ON tbl_matricula.id_sigla = tbl_sigla_curso.id_sigla 
            INNER JOIN tbl_curso ON tbl_sigla_curso.id_curso = tbl_curso.id_curso
            LEFT JOIN tbl_nota ON tbl_nota.id_matricula = tbl_matricula.id_matricula
            WHERE id_aluno = :aluno AND tbl_sigla_curso.id_sigla = :sigla";
        $st = $this->db->prepare($sql);
        $st->bindValue(':aluno', $idAluno, PDO::PARAM_INT);
        $st->bindValue(':sigla', $idSigla, PDO::PARAM_INT);
        $st->execute();
        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Summary of getMediasPorCurso
     * @param int $idAluno
     * @return array
     * GET /api/aluno/ListarMediasAluno/{idAluno}
     * Retorna a média das notas por curso para o aluno autenticado.
     */
    public function getMediasPorCurso(int $idAluno): array
    {
        $sql = "SELECT 
                tbl_sigla_curso.id_sigla,
                nome_sigla,
                nome_curso,
                AVG(nota) AS media,
                MAX(data_nota) AS data_ultima,
                obs_nota
            FROM tbl_matricula
            INNER JOIN tbl_sigla_curso ON tbl_matricula.id_sigla = tbl_sigla_curso.id_sigla 
            INNER JOIN tbl_curso ON tbl_sigla_curso.id_curso = tbl_curso.id_curso
            INNER JOIN tbl_nota ON tbl_nota.id_matricula = tbl_matricula.id_matricula
            WHERE id_aluno = :id
            GROUP BY tbl_sigla_curso.id_sigla";

        $st = $this->db->prepare($sql);
        $st->bindValue(':id', $idAluno, PDO::PARAM_INT);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }


    /**
     * Summary of getProjetosDoAluno
     * @param int $idAluno
     * @return array
     * GET /api/aluno/ListarProjetosDoAluno/{idAluno}
     * Retorna os projetos em que o aluno participou.
     */
    public function getProjetosDoAluno(int $idAluno): array
    {
        $sql = "SELECT 
                titulo_projeto,
                nome_funcionario,
                status_projeto,
                nota_projeto,
                CONCAT(
                    DATE_FORMAT(data_inicio_projeto,'%m/%Y'), 
                    ' - ', 
                    DATE_FORMAT(data_entrega_projeto, '%m/%Y')
                ) AS 'Periodo',
                url_projeto
                FROM tbl_projeto
                INNER JOIN tbl_participacao_projeto ON tbl_projeto.id_projeto = tbl_participacao_projeto.id_projeto
                INNER JOIN tbl_professor ON tbl_projeto.id_professor = tbl_professor.id_professor
                INNER JOIN tbl_funcionario ON tbl_professor.id_funcionario = tbl_funcionario.id_funcionario
                WHERE id_aluno = :id";

        $st = $this->db->prepare($sql);
        $st->bindValue(':id', $idAluno, PDO::PARAM_INT);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Summary of novoAluno
     * @param array $dados
     * @return bool
     * PATCH /api/aluno/{id}
     * Atualiza parcialmente os dados do aluno logado.
     */
    public function novoAluno(array $dados): bool
    {
        $sql = "INSERT INTO tbl_aluno ( nome_aluno,
                                        nome_social_aluno, 
                                        cpf_aluno,rg_aluno,
                                        data_nasc_aluno,
                                        email_aluno,F
                                        senha_aluno,
                                        telefone1_aluno,
                                        telefone2_aluno,
                                        cep_aluno,
                                        endereco_aluno,
                                        numero_aluno,
                                        complemento_aluno,
                                        bairro_aluno,
                                        cidade_aluno,
                                        estado_aluno,
                                        foto_aluno,
                                        alt_aluno,
                                        nome_responsavel,
                                        telefone_responsavel,
                                        email_responsavel,
                                        data_criacao_aluno,
                                        data_atualizacao_aluno,
                                        status_aluno) VALUES (  :nome_aluno,
                                                                :nome_social_aluno,
                                                                :cpf_aluno,
                                                                :rg_aluno,
                                                                :data_nasc_aluno,
                                                                :email_aluno,
                                                                :senha_aluno,
                                                                :telefone1_aluno,
                                                                :telefone2_aluno,
                                                                :cep_aluno,
                                                                :endereco_aluno,
                                                                :numero_aluno,
                                                                :complemento_aluno,
                                                                :bairro_aluno,
                                                                :cidade_aluno,
                                                                :estado_aluno,
                                                                :foto_aluno,
                                                                :alt_aluno,
                                                                :nome_responsavel,
                                                                :telefone_responsavel,
                                                                :email_responsavel,
                                                                :data_criacao_aluno,
                                                                :data_atualizacao_aluno,
                                                                :status_aluno)";

        $st = $this->db->prepare($sql);

        foreach ($dados as $chave => $valor) {
            $st->bindValue(":{$chave}", $valor);
        }

        if (!$st->execute()) {
            $erro = $st->errorInfo();
            var_dump($erro);
            return false;
        }

        return true;
    }

    /**
     * Summary of atualizarFoto
     * @param mixed $idAluno
     * @param mixed $nomeArquivo
     * @return bool
     * Atualizar foto do aluno
     * - Tipos de arquivos permitidos: Somente JPG, JPEG e PNG são aceitos.
     * - Tamanho máximo do arquivo: Não pode ultrapassar 2 MB (megabytes).
     * - Formatação do nome da imagem: aluno_{id}_{nome}.{extensão}  | Exemplo: aluno_15_maria-silva.jpg
     */
    public function atualizarFoto($idAluno, $nomeArquivo): bool
    {
        $sql = "UPDATE tbl_aluno SET foto_aluno = :foto WHERE id_aluno = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':foto', $nomeArquivo, PDO::PARAM_STR);
        $stmt->bindValue(':id', $idAluno, PDO::PARAM_INT);

        return $stmt->execute();
    }






    public function salvarResetToken(int $id, string $tokenHash, string $expira): bool
    {
        $sql = "UPDATE tbl_aluno
                   SET reset_token_hash = :h,
                       reset_token_expires = :e
                 WHERE id_aluno = :id";
        $st = $this->db->prepare($sql);
        $st->bindValue(':h',  $tokenHash, PDO::PARAM_STR);
        $st->bindValue(':e',  $expira,    PDO::PARAM_STR);
        $st->bindValue(':id', $id,        PDO::PARAM_INT);
        return $st->execute();
    }

    public function getAlunoPorResetHash(string $tokenHash)
    {
        $sql = "SELECT id_aluno, reset_token_expires
                  FROM tbl_aluno
                 WHERE reset_token_hash = :h
                 LIMIT 1";
        $st = $this->db->prepare($sql);
        $st->bindValue(':h', $tokenHash, PDO::PARAM_STR);
        $st->execute();
        return $st->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function limparResetToken(int $id): bool
    {
        $sql = "UPDATE tbl_aluno
                   SET reset_token_hash = NULL,
                       reset_token_expires = NULL
                 WHERE id_aluno = :id";
        $st = $this->db->prepare($sql);
        $st->bindValue(':id', $id, PDO::PARAM_INT);
        return $st->execute();
    }

    public function atualizarSenha(int $id, string $senhaHash): bool
    {
        $sql = "UPDATE tbl_aluno
                   SET senha_aluno = :s,
                       data_atualizacao_aluno = NOW()
                 WHERE id_aluno = :id";
        $st = $this->db->prepare($sql);
        $st->bindValue(':s',  $senhaHash, PDO::PARAM_STR);
        $st->bindValue(':id', $id,        PDO::PARAM_INT);
        return $st->execute();
    }
}
