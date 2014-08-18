<?php
session_start();
$connection=mysqli_connect('localhost','plamen.minkov','qwerty','bit_market');
mysqli_query($connection,'SET NAMES utf8');
mb_internal_encoding('UTF-8');
if(!$connection){
    echo 'Сриване на системата!!!';
    exit();
}
$username;
$types = array(1=>'Храна', 2=>'Транспорт',
    3=>'Други', 4=>'Дрехи');
$allTypes = array(0=>'Всички',1=>'Храна', 2=>'Транспорт',
    3=>'Други', 4=>'Дрехи');

?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= $pageTitle;?></title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="Ajax/buy-Ajax.js"></script>
<script src="Ajax/deleteProduct.js"></script>
<script type="text/javascript" src="highslide/highslide.js"></script>
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
<script language="javascript">
function deleteme(delid) 
{
        window.location.href='delete.php?del_id='+delid+'';
        return true;
}
</script>
<script type="text/javascript">
//<![CDATA[
hs.registerOverlay({
	html: '<div class="closebutton" onclick="return hs.close(this)" title="Close"></div>',
	position: 'top right',
	fade: 2 // fading the semi-transparent overlay looks bad in IE
});


hs.graphicsDir = 'highslide/graphics/';
hs.wrapperClassName = 'borderless';
//]]>
</script>
    </head>
    <body>
        <section id="all">