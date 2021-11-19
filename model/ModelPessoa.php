<?php

class ModelPessoa{

    private $_conn;

    private $_codPessoa;

    public function __construct($conn){

        $this->_conn = $conn;
    }

    public function findAll(){

        //MONTRA A INSTRUÇÃO SQL
        $sql = "SELECT * FROM tbl_pessoa";

        //PREPARA UM PROCESSO DE EXECUÇÃO DE INSTRUÇÃO SQL
        $stm = $this->_conn->prepare($sql);

        //EXECUTA A INSERÇÃO SQL
        $stm->execute();

        //DEVOLVE OS VALORES DA SELECT PARA SEREM UTILIZADOS
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(){

        $sql = "SELECT * FROM tbl_pessoa WHERE cod_pessoa = ?";

        $stm = $this->_conn->prepare($sql);

    }

}



?>