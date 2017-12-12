 <?php
    
    include('verifica.php');  //SEGURANÇA
    include('conect.php');  //CONEXÃO
    
    if(isset($_GET['modo'])) //VERIFICA SEREGISTRO SERÁ EXCLUÍDO OU ALTERADO
    {
        $modo = $_GET['modo'];
        if($modo='excluir')
        {
            $codigo = $_GET['codigo'];
            $sql = "DELETE FROM tbl_nivel_de_usuario WHERE id_nivel =".$codigo;
            
            mysqli_query($conexao, $sql);
            
            echo"<script language='javascript' type='text/javascript'>alert('Usuário deletado com sucesso'); window.location.href='gerenciamento_niveis.php'; </script>";
            die();
        }
    }

?>



<html>
    <head>
        <title>Gerenciamento de categorias</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <body>
        <div id="principal">
            <?php include('hd.php') ?>
            
            <main>
                <?php include('menu.php') ?>
                
                <div id="conteudo">
                    <button id="modalBtn">Inserir Categoria</button>                    
                    <h1>Gerenciamento de categorias</h1>                
                    <?php
                    
                        include('conect.php');
                        
                        $sql = 'select * from tblcategoria order by idCategoria desc';
                        $select = mysqli_query($conexao, $sql);
            
                        while($rsCategoria=mysqli_fetch_array($select)){
                    ?>
                    
                        <div class="container_categoria">
                            <div class="item_categoria">
                                <?php echo($rsCategoria['nome']) ?>
                            </div>
                            <div class="icones_categoria"> 
                                <a href="cadastro_nivel.php?modo=editar&codigo=<?php echo($rsNiveis['id_nivel']) ?>">
                                    <img src="imagens/edit.png" alt="edit" title="edit">
                                </a>
                                <a href="gerenciamento_niveis.php?modo=excluir&codigo=<?php echo($rsNiveis['id_nivel']) ?>">
                                    <img src="imagens/del.png" alt="delete" title="delete">
                                </a>                            
                            </div>
                        </div>
                    
                    <?php 
                        }
                    ?>
                </div>
            </main>
            <?php include('foot.php') ?>
        </div>
        <div id="modal_produtos">
            <div id="modal_content">
                <div class="modal_header">
                    <h2>Inserir Categoria</h2>
                    <span id="closeBtn">&times</span>
                </div>
                <div class="modal_body">
                    <form name="frm_categoria" method="post" action="gerenciamento_categorias.php">
                        <label>Nome:</label>
                        <input id="categoria_nome" type="text" value="" name="txt_categoria"><br>
                        <input id="btn_salvar" type="submit" value="Inserir" name="salvar">
                    </form>  
                </div>
                <div class="modal_footer">
                    <h3>Cadastro de categorias...</h3>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/modal.js"></script>
    </body>
</html>