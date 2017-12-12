<?php	

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		$conn = mysqli_connect("localhost","root","bcd127", "dbfrajola");
	
		$valor=$_POST["valor"];
		$id=$_POST["id"];
		
		$sql= "INSERT INTO tblproduto_avaliacao (idProduto, avaliacao) VALUES (".$id.", ".$valor.");";
		
		if (mysqli_query($conn, $sql)) {
			
			echo json_encode(array(
					"sucesso" => true ,
					"mensagem"=> "Avaliado com sucesso"));
		} else {
			
			echo json_encode(array(
					"sucesso" => false ,
					"mensagem" => mysqli_error($conn)));				
		}
	
		
	}else{
		
		echo json_encode(array(
		"sucesso" => false ,
		"mensagem"=> "Método não suportado"));		
	}
?>