<?php
$pageTitle='Списък';
include 'header.php';
$connection=mysqli_connect('localhost','minkov.plamen','qwerty','bit_market');       
if($_POST)
{
    $pr = trim($_POST['price']);
              if(isset($_GET['id'])) {  
              echo $_GET['id']; 
              $upd='UPDATE `products` SET `product_price`="'.$pr.'" WHERE product_id="'.$_GET['id'].'"';
              mysqli_query($connection, $upd);
header("location: ../index.php");
mysqli_close($connection);    
                
}
}?>
<form class="Form" method="POST">
    <input type="text" name="price" />
<input type="submit" id="filt" value="Поправи" />
</form>