<div class="row">
	<div class="span6">
		<form class="form-horizontal" id="FormIngreso">
			<fieldset>
				<div id="legend" class=""><legend class="">Nuevo Cliente</legend></div>
				<div class="control-group">
					<label class="control-label" for="input01">Cliente</label>
					<div class="controls"><input type="text" name="nombre" class="input-xlarge negra"></div>
				</div>
				<div class="control-group">
					<label class="control-label">Persona Contacto</label>
					<div class="controls">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-user"></i></span>
							<input class="span3 negra" name="contacto" id="prependedInput" type="text">
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">E-Mail</label>
					<div class="controls">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-envelope"></i></span>
							<input class="span3 negra" name="mail" id="prependedInput" type="text">
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Teléfono</label>
					<div class="controls">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-bell"></i></span>
							<input class="span3 negra" name="fono" id="prependedInput" type="text">
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Dirección</label>
					<div class="controls">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-screenshot"></i></span>
							<input class="span3 negra" name="direccion" id="prependedInput" type="text">
						</div>
					</div>
				</div>
				<div class="control-group">
					<div class="controls"><button class="btn btn-success" type="button" id="Guardar">Guardar</button></div>
				</div>
			</fieldset>
		</form>
	</div>
	<div class="span6">		
		<form class="form-horizontal" id="FormActRem">
			<fieldset>
				<div id="legend" class=""><legend class="">Editar o Eliminar Cliente</legend></div>
				<div class="control-group">
					<label class="control-label">Escoger Cliente</label>
					<div class="controls">
						<select class="input-xlarge" id="Clientes">
							<option value="0">Escoger Cliente</option>
						</select></div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">Nombre Cliente</label>
					<div class="controls"><input type="text" name="nombre" class="input-xlarge negra"></div>
				</div>
				<div class="control-group">
					<label class="control-label">Persona Contacto</label>
					<div class="controls">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-user"></i></span>
							<input class="span3 negra" name="contacto" id="prependedInput" type="text">
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">E-Mail</label>
					<div class="controls">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-envelope"></i></span>
							<input class="span3 negra" name="mail" id="prependedInput" type="text">
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Teléfono</label>
					<div class="controls">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-bell"></i></span>
							<input class="span3 negra" name="fono" id="prependedInput" type="text">
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Dirección</label>
					<div class="controls">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-screenshot"></i></span>
							<input class="span3 negra" name="direccion" id="prependedInput" type="text">
						</div>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<button class="btn btn-warning" type="button" id="Editar">Editar</button>
						<button class="btn btn-danger" type="button" id="Eliminar">Eliminar</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$.post("Controladores/Cliente.php", {
			Tipo: "Consulta",
			Cual: "Todos"
		}, function(data){
			var c = jQuery.parseJSON(data);
			if(c.length == 0){
				alert("No se han encontrado Clientes");
			}else{
				for(var x in c){
					$('#Clientes').append(new Option(c[x].Cliente, c[x]._id.$id));
				}				
			}
		});
		$('#Guardar').click(function(){
			try{
				$.post("Controladores/Cliente.php", {
					Tipo: "Nuevo",
					Nombre: $('#FormIngreso :input[name=nombre]').val(),
					Contacto: $('#FormIngreso :input[name=contacto]').val(),
					Fono: $('#FormIngreso :input[name=fono]').val(),
					Mail: $('#FormIngreso :input[name=mail]').val(),
					Direccion: $('#FormIngreso :input[name=direccion]').val()
				}, function(data){
					alert(data);
				}).success(function(){
					window.location.reload();
				});
			}catch(e){
				alert(e.toString());
			}
		});
		$('#Editar').click(function(){
			try{
				$.post("Controladores/Cliente.php", {
					Tipo: "Edita",
					ID: $('#Clientes').val(),
					Nombre: $('#FormActRem :input[name=nombre]').val(),
					Contacto: $('#FormActRem :input[name=contacto]').val(),
					Fono: $('#FormActRem :input[name=fono]').val(),
					Mail: $('#FormActRem :input[name=mail]').val(),
					Direccion: $('#FormActRem :input[name=direccion]').val()
				}, function(data){
					alert(data);
				}).success(function(){
					window.location.reload();
				});
			}catch(e){
				alert(e.toString());
			}
		});
		$('#Eliminar').click(function(){
			try{
				$.post("Controladores/Cliente.php", {
					Tipo: "Elimina",
					ID: $('#Clientes').val()
				}, function(data){
				}).success(function(){
					window.location.reload();
				});
			}catch(e){
				alert(e.toString());
			}
		});
		$('#Clientes').change(function(){
			if(!($(this).val() == "0")){
				$.post("Controladores/Cliente.php", {
					Tipo: "Consulta",
					Cual: $(this).val()
				}, function(data){
					try{
						var ci = jQuery.parseJSON(data);
						$("#FormActRem :input[name=nombre]").val(ci[0].Cliente);
						$("#FormActRem :input[name=contacto]").val(ci[0].Contacto);
						$("#FormActRem :input[name=fono]").val(ci[0].Fono);
						$("#FormActRem :input[name=mail]").val(ci[0].Mail);
						$("#FormActRem :input[name=direccion]").val(ci[0].Direccion);
					}catch(e){
						alert(e.toString());
					}
				});
			}else{
				$("#FormActRem :input[name=nombre]").val("");
				$("#FormActRem :input[name=contacto]").val("");
				$("#FormActRem :input[name=fono]").val("");
				$("#FormActRem :input[name=mail]").val("");
				$("#FormActRem :input[name=direccion]").val("");
			}
		});
	});
</script>