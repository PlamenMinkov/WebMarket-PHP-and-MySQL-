<?php
//function for registration
    function reg($select,$userOrAdmin,$username,$pass){
        $count=0;
        if($select->num_rows>0){
            echo('Заето потребителско име!');
            return 0;
        }
        else{
            $ins='INSERT INTO `users_data`(`user_name`, `user_pass`,`user/admin`)
                  VALUES ("'.$username.'","'.$pass.'","'.$userOrAdmin.'")';
            $q=mysqli_query($GLOBALS['connection'],$ins);
            logIn($username,$pass);
        } 
    }
//function for login
    function logIn($user_name,$pass){
        $select=mysqli_query($GLOBALS['connection'],'SELECT * FROM users_data Where `user_name` = "'.$user_name.'" AND `user_pass`="'.$pass.'"');
        if($select->num_rows>0){
            $row=$select->fetch_assoc();
            header('Location:index.php');
            $_SESSION['user_name']=$row["user_name"];
            $_SESSION['user_pass']=$row["user_pass"];
            $_SESSION['user_id']=$row['user_id'];
            $_SESSION['user/admin']=$row['user/admin'];
        }
        else {
            echo '<p class="RegIn">Невалидно име или парола!</p>';
        }
    }
//function for logout
    function destroy(){
        session_destroy();
        header('Location:index.php');
    }
//Function for drawing a table ih home page
    function drawTable($selType,$select,$user){
        ?>
        <table border="1" class="centralForm" id="textCenter">
                <tr >
                    <td>Дата</td>
                    <td>Име</td>
                    <td>Сума</td>
                    <td>Вид</td>
                    <td>Id</td>
                    <td>Изображение</td>
                </tr>
        <?php
        $allPrice=0.00;        
        while($row=$select->fetch_assoc()):

            if($row['product_stock']==='true'):

                if($selType==='Всички'||$row['product_type']===$selType){
                  ?>
                  <tr>
                    <td><?=$row['data']?></td>
                    <td><?=$row['product_name']?></td>
                <?php
                    if(isset($_SESSION['user/admin'])&&$user==="admin"){
                ?>                         
                    <td>
                        <a href="includes/repairPrice.php?id=<?=$row['product_id']?>"><?=$row['product_price']?></a>
                    </td>';
                   <?php                        
                    }
                    else{
                   ?>
                        <td><?=$row['product_price']?></td>
                    <?php
                    }?>
                      <td><?=$row['product_type']?></td>
                      <td><?=$row['product_id']?></td>
                      <td>
                          <div>
                              <a href="pictures/<?=$row['product_id']?>.jpg" class="highslide" onclick="return hs.expand(this)">
                                <p>Изображение</p>
                              </a>
                          </div>
                       </td>
                      <?php
                    if(isset($_SESSION['user/admin'])){
                        if($user==="admin"){
                      ?>
                            <td>
                                <a href="includes/deleteProduct.php?id=<?=$row['product_id']?>">Изтрии</a>
                            </td>
                  </tr>
                    <?php
                        }
                        else if($user==="user"){
                    ?>
                            <td>
                                <a href="#" id="<?=$row['product_id']?>" class="buyPr">Купи</a>
                            </td>
                 </tr>
                           <?php     
                        }
                    }
                    else{
                           ?>
                 </tr>
                      <?php
                    }                        
                    $allPrice+=$row['product_price'];
                }
            endif;
        endwhile;
                      ?>
         <tr>
            <td>----</td>
            <td>----</td>
            <td><?=$allPrice?></td>
            <td>----</td>
            <td>----</td>
            <td>----</td>
        </tr>
    </table>
    <?php  
    }
?>