<!doctype html>
<html lang="pt-br" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

    <title>Pesquisar Cadastro</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Pesquisar Cadastro</h1>
                <label for="pesquisa" class="form-label">Pesquisar</label>
                <select class="form-select" name="pesquisa" id="pesquisa">
                <option value=""> -- SELECIONE -- </option>
                
                  <?php 
                    include 'conexao.php';
                    $conn = new mysqli($server, $user, $password, $bd);
                    if($conn->connect_error){
                        die("Erro na conexão: " . $conn->connect_error);
                    }
                    $result = $conn->query("SELECT * FROM pessoa");
                    if($result->num_rows > 0){
                      while($row = $result->fetch_assoc()){
                          echo "<option value='".$row['cod_pessoa']."'>".$row['nome']."</option>";
                      }
                    } else {
                        echo "Nenhum resultado encontrado!";
                    }
                  ?>
            <a href='index.php' class='btn btn-info'>Voltar para o inicio</a>
            </div>
        </div>
    </div>





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    -->
  </body>
</html>