	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header alert alert-info">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar cliente</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_cliente" name="editar_cliente">
			<div id="resultados_ajax2"></div>
			  <div class="form-group">
				<label for="mod_nombre" class="col-sm-3 control-label">Nome</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_nombre" name="mod_nombre"  required>
					<input type="hidden" name="mod_id" id="mod_id">
				</div>
			  </div>

                <div class="form-group">
                    <label for="estado" class="col-sm-3 control-label">Nuit</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="mod_estado" name="mod_estado" required>
                        </div>

                </div>

			   <div class="form-group">
				<label for="mod_telefono" class="col-sm-3 control-label">Telefone</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="mod_telefono" name="mod_telefono">
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="mod_email" class="col-sm-3 control-label">Email</label>
				<div class="col-sm-8">
				 <input type="email" class="form-control" id="mod_email" name="mod_email">
				</div>
			  </div>
			  <div class="form-group">
				<label for="mod_direccion" class="col-sm-3 control-label">Endereço</label>
				<div class="col-sm-8">
				  <textarea class="form-control" id="mod_direccion" name="mod_direccion" ></textarea>
				</div>
			  </div>
			  

		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
			<button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar Dados</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>