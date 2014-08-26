<?php
$pageTitle='Списък';
include 'includes/header.php';
    
    if(!isset($_SESSION['user/admin'])){
    ?>  
  <header>
      <a href="logIn.php">Вход</a>
      <a href="Reg.php">Регистрация</a>
  </header>
<?php 
    }
    else if($_SESSION['user/admin']==='user'){
    ?>
    <header>
        Здравей <a href="userProfil.php"><?=$_SESSION['user_name']?></a><br/>
                <a href="destroy.php">Изход</а>
    </header>
            <div id="shoppingCard"><a href="userMarket.php"><img src="pictures/image.png" id="shoppingCard"/></a><br/>
            <a href="userMarket.php" class="shoppingCardText" id="shoppingCard"/>Пазарска количка</a></div>         
            <a href="form.php" class="nav">Добави нов материал</a>
<?php 
    }
    else if($_SESSION['user/admin']==='admin'):
    ?>
    <header>
        Здравей <?=$_SESSION['user_name']?><br/>
        <a href="destroy.php">Изход</а><br/>
    </header>';
<?php endif;?>
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
    
    <?php
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
        $selectType=$allTypes[$_POST['type']];
        if(isset($_SESSION['user/admin'])){
            drawTable($selectType,$select,$_SESSION['user/admin']);
        }
         else{
             drawTable($selectType,$select,"user"); 
         }      
    }
    ?>    
<input type="text" id="id" class="idNum" name="id"/><br/> 
<?php
include 'includes/footer.php';
?>
