<?

	$con = mysqli_connect('127.0.0.1','root', '', 'kickstarter');

	$select = "UPDATE project SET name = '{$_GET['title']}', text = '{$_GET['text']}' goal = '{$_GET['goal']}' donated = '{$_GET['donated']}' img = '{$_GET['img']}' WHERE id = '{$_GET['id']}'";
	
	$results = mysqli_query($con, $select);

	header("Location: index.php")

?>