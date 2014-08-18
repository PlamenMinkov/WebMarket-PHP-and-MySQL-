<?php
header('Content-type:application/json');
        echo json_encode($_SESSION['val1']);
//$connection=mysqli_connect('localhost','minkov.plamen','qwerty','bit_market');
//                mysqli_query($connection,'SET NAMES utf8');
//                mb_internal_encoding('UTF-8');
//
//    if ($_POST['val3']==='admin'){
//                $userOrAdmin='admin';
//                $select=mysqli_query($connection,'SELECT * FROM users_data Where `user_name` = "'.$_POST['val1'].'" AND `user/admin` = "admin"');
//                logIn($select, $userOrAdmin, $_POST['val1'],$_POST['val2']);
//                
//            }
//
//            
//        
//        else{
//                $select=mysqli_query($connection,'SELECT * FROM users_data Where `user_name` = "'.$_POST['val1'].'" AND `user/admin` = "user"');
//                $userOrAdmin='user';
//                logIn($select, $userOrAdmin, $_POST['val1'], $_POST['val2']);
//                }
////        }
//?>
//<?php
//function logIn($select,$userOrAdmin,$username,$pass){
//    if($select->num_rows>0){
//                        $test=1;
//                        //header('Location:homePage.php');
//                        $_SESSION['user/admin']=$userOrAdmin;
//                        $_SESSION['user_name']=$username;
//                        $_SESSION['user_pass']=$pass;
//                        echo json_encode('Здравей '.$username);
//                        exit();
//                    }
//    else {
//        echo json_encode('Неправилно име или парола!');
//    }
//}?>