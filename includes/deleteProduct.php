<?php
include 'header.php';
               
              if(isset($_GET['id'])) {  
              $del=mysqli_query($connection,'DELETE FROM products WHERE product_id ="'.$_GET['id'].'" ');
              unlink('../pictures/'.$_GET['id'].'.jpg');
                   
                if(!$del){
                            echo 'Не съществува продукт, с това ID!';
                    }
                    else{
                        echo 'Успешно изтриване';
                    }
                }
                header("location: ../index.php");
mysqli_close($connection);