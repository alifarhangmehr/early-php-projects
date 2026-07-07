<?php

session_start(); 
unset($HTTP_SESSION_VARS);
session_destroy();
header( 'Location: index.php' );

?> 