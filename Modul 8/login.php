<?php
	session_start();
	error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
	$conn=mysqli_connect('localhost', 'root', '');
	mysqli_select_db($conn, 'informatika');
	$username = $_POST['username'];
	$password = $_POST['password'];
	$submit = $_POST['submit'];

	if($submit){
		$sql = "SELECT * FROM user WHERE Username='$username' AND Password='$password' ";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query);

		if ($row['Username'] != ""){
			//berhasil login
			$_SESSION['username'] = $row['Username'];
			$_SESSION['status'] = $row['Status'];

			if ($row['Status']== "Administrator") {
?>
				<script>
					alert('Anda login sebagai Admin');
					document.location='admin.php';
				</script>
<?php
			} else {
?>
			<script language script="JavaScript">
				alert('Anda Login Sebagai <?php echo $row['Username']; ?>');
				document.location = 'hasillogin.php';
			</script>

<?php
			}
		} else {
			//gagal login
?>
			<script language script="JavaScript">
				alert('Gagal Login');
				document.location='login.php';
			</script>
<?php
		}
	}
?>
<form method='post' action='login.php'>
	<p align='center'>
		Username : <input type='text' name='username'><br>
		Password : <input type ='password' name='password'><br>
		<input type='submit' name='submit'>
	</p>
</form>