<?php
$url = "http://weblogin.muninqn.gov.ar/api/Examen";
$personas = json_decode(file_get_contents($url),true);

switch ($_SERVER['REQUEST_METHOD']) {
    case 'value':
        # code...
        break;
    
    default:
        # code...
        break;
}