<?php
	if(isset($_POST['Tipo'])){
		require_once('../Modelos/Cliente.php');
		$c = new Cliente();
		if(is_null($c -> error)){
			switch ($_POST['Tipo']) {
				case 'Nuevo':{
					echo print_r($c -> setCliente(array(
							"Cliente" => $_POST['Nombre'],
							"Contacto" => $_POST['Contacto'],
							"Fono" => $_POST['Fono'],
							"Mail" => $_POST['Mail'],
							"Direccion" => $_POST['Direccion']
						))
					);
					break;
				}
				case 'Edita':{
					echo print_r($c -> updCliente(array(
						"Cliente" => $_POST['Nombre'],
						"Contacto" => $_POST['Contacto'],
						"Fono" => $_POST['Fono'],
						"Mail" => $_POST['Mail'],
						"Direccion" => $_POST['Direccion']
					), $_POST['ID']));
					break;
				}
				case 'Elimina': {
					echo print_r($c -> delCliente($_POST['ID']));
					break;
				}
				case 'Consulta':{
					if($_POST['Cual'] == "Todos"){
						echo json_encode($c -> getClientes());
					}else{
						echo json_encode($c -> getCliente($_POST['Cual']));
					}
					break;
				}
				default:
					
					break;
			}
		}else{
			echo $c -> error -> getMessage();
		}
	}else{
		echo "asd2";
	}
?>