<!DOCTYPE html>
<html lang="en">
<?php
	session_start();
	require_once('Vistas/Cabecera.php');
?>
		<div class="container">
<?php	
	if(isset($_SESSION['Nick'])){
		if(isset($_GET['P'])){
			switch ($_GET['P']) {
				case 'Clientes':{
					require_once('Vistas/Clientes.php');
					break;
				}
				case 'Actas':{
					require_once('Vistas/Actas.php');
					break;
				}
				case 'Salir':{
					session_destroy();
					require_once('Auxiliares/Parametros.php');
					header( 'refresh: 1; url=' . Parametros::$URLLocal . '');
					break;
				}
				
				default:
					
					break;
			}
		}else{
			//noticias
		}
	}else{
		if (isset($_GET['Reg'])) {
			require_once('Vistas/Registro.php');
		}else{
			require_once('Vistas/Login.php');
		}
	}
?>
	    </div> <!-- /container -->
	</body>
</html>