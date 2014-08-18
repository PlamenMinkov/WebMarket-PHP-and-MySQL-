<?php
$pageTitle='Списък';
include 'includes/header.php';
include 'includes/drawingTable.php';

if(!isset($_SESSION['user/admin'])){
    echo '  
  <header>
      <a href="logIn.php">Вход</a>
      <a href="Reg.php">Регистрация</a>
  </header>';
    echo '<style>       
            aside#right{
                float:right;
                margin-top: -240px;
                margin-right: 3%;
            }
            aside#left{
            float:left;
                margin-top: -240px;
                margin-left: 3%;
            }
            </style>';
}
    else if($_SESSION['user/admin']==='user'){
        echo '<header>'
        . 'Здравей <a href="userProfil.php">'.$_SESSION['user_name'].'<br/>
            </a><a href="destroy.php">Изход</а></header>
            <div id="shoppingCard"><a href="userMarket.php"><img src="pictures/image.png" id="shoppingCard"/></a><br/>
            <a href="userMarket.php" class="shoppingCardText" id="shoppingCard"/>Пазарска количка</a></div>         
            <a href="form.php" class="nav">Добави нов материал</a>';
        echo '<style>       
            aside#right{
                float:right;
                margin-top: -240px;
                margin-right: -48%;
            }
            aside#left{
            float:left;
                margin-top: -240px;
                margin-left: 3%;
            }
            </style>';
        //echo '<pre>'.print_r($_SESSION, true).'</pre>';
    }
    else if($_SESSION['user/admin']==='admin'){
        echo '<header>'
        . 'Здравей '.$_SESSION['user_name'].'<br/>
            <a href="destroy.php">Изход</а><br/>
            <a></a></header>';
        echo '<style>       
            aside#right{
                float:right;
                margin-top: -240px;
                margin-right: -48%;
            }
            aside#left{
            float:left;
                margin-top: -240px;
                margin-left: 3%;
            }
            </style>';
    }
?>
<form class="Form" method="POST">
        <select name="type">
            <?php
            foreach ($allTypes as $key=>$value) {
                echo '<option value="'.$key.'">' . $value .
                        '</option>';
            }
            ?>
        </select>           
    <input type="submit" id="filt" value="Филтрирай" />
</form>
<table border="1" class="centralForm" id="textCenter">
    <tr >
        <td>Дата</td>
        <td>Име</td>
        <td>Сума</td>
        <td>Вид</td>
        <td>Id</td>
        <td>Изображение</td>
    </tr>
    <?php
  
    $allPrice=0.00;
    $select=mysqli_query($connection,'SELECT * FROM products ');
    if(!$_POST){
         if(isset($_SESSION['user/admin'])){
        drawTable('Всички',$select,$_SESSION['user/admin']);
         }
         else{
            drawTable('Всички',$select,"user"); 
         }
    }
    if($_POST){
        $selType=$allTypes[$_POST['type']];
        if(isset($_SESSION['user/admin'])){
        drawTable('Всички',$select,$_SESSION['user/admin']);
         }
         else{
            drawTable('Всички',$select,"user"); 
         }      
    }
    ?>    
</table>
<input type="text" id="id" class="idNum" name="id"/><br/> 
<?php
include 'includes/footer.php';
?>
