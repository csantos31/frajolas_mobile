<?php 
    session_write_close();
    include('cms/conect.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta charset="utf-8">
        <link rel="icon" href="icon/favicon.ico">
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/jquery.cycle.all.js.js"></script>
        <script type="text/javascript" src="js/arc1.js"></script>
    </head>
    <body>
        <div id="principal"> <!--Container Geral do site-->
            <?php 
                include("menu.php");
            ?>
            <main>
                <?php 
                    include("socialmidia.php");
                ?>
                <div id="container"> <!--Container dedicado a produtos-->
                    <div id="transicao">
                        <div id="seta_esquerda">
                            <a href="#" id="previous"><img alt="seta para a esquerda" title="seta para a esquerda" src="imagens/esquerda.png"></a>
                        </div>
                        <div id="slide">
                            <ul id="list">
                                
                                <?php
                                    
                                    $sql = "SELECT * FROM tblhome WHERE status = 1";
                                
                                    $select = mysqli_query($conexao, $sql);
                                
                                    $rsSlide=mysqli_fetch_array($select);
                                    
                                ?>
                                    <li><img class="image" title="pizzas da casa" alt="pizzas da casa" src="cms/<?php echo($rsSlide['imgSlide1']) ?>"></li>
                                    <li><img class="image" title="pizzas da casa" alt="pizzas da casa" src="cms/<?php echo($rsSlide['imgSlide2']) ?>"></li>
                                    <li><img class="image" title="pizzas da casa" alt="pizzas da casa" src="cms/<?php echo($rsSlide['imgSlide3']) ?>"></li>
                            </ul>
                        </div>
                        <div id="seta_direita">
                            <a href="#" id="next"><img alt="seta para a direita" title="seta para a direita" src="imagens/direita.png"></a>
                        </div>
                    </div>
                    <div id="introduce"> <!--Mensagem subliminar, ou a expectativa dela-->
                        <?php echo($rsSlide['texto']) ?>
                    </div>
                    <div id="container2">
                        <div id="menu_lateral">
                            <div class="teste_item">
                            </div>
                            <div class="teste_item">
                            </div>
                            <div class="teste_item">
                            </div>
                            <div class="teste_item">
                            </div>
                            <div class="teste_item">
                            </div>
                            <div class="teste_item">
                            </div>
                            <div class="teste_item">
                            </div>        
                        </div>
                        
                        <div id="produtos">
                            <div class="teste_produto">
                                <div class="up_produto">
                                    <div class="foto">
                                    </div>
                                </div>
                                <div class="down_produto">
                                    <b>Nome:</b><br>
                                    <b>Descrição:</b><br>
                                    <b>Preço:</b><br>
                                </div>
                                <div class="detalhes">
                                    Detalhes
                                </div>
                            </div>
                            <div class="teste_produto">
                                <div class="up_produto">
                                    <div class="foto">
                                    </div>
                                </div>
                                <div class="down_produto">
                                    <b>Nome:</b><br>
                                    <b>Descrição:</b><br>
                                    <b>Preço:</b><br>
                                </div>
                                <div class="detalhes">
                                    Detalhes
                                </div>
                            </div>
                            <div class="teste_produto">
                                <div class="up_produto">
                                    <div class="foto">
                                    </div>
                                </div>
                                <div class="down_produto">
                                    <b>Nome:</b><br>
                                    <b>Descrição:</b><br>
                                    <b>Preço:</b><br>
                                </div>
                                <div class="detalhes">
                                    Detalhes
                                </div>
                            </div>
                            <div class="teste_produto">
                                <div class="up_produto">
                                    <div class="foto">
                                    </div>
                                </div>
                                <div class="down_produto">
                                    <b>Nome:</b><br>
                                    <b>Descrição:</b><br>
                                    <b>Preço:</b><br>
                                </div>
                                <div class="detalhes">
                                    Detalhes
                                </div>
                            </div>
                            <div class="teste_produto">
                                <div class="up_produto">
                                    <div class="foto">
                                    </div>
                                </div>
                                <div class="down_produto">
                                    <b>Nome:</b><br>
                                    <b>Descrição:</b><br>
                                    <b>Preço:</b><br>
                                </div>
                                <div class="detalhes">
                                    Detalhes
                                </div>
                            </div>
                            <div class="teste_produto">
                                <div class="up_produto">
                                    <div class="foto">
                                    </div>
                                </div>
                                <div class="down_produto">
                                    <b>Nome:</b><br>
                                    <b>Descrição:</b><br>
                                    <b>Preço:</b><br>
                                </div>
                                <div class="detalhes">
                                    Detalhes
                                </div>
                            </div>
                            <div class="teste_produto">
                                <div class="up_produto">
                                    <div class="foto">
                                    </div>
                                </div>
                                <div class="down_produto">
                                    <b>Nome:</b><br>
                                    <b>Descrição:</b><br>
                                    <b>Preço:</b><br>
                                </div>
                                <div class="detalhes">
                                    Detalhes
                                </div>
                            </div>
                            <div class="teste_produto">
                                <div class="up_produto">
                                    <div class="foto">
                                    </div>
                                </div>
                                <div class="down_produto">
                                    <b>Nome:</b><br>
                                    <b>Descrição:</b><br>
                                    <b>Preço:</b><br>
                                </div>
                                <div class="detalhes">
                                    Detalhes
                                </div>
                            </div>
                            <div class="teste_produto">
                                <div class="up_produto">
                                    <div class="foto">
                                    </div>
                                </div>
                                <div class="down_produto">
                                    <b>Nome:</b><br>
                                    <b>Descrição:</b><br>
                                    <b>Preço:</b><br>
                                </div>
                                <div class="detalhes">
                                    Detalhes
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php 
                include ("rdp.php");
            ?>
        </div>
    </body>
</html>