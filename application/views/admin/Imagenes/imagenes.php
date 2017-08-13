<!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Principal</a></li>
                    <li class="active">IMAGENES</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <div class="page-title">
                    <h2><span class="fa fa-arrow-circle-o-left"></span> IMAGENES DEL BANER</h2>
                </div>
                <!-- END PAGE TITLE -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <div class="row">
                        <div class="col-md-12">
                             <button type="button" class="btn btn-success"  onclick="paginaAjaxDialogo(null, 'Registra nueva Imagen',null, base_url+'index.php/Imagenes/insertar', 'GET', null, null, false, true);">
                                            <i class="fa fa-bars"></i>
                                            Nueva
                            </button>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                </div>
                                <div class="panel-body ">

                                    <table  id="tabla-Litarcuartel" class="table table-bordered success">
                                        <thead>
                                            <tr>
                                                <th>IMAGEN</th>
                                                <th>DESCRIPCIÓN</th>
                                                <th class="col-md-1"></th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                                <?php foreach($listaImagen as $item ){ ?>
                                                    <tr>
                                                        <td class="col-md-2">
                                                            <img style="width:100px;height: 100px;" src="<?php echo base_url();?>/uploads/<?=$item->nombre?>"/>
                                                        </td>
                                                        <td>
                                                            <?=$item->descripcion?>
                                                        </td>
                                                        <td>
                                                            <button type='button' class='eliminar btn btn-danger btn-xs' onclick="eliminar(<?=$item->id?>)"><i class='fa fa-trash-o'></i></button>
                                                        </td>
                                                  </tr>
                                                <?php } ?>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END DEFAULT TABLE EXPORT -->

                        </div>
                    </div>

                </div>
<script>
$(document).ready(function()
	{
		$('#tabla-Litarcuartel').DataTable(
		{
			searching: true,
			paging: true,
    		searching: true,
			"language" : idioma_espanol
		});
	});

function eliminar(id)
    {
        swal({
                title: "Esta seguro que desea eliminar el presupuesto de ejecucion?",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "SI,Eliminar",
                closeOnConfirm: false
            },
            function()
            {
                $.ajax({
                        url:base_url+"index.php/Imagenes/eliminar",
                        type:"POST",
                        data:{id:id},
                        success:function(respuesta)
                        {
                            
                            swal("ELIMINADO!", "Se elimino correctamente la imagen.", "success");
                            window.location.href='<?=base_url();?>index.php/Imagenes/Imagenes/';
                            renderLoading();
                        }
                    });
            });
    }
</script>