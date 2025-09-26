<?php
	
		require_once('../modelo/modeloSubirCliente.php');
		
		$boton=$_POST['boton'];

		switch ($boton) {
			
				
            // PROCESO DE CARGAR CSV DE CEDULAS A LA BD
			case 'subirCedula':
					$nombreArchivocsv = $_POST['nombreArchivocsv'];

					$instancia = new modeloSubirCliente();
					if($prueba = $instancia->subirCedula($nombreArchivocsv))
					{
						echo 1;
					}
					else{
						echo 0;
					}
                break;
                
                 // PROCESO DE CARGAR CSV DE INFORMACION A LA BD
			case 'subirInfo':
            $nombreArchivocsv = $_POST['nombreArchivocsv'];

            $instancia = new modeloSubirCliente();
            if($instancia->subirInfo($nombreArchivocsv))
            {
                echo 1;
            }
            else{
                echo 0;
            }
        break;
			
			default:
				# code...
				break;
		}
?>