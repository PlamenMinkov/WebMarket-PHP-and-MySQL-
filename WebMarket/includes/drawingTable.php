<script language="javascript">
function deleteme(delid) 
{
        window.location.href='delete.php?del_id='+delid+'';
        return true;
}
</script>
<?php
function drawTable($selType,$select,$us){
$allPrice=0.00;        
    while($row=$select->fetch_assoc()){
        
        if($row['product_stock']==='true'){
            if($selType==='Всички'){
                echo '<tr>
                            <td>'.$row['data'].'</td>
                            <td>'.$row['product_name'].'</td>';
               if(isset($_SESSION['user/admin'])&&$us==="admin"){
                                        
                                        echo '<td><a href="includes/repair.php?id='.$row['product_id'].'">'.$row['product_price'].'</a></td>';
                                        
               }
                                        else{
                                            echo ' <td>'.$row['product_price'].'</td>';
                                        }
                                        echo '<td>'.$row['product_type'].'</td>
                            <td>'.$row['product_id'].'</td>
                            <td><div><a href="pictures/'.$row['product_id'].'.jpg" class="highslide" onclick="return hs.expand(this)">
                                    <p>Изображение</p>
                                </a></div>
                                </td>';
                                if(isset($_SESSION['user/admin'])){
                                        if($us==="admin"){
                                        echo '<td><a href="includes/delete.php?id='.$row['product_id'].'">Изтрии</a></td></tr>';
                                        }
                                        else if($us==="user"){
                                          echo '<td><a href="#" id="'.$row['product_id'].'" class="buyPr">Купи</a></td></tr>';  
                                    }
                                }
                                else{
                                    echo '</tr>';
                                }
                        
                $allPrice+=$row['product_price'];
            }
            else{
                if($row['product_type']===$selType){
                    echo '<tr >
                                <td>'.$row['data'].'</td>
                                <td>'.$row['product_name'].'</td>';
                    if(isset($_SESSION['user/admin'])){
                                        echo '<td><a href="includes/repair.php?id='.$row['product_id'].'"><td>'.$row['product_price'].'</a></td>';
                                        }
                                        else{
                                            echo ' <td>'.$row['product_price'].'</td>';
                                        }
                                        echo '<td>'.$row['product_type'].'</td>
                                <td>'.$row['product_id'].'</td>
                                <td><div><a href="pictures/'.$row['product_id'].'.jpg" class="highslide" onclick="return hs.expand(this)">
                                        <p>Изображение</p>
                                    </a></div>
                                    </td>';
                                
                                    if(isset($_SESSION['user/admin'])){
                                        if($us==="admin"){
                                        echo '<td><a href="includes/delete.php?id='.$row['product_id'].'">Изтрии</a></td></tr>';
                                        }
                                        else if($us==="user"){
                                          echo '<td><a href="#" id="'.$row['product_id'].'" class="buyPr">Купи</a></td></tr>';  
                                    }
                                }
                                else{
                                    echo '</tr>';
                                }
                            
                    $allPrice+=$row['product_price'];
                }
            }
        }
    }
        echo '<tr>
                <td>----</td>
                <td>----</td>
                <td>'.$allPrice.'</td>
                <td>----</td>
                <td>----</td>
                <td>----</td>
            </tr>';
    
}
?>