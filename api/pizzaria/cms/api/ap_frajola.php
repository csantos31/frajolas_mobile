<?php 
    $conn = mysqli_connect('localhost', 'root', 'bcd127', 'dbfrajola');
    $sql = 'select * from tblproduto';

    $resultado = mysqli_query($conn, $sql);

    $lstPoduto = array();

    while($produto = mysqli_fetch_assoc($resultado) ){
        $lstProduto[] = $produto;
    }
        echo json_encode($lstProduto);

?>