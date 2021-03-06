<style type="text/css">
	.panel-body-editar {
      	background-color: #EAE9E9!important;
    }
    .panel-body-datos {
    	background-color: #FFF!important;
    }
</style>

<?php foreach ($array as $key => $value) { ?>

<div class="container" style="padding-top: 2%;">
	<div class="panel-group">
		<div class="panel-primary">
			<div class="panel-heading text-center" style="font-size: 25px;">
				Eliminar
			</div>
			<div class="panel-body panel-body-editar">
				<div class="panel-group col-sm-12">
					<div class="panel-primary">
						<div class="panel-heading">
							Datos del País
						</div>
						<form class="form-horizontal" id="Delete" name="Delete" method="POST">
							<div class="panel-body panel-body-datos col-sm-12">
					            <div class="form-group">
									<div class="col-sm-12">
										ID: <input type="text" name="id_pais" id="id_pais" placeholder="ID *" class="form-control" value="<?php echo $value["id_pais"]; ?>" disabled></input>
                                    </div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										Iso: <input type="text" name="iso" id="iso" placeholder="Iso *" class="form-control" value="<?php echo $value["iso"]; ?>" disabled></input>
                                    </div>
								</div>
					            <div class="form-group">
									<div class="col-sm-12">
										Descripción: <input type="text" name="descripcion" id="descripcion" placeholder="Descripción *" class="form-control" value="<?php echo $value["des_pais"]; ?>" disabled></input>
                                    </div>
								</div>
								<div class="panel-body">
									<div class="col-sm-4 col-xs"></div>
									<button class="btn btn-primary col-sm-4 col-xs-12" type="submit" id="delete">Eliminar</button>										
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php } ?>

<script>
	$(function(){
		$('#delete').click(function(){			
			var id_pais = $('form[name=Delete] input[name=id_pais]')[0].value;
			//var id_pais = document.Delete.id_pais.value;

			if (id_pais == "") {
				//alert("Campos Vacios");
			}else{
				$.ajax({
					type: 'POST',
					url: '<?php echo URL;?>Pais/Delete/deleteDatos',
					data: {id_pais: id_pais},
					success: function(response){						
						if (response == 1) {
							alert("Pais eliminado con exito");
							document.location = '<?php echo URL."Home/Principal/principal";?>';
						} else {
							alert(response);
							//alert("El email ya esta registrado");
						}
					}
				});
				return false; //Evitar submit del formulario
			}
			
		});
	});
</script>