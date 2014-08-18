<?php
$pageTitle='Списък';
include 'includes/header.php';
include 'includes/drawingTable.php';
echo '<style>
            aside#right{
                float:right;
                margin-top: -140px;
                margin-right: 3%;
            }
            aside#left{
            float:left;
                margin-top: -140px;
                
            }
            </style>';
echo '<header>'
        . 'Здравей <a href="userProfil.php" >'.$_SESSION['user_name'].'</a><br/>
            <a href="destroy.php" style="padding-right:20px">Изход</а><a href="index.php" align="center">Към магазина</a><br/></header>
            <a href="form.php" class="nav" style="margin-bottom:0px">Добави нов материал</a>';
?>

    <?php
    $allPrice=0.00;
    
    if(isset($_SESSION['marketCar'])){
        echo '
            <style>
            aside#left{
                margin-left: -26%;
            }
            </style>';
        echo '<table border="1" class="centralForm" id="textCenter">
    <tr>
        <td>Дата</td>
        <td>Име</td>
        <td>Сума</td>
        <td>Вид</td>
        <td>Id</td>
        <td>Изображение</td>
    </tr>';
        $select=$_SESSION['marketCar'];
        if(!$_POST){
            $allPrice=0.00;        
            foreach ($select as $row){
                    echo '<tr>
                                <td>'.$row['data'].'</td>
                                <td>'.$row['product_name'].'</td>
                                <td>'.$row['product_price'].'</td>
                                <td>'.$row['product_type'].'</td>
                                <td>'.$row['product_id'].'</td>
                                <td><div><a href="pictures/'.$row['product_id'].'.jpg" class="highslide" onclick="return hs.expand(this)">
                                    <p>Изображение</p>
                                </a></div>
                                </td>
                            </tr>';
                    $allPrice+=$row['product_price'];
        }
        echo '<tr>
                    <td>----</td>
                    <td>----</td>
                    <td>'.$allPrice.'</td>
                    <td>----</td>
                    <td>----</td>
                    <td>----</td>
                </tr>';
        }
        if($_POST){
            
            foreach ($select as $row){
                echo $row['product_id']." ".$_SESSION['user_id'];
                $ins = 'INSERT INTO `user_products`(`product_id`, `user_id`)
                      VALUES ("' . $row['product_id'] . '","' . $_SESSION['user_id'] . '")';
                $q = mysqli_query($connection, $ins);
                $upd='UPDATE `products` SET `product_stock`="false" WHERE product_id="'.$row['product_id'].'"';
                mysqli_query($connection, $upd);
            }
            
            unset($_SESSION['marketCar']);
            header('Location:userMarket.php');
        }
       
    }
    else{
        echo '
            <style>
            aside#left{
                margin-left: 3%;
            }
            </style>';
       echo '<p class="RegIn">Нямате налични продукти в пазарската Ви кошница!</p>'; 
    }
    ?>    
</table>

<?php
if(isset($_SESSION['marketCar'])){
     echo '
            <form method="POST">
            
                <input type="submit" class="buyFromMarcetcar" name="buyFromMarcetcar" value="Купи" />
            
            </form>';
}
include 'includes/footer.php';
?>
