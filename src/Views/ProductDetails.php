<h1>Detalhes</h1>

<?php

    require_once "Controllers/ProductController.php";
    require_once "Singleton/DataBase.php";

    try{
        $productController = new ProductController(DataBase::GetInstance());
        $product = $productController->GetById($id);
    }
    catch(Exception $ex){
        echo "<div class=\"alert alert-warning\" role=\"alert\">"
                . $ex->getMessage() .
            "</div>";
    }   
?>

<?php if(!empty($product)): ?>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $product["name"] ?></h5>
            <h6 class="card-subtitle mb-2 text-body-secondary"><?= $product["price_text"] ?></h6>
            <p class="card-text"><?= $product["description"] ?></p>
            <a href="/Services/DeleteProduct.php?id=<?= $product["id"] ?>" onclick="return confirm('Tem certeza que deseja excluir este produto?')" class="card-link">Excluir</a>
        </div>
    </div>
<?php else: ?>
    <h3>Produto não encontrado.</h3>
<?php endif ?>