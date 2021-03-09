<?php

//$con = mysqli_connect('localhost', 'root', '83W8tlzOaRmN4QcO', 'foresterm_bdd');
//$con = mysqli_connect('localhost', 'fcom_covid', '#eYfs08IJ6cw*2020', 'admin_fordbc');
$con = mysqli_connect('localhost', 'root', '', 'freelancer_admin_fordbc');
$con->set_charset('utf8');


if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}

function row_count($result){
    return mysqli_num_rows($result);
}


function escape($string){
    global $con;
    return mysqli_real_escape_string($con, $string);
}


function query($sql){
    global $con;
    return mysqli_query($con, $sql);
}


function confirm($result){
    global $con;
    
    if(!$result){
        
        die('Query Failed' . mysqli_error($con));
            
    }  
}

function fetch_array($result){
    global $con;
    return mysqli_fetch_array($result);
}
?>