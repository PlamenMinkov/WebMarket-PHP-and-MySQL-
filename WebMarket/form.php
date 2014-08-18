<?php
$pageTitle = 'Форма';
include 'includes/header.php';
echo '<style>
            aside#right{
                float:right;
                margin-top: -140px;
                margin-right: 3%;
            }
            aside#left{
            float:left;
                margin-top: -140px;
                margin-left: 3%;
            }
            </style>';
if ($_POST) {
    $name = trim($_POST['name']);
    $name = mysqli_real_escape_string($connection, $name);
    $price = trim($_POST['price']);
    $price = mysqli_real_escape_string($connection, $price);
    $typeOfObj = $_POST['type'];
    $selectedType = $types[$_POST['type']];

    $error = false;
    if (mb_strlen($name) < 2) {
        echo '<p class="RegIn">Името на продукта е прекалено късо</p>';
        $error = true;
    }

    if ($price <= 0) {
        echo '<p class="RegIn">невалидна цена</p>';
        $error = true;
    }
    if (!array_key_exists($typeOfObj, $types)) {
        echo '<p class="RegIn">невалидна група</p>';
        $error = true;
    }
   
    $date = date("Y.n.j H:i:s");
    if (!$error) {
        $ins = 'INSERT INTO `products`(`product_name`, `product_price`,`data`,`product_type`,`product_stock`)
                  VALUES ("' . $name . '","' . $price . '","' . $date . '","' . $selectedType . '","true")';
        $q = mysqli_query($connection, $ins);
        echo '<p class="RegIn">Записът е успешен</p>';
    }
    if (count($_FILES) > 0) {
        $select = mysqli_query($connection, 'SELECT * FROM products WHERE product_price="' . $price . '" '
                . 'AND product_name="' . $name . '" AND data="' . $date . '"');
        $row = $select->fetch_assoc();
        $picName = $row['product_id'] . ".jpg";
        if (move_uploaded_file($_FILES['picture']['tmp_name'], 'pictures' . DIRECTORY_SEPARATOR . $picName)) {
//            echo 'Файла е качен успешно';
        } 
        else {
            echo '<p class="RegIn">Грешка</p>';
        }
    }
}
?>
<header><a href="index.php" align="center">Към магазина</a></header>
<form method="POST" enctype="multipart/form-data" class="RegIn">
    <div>Име:<input type="text" name="name" /></div>
    <div>Сума:<input type="text" name="price" /></div>
    <div>
        Снимка:<input type="file" name="picture" />
    </div>
    <div>
        <select name="type">
            <?php
            foreach ($types as $key => $value) {
                echo '<option value="' . $key . '">' . $value .
                '</option>';
            }
            ?>
        </select>           
    </div>        
    <div><input type="submit" value="Добави" /></div>
</form>
<?php
include 'includes/footer.php';
?>