<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado

    require_once '../funciones.php';

$id_venda= $_SESSION['id_venda'];

	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['id_cliente'])) {
           $errors[] = "ID vazío";
        }else if (empty($_POST['id_vendedor'])) {
           $errors[] = "Selecciona um vendedor";
        } else if (empty($_POST['condiciones'])){
			$errors[] = "Seleccionar a forma de pagamento";
		} else if (
			!empty($_POST['id_cliente']) &&
			!empty($_POST['id_vendedor']) &&
			!empty($_POST['condiciones']) &&
			$_POST['desconto']!=""
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$id_cliente=intval($_POST['id_cliente']);
		$id_vendedor=intval($_POST['id_vendedor']);
		$condiciones=$_POST['notas'];
		$desconto=doubleval($_POST['desconto']);

		//eliminar_stock()
		
		$sql="UPDATE vendas SET id_cliente='".$id_cliente."', id_vendedor='".$id_vendedor."', notas='".$condiciones."', desconto='".$desconto."' WHERE id_venda='".$id_venda."'";
        $query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Venda actualizada com sucesso";
			} else{
				$errors []= "Problemas na actualização da factura.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconhecido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Operação Efectuada</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>