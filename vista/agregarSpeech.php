<?php
session_start();
if ( isset( $_SESSION[ 'INGRESO' ] ) && $_SESSION[ 'INGRESO' ] == 'YES'  ) {
  ?>
    <!DOCTYPE html>
    <html lang="es-es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>AGREGAR SPEECH</title>

        <?php
    include("../includes/cdn.php"); 
    ?>

    </head>

    <body>
        <?php
    include("../includes/menu.php"); 
    ?>
           
            
            <input type="hidden" id="user" value="<?php echo  $_SESSION['user'];?>">

            <div class="container mt-4 pt-4">
                           
                            <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            
                            <div class="card-body">
                                <div class="row">
                                <div class="col-md-6">
                                <legend>INGRESAR SPEECH</legend>
                                <form action="" id="guardarCampania" class="mb-2">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="tipo">TIPO</label>
                                            <select id="tipo" class="form-control">
                                            	<option disables selected="" value="">Seleccionar</option>
                                            	<option value="BIENVENIDA">BIENVENIDA</option>
                                            	<option value="COBRANZAS">COBRANZAS</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12 mb-3">
					    					<label for="descripcion">Descripcion</label>
											  <textarea class="form-control" placeholder="" id="descripcion" style="height: 100px"></textarea>
					    				</div>
                                        
                                    </div>
                                        
                                   
                                    <button class="btn btn-primary" type="submit">Guardar</button>
                                </form>
                                    </div>
                                <div class="col-md-6">
                                    <ul class="list-group" class="mb-2">
                                        <legend>LISTA DE SPEECH</legend>
                                        <div id="mostrarCampania"></div>
                                    </ul>
                                </div>
                            </div>
                            </div>
                       
                    </div>
                    
                </div>
                        </div>
          
            </div>
    </body>
    <script src="../js/speech.js"></script>

    </html>
    <?php

} else {
  header( "location: login.html" );
}
?>