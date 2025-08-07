<?php


class Funcionario extends Model
{

    public function buscarFunc($email, $senha){
        $sql = "SELECT * FROM tbl_funcionario 
                WHERE email_funcionario     = :email 
                AND senha_funcionario       = :senha 
                AND status_funcionario      = 'Ativo'";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // ####################################
    // ########### DASHBOARD ##############
    // ####################################

    // Método para listar todos os Funcionario
    public function getTodosFuncionarios(){

        $sql = "SELECT * FROM tbl_funcionario WHERE status_funcionario = 'Ativo' order by nome_funcionario asc;";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // Método para listar todos os Professores
    public function getTodosProfessores(){

        $sql = "SELECT f.*, p.hora_aula_semanal, p.salario_hora_professor FROM tbl_professor p INNER JOIN tbl_funcionario f ON p.id_funcionario = f.id_funcionario WHERE f.status_funcionario = 'Ativo' order by f.nome_funcionario asc;";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    // ####################################
    // ############## API #################
    // ####################################

    // Método para listar todos os funcionarios
    public function getDadosFuncionario()
    {
        $sql = "SELECT nome_funcionario, email_funcionario, telefone1_funcionario, cargo_funcionario FROM tbl_funcionario WHERE status_funcionario = 'ATIVO' AND (cargo_funcionario LIKE 'Coordenador%' OR cargo_funcionario LIKE 'Professor%') ORDER BY cargo_funcionario asc, nome_funcionario asc";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Listar Funcionarios pelo cargo
    public function getFuncionariosCargo($cargo)
    {
        $sql = "SELECT nome_funcionario, email_funcionario, telefone1_funcionario FROM tbl_funcionario 
        WHERE status_funcionario = 'ATIVO' AND cargo_funcionario LIKE :cargo ORDER BY nome_funcionario asc";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':cargo' => "$cargo%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
