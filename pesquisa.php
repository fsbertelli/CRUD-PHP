<!doctype html>
<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">    
    <title>Pesquisar Cliente</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Pesquisar Cliente</h1>
                <form method="POST">
                    <select class="form-select" name="cliente_id" id="cliente_id" onchange="this.form.submit()">
                        <option value=""> -- SELECIONE -- </option>
                        <?php 
                            include 'conexao.php';
                            $conn = new mysqli($server, $user, $password, $bd);
                            if($conn->connect_error){
                                die("Erro na conexão: " . $conn->connect_error);
                            }
                            $result = $conn->query("SELECT * FROM cliente");
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    $selected = (isset($_POST['cliente_id']) && $_POST['cliente_id'] == $row['id']) ? "selected" : "";
                                    echo "<option value='".$row['id']."' $selected>".$row['nome']."</option>";
                                }
                            } else {
                                echo "<option value=''>Nenhum cliente encontrado</option>";
                            }
                        ?>
                    </select>  
                </form>

                <?php
                if(isset($_POST['cliente_id']) && !empty($_POST['cliente_id'])){
                    $id = $_POST['cliente_id'];
                    $stmt = $conn->prepare("SELECT * FROM cliente WHERE id = ?");
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    if($result->num_rows > 0){
                        $row = $result->fetch_assoc();
                        echo "<div class='mt-3'>";
                        echo "<h3>Detalhes do " .$row['nome']."</h3>";
                        echo "<p><strong>Nome:</strong> " . $row['nome'] . "</p>";
                        echo "<p><strong>Endereço:</strong> " . $row['endereco'] . "</p>";
                        echo "<p><strong>Telefone:</strong> " . $row['telefone'] . "</p>";
                        echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
                        echo "<p><strong>Data de Nascimento:</strong> " . $row['data_nascimento'] . "</p>";
                        echo "</div>";
                    } else {
                        mensagem('Falha ao carregar dados do cliente.'.$row['nome'], 'danger'); 
                    }
                    $stmt->close();
                }
                $conn->close();
                ?>        
                <a href='index.php' class='btn btn-info mt-3'>Voltar para o início</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
