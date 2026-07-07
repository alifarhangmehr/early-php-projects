<?php

session_start(); 
unset($HTTP_SESSION_VARS);
session_destroy();
echo'
<script type="text/javascript" language="javascript">
<!--
window.location = "index.php"
//-->
</script>';

?> 