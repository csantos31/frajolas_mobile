<?php 
    $conn = mysqli_connect('localhost', 'root', 'bcd127', 'contatosAPI');
    $sql = 'select * from contato';

    $resultado = mysqli_query($conn, $sql);

    $lstContatos = array();

    while($contato = mysqli_fetch_assoc($resultado) ){
        $lstContatos[] = $contato;
    }
        echo json_encode($lstContatos);

?>