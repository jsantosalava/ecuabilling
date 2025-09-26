<?php
session_start();
if ((isset($_SESSION['INGRESO']) && $_SESSION['INGRESO'] == 'YES') || (isset($_SESSION['rol']) && $_SESSION['rol'] == 1)) {
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ecuabilling - Dashboard</title>
    <?php include("../includes/cdn.php"); ?>
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Poppins', sans-serif;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .stats {
            font-size: 1.8rem;
            font-weight: bold;
            color: #4361ee;
        }
        .section-title {
            font-weight: 600;
            color: #2b2d42;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <!-- Menú superior -->
    <?php include("../includes/menu.php"); ?>

    <!-- Contenido central -->
    <div class="container mt-4 pt-4">
        <div class="row mb-4">
            <div class="col-md-12 text-center">
                <h1 class="section-title">Bienvenido <?php echo $_SESSION['nombre'] ?? 'Usuario'; ?> 👋</h1>
                <p class="text-muted">Panel de control y estadísticas de Ecuabilling</p>
            </div>
        </div>

        <!-- Tarjetas de estadísticas -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="card p-3 text-center">
                    <h5>Cartera Recuperada</h5>
                    <div class="stats">$245,890</div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card p-3 text-center">
                    <h5>Tasa de Éxito</h5>
                    <div class="stats">78.5%</div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card p-3 text-center">
                    <h5>Clientes Activos</h5>
                    <div class="stats">1,248</div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card p-3 text-center">
                    <h5>Casos Pendientes</h5>
                    <div class="stats">562</div>
                </div>
            </div>
        </div>

        <!-- Sobre Ecuabilling -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card p-4">
                    <h5 class="section-title">Sobre Ecuabilling</h5>
                    <p>
                        Ecuabilling es una empresa ecuatoriana especializada en la gestión estratégica de cobranzas 
                        y recuperación de cartera. Trabajamos con instituciones que requieren procesos eficientes, 
                        seguimiento riguroso y una ejecución alineada a criterios legales, éticos y de rentabilidad.
                    </p>
                </div>
            </div>
        </div>

        <!-- Actividad reciente -->
        <div class="row">
            <div class="col-md-12">
                <div class="card p-4">
                    <h5 class="section-title">Actividad Reciente</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">💰 Pago recibido de Cliente Ejemplo S.A. <span class="text-muted">Hace 2 horas</span></li>
                        <li class="list-group-item">🧾 Nuevo cliente registrado: Importadora Los Andes <span class="text-muted">Hace 5 horas</span></li>
                        <li class="list-group-item">📄 Contrato renovado con Banco del Pacífico <span class="text-muted">Ayer</span></li>
                        <li class="list-group-item">📊 Reporte mensual generado <span class="text-muted">25 Nov 2023</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
} else {
    header("location: login.html");
}
?>
