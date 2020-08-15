<?php
session_start();
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];
?>
<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Hyperspace by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
<body class="is-preload">
<div id="wrapper">
<?php if (!isset($_SESSION["loggedin"])) { ?>
<section class="wrapper style1 fade-up">
	<div class="inner">
		<h2>Enter your credentials</h2>
		<div class="split style1">
			<section>
				<form method="post" action="login.php">
					<div class="fields">
						<div class="field half">
							<label for="name">Username</label>
							<input type="text" name="name" id="name" />
						</div>
						<div class="field half">
							<label for="email">Password</label>
							<input type="password" name="password" id="email" />
							<input type="hidden" name="csrf-token" value="<?php echo $token; ?>" />
						</div>
					</div>
					<ul class="actions">
						<li><a href="" class="button submit">Log in</a></li>
					</ul>
				</form>
			</section>
			<section>
				<ul class="contact">
					<li>
						<h3>Please Subscribe :)</h3>
					</li>
					<li>
						<ul class="icons">
							<li><a href="https://www.youtube.com/channel/UC-25w90rE_BOXGouPU6r8cw/videos?view_as=subscriber" class="icon brands fa-youtube"><span class="label">Youtube</span></a></li>
							<li><a href="https://twitter.com/lv_linkers" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="https://medium.com/@raimonds_29140" class="icon brands fa-medium"><span class="label">Medium</span></a></li>
							<li><a href="https://reallinkers.github.io" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
						</ul>
					</li>
				</ul>
			</section>
		</div>
	</div>
</section>
<?php } else if ($_SESSION["loggedin"] === "true") { ?>
<!-- Upload form -->
<section class="wrapper style2 fade-up">
	<div class="inner">
		<h2>Upload your file</h2>
		<div class="split style1">
			<section>
				<form action="upload.php" method="post" enctype="multipart/form-data">
					<div class="fields">
						<div class="field half">
							<label for="name">Select file:</label>
							<input type="file" name="fileToUpload" id="fileToUpload">
						</div>
					</div>
					<ul class="actions">
						<li><a href="" class="button submit">Upload</a></li>
					</ul>
				</form>
			</section>
			<section>
				<ul class="contact">
					<li>
						<h3>Please Subscribe :)</h3>
					</li>
					<li>
						<ul class="icons">
							<li><a href="https://www.youtube.com/channel/UC-25w90rE_BOXGouPU6r8cw/videos?view_as=subscriber" class="icon brands fa-youtube"><span class="label">Youtube</span></a></li>
							<li><a href="https://twitter.com/lv_linkers" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="https://medium.com/@raimonds_29140" class="icon brands fa-medium"><span class="label">Medium</span></a></li>
							<li><a href="https://reallinkers.github.io" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
						</ul>
					</li>
				</ul>
			</section>
		</div>
	</div>
</section>
<?php }?>

		<!-- Footer -->
			<footer id="footer" class="wrapper style1-alt">
				<div class="inner">
					<ul class="menu">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
</body>
</html>