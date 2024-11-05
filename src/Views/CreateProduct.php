<h1>Adicionar Produto</h1>

<form class="row g-3" action="Services/AddProduct.php" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" name="name" placeholder="Tênis">
    </div>
    <div class="mb-3">
        <label for="desc" class="form-label">Descrição</label>
        <input type="text" class="form-control" name="desc" placeholder="Tênis vermelho e preto">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Preço</label>
        <input type="number" step="any" class="form-control" name="price" placeholder="159.99">
    </div>
    <div class="mb-3">
        <label for="stock" class="form-label">Estoque</label>
        <input type="number" class="form-control" name="stock" placeholder="25">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Adicionar</button>
  </div>
</form>