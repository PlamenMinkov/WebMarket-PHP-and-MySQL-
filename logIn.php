<?php
$pageTitle = 'Вход';
include 'includes/header.php';
if($_POST)
	{
        $username=trim($_POST['username']);
        $username=mysqli_real_escape_string($connection,$username);
	    $pass=trim($_POST['pass']);
        $pass=mysqli_real_escape_string($connection,$pass);
        logIn($username, $pass);
    }
?>
<header>
    <a class="centralLink" href="index.php" align="center">Към магазина</a>
</header>
<form method="POST" class="RegIn">
  <div>
    Име:<input type="text" id="username" name="username" />
  </div>
  <div>
    Парола:<input type="password" id="pass" name="pass" />
  </div>
  <div>
      <input type="submit" id="logIn" value="Влезте" /><a href="Reg.php">Регистрация</a>
  </div>
</form>

<?php
include 'includes/footer.php';
?>