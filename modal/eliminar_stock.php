<form class="form-horizontal"  method="post">
<!-- Modal -->
<div id="remove-stock" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header alert alert-info">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Eliminar Stock</h4>
      </div>
      <div class="modal-body">
        
          <div class="form-group">
            <label for="quantity" class="col-sm-2 control-label">Quantidade</label>
            <div class="col-sm-6">
              <input type="number" min="1" name="quantity_remove" class="form-control" id="quantity_remove" value="" placeholder="Quantidad" required="">
            </div>
          </div>
          <div class="form-group">
            <label for="reference" class="col-sm-2 control-label">Detalhes</label>
            <div class="col-sm-6">
              <input type="text" name="reference_remove" class="form-control" id="reference_remove" value="" placeholder="Detalhe">
            </div>
          </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
		<button type="submit" class="btn btn-primary">Guardar Dados</button>
      </div>
    </div>

  </div>
</div>
</form>