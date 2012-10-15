<?php
	if(isset($_POST['Tipo'])){
		require_once('../Modelos/Acta.php');
		$a = new Acta();
		if(is_null($a -> error)){
			switch ($_POST['Tipo']) {
				case 'Nueva':{
					echo print_r($a -> setActa(array(
							"Asistentes" => explode(",", $_POST['Asistentes']),
							"Fecha" => $_POST['Fecha'],
							"Contenido" => $_POST['Acta']
						))
					);
					break;
				}
				case 'Edita':{
					break;
				}
				case 'Elimina':{
					break;
				}
				case 'Consulta':{
					if($_POST['Que'] == "Ingresadas"){
						$return = array();						
						foreach ($a -> getActas() as $value) {
							array_push($return, array("ID" => $value['_id'], "Fecha" => $value['Fecha']));
						}
						echo json_encode($return);
					}else{
						echo json_encode($a -> getActa($_POST['Que']));
						//echo print_r($a -> getActa($_POST['Que']));
					}
					break;
				}
				default:
					
					break;
			}
		}else{
			echo $a -> error -> getMessage();
		}
	}else{
		echo "asd3";
	}
?>