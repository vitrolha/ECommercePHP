<?php

class ProductDAO{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function GetAll(){
        $stmt = $this->pdo->query("SELECT * FROM Product");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetById($id){
        $sql = "SELECT * FROM Product WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function Store($name, $desc, $price, $stock){
        $price_txt = "R$ " . str_replace(".", ",", $price);
        $price = str_replace(",", ".", $price);
        $sql = "INSERT INTO Product (name, description, price, price_text, stock) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$name, $desc, $price, $price_txt, $stock]);
    }

    public function Destroy($id){
        $sql = "DELETE FROM Product WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
}