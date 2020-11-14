<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Progra 4</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Kozko</a>
        <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">Sign out</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">
                                <span data-feather="home"></span>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                            <?php
                                include 'menu.php';
                            ?>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="container-fluid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <br />
                                <a href="proforma.php"><button type="submit" class="btn btn-primary btn-lg" id="btnProforma" name="btnProforma">Proforma</button>
                            </div>
                            <div class="col-4">
                                <br />
                                <a href="productos.php"><button type="submit" class="btn btn-primary btn-lg" id="btnProductos" name="btnProductos">Productos</button>
                            </div>
                            <div class="col-4">
                                <br />
                                <a href="proveedores.php"><button type="submit" class="btn btn-primary btn-lg" id="btnProveedores" name="btnAgregar">Proveedores</button>
                            </div>
                            <div class="col-4">
                                <br />
                                <a href="clientes.php"><button type="submit" class="btn btn-primary btn-lg" id="btnClientes" name="btnAgregar">Clientes</button>
                            </div>
                            <div class="col-4">
                                <br />
                                <a href="reportes.php"><button type="submit" class="btn btn-primary btn-lg" id="btnReportes" name="btnAgregar">Reportes</button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                </div> 
            </main>
        </div>

    
        <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
        <script>
            feather.replace()
        </script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <script src="js/redireccion.js"></script>
</body>

</html>