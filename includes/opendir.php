<?php 
//Creamos Nuestra Función
			function listFiles($directorio){ //La función recibira como parametro un directorio
				if (is_dir($directorio)) { //Comprovamos que sea un directorio Valido
					if ($dir = opendir($directorio)) {//Abrimos el directorio
 
						echo '<ul>'; //Abrimos una lista HTML para mostrar los archivos
 
						while (($archivo = readdir($dir)) !== false){ //Comenzamos a leer archivo por archivo
 
							if ($archivo != '.' && $archivo != '..'){//Omitimos los archivos del sistema . y ..
 
								$nuevaRuta = $directorio.$archivo;//Creamos unaruta con la ruta anterior y el nombre del archivo actual 
 								
								echo '<li ><a href="'.$nuevaRuta.'" download="'.$archivo.'">'; //Abrimos un elemento de lista 
 
									if (is_dir($nuevaRuta)) { //Si la ruta que creamos es un directorio entonces:
										// echo '<b>'.$nuevaRuta.'</b>'; //Imprimimos la ruta completa resaltandola en negrita
									  	listFiles($nuevaRuta);//Volvemos a llamar a este metodo para que explore ese directorio.
 
									} else { //si no es un directorio:
										echo 'Archivo: '.$archivo; //simplemente imprimimos el nombre del archivo actual
									}
 
								echo '</a> <a title="Borrar" onclick="BorrarCsv(\''.$archivo.'\',\''.$directorio.'\')" href="#"><img src="../media/img/boton-x.png"  alt="Logo borrar" class="" width="20" height="20"></a></li>'; //Cerramos el item actual y se inicia la llamada al siguiente archivo
 
							}
 
						}//finaliza While
						echo '</ul>';//Se cierra la lista
 
						closedir($dir);//Se cierra el archivo
					}
				}else{//Finaliza el If de la linea 12, si no es un directorio valido, muestra el siguiente mensaje
					echo 'No Existe el directorio';
				}				
			}//Fin de la Función ?>