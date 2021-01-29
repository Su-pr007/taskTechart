<?php if(!isset($_GET['id'])) header('Location: /news.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Новость</title>
	<link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="content">
		<?php
			include "connect.php";

			$query = "SELECT * FROM news WHERE `id` = " . $_GET['id'];

			try{
				$result = $connect->query($query)->fetch_assoc();
			}
			catch(Exception $err){
				var_dump($err);
			}
		?>
		<div class="content_block bottom_dotted">
			<h1><?php echo $result['title']  ?></h1>
		</div>

		<div class="content_block bottom_dotted">
			<span><?php echo $result['content']  ?></span>
		</div>
		
		<div class="content_block">
			<a href="javascript:history.back()">Все новости >></a>
		</div>

		<script>
			document.querySelector('title').innerHTML = "<?php echo $result['title'] ?>";
		</script>

	</div>
	
</body>
</html>