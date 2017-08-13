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

                            <!-- START DATATABLE EXPORT -->
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
</script>