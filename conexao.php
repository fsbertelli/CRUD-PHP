<?php 
    $server = "localhost";
    $user = "root";
    $password = "";
    $bd = "db";

    $conn = mysqli_connect($server, $user, $password, $bd);
    if(!mysqli_connect_error()){
        //echo "Conectado!";
    } else {
        echo "Erro na conexão!";
    }

    function mensagem($texto, $tipo){
        echo "<div class='alert alert-$tipo' role='alert'>
                    $texto
                </div>"; 
    }
?>