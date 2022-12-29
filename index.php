<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<?
		//1 аргумент это айпи адрес БД в ковычках!!!
		//2 имя пользователя
		//3 пароль
		//4 имя БД
		$connect = mysqli_connect("127.0.0.1", "root", "", "kickstarter");
		if($connect==false){
			echo "не подключено";
		} else {
			echo "подключено";
		}

		$textQuery = 'SELECT * FROM  projects';

		$query = mysqli_query($connect, $textQuery);

		if($query==false){
			echo '/запрос не работает';
		} else {
			echo '/запрос работает';
		}


		$select_trends = "SELECT * FROM projects";
		$result_trends = mysqli_query($connect, $select_trends);
	?>

	<style>

		html{

			height:100%;

		}

		body{
			height:100%;
		}

		
		.title{
			font-family:Arial;
			font-size:90px
		}

	</style>


</head>


<body class="text-light bg-dark" style="background-attachment:fixed">
<!--top-->
<div class="col-12 py-3">

	<div class="d-flex">

		<div class="col-2 pt-3">
			<a href="" class="text-light ms-3">О компании</a>
			<a href="" class="text-light ms-3">Все проекты</a>
		</div>

		<div class="col-8 text-center">
			<h1 class="fw-bold">Donate.yes</h1>
			<p>Донатная платформа для любых проектов</p>
		</div>


			<div class="col-2 text-left pt-3">

				<form method="GET" action="add.php">

					<p> Добавить проект> </p>
					<input type="text" name="title" placeholder="title">
					<input type="text" name="text" placeholder="text">
					<input type="text" name="goal" placeholder="goal">
					<input type="text" name="donated" placeholder="donated">
					<input type="file" name="img">
					<button class="btn btn-success" type="submit">выложить</button>

				</form>

			</div>

	</div>

</div>

<div class="col-12" style='overflow:hidden'>
	
	<div class="d-flex mt-5 col-10 mx-auto">

		<div class="col-6 py-5 mt-5" >
			<h1 class="title">Свой слоган</h1>
		</div>

		<div class="col-6">
            <!--картинка-->
		</div>

	</div>

	<div class="d-flex mt-2 flex-wrap">

		<?

		for($i=0; $i < 6; $i++){
		$result = $query->fetch_assoc();

		?>
		<!--карточка проекта-->
		
		<div class="col-4 p-3 text-dark mt-2" >

			<div class="col-12 bg-light rounded p-3" >

				<!--вывод-->

				<div>
					<div><img class="w-100" src="<? echo $result['img'] ?>"></div>
					<h3><? echo $result['title'] ?></h3>
					<p><? echo $result['text'] ?></p>
					<p> <span class="fw-bold"> Всего собрать: </span> <? echo $result['goal'] ?> руб.</p>
					<p><span class="fw-bold"> Собрано: </span> <? echo $result['donated'] ?> руб.</p>
					<button class="btn btn-success">Поддержать проект</button>
				</div>


				<!--удалить-->
				<form action="deleteProject.php" method="GET">
					<input type="text" name="id" placeholder="Введите id" class="form-control" hidden value="<? echo $result['id'] ?>">
					<button class="btn btn-danger mt-2">Удалить </button>
					<img src="delete_icon.png" alt="">
				</form>


				<!--изменить-->
				<div style="margin-top: 10px;">

					<div  class="sheep" style="display: none">

						<form action="update.php" method="GET">

							<div><input type="file" name="img"></div>

							<h3>
								<input type="" name="title" placeholder="title">
							</h3>

							<input name="text" placeholder="text">

							<input type="text" name="id" placeholder="Введите id" class="form-control" hidden value="<? echo $result['id'] ?>">

							<button class="btn btn-success">изменить</button>

						</form>

					</div>

					<button class="btn button btn-success">редактировать</button>

				</div>


			</div>

		</div>	

		<?
			}
		?>
    	
	</div>

</div>

<script type="text/javascript">
							
	let button = document.querySelectorAll(".button");
	let sheep = document.querySelectorAll(".sheep");

	for (let i=0; i<button.length; i++) {
			
		button[i].onclick = function() {
		sheep[i].style.display = "block";
		button[i].style.display = "none";
	}}

	</script>
</body>
</html>