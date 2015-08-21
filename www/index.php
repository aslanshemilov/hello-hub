<html>
<head>
	<title>Hello Docker Hub Automated Builds!</title>
	<style>
	body {
		background-color: white;
		text-align: center;
		padding: 75px;
		font-family: "Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif;
	}

	#logo {
		margin-bottom: 50px;
	}
	</style>
</head>
<body>
	<img id="logo" src="docker-logo.png" />
	<h1><?php echo "Hello Docker Hub Automated Builds!"; ?></h1>
	<?php if($_ENV["HOSTNAME"]) {?><h3>My hostname is <?php echo $_ENV["HOSTNAME"]; ?></h3><?php } ?>
	<?php
	$links = [];
	foreach($_ENV as $key => $value) {
		if(preg_match("/^(.*)_PORT_([0-9]*)_(TCP|UDP)$/", $key, $matches)) {
			$links[] = [
				"name" => $matches[1],
				"port" => $matches[2],
				"proto" => $matches[3],
				"value" => $value
			];
		}
	}
	if($links) {
	?>
		<h3>Links found</h3>
		<?php
		foreach($links as $link) {
			?>
			<b><?php echo $link["name"]; ?></b> listening in <?php echo $link["port"]+"/"+$link["proto"]; ?> available at <?php echo $link["value"]; ?><br />
			<?php
		}
		?>
	<?php
	}

	if($_ENV["TUTUM_AUTH"]) {
		?>
		<h3>I have Tutum API powers!</h3>
		<?php
	}
	?>
</body>
</html>
