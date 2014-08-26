<?php
$connection=mysqli_connect('localhost','minkov.plamen','qwerty','bit_market');
               
              if(isset($_GET['id'])) {  
              $del=mysqli_query($connection,'DELETE FROM products WHERE product_id ="'.$_GET['id'].'" ');
              unlink('../pictures/'.$id.'.jpg');
                   
                if(!$del){
                            echo 'Не съществува продукт, с това ID!';
                    }
                    else{
                        echo 'Успешно изтриване';
                    }
                }
                header("location: ../index.php");
mysqli_close($connection);