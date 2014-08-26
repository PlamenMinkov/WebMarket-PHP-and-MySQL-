<?php
include 'includes/header.php';
header('Content-type:application/json');
$test=0;
        $select=mysqli_query($connection,'SELECT * FROM products');
        while ($row=$select->fetch_assoc()){
			if($row['product_id']===$_POST['val1']){
				$test=1;
				$_SESSION['marketCar'][$_POST['val2']]=array(
				'data'=>$row['data'],
				'product_name'=>$row['product_name'],
				'product_price'=>$row['product_price'],
				'product_type'=>$row['product_type'],
				'product_id'=>$row['product_id']
				);
				$_POST['val2']+=1;
				$_POST['val3']= $row['product_name'];
			}
            if($test==0){
			$_POST['val3']= 'Не съществува продукт, с това ID!';
            }
        $res=array('count'=>$_POST['val2'],'text'=>$_POST['val3']);
        echo json_encode($res);