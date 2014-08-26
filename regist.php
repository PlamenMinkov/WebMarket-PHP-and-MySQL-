<?php
$pageTitle="Регистрация";
include 'includes/header.php';
?>
<header>
    <a class="centralLink" href="index.php" align="center">Към магазина</a>
</header>
<form method="POST" class="RegIn">
  <div>
    Име:<input type="text" name="username" />
  </div>
  <div>
    Парола:<input type="password" name="pass" />
  </div>
  <div>
    <input type="radio" name="user/admin" value="user">Потребител  
    <input type="radio" name="user/admin" value="admin">Администратор<br/>
    <input type="submit" value="Регистрация" />
  </div>
</form>
<?php 
if($_POST){
    if(isset($_POST['user/admin']))
	{
        $username=trim($_POST['username']);
        $username=mysqli_real_escape_string($connection,$username);// make data save before send query to MySQL
        $pass=trim($_POST['pass']);
        $pass=mysqli_real_escape_string($connection,$pass);
        $userOrAdmin=$_POST['user/admin'];
        $select=mysqli_query($connection,'SELECT * FROM users_data Where `user_name` = "'.$username.'"');
        reg($select,$userOrAdmin,$username,$pass);
    }
    else{
        echo('Изберете вид на регистрацията!');
    }
}
include 'includes/footer.php';
?>