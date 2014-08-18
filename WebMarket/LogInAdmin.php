<?php
mb_internal_encoding('UTF-8');
$pageTitle = 'Вход';
include 'includes/header.php';

if($_POST)
	{
            $adminname=trim($_POST['adminname']);
                $adminname=mysqli_real_escape_string($connection,$adminname);
		$pass=trim($_POST['pass']);
                $pass=mysqli_real_escape_string($connection,$pass);
                $test=0;
                $select=mysqli_query($connection,'SELECT * FROM admin');
             while ($row=$select->fetch_assoc()){
                if($row['admin_name']===$adminname&&$row['admin_pass']===$pass){
                    $test=1;
                    header('Location:homePage.php');
                }
            }
            if($test==0)
                {
                        echo 'Грешно администратоско име или парола!';
                }
        }

?>
<form method="POST">
  <div>
    Име:<input type="text" name="adminname" />
  </div>
  <div>
    Парола:<input type="password" name="pass" />
  </div>
  <div>
      <input type="submit" value="Влезте" />
  </div>
</form>

<?php
include 'includes/footer.php';
}
?>