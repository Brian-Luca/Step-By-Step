<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <!--meta tags-->
    <meta charset="UTF-8">

    <!-- Title-->
    <title>Lista de Requisições</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

    <!--page css-->
    <link rel="stylesheet" href="css/requisitar.css">
    <link rel="stylesheet" href="css/chosen.css">
</head>

<body class="animsition">

    <?php
        include_once("requisitarDados.php");
        $tipoEquip = selectTipoEquip();
        $horaI     = selectHoraI();
        $horaF     = selectHoraF();
        $sala      = selectSala();
    ?>

    <div class="page-wrapper main">
        <div class="linha">
            <div class="linha-ativo linha1 none"></div>
            <div class="linha-ativo linha2 segundo none"></div>
            <div class="linha-ativo linha3 terceiro none"></div>
            <div class="ponto ponto1 ativo equip">
                    <div class="parte1 string">Equipamentos</div>
                    <div class="pontinho pontinho1 ativinho"></div>
                </div>
            <div class="ponto ponto2 desativar segundo hora">
                <div class="parte2 string desativar">Horários</div>
                <div class="pontinho pontinho2"></div>
            </div>
            <div class="ponto ponto3 desativar terceiro sala">
                <div class="parte3 string desativar">Salas</div>
                <div class="pontinho pontinho3"></div>
            </div>
            <div class="ponto ponto4 desativar quarto finish">
                <div class="parte4 string desativar">Terminar</div>
                <div class="pontinho pontinho4"></div>
            </div>
        </div>
        <div class="slides">
            <div class="slide tamanho slide1 Slide-Container">
                <form class="slide tamanho" style="align-items: center;">
                    <select data-placeholder="Escolha um Equipamento..." id="Equipamentos" autofocus name="Equipamentos" onchange="validar();" class="chosen-select" tabindex="2">
                        <option value=""></option>
                        <?php 
                            if($tipoEquip != 0){
                                foreach($tipoEquip as $key => $value){
                                ?>
                                    <option value="<?=$value['tipoequip']?>"><?=$value['tipoequip']?></option>
                                <?php 
                                }
                            }
                        ?>
                    </select>
                    <div class="botoes">
                        <button class="btn-lg btn-primary getout" style="margin-right: 4px;" data-toggle="modal" data-target="#smallmodal">
                            <i class="fa fa-angle-double-left"></i>
                            &nbsp;Sair
                        </button>
                        <div style="position: relative;">
                            <div class="btn-lg NaoVal alert1" onclick="abrirModal();" data-toggle="modal" data-target="#mediumModal"></div>
                            <button class="btn-lg btn-primary ir botao1">
                                <span class="nome">
                                    Próximo
                                </span>
                                <span class="icone">
                                    &nbsp;
                                    <i class="fa fa-angle-double-right"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="slide tamanho slide2 none Slide-Container">
                <form name="horarios" class="slide tamanho" style="align-items: center;">
                    <div style="display: flex; align-items: center;">
                        <span class="texto">De&nbsp;&nbsp;</span>
                        <select data-placeholder="Escolha uma Hora Inicial..." id="Horai" onblur="sele();" name="Horai" onchange="valH1();" required class="chosen-select" tabindex="2">
                            <option value=""></option>
                            <?php 
                                if($horaI != 0){
                                    foreach($horaI as $key => $value){
                                        $valor = explode(":", $value['hi']);
                                        $hora = "{$valor[0]}" . ":" . "{$valor [1]}";
                                    ?>
                                        <option value="<?=$value['id_hi']?>"><?=$hora?></option>
                                    <?php 
                                    }
                                }
                            ?>
                        </select>
                        <span class="texto">&nbsp; as &nbsp;</span>
                        <select data-placeholder="Escolha uma Hora Final..." id="Horaf" onfocus="sele();" name="Horaf" onchange="valH2();" required class="chosen-select" tabindex="2">
                            <option value=""></option>
                            <?php 
                                if($horaF != 0){
                                    foreach($horaF as $key => $value){
                                        $valor = explode(":", $value['hf']);
                                        $hora = "{$valor[0]}" . ":" . "{$valor [1]}";
                                    ?>
                                        <option value="<?=$value['id_hf']?>"><?=$hora?></option>
                                    <?php 
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="botoes">
                        <button class="btn-lg btn-primary voltar botao1">
                            <span class="icone">
                                <i class="fa fa-angle-double-left"></i>
                                &nbsp;
                            </span>
                            <span class="nome">
                                Anterior
                            </span>
                        </button>
                        <div style="position: relative;">
                            <div class="btn-lg NaoVal alert2" onclick="abrirModal();" data-toggle="modal" data-target="#mediumModal"></div>
                            <button class="btn-lg btn-primary ir botao2">
                                <span class="nome">
                                    Próximo
                                </span>
                                <span class="icone">
                                    &nbsp;
                                    <i class="fa fa-angle-double-right"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="slide tamanho slide3 none Slide-Container">
                <form name="salas" class="slide tamanho" style="align-items: center;">
                    <select data-placeholder="Escolha uma Sala..." id="salas" name="Sala" onchange="validar();" required class="chosen-select" tabindex="2">
                        <option value=""></option>
                        <?php 
                            if($sala != 0){
                                foreach($sala as $key => $value){
                                ?>
                                    <option value="<?=$value['ssigla']?>"><?=$value['ssigla']?></option>
                                <?php 
                                }
                            }
                        ?>
                    </select>
                    <div class="botoes">
                        <button class="btn-lg btn-primary voltar botao2">
                            <span class="icone">
                                <i class="fa fa-angle-double-left"></i>
                                &nbsp;
                            </span>
                            <span class="nome">
                                Anterior
                            </span>
                        </button>
                        <div style="position: relative;">
                            <div class="btn-lg NaoVal alert3" onclick="abrirModal();" data-toggle="modal" data-target="#mediumModal"></div>
                            <button class="btn-lg btn-primary ir botao3">
                                <span class="nome">
                                    Próximo
                                </span>
                                <span class="icone">
                                    &nbsp;
                                    <i class="fa fa-angle-double-right"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="slide tamanho slide4 none Slide-Container">
                <form name="finish" action="requisitarDados.php" method="POST" class="slide tamanho" style="align-items: center;">
                    <div class="final">
                        <div class="TT altequip">
                            <span class="quad">
                                <input type="text" class="off" name="equip" id="equip" Readonly>
                                <hr>
                                <h5>Equipamento</h5>
                            </span>
                            <span class="tooltiptext">
                                Clique para alterar o Equipamento!
                            </span>
                        </div>
                        <div class="TT althorai">
                            <span class="quad">
                                <input type="text" class="off" name="horai" id="horai" Readonly>
                                <hr>
                                <h5>Horário Inicial</h5>
                            </span>
                            <span class="tooltiptext">
                                Clique para alterar o<br>Horário Inicial!
                            </span>
                        </div>
                        <div class="TT althoraf">
                            <span class="quad">
                                <input type="text" class="off" name="horaf" id="horaf" Readonly>
                                <hr>
                                <h5>Horário Final</h5>
                            </span>
                            <span class="tooltiptext">
                                Clique para alterar o<br>Horário Final!
                            </span>
                        </div>
                        <div class="TT altsala">
                            <span class="quad">
                                <input type="text" class="off" name="sala" id="sala" Readonly>
                                <hr>
                                <h5>Sala</h5>
                            </span>
                            <span class="tooltiptext" style="bottom: -5%;">
                                Clique para alterar a Sala!
                            </span>
                        </div>
                    </div>
                    <div class="botoes">
                        <button class="btn-lg btn-primary voltar botao3">
                            <span class="icone">
                                <i class="fa fa-angle-double-left"></i>
                                &nbsp;
                            </span>
                            <span class="nome">
                                Anterior
                            </span>
                        </button>
                        <button class="btn-lg btn-primary" name="action" value="enviar">
                            Enviar
                            &nbsp;
                            <i class="fa fa-angle-double-right"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade invalido" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="smallmodalLabel">Sair</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="text-align: center;">
                        Tem certeza que deseja sair?
                    </p>
                    <br>
                    <p class="alerta">
                        Todas as seleções seram PERDIDAS!
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a href="painelRequi.php"><button type="button" class="btn btn-primary">Continuar</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- modal medium -->
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Alerta<h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body invalido">
                    <img src="images/alert.png" height="50%" width="70%"> 
                </div>
                <div class="modal-footer alerta">
                    Por favor selecione&nbsp;<span id="opcao"></span>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal medium -->

    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="js/chosen.jquery.js" type="text/javascript"></script>
    <script src="js/init.js" type="text/javascript" charset="utf-8"></script>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>

    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>
    <script src="vendor/vector-map/jquery.vmap.js"></script>
    <script src="vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
    <script src="js/requisitar.js"></script>
    <script>
        (function() {
            [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
                new SelectFx(el);
            } );
        })();
    </script>

</body>

</html>
<!-- end document-->