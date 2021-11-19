<?php

class ModelPessoa{

    private $_conn;

    private $_codPessoa;

    public function __construct($conn){

        //PERMITE RECEBER DADOS JSON ATRAVÉS DA REQUISIÇÃO
        $json = file_get_contents("php://input");
        $dadosPessoa = json_decode($json);

        // echo $dadosPessoa->cod_pessoa;exit;

        $this->_codPessoa = $dadosPessoa->cod_pessoa ?? null;
        // echo $this->_codPessoa;exit;
        $this->_conn = $conn;

    }

    public function findAll(){

        //MONTA A INSTRUÇÃO SQL
        $sql = "SELECT * FROM tbl_pessoa";

        //PREAPRA UM PROCESSO DE EXECUÇÃO DE INSTRUÇÃO SQL
        $stm = $this->_conn->prepare($sql);
       
        //EXECUTA A INSRTUÇÃO SQL
        $stm->execute();

        //DEVOLVE OS VALORES DA SELECT PARA SEREM UTILIZADOS
        return $stm->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function findById(){

        $sql = "SELECT * FROM tbl_pessoa WHERE cod_pessoa = ?";

        $stm = $this->_conn->prepare($sql);
        $stm->bindValue(1, $this->_codPessoa);

        $stm->execute();

        return $stm->fetchAll(\PDO::FETCH_ASSOC);

    }

}



?>