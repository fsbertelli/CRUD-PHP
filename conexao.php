<?php 
    function mensagem($texto, $tipo){
        echo "<div class='alert alert-$tipo' role='alert'>
                    $texto
                </div>"; 
    }
    $server = "localhost";
    $user = "root";
    $password = "";
    $bd = "crudUnip2025";

    $conn = mysqli_connect($server, $user, $password, $bd);

    if(!mysqli_connect_error()){
    //    mensagem('Conectado!', 'success');
    } else {
        mensagem('Erro na conexão!', 'danger');
    }


?>