<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<!--script type="text/javascript" src="k-tour.js"></script-->

		<link rel="stylesheet" type="text/css" href="style.css"/>
		<title>Knight' Tour	</title>
	</head>
	<body>
		<header id="page_header">
			<div id="top_title"> Knight's Tour</div>
		</header>
		<section id="posts">
			<article>
				<form action="solver.php" method="POST" enctype="multipart/form-data">
					<p>Enter a positive number:</p>
					<!--input type="number" name="size" min="4" value='4' /-->
					<!--input type="file" id="fileinput" /-->
					<input type="file" name="input" />
					<input type="submit" name="Generate" value="Generate Solution">
				</form>
				<p>Output:</p><div id="stage"></div>
			</article>
		</section>
		<footer id="page_footer">Añonuevo, Gladdys M. <br/>Bael, Claudine P. <br/>Veluz, Rizianne C.<br/>CMSC 142 C-4L</footer>
	</body> 
</html>