<?php
session_start();
mb_internal_encoding('UTF-8');
session_destroy();
header('Location:index.php');
exit;
?>