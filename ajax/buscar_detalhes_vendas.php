<?php

	/*-------------------------
	Autor: rjose
	---------------------------*/
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/* Connect To Database*/
require_once ("../funciones.php");
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$id_categoria=intval($_GET['id']);
		$query=mysqli_query($con, "select * from vendas where id_venda='" .$id_categoria."'");
		$count=mysqli_num_rows($query);
		if ($count==0){
			if ($delete1=mysqli_query($con,"DELETE FROM vendas WHERE id_venda='".$id_categoria."'")){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados com sucesso.
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
			</div>
			<?php
			
		}
			
		} else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> No se pudo eliminar ésta  categoría. Existen productos vinculados a ésta categoría. 
			</div>
			<?php
		}
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('nombre_producto');//Columnas de busqueda
		 $sTable = "products, detalhe_venda";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}

		$sWhere.=" WHERE detalhe_venda.id_producto = products.id_producto order by detalhe_venda.fecha desc";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
        $query = "SELECT count(*) AS numrows FROM $sTable  $sWhere";
        //echo $query;

		$count_query   = mysqli_query($con, $query);
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './detalhe_venda.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable  $sWhere LIMIT $offset,$per_page";

		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
                <table class='table table-bordered'>
                    <tr>
                        <th class='text-center alert alert-success' colspan=9 >HISTORIAL DE VENDA</th>
                    </tr>
                    <tr>
                        <td>#</td>
                        <td>Data e Hora</td>
                        <td>Vendedor</td>
                        <td>Produto</td>

                        <td>Qtd.</td>
                        <td>Preco Unit.</td>
                        <td>Desconto</td>
                        <td class='text-center'>Total</td>
                        <td>Notas</td>
                    </tr>
                    <?php

                    $query=mysqli_query($con, $sql);
                    while ($row=mysqli_fetch_array($query)){?>
                        <tr>

                            <td><?php echo $row['id_venda'] ;?></td>
                            <td><?php echo date('d/m/Y', strtotime($row['fecha'])).''.date('H:i:s', strtotime($row['fecha']))?></td>
                            <td><?php echo get_row('users','user_name','user_id',4);?></td>
                            <td><?php echo get_row('products','nombre_producto','id_producto',$row['id_producto']);?></td>
                            <td><?php echo $row['qtd'];?></td>
                            <td><?php echo $row['preco_venda'];?></td>
                            <td><?php echo $row['desconto'];?></td>
                            <td class='text-center'><?php echo number_format($row['qtd'],2);?></td>
                            <td><?php echo $row['notas'];?></td>

                        </tr>
                        <?php
                    }
                    ?>
                    <tr>
                        <td colspan=8><span class="pull-right">
					<?php
                    echo paginate($reload, $page, $total_pages, $adjacents);
                    ?></span></td>
                    </tr>

                </table>
			</div>
			<?php
		}
	}
?>