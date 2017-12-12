<?php 
    $conn = mysqli_connect('localhost', 'root', 'bcd127', 'dbfrajola');
    $sql = 'select telefone from tblendereco where idEndereco = 1';

    $resultado = mysqli_query($conn, $sql);

    $lstPoduto = array();

    if($produto = mysqli_fetch_assoc($resultado) ){
        $lstProduto = $produto;
    }
        echo json_encode($lstProduto);

?>