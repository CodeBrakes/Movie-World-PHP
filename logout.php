<?php
session_start();
session_destroy();
unset($_COOKIE['USER_ID']);
unset($_COOKIE['column_to_sort']);
header('Location: index.php');
exit;
?>
