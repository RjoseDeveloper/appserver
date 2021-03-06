<?php

include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
$id_venda= $_SESSION['id_venda'];
$numero_venda= $_SESSION['numero_venda'];

//echo $id_factura .' / '. $numero_venda;
if (isset($_POST['id'])){$id=intval($_POST['id']);}
if (isset($_POST['cantidad'])){$cantidad=intval($_POST['cantidad']);}
if (isset($_POST['precio_venta'])){$precio_venta=floatval($_POST['precio_venta']);}
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	include("../funciones.php");

if (!empty($id) and !empty($cantidad) and !empty($precio_venta))
{

$insert_tmp=mysqli_query($con, "INSERT INTO detalhe_venda (numero_venda, id_produto, qtd, preco_venda) VALUES ('$numero_venda','$id','$cantidad','$precio_venta')");
}
if (isset($_GET['id']))//codigo elimina un elemento del array
{
$id_detalle=intval($_GET['id']);	
$delete=mysqli_query($con, "DELETE FROM detalhe_venda WHERE id_detalhe='".$id_detalle."'");
}
$simbolo_moneda=get_row('perfil','moneda', 'id_perfil', 1);
?>
<table class="table">

<tr class="warning">
	<th class='text-center'>Codigo</th>
	<th class='text-center'>Qtd.</th>
	<th>Descrição</th>
	<th class='text-right'>Preço Unit.</th>
	<th class='text-right'>Total</th>
	<th>#</th>
</tr>

<?php
	$sumador_total=0;
    $query = "select * from products, vendas, detalhe_venda 
                 where vendas.numero_venda=detalhe_venda.numero_venda and  
                vendas.id_venda='$id_venda' and 
                products.id_producto=detalhe_venda.id_produto";

	$sql=mysqli_query($con, $query);
	//echo $query;
while ($row=mysqli_fetch_array($sql))
	{
	$id_detalle=$row["id_detalhe"];
	$codigo_producto=$row['codigo_producto'];
	$cantidad=$row['qtd'];
	$nombre_producto=$row['nombre_producto'];
	
	
	$precio_venta=$row['preco_venda'];
	$precio_venta_f=number_format($precio_venta,2);//Formateo variables
	$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
	$precio_total=$precio_venta_r*$cantidad;
	$precio_total_f=number_format($precio_total,2);//Precio total formateado
	$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
	$sumador_total+=$precio_total_r;//Sumador
	
		?>

		<tr>
			<td class='text-center'><?php echo $codigo_producto;?></td>
			<td class='text-center'><?php echo $cantidad;?></td>
			<td><?php echo $nombre_producto;?></td>
			<td class='text-right'><?php echo $precio_venta_f;?></td>
			<td class='text-right'><?php echo $precio_total_f;?></td>
			<td class='text-center'><a href="#" onclick="eliminar('<?php echo $id_detalle ?>')"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>

		<?php
	}

	$impuesto=get_row('perfil','impuesto', 'id_perfil', 1);
	$subtotal=number_format($sumador_total,2,'.','');
	$total_iva=($subtotal * $impuesto )/100;
	$total_iva=number_format($total_iva,2,'.','');
	$total_factura=$subtotal+$total_iva;
	$update=mysqli_query($con,"update vendas set total_venda='$total_factura'
 where id_venda='$id_venda'");
?>
<tr>
	<td class='text-right' colspan=4>SUBTOTAL <?php echo $simbolo_moneda;?></td>
	<td class='text-right'><?php echo number_format($subtotal,2);?></td>
	<td></td>
</tr>
<tr>
	<td class='text-right' colspan=4>IVA (<?php echo $impuesto;?>)% <?php echo $simbolo_moneda;?></td>
	<td class='text-right'><?php echo number_format($total_iva,2);?></td>
	<td></td>
</tr>
<tr class="success" style="font-weight: bold">
	<td class='text-right' colspan=4>TOTAL <?php echo $simbolo_moneda;?></td>
	<td class='text-right'><?php echo number_format($total_factura,2);?></td>
	<td></td>
</tr>

</table>
