<h1>Carrinho</h1>

<?php
    require "Controllers/ProductController.php";
    require "Singleton/DataBase.php";

    if(!isset($_SESSION)){
        session_start();
    }

    $arrId = $_SESSION["id_list"];

    $arrProducts = [];

    $productsController = new ProductController(DataBase::GetInstance());

    $totalPrice = 0;

    foreach($arrId as $id){
        $arrProducts[] = $productsController->GetById($id);
        $totalPrice = $totalPrice + floatval($productsController->GetById($id)["price"]);
    }
?>

<ul class="list-group">
    <?php foreach($arrProducts as $p): ?>
        <li class="list-group-item">
            <h5><?= $p["name"]?></h5>
            <?= $p["price_text"]?>
            <form action="/Services/RemoveCart.php" method="post">
                <input name="id" value="<?= $p["id"] ?>" type="hidden"/>
                <button type="submit" class="btn btn-primary">Remover</button>
           </form>
        </li>
    <?php endforeach ?>
</ul>

<h3>Total: R$ <?= str_replace(".",",", $totalPrice) ?></h3>

<?php if(!empty($_SESSION["id_list"])): ?>
<form action="/Services/Pay.php" method="post">
    <button type="submit" class="btn btn-primary">Finalizar Compra</button>
</form>
<?php endif?>
