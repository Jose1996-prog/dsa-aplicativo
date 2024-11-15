<?php

$connction = mysqli_connect("localhost","root","1996","pqrs_abril");
if(!$connction)
    die("Could not connect".mysqli_connect_error());
else
#echo 'connection established';

$query = "select * from tabla_abril";

$stmt = mysqli_query($connction,$query);

while($row = mysqli_fetch_array($stmt,MYSQLI_ASSOC)){
    echo $row['Municipio'].'</br>';
}

?>