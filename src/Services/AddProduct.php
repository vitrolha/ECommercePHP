<?php

require_once __DIR__ .  "/../Controllers/ProductController.php";
require_once __DIR__ . "/../Singleton/DataBase.php";

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

if($_SERVER["REQUEST_METHOD"] === "POST"){

    //echo "Entrou no if Post";

    //echo "</br>" . $_POST["price"];

    //filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
    $desc = filter_input(INPUT_POST, "desc", FILTER_SANITIZE_SPECIAL_CHARS);
    $price = $_POST["price"];
    $stock = filter_input(INPUT_POST, "stock", FILTER_SANITIZE_NUMBER_INT);

    //echo "</br>$name $desc $price $stock </br>";

    if($name && $desc && $price && $stock){
        try{
            $productController = new ProductController(DataBase::GetInstance());
            $productController->Store($name, $desc, $price, $stock);
            header("Location: /");
        }
        catch(Exception $ex){
            echo "Erro ao adicionar produto " . $name . " " . $ex->getMessage();
        }
    }
}
