<style type="text/css">
	.panel-body-registarse {
      	background-color: #EAE9E9!important;
    }
    .panel-body-datos {
    	background-color: #FFF!important;
    }
</style>

<div class="container" style="padding-top: 2%;">
	<div class="panel-group">
		<div class="panel-primary">
			<div class="panel-heading text-center" style="font-size: 25px;">
				Crear
			</div>
			<div class="panel-body panel-body-registarse">
				<div class="panel-group col-sm-12">
					<div class="panel-primary">
						<div class="panel-heading">
							Datos de la Ciudad
						</div>
						<form class="form-horizontal" id="Registrar" name="Registrar" method="POST">
							<div class="panel-body panel-body-datos col-sm-12">
							    <div class="form-group">
									<div class="col-sm-12">
										<input type="text" name="descripcion" id="descripcion" placeholder="Descripción *" class="form-control"></input>
                                    </div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<select class="form-control" name="pais" id="pais" placeholder="Instituto">
						            		<?php foreach ($array as $key => $value){ ?>
						                		<option value="<?php echo $value["id_pais"]; ?>"><?php echo $value["des_pais"]; ?></option>    
						                	<?php } ?>            
						            	</select>
                                    </div>
								</div>  
								<div class="panel-body">
									<div class="col-sm-4 col-xs"></div>
									<button class="btn btn-primary col-sm-4 col-xs-12" type="submit" id="crear">Crear</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(crearCiudad);

	$(function(){
		$('#crear').click(function(){
			var descripcion = $('form[name=Registrar] input[name=descripcion]')[0].value;
			var pais = document.Registrar.pais.value;

			if (pais == "" || descripcion == "") {
				alert("Campos Vacios");
			}else{
				$.ajax({
					type: 'POST',
					url: '<?php echo URL;?>Ciudad/create/createDatos',
					data: {pais: pais, descripcion: descripcion},
					success: function(response){
						//alert(response);
						if (response == 1) {
							alert("Ciudad registrada con exito");
							document.location = '<?php echo URL;?>';
						} else {
							alert("Ya existe la ciudad");
						}
					}
				});
				return false; //Evitar submit del formulario
			}
		});
	});
</script>