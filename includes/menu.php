<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">
        <b>ECUABILLING</b>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <div class="navbar-nav mr-auto ml-auto  mt-2 mt-lg-0">

            <?php
if ($_SESSION['rol'] == 1) {
    ?>

                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons d-inline-block align-top">settings</i> ADMINISTRACION
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        
                        <a class="dropdown-item" href="masivoCliente.php">Masivo Cliente CSV</a>
                        <a class="dropdown-item" href="masivoTelefono.php">Masivo Telefonos CSV</a>
                        <hr class="dropdown-divider">
                        <a class="dropdown-item" href="agregarUsuario.php">Creacion de usuarios</a>
                        <a class="dropdown-item" href="agregarCliente.php">Creacion de clientes</a>
                        <a class="dropdown-item" href="agregarCampania.php">Creacion Niveles</a>
                        <a class="dropdown-item" href="agregarSucursal.php">Creacion Sucursales</a>
                        <a class="dropdown-item" href="agregarSpeech.php">Creacion Speech</a>
                        
                        
                    </div>
                </li>

                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-list"></i> CRM
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        
                        <a class="dropdown-item" href="manual.php">MANUAL</a>
                        <a class="dropdown-item" href="predictiva.php">PREDICTIVO</a>
                        
                        
                        
                    </div>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-list"></i> REPORTES
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        
                        <a class="dropdown-item" href="reporteInfo.php">INFO CLIENTE</a>
                        <a class="dropdown-item" href="reporteGestion.php">GESTION</a>
                        
                        
                        
                    </div>
                </li>

                <li class="nav-item active">
                                <a class="nav-link" href="monitoreo.php"><i class="fas fa-list"></i> MONITOREO<span class="sr-only">(current)</span></a>
                            </li>

                            <li class="nav-item active">
                                <a class="nav-link" href="https://192.168.12.227/ivr/vista/generador.php" target="_blank"><i class="fas fa-list"></i> IVR<span class="sr-only">(current)</span></a>
                            </li>
                <?php
} elseif ($_SESSION['rol'] == 2) {
    ?>

                    
                            <!-- <li class="nav-item active">
                                <a class="nav-link" href="productos.php"><i class="material-icons d-inline-block align-top">texture</i> Productos/Servicios <span class="sr-only">(current)</span></a>
                            </li> -->
                           
                            <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-list"></i> CRM
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        
                        <a class="dropdown-item" href="manual.php">MANUAL</a>
                        <a class="dropdown-item" href="predictiva.php">PREDICTIVO</a>
                        
                        
                        
                    </div>
                </li>
                           

                           <!--  <li class="nav-item active">
                                <a class="nav-link" href="caja.php"><i class="material-icons d-inline-block align-top">dashboard</i> Caja <span class="sr-only">(current)</span></a>
                            </li> -->

                    <?php

} elseif ($_SESSION['rol'] == 3) {
    ?>
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-file-invoice-dollar"></i> GASTOS
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="ingresarConceptoGasto.php">NUEVO GASTO</a>
                            <a class="dropdown-item" href="gastos.php">AGREGAR GASTOS</a>
                            

                            
                        </div>
                    </li>

                           

                            <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons d-inline-block align-top">face</i> CLIENTE
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="agregarUsuario.php">NUEVO CLIENTE</a>
                            <a class="dropdown-item" href="listaUsuario.php">LISTA DE CLIENTES</a>
                            <a class="dropdown-item" href="cambioAceite.php">CAMBIO DE ACEITE</a>
                            <a class="dropdown-item" href="presentacionPlan.php">PRESENTAR PLANES</a>
                            <a class="dropdown-item" href="presentacionCombo.php">PRESENTAR COMBOS</a>
                          <!--   <a class="dropdown-item" href="presentacionPlan.php">PRESENTAR PLANES</a>
                            <a class="dropdown-item" href="presentacionCombo.php">PRESENTAR COMBOS</a> -->
                            
                           
                        </div>
                    </li>
                            <!-- <li class="nav-item active">
                                <a class="nav-link" href="productos.php"><i class="material-icons d-inline-block align-top">texture</i> Productos/Servicios <span class="sr-only">(current)</span></a>
                            </li> -->
                            <li class="nav-item active">
                                <a class="nav-link" href="caja.php"><i class="fas fa-cash-register"></i> CAJA<span class="sr-only">(current)</span></a>
                            </li>
                           
                            <li class="nav-item active">
                                <a class="nav-link" href="historial.php"><i class="fas fa-list"></i> HISTORIAL<span class="sr-only">(current)</span></a>
                            </li>
                            
                            
                           

                           <!--  <li class="nav-item active">
                                <a class="nav-link" href="caja.php"><i class="material-icons d-inline-block align-top">dashboard</i> Caja <span class="sr-only">(current)</span></a>
                            </li> -->
                           
                            



                        </ul>

                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons d-inline-block align-top">dashboard</i> Registro
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="historial.php">Registro</a>
                            </div>
                        </li> -->
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons d-inline-block align-top">dashboard</i> Caja
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="registrocaja.php">Caja</a>
                            </div>
                        </li> -->
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons d-inline-block align-top">dashboard</i> Gastos
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="gastos.php">Gastos</a>
                            </div>
                        </li> -->

                        <?php
} elseif ($_SESSION['rol'] == 4) {
    ?>

                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons d-inline-block align-top">face</i> CLIENTE
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                             <a class="dropdown-item" href="mostrarHistorial.php">HISTORIAL DE SERVICIOS</a>
                            <a class="dropdown-item" href="mostrarCambioAceite.php">HISTORIAL CAMBIO DE ACEITE</a>
                            <a class="dropdown-item" href="cambiarPass.php">INFORMACION</a>
                            <a class="dropdown-item" href="mostrarServicio.php">SERVICIOS</a>
                           
                        </div>
                    </li>


<?php
} 
    ?>
        </div>

        <div class="d-flex flex-row justify-content-center">
            <a class="nav-link text-white">
                <?php echo $_SESSION['nombre'];?><span class="sr-only">(current)</span></a>
            <div class="btn-group" role="group" aria-label="Basic example">

                <a href="#" onclick="cerrar()" class="btn btn-outline-danger">Salir</a >
                </div>
        </div>
    </div>
</nav>

<script src="../js/login.js"></script>