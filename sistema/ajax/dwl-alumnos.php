<?php include("../../inc/init.php");


    
$curr_timestamp = date('Y-m-d-H:i');

header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=Calves-Alumnos_$curr_timestamp.xls");


$idclinic = clean($_GET['id_clinic']);
$sql = "SELECT * FROM `alumnos` ORDER BY `ngrupo` ASC";
$result = query($sql);

if(row_count($result) > 0) {
        echo '<table>';
        echo '<thead>';
        echo '	<tr>';
        echo '		<th>ID</th>';
        echo '      <th>NOMBRE</th>';
        echo '      <th>APELLIDO PATERNO</th>';
        echo '		<th>APELLIDO MATERNO</th>';
        echo '      <th>CLAVE</th>';

        echo '		<th>PADRE</th>';
        echo '		<th>MADRE</th>';
        echo '		<th>GRUPO</th>';
        echo '	</tr>';
        echo '</thead>';
        echo '<tbody>';
                while($row = fetch_array($result)){

                $id = $row['id'];
                $name = $row['name'];
                $apaterno = $row['apaterno'];
                $amaterno = $row['amaterno'];
                $padre = $row['padre'];
                $madre = $row['madre'];
                $clave = $row['clave'];
                $ngrup = $row['ngrupo'];


                $sql1 = "SELECT * FROM `grupos` WHERE `id` = '$ngrup'";
                $result1 = query($sql1);
                $row1 = fetch_array($result1);
                $nameG = $row1['name'];
                $nGrupo = $row1['ngroup'];
                $ngrade = $row1['ngrade'];


                $sql2 = "SELECT `name` FROM `grades` WHERE `id`= '$ngrade'";
                $result2 = query($sql2);
                $row2 = fetch_array($result2);
                $labelG = $row2['name'];

                $grupo = $nameG.' '.$nGrupo.' '.$labelG;


                echo '<tr>';
                echo '	<td>'.$id.'</td>';
                echo '	<td>'.$name.'</td>';
                echo '	<td>'.$apaterno.'</td>';
                echo '	<td>'.$amaterno.'</td>';
                echo '	<td>'.(string)$clave.'</td>';
                echo '	<td>'.$padre.'</td>';
                echo '	<td>'.$madre.'</td>';
                echo '	<td>'.$grupo.'</td>';
                echo '</tr>';

     }
        echo '	</tbody>';
        echo '</table>';

 }


?>