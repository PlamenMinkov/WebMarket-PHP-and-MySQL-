<?php
$pageTitle='Профил';
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
                margin-left: 3%;
            }
            </style>';
$allPrice=0.00;

echo '<header>'
        . 'Здравей <a href="userProfil.php" >'.$_SESSION['user_name'].'</a><br/>
            <a href="destroy.php" style="padding-right:20px">Изход</а><a href="index.php" align="center">Към магазина</a><br/></header>
            
            <div id="shoppingCard"><a href="userMarket.php"><img src="pictures/image.png" id="shoppingCard"/></a><br/>
            <a href="userMarket.php" class="shoppingCardText" id="shoppingCard"/>Пазарска количка</a></div>
            <a href="form.php" class="nav" style="margin-bottom:0px">Добави нов материал</a>';
$select=mysqli_query($connection,'SELECT * FROM users_data INNER JOIN user_products '
        . 'ON users_data.user_id=user_products.user_id WHERE users_data.user_id="'.$_SESSION['user_id'].'" ');
//echo '<pre>'.print_r($select, true).'</pre>';
if(mysqli_num_rows($select)===0){
    echo '<p class="RegIn">Нямате налични продуцти</p>';
}
else{
    echo '<table border="1" class="centralForm" id="textCenter">
    <tr>
        <td>Дата</td>
        <td>Име</td>
        <td>Сума</td>
        <td>Вид</td>
        <td>Id</td>
        <td>Изображение</td>
    </tr>';
    while ($row=$select->fetch_assoc()){
        $id=$row['product_id'];
        $product=mysqli_query($connection,'SELECT * FROM products WHERE product_id="'.$id.'"');
        while ($row1=$product->fetch_assoc()){
            echo '<tr>
                                <td>'.$row1['data'].'</td>
                                <td>'.$row1['product_name'].'</td>
                                <td>'.$row1['product_price'].'</td>
                                <td>'.$row1['product_type'].'</td>
                                <td>'.$row1['product_id'].'</td>
                                <td><div><a href="pictures/'.$row1['product_id'].'.jpg" class="highslide" onclick="return hs.expand(this)">
                                    <p>Изображение</p>
                                </a></div>
                                </td>
                            </tr>';
                    $allPrice+=$row1['product_price'];
        }
    }
    echo '<tr>
                    <td>----</td>
                    <td>----</td>
                    <td>'.$allPrice.'</td>
                    <td>----</td>
                    <td>----</td>
                    <td>----</td>
                </tr></table>';
}
include 'includes/footer.php';
?>