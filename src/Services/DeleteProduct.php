<?php

require_once __DIR__ . "/../Controllers/ProductController.php";
require_once __DIR__ . "/../Singleton/DataBase.php";

if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

    if ($id) {
        try {
            
            $productsController = new ProductController(DataBase::GetInstance());
            $productsController->Destroy($id);
            header("Location: /");
        } catch (PDOException $e) {
            echo "Erro ao excluir usuário: " . $e->getMessage();
        }
    }
}