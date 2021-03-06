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
	$title="Editar Venda| evendas";
	
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
//echo 'vvv'.$_REQUEST['id_venda'];
	if (isset($_REQUEST['id_venda']))
	{
		$id_venda=intval($_GET['id_venda']);
		$campos="clientes.id_cliente, clientes.nombre_cliente, clientes.telefono_cliente,
		 clientes.email_cliente, vendas.id_vendedor, vendas.fecha, 
		 vendas.notas, vendas.desconto, vendas.numero_venda";

		$consulta = "select $campos from vendas, clientes where 
                      vendas.id_cliente=clientes.id_cliente and id_venda='".$id_venda."'";
        $sql_factura=mysqli_query($con,$consulta);

        $count=mysqli_num_rows($sql_factura);

       // echo 'xxx'. $count;

		if ($count == 1){

				$rw_venda=        mysqli_fetch_array($sql_factura);
				$id_cliente=        $rw_venda['id_cliente'];
				$nombre_cliente=    $rw_venda['nombre_cliente'];
				$telefono_cliente=  $rw_venda['telefono_cliente'];
				$email_cliente=     $rw_venda['email_cliente'];
				$id_vendedor_db=    $rw_venda['id_vendedor'];
				$fecha_factura=     date("d/m/Y", strtotime($rw_venda['fecha']));
				$condiciones=       $rw_venda['notas'];
                $numero_venda =     $rw_venda['numero_venda'];

				$_SESSION['id_venda'] = $id_venda;
				$_SESSION['numero_venda'] = $numero_venda;
		}	
		else{
			header("location: vendas.php");
            //echo $consulta.' /'.$count;
			exit;	
		}
	}
	else
	{
		header("location: vendas.php");
		exit;
	}
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
			<h4><i class='glyphicon glyphicon-edit'></i> Editar Venda</h4>

		</div>

		<div class="panel-body">
		<?php
			include("modal/buscar_productos.php");
			include("modal/registro_clientes.php");
			include("modal/registro_productos.php");
		?>
			<form class="form-horizontal" role="form" id="datos_venda">
				<div class="form-group row">

				  <label for="nombre_cliente" class="col-md-1 control-label">Cliente</label>
				  <div class="col-md-3">
					  <input type="text" class="form-control input-sm" id="nombre_cliente" placeholder="Selecciona un cliente" required value="<?php echo $nombre_cliente;?>">
					  <input id="id_cliente" name="id_cliente" type='hidden' value="<?php echo $id_cliente;?>">	
				  </div>

				  <label for="tel1" class="col-md-1 control-label">Telefone</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="tel1" placeholder="Telefone" value="<?php echo $telefono_cliente;?>" readonly>
							</div>

					<label for="mail" class="col-md-1 control-label">Notas</label>
							<div class="col-md-4">
								<input type="text" class="form-control input-sm" name="notas" id="notas" placeholder="notas" value="">
                                <input type="hidden" class="form-control input-sm" id="mail" placeholder="Email"  value="<?php echo $email_cliente;?>">

                            </div>
				 </div>

						<div class="form-group row">
							<label for="empresa" class="col-md-1 control-label">Utilizador</label>
							<div class="col-md-3">
								<select class="form-control input-sm" id="id_vendedor" name="id_vendedor">
									<?php
										$sql_vendedor=mysqli_query($con,"select * from users order by lastname");
										while ($rw=mysqli_fetch_array($sql_vendedor)){
											$id_vendedor=$rw["user_id"];
											$nombre_vendedor=$rw["firstname"]." ".$rw["lastname"];

											if ($id_vendedor==$id_vendedor_db){
												$selected="selected";
											} else {
												$selected="";
											}

											?>
											<option value="<?php echo $id_vendedor?>" <?php echo $selected;?>><?php echo $nombre_vendedor?></option>
											<?php
										}
									?>
								</select>
							</div>

							<label for="tel2" class="col-md-1 control-label">Data</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="fecha" value="<?php echo $fecha_factura;?>" readonly>
							</div>
							<label for="email" class="col-md-1 control-label">Pagamento</label>
							<div class="col-md-2">
								<select class='form-control input-sm ' id="condiciones" name="condiciones">
									<option value="1" <?php if ($condiciones==1){echo "selected";}?>>Cash</option>
									<option value="2" <?php if ($condiciones==2){echo "selected";}?>>Cheque</option>
									<option value="3" <?php if ($condiciones==3){echo "selected";}?>>Transferencia</option>
									<option value="4" <?php if ($condiciones==4){echo "selected";}?>>Crédito</option>
								</select>
							</div>

							<div class="col-md-2">
                                <input type="text" value="0.0" name="desconto" id="desconto" placeholder="desconto" class="form-control">
							</div>
						</div>

				<div class="col-md-12 alert alert-info">
					<div class="text-center">

						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoProducto">
						 <span class="glyphicon glyphicon-plus"></span> Novo Producto
						</button>
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoCliente">
						 <span class="glyphicon glyphicon-user"></span> Novo Cliente
						</button>

						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
						 <span class="glyphicon glyphicon-search"></span> Buscar Productos
						</button>

                        <button type="submit" class="btn btn-warning">
                            <span class="glyphicon glyphicon-refresh"></span> Actualizar
                        </button>

						<button type="button" class="btn btn-default" onclick="imprimir_factura('<?php echo $id_venda;?>')">
						  <span class="glyphicon glyphicon-print"></span> Imprimir
						</button>
					</div>	
				</div>
			</form>

			<div class="clearfix"></div>
				<div class="editar_factura" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->
		        <div id="resultados" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->
			
		</div>
	</div>		
		 
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/editar_venda.js"></script>

    <link rel="stylesheet" href="libraries/jquery-ui.css">
    <script src="libraries/jquery-ui.js"></script>

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