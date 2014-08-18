
						<?php
$mysqli = new mysqli('localhost','minkov.plamen','qwerty','bit_market'); 
$mysqli->set_charset('utf8'); 

//$result = $mysqli->query('SELECT * FROM products where id="'.$row['product_id'].'"');
//$rowOne = $result->fetch_assoc();
//if ($rowOne['Picture']) unlink("pictures/".$row['Picture']);
$mysqli->query('delete FROM products where id="'.$row['product_id'].'"');
echo "Данните за този артикул са изтрити.<br>";

$mysqli->close();
?>
