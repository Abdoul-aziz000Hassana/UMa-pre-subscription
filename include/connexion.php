<?php

$connect = mysqli_connect("localhost","root","") or die(mysql_error());
mysqli_select_db($connect, 'preinscriptionDB') or die(mysql_error());
