<?php

require_once __DIR__ . "/../DAO/ProductDAO.php";

class ProductController{
    private $productDAO;

    public function __construct($pdo) {
        $this->productDAO = new ProductDAO($pdo);
    }

    public function GetAll(){
        return $this->productDAO->GetAll(); 
    }

    public function GetById($id){
        return $this->productDAO->GetById($id);
    }

    public function Store($name, $desc, $price, $stock){
        if(!$name || !$desc || !$price || !$stock){
            throw new Exception("Nome, Descrição, Preço e Estoque são obrigatórios!");
        }

        if($this->productDAO->Store($name, $desc, $price, $stock)){
            echo $name . "adicionado com sucesso!";
        }
        else{
            throw new Exception("Erro ao adicionar " . $name);
        }
    }

    public function Destroy($id){
        if(!$id){
            throw new Exception("Produto com $id não existe.");
        }

        $this->productDAO->Destroy($id);
    }
}