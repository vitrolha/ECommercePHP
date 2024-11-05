<h1>Produtos</h1>

<?php
    require_once "Controllers/ProductController.php";
    require_once "Singleton/DataBase.php";

    try{
        $productsController = new ProductController(DataBase::GetInstance());
        $products = $productsController->GetAll();
    }
    catch(Exception $ex){
        echo "<div class=\"alert alert-warning\" role=\"alert\">"
                . $ex->getMessage() .
            "</div>";
    }
?>
<div class="d-flex flex-row">
    <?php foreach($products as $p): ?> 

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $p["name"] ?></h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary"><?= $p["price_text"] ?></h6>
                    <p class="card-text">Qtd. <?= $p["stock"] ?></p>
                    <form action="/Services/AddCart.php" method="post">
                        <input name="id" value="<?= $p["id"] ?>" type="hidden"/>
                        <button type="submit" class="btn btn-primary">Adicionar ao Carrinho</button>
                    </form>
                    <a href="?page=ProductDetails&id=<?= $p["id"] ?>" class="card-link">Detalhes</a>
                </div>
            </div>
    <?php endforeach ?>
</div>

