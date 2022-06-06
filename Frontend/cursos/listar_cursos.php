<?php
$array_cursos_init = ['id' => 0, 'nombre' => 'Curso 0', 'modalidad' => 'Grupal', 'cupos' => '10', 'fecha' => '2020-01-01', 'estado' => 'Disponible'];
$array_cursos = [
        ['id' => 1, 'nombre' => 'Curso 1', 'modalidad' => 'Grupal', 'cupos' => '10', 'fecha' => '2020-01-01', 'estado' => 'Disponible'],
    ['id' => 2, 'nombre' => 'Curso 2', 'modalidad' => 'Individual', 'cupos' => '10', 'fecha' => '2020-01-01', 'estado' => 'Disponible'],
    ['id' => 3, 'nombre' => 'Curso 3', 'modalidad' => 'Individual', 'cupos' => '10', 'fecha' => '2020-01-01', 'estado' => 'Disponible'],
    ['id' => 4, 'nombre' => 'Curso 4', 'modalidad' => 'Individual', 'cupos' => '10', 'fecha' => '2020-01-01', 'estado' => 'Disponible']];

include_once $_SERVER['DOCUMENT_ROOT'] .'/EjercicioModernizacion/Frontend/frame/header.php';?>

    <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-<?php echo $array_cursos_init['id']?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-<?php echo $array_cursos_init['id']?>" role="tab" aria-controls="v-pills-<?php echo $array_cursos_init['id']?>" aria-selected="true">
                <?php echo $array_cursos_init['nombre']?>
            </a>
            <?php foreach ($array_cursos as $curso) { ?>
                <a class="nav-link" id="v-pills-<?php echo $curso['id']?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-<?php echo $curso['id']?>" role="tab" aria-controls="v-pills-<?php echo $curso['id']?>" aria-selected="false">
                    <?php echo $curso['nombre']?>
                </a>
            <?php } ?>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-<?php echo $array_cursos_init["id"]?>>" role="tabpanel" aria-labelledby="v-pills-<?php echo $array_cursos_init["id"]?>-tab" tabindex="0">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><?php echo $array_cursos_init["nombre"]?></h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <?php echo $array_cursos_init["modalidad"]?>
                        </p>
                        <p class="card-text">
                            <?php echo $array_cursos_init["cupos"]?>
                        </p>
                        <p class="card-text">
                            <?php echo $array_cursos_init["fecha"]?>
                        </p>
                        <p class="card-text">
                            <?php echo $array_cursos_init["estado"]?>
                        </p>
                    </div>
                </div>
            </div>
            <?php foreach ($array_cursos as $curso) {?>
            <div class="tab-pane fade" id="v-pills-<?php echo $curso["id"]?>>" role="tabpanel" aria-labelledby="v-pills-<?php echo $curso["id"]?>-tab" tabindex="0">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><?php echo $curso["nombre"]?></h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <?php echo $curso["modalidad"]?>
                        </p>
                        <p class="card-text">
                            <?php echo $curso["cupos"]?>
                        </p>
                        <p class="card-text">
                            <?php echo $curso["fecha"]?>
                        </p>
                        <p class="card-text">
                            <?php echo $curso["estado"]?>
                        </p>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
        
    </div>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] .'/EjercicioModernizacion/Frontend/frame/footer.php';?>