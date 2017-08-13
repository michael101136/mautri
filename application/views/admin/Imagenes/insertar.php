<form class="form-horizontal" id="form-addImagenes" action="<?php echo  base_url();?>index.php/Imagenes/insertar" enctype="multipart/form-data" method="POST">
		
			<h4 style="margin-bottom: 0px;">Imagenes</h4>
			<hr style="margin: 2px;margin-bottom: 5px;">
			<div class="row">
				<label class="col-md-2 control-label">Subir Imagen</label>
				<div class="col-md-4">
					<input type="file" name="userfileImagenes" />
				</div>
			</div>
			<div class="row">

				<label class="col-md-1 control-label">Descripción</label><br/><br/>
				<textarea class="col-md-8" rows="4" name="Descripcionimegen" cols="100">
				</textarea>
			</div>
		<div class="row" style="text-align: right;">
			<button type="submit" id="btnEnviarFormulario" class="btn btn-success">Registrar imagen.</button>
			<button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		</div>
	</form>
	<script>
		
 $("#form-addImagenes").submit(function(event)//AÑADIR NUEVA CARTERA
       {
            event.preventDefault();
            var formData=new FormData($("#form-addImagenes")[0]);
            $.ajax({
                type:"POST",
                enctype: 'multipart/form-data',
                url:base_url+"index.php/Imagenes/insertar",
                data: formData,
                cache: false,
                contentType:false,
                processData:false,
                success:function(resp){
                 swal("",resp, "success");
               }

            });

       });

	</script>
