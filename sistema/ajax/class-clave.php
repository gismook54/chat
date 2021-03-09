<?php 
$claveAcceso = '';

for($x = 0; $x<2; $x++) {
  $claveAcceso .=  substr(strtolower(sha1(rand(0,99999999))),0,4);
}
?>