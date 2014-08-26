<?php
function drawTable($selType,$select,$us){
$allPrice=0.00;        
    while($row=$select->fetch_assoc()):

        if($row['product_stock']==='true'):

            if($selType==='Всички'||$row['product_type']===$selType){
            ?>
              <tr>
                <td><?=$row['data']?></td>
                <td><?=$row['product_name']?></td>
            <?php
               if(isset($_SESSION['user/admin'])&&$us==="admin"){
               ?>                         
                <td>
                    <a href="includes/repair.php?id='.$row['product_id'].'"><?=$row['product_price']?></a>
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
                          <a href="pictures/'.$row['product_id'].'.jpg" class="highslide" onclick="return hs.expand(this)">
                            <p>Изображение</p>
                          </a>
                      </div>
                   </td>
                  <?php
                if(isset($_SESSION['user/admin'])){
                    if($us==="admin"){
                        ?>
                        <td>
                            <a href="includes/delete.php?id='<?=$row['product_id']?>'">Изтрии</a>
                        </td>
              </tr>
                <?php
                     }
                     else if($us==="user"){
                        ?>
                        <td>
                            <a href="#" id="'.$row['product_id'].'" class="buyPr">Купи</a>
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
<?php  
}
?>