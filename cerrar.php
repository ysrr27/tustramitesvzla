<?php 
session_start();
session_unset();
session_destroy();
echo "<script language='JavaScript'>document.location.href='".$_SERVER['HTTP_REFERER']."';</script>";
?> 
 