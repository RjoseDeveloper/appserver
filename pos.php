<?php

session_start();
if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
    header("location: login.php");
    exit;
}
$active_facturas="active";
$active_productos="";
$active_clientes="";
$active_usuarios="";
$title="Nova Factura | Invoice";

/* Connect To Database*/
require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("head.php");?>
</head>
<body>
<?php
include("navbar.php");
?>
<div class="container">
    <div class="panel panel-info">

        <div class="panel-heading">

            <div class="btn-group pull-right">
                <a href="vendas.php" type="button" class="btn btn-info">
                    <span class="glyphicon glyphicon-list"></span> Gerir Vendas
                </a>

            </div>

            <h4><i class='glyphicon glyphicon-edit'></i> AREA DE VENDAS</h4>

        </div>

        <div class="panel-body">
            <form class="form-horizontal" id="datos_factura">

                <div class="form-group row">
                    <label for="nombre_cliente" class="col-md-1 control-label">Cliente</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="nombre_cliente" placeholder="Selecciona um cliente" required>
                        <input id="id_cliente" type='hidden'>
                    </div>

                    <input type="hidden" class="form-control input-sm" id="mail" placeholder="telefone cliente" readonly>
                    <input type="hidden" class="form-control input-sm" id="tel1" placeholder="Nuit" readonly>

                    <label for="email" class="col-md-1 control-label">Pagamento</label>
                    <div class="col-md-3">
                        <select class='form-control input-sm' id="condiciones">
                            <option value="1">Cash</option>
                            <option value="2">Cheque</option>
                            <option value="3">Transferencia Bancaria</option>
                            <option value="4">Crédito</option>
                        </select>
                    </div>

                    <label for="tel2" class="col-md-1 control-label">Data </label>
                    <div class="col-md-3">
                        <input type="text" class="form-control input-sm" id="fecha" value="<?php echo date("d/m/Y");?>" readonly>
                    </div>

                </div>

                <div class="form-group row">

                    <label for="tel2" class="col-md-1 control-label">Pesquisar #
                        <span class="glyphicon glyphicon-search"></span> </label>

                    <div class="col-sm-3">
                        <input type="text" value="" name="q" class="form-control" id="q"
                               placeholder="Nome ou Codigo" onkeyup="load(1)">
                    </div>

                    <label for="tel2" class="col-md-1 control-label">TOTAL # </label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="total" value="" readonly>
                    </div>

                    <label for="tel2" class="col-md-1 control-label">Desconto </label>

                    <div class="col-md-3">
                        <input type="text" id="desconto" name="desconto" value="" class="form-control">

                    </div>

                </div>

            </form>


                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group">

                            <!--button type="button" class="btn btn-default" onclick="load(1)"><span class='glyphicon glyphicon-search'></span> Buscar</button-->

                        </div>

                    </form>
                    <div id="loader" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
                    <div class="outer_div" ></div><!-- Datos ajax Final -->
                </div>

            <div id="resultados" class='col-md-12'></div><!-- Carga los datos ajax -->
        </div>

    </div>

    <div class="row-fluid">
        <div class="col-md-12">
        </div>
    </div>

</div>

<hr>
<?php
include("footer.php");
?>
<script type="text/javascript" src="js/VentanaCentrada.js"></script>
<script type="text/javascript" src="js/nueva_factura.js"></script>

<link rel="stylesheet" href="libraries/jquery-ui.css">
<script src="libraries/jquery-ui.js"></script>


<!--link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script--->

<script>
    $(function() {
        $("#nombre_cliente").autocomplete({
            source: "./ajax/autocomplete/clientes.php",
            minLength: 2,
            select: function(event, ui) {
                event.preventDefault();
                $('#id_cliente').val(ui.item.id_cliente);
                $('#nombre_cliente').val(ui.item.nombre_cliente);
                $('#tel1').val(ui.item.telefono_cliente);
                $('#mail').val(ui.item.email_cliente);


            }
        });


    });

    $("#nombre_cliente" ).on( "keydown", function( event ) {
        if (event.keyCode== $.ui.keyCode.LEFT || event.keyCode== $.ui.keyCode.RIGHT || event.keyCode== $.ui.keyCode.UP || event.keyCode== $.ui.keyCode.DOWN || event.keyCode== $.ui.keyCode.DELETE || event.keyCode== $.ui.keyCode.BACKSPACE )
        {
            $("#id_cliente" ).val("");
            $("#tel1" ).val("");
            $("#mail" ).val("");

        }

        if (event.keyCode==$.ui.keyCode.DELETE){
            $("#nombre_cliente" ).val("");
            $("#id_cliente" ).val("");
            $("#tel1" ).val("");
            $("#mail" ).val("");
        }
    });



</script>

</body>
</html>