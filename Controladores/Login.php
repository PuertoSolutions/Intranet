<?php
	if(isset($_POST['Tipo'])){
		require_once('../Modelos/Usuario.php');
		$u = new Usuario();
		if(is_null($u -> error)){
			switch ($_POST['Tipo']) {
				case 'Registro':{
					echo print_r($u -> setUsuario(array(
							"Nick" => $_POST['Nick'],
							"Pass" => md5($_POST['Pass']),
							"Departamento" => $_POST['Departamento']
						))
					);
					break;
				}
				case 'Ingreso':{
					$usuario = $u -> getusuario($_POST['Nick'], TRUE);
					if(count($usuario) == 0){
						echo "No se ha encontrado Usuario \"". $_POST['Nick']. "\"";
					}else{
						if(strcmp(md5($_POST['Pass']), $usuario[0]['Pass']) == 0){
							session_start();
							$_SESSION['Nick'] = $usuario[0]['Nick'];
							$_SESSION['Departamento'] = $usuario[0]['Departamento'];
							echo "Bienvenido ".$usuario[0]['Nick'];
						}else{
							echo "Contraseña incorrecta";
						}							
					}
					break;
				}
				case 'Consulta':{
					echo json_encode($u -> getUsuarios());
				}
				default:
					
					break;
			}
		}else{
			echo $u -> error ->getMessage();
		}
	}else{
		echo "asd1";
	}
?>