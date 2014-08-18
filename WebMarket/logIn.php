<?php
mb_internal_encoding('UTF-8');
$pageTitle = 'Вход';
include 'includes/header.php';
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
if($_POST)
	{
        $username=trim($_POST['username']);
        $username=mysqli_real_escape_string($connection,$username);
	$pass=trim($_POST['pass']);
        $pass=mysqli_real_escape_string($connection,$pass);
    if (isset($_POST['mycheckbox'])){
                $userOrAdmin='admin';
                $select=mysqli_query($connection,'SELECT * FROM users_data Where `user_name` = "'.$username.'" AND `user/admin` = "admin" '
                        . 'AND `user_pass`="'.$pass.'"');
                $row=$select->fetch_assoc();
                logIn($select, $userOrAdmin, $username, $pass,$row['user_id']);
                
            }

            
        
        else{
                $select=mysqli_query($connection,'SELECT * FROM users_data Where `user_name` = "'.$username.'" AND `user/admin` = "user" '
                        . 'AND `user_pass`="'.$pass.'"');
                $userOrAdmin='user';
                $row=$select->fetch_assoc();
                logIn($select, $userOrAdmin, $username, $pass,$row['user_id']);
                }
        }
?>
<?php
function logIn($select,$userOrAdmin,$username,$pass,$user_id){
    if($select->num_rows>0){
                        $test=1;
                        header('Location:index.php');
                        $_SESSION['user/admin']=$userOrAdmin;
                        $_SESSION['user_name']=$username;
                        $_SESSION['user_pass']=$pass;
                        $_SESSION['user_id']=$user_id;
                        echo 'Здравей '.$username;
                        exit();
                    }
    else {
        echo '<p class="RegIn">Неправилно име или парола!</p>';
    }
}?>
<form method="POST" class="RegIn">
  <div>
    Име:<input type="text" id="username" name="username" />
  </div>
  <div>
    Парола:<input type="password" id="pass" name="pass" />
  </div>
  <div>
      <input type="submit" id="logIn" value="Влезте" /><input type="checkbox" name="mycheckbox">Влез като администратор</input><a href="Reg.php">Регистрация</a>
  </div>
</form>

<?php
include 'includes/footer.php';
?>