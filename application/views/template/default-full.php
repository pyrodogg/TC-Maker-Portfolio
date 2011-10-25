<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<!--<meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1" />-->
	
	<title><?=$title;?></title>
	<meta name="author" content="Skyler Kehren" />
	<meta name="description" content="<?=$description;?>" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="shortcut icon" type="image/gif" href="http://www.pyrodogg.com/favicon.gif" />

	<?php foreach($styles as $file => $type) echo HTML::style($file, array('media'=>$type)), "\n" ?>
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!--[if IE 7]>
			<link rel="stylesheet" href="css/ie.css">
			<link rel="stylesheet" href="css/ie7.css">
	<![endif]-->
	
	<?php foreach($scripts as $file) echo HTML::script($file), "\n"?>
</head>
<body class="no-js">
	<script>
		var el = document.getElementsByTagName("body")[0];
		el.className = "";
	</script>
	<noscript>
		<!--[if IE]>
			<link rel="stylesheet" href="css/ie.css">
		<![endif-->
	</noscript>
<div id="wrap" class="container_12">
	<header>
		<?=$header;?>
	</header>
	
	<nav id="topNav">
		<?php print $topNav;?>
	</nav>
	
	<div id="main_content" class="grid_12 alpha">
		<div id="content">
			<?=$content;?>
		</div>
	</div>
</div>
<footer class="container_12">
	<?=$footer;?>
</footer>
	<!--<script>
		var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']]; // Change UA-XXXXX-X to be your site's ID
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>-->
</body>
</html>
