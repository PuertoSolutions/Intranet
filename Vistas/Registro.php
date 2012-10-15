<form class="form-horizontal" id="FormRegistro">
	<fieldset>
		<div id="legend" class=""><legend class="">Registro Usuario</legend></div>
		<div class="control-group">
			<label class="control-label" for="input01">Nick</label>
			<div class="controls"><input type="text" name="nick" class="input-xlarge"></div>
		</div>
		<div class="control-group">
			<label class="control-label" for="input01">Contraseña</label>
			<div class="controls"><input type="password" name="pass" class="input-xlarge"></div>
		</div>
		<div class="control-group">
			<label class="control-label">Departamento</label>
			<div class="controls">
				<select class="input-xlarge" id="Departamento">
					<option>Diseño</option>
					<option>Hardware</option>
					<option>Software</option>
				</select>
			</div>
		</div>
		<div class="control-group">
			<div class="controls"><button class="btn btn-primary" type="button" id="Guardar">Guardar</button></div>
        </div>
    </fieldset>
</form>
<script type="text/javascript">
	$(document).ready(function(){
		$('#Guardar').click(function(){
			try{
				$.post("Controladores/Login.php", {
					Nick: $('#FormRegistro :input[name=nick]').val(),
					Pass: $('#FormRegistro :input[name=pass]').val(),
					Departamento: $('#Departamento').val(),
					Tipo: "Registro"
				}, function(data){
					alert(data);
				});
			}catch(e){alert(e.toString())}
		});
	});
</script>