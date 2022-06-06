<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/EjercicioModernizacion/Backend/api/personasAPI.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Holiwis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo "http://localhost/EjercicioModernizacion/Frontend/assets/css/styles.css"?>"/>
</head>

<body class="d-flex vh-100 flex-column bg-secondary">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><h1>Modernización</h1></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo $_SERVER['DOCUMENT_ROOT'] . "/EjercicioModernizacion/Frontend/personas/listar.php"?>">Listado de Personas</a>
                    <!--TODO: Hacer que el nombre del link cambie de acuerdo a la pagina actual.-->
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Cursos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="http://localhost/EjercicioModernizacion/Frontend/cursos/listar_cursos.php?id_modalidad=0">Grupales</a></li>
                        <li><a class="dropdown-item" href="http://localhost/EjercicioModernizacion/Frontend/cursos/listar_cursos.php?id_modalidad=1">Individuales</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Cursos Por Genero</a></li>
                    </ul>
                </li>

            </ul>

        </div>
    </div>
</nav>
<main class="container">