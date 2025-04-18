<!doctype html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

    <title>Cadastro</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <?php 
                include 'conexao.php';
                if($_SERVER['REQUEST_METHOD'] == "POST"){
                  $nome = $_POST['nome'];
                  $endereco = $_POST['endereco'];
                  $telefone = $_POST['telefone'];
                  $email = $_POST['email'];
                  $dt_nascimento = $_POST['dt_nascimento'];
                  $sql = "INSERT INTO `cliente`(`nome`, `endereco`, `telefone`, `email`, `data_nascimento`) VALUES ('$nome','$endereco','$telefone','$email','$dt_nascimento')";
                  if(mysqli_query($conn, $sql) && 
                  $_POST['nome'] != "" 
                  && $_POST['endereco'] != "" 
                  && $_POST['telefone'] != "" 
                  && $_POST['email'] != "" 
                  && $_POST['dt_nascimento'] != ""){
                      mensagem("Cliente $nome cadastrado com sucesso!",'success');
                  } else {
                      mensagem("Erro ao cadastrar!", 'danger');
                  }
                } else {
                mensagem("Erro ao acessar página!", 'danger');
                }
            ?>
            <a href="index.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>