<?php
$array_cursos_init = ['id' => 0, 'nombre' => 'Cursos 0', 'modalidad' => 'Grupal', 'cupos' => '10', 'fecha' => '2020-01-01', 'estado' => 'Disponible'];
$array_cursos = [
    ['id' => 1, 'nombre' => 'Cursos 1', 'modalidad' => 'Grupal', 'cupos' => '10', 'fecha' => '2020-01-01', 'estado' => 'Disponible'],
    ['id' => 2, 'nombre' => 'Cursos 2', 'modalidad' => 'Individual', 'cupos' => '10', 'fecha' => '2020-01-01', 'estado' => 'Disponible'],
    ['id' => 3, 'nombre' => 'Cursos 3', 'modalidad' => 'Individual', 'cupos' => '10', 'fecha' => '2020-01-01', 'estado' => 'Disponible'],
    ['id' => 4, 'nombre' => 'Cursos 4', 'modalidad' => 'Individual', 'cupos' => '10', 'fecha' => '2020-01-01', 'estado' => 'Disponible']
];

include_once $_SERVER['DOCUMENT_ROOT'] . '/EjercicioModernizacion/Frontend/frame/header.php'; ?>

    <div class="d-flex align-items-start">
        <div class="w-25 nav flex-column nav-pills me-3 bg-light p-3 pt-0" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-<?php echo $array_cursos_init['id'] ?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-<?php echo $array_cursos_init['id'] ?>" role="tab" aria-controls="v-pills-<?php echo $array_cursos_init['id'] ?>" aria-selected="true">
                <?php echo $array_cursos_init['nombre'] ?>
            </a>
            <?php foreach ($array_cursos as $curso) { ?>
                <a class="nav-link" id="v-pills-<?php echo $curso['id'] ?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-<?php echo $curso['id'] ?>" role="tab" aria-controls="v-pills-<?php echo $curso['id'] ?>" aria-selected="false">
                    <?php echo $curso['nombre'] ?>
                </a>
            <?php } ?>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-<?php echo $array_cursos_init["id"] ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $array_cursos_init["id"] ?>-tab" tabindex="0">
                <div class="card border-primary border-2 p-3">
                    <div class="card-header bg-primary text-light">
                        <h5 class="card-title"><?php echo $array_cursos_init["nombre"] ?></h5>
                    </div>
                    <!-- <div class="card">-->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item fs-4"><?php echo $array_cursos_init["modalidad"] ?></li>
                        <li class="list-group-item fs-4"><?php echo $array_cursos_init["cupos"] ?></li>
                        <li class="list-group-item fs-4"><?php echo $array_cursos_init["fecha"] ?></li>
                        <li class="list-group-item fs-4"><?php echo $array_cursos_init["estado"] ?></li>
                    </ul>
                    <!-- </div> -->
                </div>
            </div>
            <?php foreach ($array_cursos as $curso) { ?>
                <div class="tab-pane fade" id="v-pills-<?php echo $curso["id"] ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $curso["id"] ?>-tab" tabindex="0">
                    <div class="card border-primary border-2 p-3">
                        <div class="card-header bg-primary text-light">
                            <h5 class="card-title"><?php echo $curso["nombre"] ?></h5>
                        </div>
                        <!-- <div class="card-body"> -->
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item fs-4"><?php echo $curso["modalidad"] ?></li>
                            <li class="list-group-item fs-4"><?php echo $curso["cupos"] ?></li>
                            <li class="list-group-item fs-4"><?php echo $curso["fecha"] ?></li>
                            <li class="list-group-item fs-4"><?php echo $curso["estado"] ?></li>
                        </ul>
                        <!-- </div> -->
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/EjercicioModernizacion/Frontend/frame/footer.php'; ?>