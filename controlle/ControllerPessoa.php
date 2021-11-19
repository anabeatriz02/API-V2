<?php

class ControllerPessoa
{

    private $_method;
    private $_modelPessoa;
    private $_codPessoa;

    public function __construct($model)
    {

        $this->_modelPessoa = $model;
        $this->_method = $_SERVER['REQUEST_METHOD'];

        //PERMITE RECEBER DADOS JSON ATRÁVES DA REQUISIÇÃO
        $json = file_get_contents("php://input");
        // echo $json;exit;
        $dadosPessoa = json_decode($json);

        $this->_codPessoa = $dadosPessoa->cod_pessoa ?? null;
    }

    function router()
    {

        switch ($this->_method) {

            case 'GET':
                // echo 'teste';exit;
                // echo $this->_codPessoa;exit;
                if (isset($this->_codPessoa)) {
                    return $this->_modelPessoa->findById();
                }
                return $this->_modelPessoa->findAll();
                break;

            case 'POST':
                # code...
                break;

            case 'PUT':
                # code...
                break;

            case 'DELETE':
                # code...
                break;

            default:
                # code...
                break;
        }
    }
}

?>