	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevoProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">

		<div class="modal-content">
		  <div class="modal-header alert alert-info">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Adicionar Novo Produto</h4>
		  </div>

		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_producto" name="guardar_producto">
			<div id="resultados_ajax_productos"></div>

                <div class="form-group">
				<label for="codigo" class="col-sm-3 control-label">Código</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código do Produto" required>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Nome</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="nombre" name="nombre" placeholder="Nome do produto" required maxlength="255"></textarea>
				  
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="categoria" class="col-sm-3 control-label">Categoría</label>

                  <div class="col-sm-8">
                    <select class='form-control' name='categoria' id='categoria' required>
                        <option value="">Selecciona uma categoría</option>
                            <?php
                            $query_categoria=mysqli_query($con,"select * from categorias order by nombre_categoria");
                            while($rw=mysqli_fetch_array($query_categoria)){
                                ?>
                            <option value="<?php echo $rw['id_categoria'];?>"><?php echo $rw['nombre_categoria'];?></option>
                                <?php
                            }
                            ?>
					</select>
				</div>
              </div>
			  
			<div class="form-group">
				<label for="precio" class="col-sm-3 control-label">Preço</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="precio"
                         name="precio" placeholder="Preço do produto"
                         required pattern="^[0-9]{1,5}(\.[0-10]{0,10})?$" title="Introuzir numeros de 0 a 10 decimales" maxlength="8">
				</div>
			</div>
			
			<div class="form-group">
				<label for="stock" class="col-sm-3 control-label">Stock</label>
				<div class="col-sm-8">
				  <input type="number" min="0" class="form-control"
                         id="stock" name="stock" placeholder="Inventario inicial"
                         required  maxlength="8">
				</div>
			</div>

            <div class="form-group">
                <label for="categoria" class="col-sm-3 control-label">Status</label>
                <div class="col-sm-8">
                    <select class='form-control' name='status_producto' id='status_producto' required>
                        <option value="1">Novo</option>
                        <option value="1">Medio</option>
                    </select>
                </div>
            </div>
		  </div>

		  <div class="modal-footer">
			<button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
			<button type="submit" class="btn btn-primary" id="guardar_datos">Guardar dados</button>
		  </div>
		  </form>

		</div>
	  </div>
	</div>
	<?php
		}
	?>