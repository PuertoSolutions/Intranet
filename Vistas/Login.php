<style>
	.login {
		width:520px;
		height:280px;
		margin: 0px 0px 150px 200px;
		background-image:url("img/login.png");
		background-repeat:no-repeat;
		padding-top:140px;
	}
</style>
<div class="login">
	<form class="form-horizontal" id="FormIngreso">
		<fieldset>
			<div class="control-group">
				<label class="control-label" for="input01">ID usuario</label>
				<div class="controls"><input type="text" name="nick" class="input-xlarge"></div>
			</div>
			<div class="control-group">
				<label class="control-label" for="input01">Contraseña</label>
				<div class="controls"><input type="password" name="pass" class="input-xlarge"></div>
			</div>
			<div class="control-group">
				<div class="controls">
					<button class="btn btn-success" type="button" id="Ingresar">Entrar</button>
					<button class="btn btn-primary" type="button" id="Registrar">Registrar</button>
				</div>
			</div>
		</fieldset>
	</form>
	<script type="text/javascript">
		$(document).ready(function(){
			try{
				$('#Registrar').click(function(){
					window.location.replace('<?php echo Parametros::$URLLocal ?>?Reg');
				});
				$('#Ingresar').click(function(){
					$.post("Controladores/Login.php", {
						Nick: $('#FormIngreso :input[name=nick]').val(),
						Pass: $('#FormIngreso :input[name=pass]').val(),
						Tipo: "Ingreso"
					}, function(data){
						alert(data);
						window.location.reload();
					})
				})
			}catch(e){
				alert(e.toString());
			}
		});
	</script>
</div>