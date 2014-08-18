<?php
$pageTitle="Регистрация";
include 'includes/header.php';
include 'includes/registrationFun.php';
echo '<header><a href="index.php" align="center">Към магазина</a></header>';
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
?>
<form method="POST" class="RegIn">
  <div>
    Име:<input type="text" name="username" />
  </div>
  <div>
    Парола:<input type="password" name="pass" />
  </div>
<?php
            
if($_POST)
	{
            $username=trim($_POST['username']);
            $username=mysqli_real_escape_string($connection,$username);
            $pass=trim($_POST['pass']);
            $pass=mysqli_real_escape_string($connection,$pass);
            $userOrAdmin='user';
            $select=mysqli_query($connection,'SELECT * FROM users_data Where `user_name` = "'.$username.'" AND `user/admin` = "user"');
            $textForMistace='Заето потребителско име!';
            reg($select,$textForMistace,$userOrAdmin,$username,$pass,$connection);
    }
?>
  <div>
    <input type="submit" value="Регистрация" />
    <a href="RegAdmin.php">Регистрация като администратор</a>
  </div>
</form>

<?php   
include 'includes/footer.php';
?>