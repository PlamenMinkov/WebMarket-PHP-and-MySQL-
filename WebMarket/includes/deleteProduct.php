<?php

     $id=$_POST['val2'];
               $connection=mysqli_connect('localhost','minkov.plamen','qwerty','bit_market');
               
                
              $del=mysqli_query($connection,'DELETE FROM products WHERE product_id ="'.$id.'" ');
              unlink('../pictures/'.$id.'.jpg');
                   
                if(!$del){
                            echo 'Не съществува продукт, с това ID!';
                    }
                    else{
                        echo 'Успешно изтриване';
                    }
mysqli_close($connection);
