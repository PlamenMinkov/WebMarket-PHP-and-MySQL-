<?php
function reg($select,$textForMistace,$userOrAdmin,$username,$pass,$connection){
    $count=0;
    if($select->num_rows>0){
            echo $textForMistace;
    }
        else{
            echo 'Успешна регистрация<a href="logIn.php">Влезте в профила си</a><br/>';
           
            $ins='INSERT INTO `users_data`(`user_name`, `user_pass`,`user/admin`)
                    VALUES ("'.$username.'","'.$pass.'","'.$userOrAdmin.'")';
            $q=mysqli_query($connection,$ins);
            //header('Location:logIn.php');
        } 
}
?>