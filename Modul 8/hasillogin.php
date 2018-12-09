<?php
session_start();
echo "Anda Berhasil login Sebagai ".$_SESSION['username']."Dan Anda terdaftar Sebagai ".$_SESSION['status'];
?>
<br>
Silakan Logout dengan klik <a href='logout.php'> Disini </a>
