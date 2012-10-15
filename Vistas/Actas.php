<div class="accordion" id="accordion">
	<div class="accordion-group">
		<div class="accordion-heading">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
				Ingreso
			</a>
		</div>
		<div id="collapseOne" class="accordion-body collapse in">
			<div class="accordion-inner">
				<form class="form-horizontal" id="FormIngreso" name="Ingreso">
					<fieldset>
						<div id="legend" class=""><legend class="">Nueva Acta</legend></div>
						<div class="control-group">
							<label class="control-label" for="input01">Asistentes</label>
							<div class="controls">
								<div class="btn-group" data-toggle="buttons-checkbox" id="DivAsistentes">
								</div>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Fecha Acta</label>
							<div class="controls">
								<div class="input-append date" id="dp3" data-date="<?php echo date("d-m-Y"); ?>" data-date-format="dd-mm-yyyy">
									<input class="span2" size="16" type="text" value="<?php echo date("d-m-Y"); ?>" name="fecha">
									<span class="add-on"><i class="icon-th"></i></span>
								</div>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Contenido Acta</label>
							<div class="controls">
								<textarea class="span7" rows="10" name="contenido" id="contenidoActa"></textarea>
							</div>
						</div>
						<div class="control-group">
							<div class="controls"><button class="btn btn-success" type="button" id="Guardar">Guardar</button></div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<div class="accordion-group">
		<div class="accordion-heading">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
				Visor
			</a>
		</div>
		<div id="collapseTwo" class="accordion-body collapse">
			<div class="accordion-inner">
				<div class="row">
					<div class="span5">
						<span class="label label-success" id="ActasIngresadas"></span>
					</div>
				</div>
				<div class="row">	
					<div class="span5">
						<select id="SelectorActas"><option>Escoger Acta</option></select>
					</div>
				</div>
				<div class="row">
					<div class="span11" id="VisorActas" style="display: none">
						<table class="table table-bordered">
							<tr><td>ID:</td><td><b id="id"></b></td></tr>
							<tr><td>Asistentes:</td><td><b id="asistentes" ></b></td></tr>
							<tr><td>Fecha:</td><td><b id="fecha" ></b></td></tr>
							<tr><td colspan="2">Contenido:</td></tr>
							<tr><td colspan="2">
								<div id="myNicPanel" ></div><br />
								<div id="contenido" ></div>
								</td></tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function(){
		new nicEditor({fullPanel : true}).panelInstance('contenidoActa');
		var myNicEditor = new nicEditor();
    	myNicEditor.setPanel('myNicPanel');
		myNicEditor.addInstance('contenido');
	});
</script>
<script src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#dp3').datepicker();
		$.post("Controladores/Login.php", {
			Tipo: "Consulta"
		}, function(data){
			var a = jQuery.parseJSON(data);
			for(x in a){
				$('#DivAsistentes').
					append($('<button>').
						attr("class", "btn").
						attr("type", "button").
						attr("name", "asistente").
						attr("value", a[x]._id.$id).
						text(a[x].Nick));
			}
		});
		$('#Guardar').click(function(){
			var asistentes = $('#FormIngreso :button[name=asistente].active');
			nicEditors.findEditor('contenidoActa').saveContent();
			var a = new Array();
			$.each(asistentes, function(index, value){
				a.push($(value).val());
			});
			$.post("Controladores/Acta.php", {
				Tipo: "Nueva",
				Asistentes: a.toString(),
				Fecha: $('#FormIngreso :input[name=fecha]').val(),
				Acta: $("#contenidoActa").val()
			}, function(data){
				alert(data);
			});
		});
		$.post("Controladores/Acta.php", {
			Tipo: "Consulta",
			Que: "Ingresadas"
		}, function(data){
			var a = jQuery.parseJSON(data);
			$('#ActasIngresadas').append(a.length + " Actas Ingresadas");
			for(x in a){
				$('#SelectorActas').append(new Option(a[x].Fecha, a[x].ID.$id));
			}
		});
		$('#SelectorActas').change(function(){
			try{
				$.post("Controladores/Acta.php", {
					Tipo: "Consulta",
					Que: $(this).val()
				}, function(data){
					//alert(data)
					var d = jQuery.parseJSON(data);
					$('#id').html(d[0]._id.$id);
		            $('#asistentes').html(d[0].Asistentes.toString());
		            $('#fecha').html(d[0].Fecha);
	                $('#contenido').html(d[0].Contenido);
				}).success(function(){
		            	$("#VisorActas").show();
		            }); ;
			}catch(e){
				alert(e.toString());
			}
		});
	});
</script>
<link href="css/datepicker.css" rel="stylesheet" type="text/css"/>