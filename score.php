<?php
	$p = $_POST;
	if($p["name"] == "" ||
		$p["site"] == "" ||
		$p["styl"] == "" ||
		$p["proc"] == "" ||
		$p["mark"] == "" ||
		$p["rege"] == "")
		header("Location: quiz.html");
	function correct($que,$ans) {
		global $p,$score;
		if(strtolower($p[$que]) == $ans) {
			$score += 20;
			return "green";
		} else
			return "red";
	}
	$score = 0;
	$site = "<span style='color:" . correct('site','programath') . "'>" . $p['site'] . "</span>";
	$styl = "<span style='color:" . correct('styl','css') . "'>" . $p['styl'] . "</span>";
	$proc = "<span style='color:" . correct('proc','js') . "'>" . $p['proc'] . "</span>";
	$mark = "<span style='color:" . correct('mark','html') . "'>" . $p['mark'] . "</span>";
	$rege = "<span style='color:" . correct('rege','match') . "'>" . $p['rege'] . "</span>";
	$con = mysqli_connect("fdb7.biz.nf","1672895_quiz","qwerty123++","1672895_quiz");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	/*$sql = "CREATE TABLE res(name CHAR(30),PRIMARY KEY(name),site CHAR(30),styl CHAR(30),proc CHAR(30),mark CHAR(30),rege CHAR(30),res INT)";
	if (mysqli_query($con,$sql)) {
		echo "Table res created successfully";
	} else {
		echo "Error creating table: " . mysqli_error($con);
	}*/
	mysqli_query($con,"INSERT INTO res (name,site,styl,proc,mark,rege,res) VALUES ('" . $p['name'] . "','" . strtolower($p['site']) . "','" . strtolower($p['styl']) . "','" . strtolower($p['proc']) . "','" . strtolower($p['mark']) . "','" . strtolower($p['rege']) . "'," . strtolower($score) . ")");
?>
<!doctype html>
<html>
<head>
	<title>PrograMath-Score</title>
	<style>
		@font-face {
			font-family: colab;
			src: url("colab.otf");
		}
		* {
			margin: 0;
			padding: 0;
			font-family: colab;
		}
		body {
			padding: 20px 50px;
		}
		#codeLink {
			display: block;
			width: 100px;
			text-align: right;
			position: absolute;
			top: 40px;
			right: 50px;
		}
		h1 {
			margin-bottom: 10px;
		}
		hr {
			border: none;
			background-color: black;
			height: 1px;
			margin: 10px 0;
		}
		li {
			margin: 10px auto;
		}
		ol {
			margin-left: 20px;
		}
	</style>
	<link href="favicon.ico" rel="icon" type="image/x-icon" />
</head>
<body>
	<h1>Quiz on PrograMath</h1>
	<a id="codeLink" href="code.html" title="Code">Back to Code</a>
	<p><?php echo $_POST["name"] ?>, here is the score of your quiz: <?php echo $score ?>/100.</p>
	<hr />
	<ol>
		<li>What is the name of this website? <?php echo $site ?></li>
		<li>Which of the languages used on this site does the styling? <?php echo $styl ?></li>
		<li>Which of the languages used on this site does the processing? <?php echo $proc ?></li>
		<li>Which of the languages used on this site is a markup language? <?php echo $mark ?></li>
		<li>What do regular expressions do? <?php echo $rege ?></li>
	</ol>
</body>
</html>