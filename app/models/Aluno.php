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
