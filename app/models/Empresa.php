<?php


class Empresa extends Model{

    // Método para listar todas as empresas
    public function getEmpresas(){
        $sql = "SELECT fantasia_empresa, email_empresa, telefone1_empresa, endereco_empresa, numero_empresa, complemento_empresa, bairro_empresa FROM tbl_empresa WHERE status_empresa = 'Ativo' order by fantasia_empresa asc";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}