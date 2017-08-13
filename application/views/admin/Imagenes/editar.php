<form class="form-horizontal " id="form-addcuartel" action="<?php echo  base_url();?>Alquiler/AddAlquiler" method="POST">
        <div class="hr hr-1 dotted hr-double"></div>
		    <div class="row">
		    	DATOS DEL DIFUNTO<br><br>
		    	<div class="form-group">

		    		<label class="col-md-1 control-label">Categoria</label>
		    		<div class="col-md-3">
		    			<select class="form-control" id="cbxCategoria" name="cbxCategoria">

		    			</select>
		    		</div>

		    		<label class="col-md-1 control-label">Pasaje</label>
		    		<div class="col-md-3">
		    			<select class="form-control" id="cbxPasaje" name="cbxPasaje">

		    			</select>
		    		</div>
		    		<label class="col-md-1 control-label">Cuartel</label>
		    		<div class="col-md-3">
		    			<input id="txt_cuartel" name="txt_cuartel" class="form-control" type="text">
		    		</div>
		    	</div>
		    </div>
		     <br><br><br>                  
             <div>
             	<div class="panel panel-default">
             		<div class="panel-heading">
             			<h3 class="panel-title">Basic example</h3>
             		</div>
             		<div class="panel-body">
             			<button id="addCarritoCuartel" name="addCarritoCuartel" type="button" class="btn btn-success">
             				<span class="glyphicon glyphicon-floppy-disk"></span>
             				carrito
             			</button>
             			<button id="addCuartelTodo" name="addCuartelTodo" type="button" class="btn btn-success">
             				<span class="glyphicon glyphicon-floppy-disk"></span>
             				Guardar Cuarteles
             			</button>
             			<button type="button"  id="btn_borrar" name="btn_borrar"> borrar </button>
             			<table class="table" id="tblList">

             			</table>                                
             		</div>
             	</div>
             </div>
             <div class="form-group">
             	<div class="col-md-12 col-md-offset-3">
             		<button id="send" type="submit" class="btn btn-success">
             			<span class="glyphicon glyphicon-floppy-disk"></span>
             			Guardar
             		</button>
             		<button  class="btn btn-danger" data-dismiss="modal">
             			<span class="glyphicon glyphicon-remove"></span>
             			Cancelar
             		</button>
             	</div>
        </div>
</form>