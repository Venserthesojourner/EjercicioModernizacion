<h1 align="center">Hi 👋, I'm Luis Miguel Cañete</h1>
<h3 align="center">A passionate web developer from Argentina</h3>

<p align="left"> <img src="https://komarev.com/ghpvc/?username=venserthesojourner&label=Profile%20views&color=0e75b6&style=flat" alt="venserthesojourner" /> </p>

<h3 align="left">Connect with me:</h3>
<p align="left">
</p>

<h3 align="left">Languages and Tools:</h3>
<p align="left"> <a href="https://git-scm.com/" target="_blank" rel="noreferrer"> <img src="https://www.vectorlogo.zone/logos/git-scm/git-scm-icon.svg" alt="git" width="40" height="40"/> </a> <a href="https://www.linux.org/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/linux/linux-original.svg" alt="linux" width="40" height="40"/> </a> <a href="https://www.mysql.com/" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original-wordmark.svg" alt="mysql" width="40" height="40"/> </a> <a href="https://www.php.net" target="_blank" rel="noreferrer"> <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg" alt="php" width="40" height="40"/> </a> </p>Implementación de un sistema de cursos

Desafio Propuesto
Se debe realizar una petición a un Endpoint el cual le otorgará información sobre 100 personas en una DB.
Una vez obtenidos los datos, se necesita que realice las siguientes tareas:
Crear un CRUD o ABM web que permita inscribir personas a cursos de capacitación, con las siguientes restricciones y requerimientos:
Para las personas se pide registrar su nombre, apellido, DNI, género y edad. No puede haber personas duplicadas en el sistema (insertar los datos consumidos desde la api).
De los cursos se sabe que poseen un legajo, un nombre que le permite a un usuario poder reconocerlo, una descripción que permite conocer el detalle del mismo y su modalidad, la cual puede ser grupal o individual.
Un curso no puede contener 2 modalidades diferentes, es decir, es grupal o es individual. Tampoco puede haber cursos duplicados.
Una persona se puede inscribir a 1 solo curso por modalidad.
Emitir un reporte por pantalla de personas por curso.
Listar por separado los cursos individuales y grupales, mostrar los nombres en orden de la lista creada, a un costado de la misma, solo que el nombre que se muestra debe estar en grande, cambiar cada 10-15 segundos (si es posible animar tanto cuando desaparece el nombre como cuando aparece el próximo) y debe corresponder con el nombre en la lista.
Obtener cantidad de mujeres y hombres.
Obtener cantidad de menores y mayores de edad.