<?php

	/*-------------------------
	Autor: rjose
	---------------------------*/
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$numero_venda=intval($_GET['id']);
		$del1="delete from vendas where numero_venda='".$numero_venda."'";
		$del2="delete from detalhe_venda where numero_venda='".$numero_venda."'";
		if ($delete1=mysqli_query($con,$del2) and $delete2=mysqli_query($con,$del1)){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Dados Eliminados com sucesso ...
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Não se pode eliminar os dados
			</div>
			<?php
			
		}
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		  $sTable = "vendas, clientes, users";
		 $sWhere = "";
		 $sWhere.=" WHERE vendas.id_cliente=clientes.id_cliente and vendas.id_vendedor=users.user_id";
		if ( $_GET['q'] != "" )
		{
		$sWhere.= " and  (clientes.nombre_cliente like '%$q%' or vendas.numero_venda like '%$q%')";
			
		}
		
		$sWhere.=" order by vendas.id_venda desc";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 5; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './vendas.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
					<th>#</th>
					<th>Data</th>
					<th>Cliente</th>
					<th>Utilizador</th>
					<th class='text-right'>Total</th>
                    <th class='text-right'>Notas</th>
                    <th class='text-right'>Notas</th>
					<th class='text-right'>Acções</th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id_venda=$row['id_venda'];
						$numero_venda=$row['numero_venda'];
						$fecha=date('d/m/Y', strtotime($row['fecha'])).' | '.date('H:i:s', strtotime($row['fecha']));
						$nombre_cliente=$row['nombre_cliente'];
						$telefono_cliente=$row['telefono_cliente'];
						$email_cliente=$row['email_cliente'];
						$nombre_vendedor=$row['firstname']." ".$row['lastname'];
						$total_venta=$row['total_venda'];
                        $desconto = $row['desconto'];
						$notas = $row['notas'];
					?>
					<tr>

						<td><?php echo $numero_venda; ?></td>
						<td><?php echo $fecha; ?></td>
						<td><a href="#" data-toggle="tooltip" data-placement="top" title="<i class='glyphicon glyphicon-phone'></i> <?php echo $telefono_cliente;?><br><i class='glyphicon glyphicon-envelope'></i>  <?php echo $email_cliente;?>" ><?php echo $nombre_cliente;?></a></td>
						<td><?php echo $nombre_vendedor; ?></td>

						<td class='text-right'><?php echo number_format ($total_venta,2); ?></td>
                        <td class="text-right"><?php echo number_format ( $desconto,2); ?></td>
                        <td class="text-right"><?php echo $notas; ?></td>
					<td class="text-right">

						<a href="editar_venda.php?id_venda=<?php echo $id_venda;?>"
                           class='btn btn-default' title='Editar Venda' >
                            <i class="glyphicon glyphicon-edit"></i></a>
						<a href="#" class='btn btn-default' title='Descarregar factura' onclick="imprimir_factura('<?php echo $id_venda;?>');"><i class="glyphicon glyphicon-download"></i></a>
						<a href="editar_venda.php?numero_venda=<?php echo $numero_venda;?>" class='btn btn-default' title='Eliminar Venda' onclick="eliminar('<?php echo $numero_venda; ?>')"><i class="glyphicon glyphicon-trash"></i> </a>

                    </td>

					</tr>

					<?php
				}
				?>
				<tr>
					<td colspan=7><span class="pull-right"><?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>