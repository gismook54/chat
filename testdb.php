<?php
//$con = mysqli_connect('localhost', 'root', '83W8tlzOaRmN4QcO', 'foresterm_bdd');
$con = mysqli_connect('localhost', 'fcom_covid', '#eYfs08IJ6cw*2020', 'admin_fordbc');

if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
} 

if (mysqli_ping($con)) {
    printf ("¡La conexión está bien!\n");
} else {
    printf ("Error: %s\n", mysqli_error($con));
}

/* cerrar la conexión */
mysqli_close($con);


?>