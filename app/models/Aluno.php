<?php


class Aluno extends Model
{

     //Método para login do aluno
     public function postLoginAluno($email, $senha){

        $sql = "SELECT * FROM tbl_aluno WHERE email_aluno = :email_aluno
        AND senha_aluno = :senha_aluno AND status_aluno = 'Ativo' 
        ORDER BY id_aluno DESC LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email_aluno', $email);
        $stmt->bindParam(':senha_aluno', $senha);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
        // /Teste
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

}
