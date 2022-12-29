<?
	$connect = mysqli_connect("127.0.0.1", "root", "", "kickstarter");

	$delete = "DELETE FROM projects WHERE id = {$_GET['id']}";

	$asd = mysqli_query($connect, $delete);

	header("Location: index.php")

?>