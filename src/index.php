<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>E-Commerce</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>

  <?php include "Components/NavBar.php"; ?>

  <div class="conteudo">
    <?php
      // Verifica se o parâmetro "page" está definido na URL
      if (isset($_GET['page'])) {
          // Garante que a página requisitada existe e previne inclusão de arquivos arbitrários
          $pagina = 'Views/' . basename($_GET['page']) . '.php';
          if (file_exists($pagina)) {
              $id = isset($_GET["id"]) ? intval($_GET["id"]) : null;
              include $pagina;
          } else {
              echo "<p>Página não encontrada.</p>";
          }
      } else {
          include 'Views/Home.php'; // Página padrão
      }
    ?>
  </div>

</body>
</html>

<style>
    .conteudo{
        margin: 20px;
    }
</style>
