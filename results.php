<?php
	function correct($que,$ans) {
		global $score;
		if($que == $ans) {
			$score += 20;
			return "green";
		} else
			return "red";
	}
	$con = mysqli_connect("fdb7.biz.nf","1672895_quiz","qwerty123++","1672895_quiz");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$results = "";
	$result = mysqli_query($con,"SELECT * FROM res ORDER BY name");
	while($row = mysqli_fetch_array($result)) {
		$score = 0;
		$results .= "<tr>";
		$results .= "<td>" . $row['name'] . "</td>";
		$results .= "<td style='color:" . correct($row['site'],"programath") . "'>" . $row['site'] . "</td>";
		$results .= "<td style='color:" . correct($row['styl'],"css") . "'>" . $row['styl'] . "</td>";
		$results .= "<td style='color:" . correct($row['proc'],"js") . "'>" . $row['proc'] . "</td>";
		$results .= "<td style='color:" . correct($row['mark'],"html") . "'>" . $row['mark'] . "</td>";
		$results .= "<td style='color:" . correct($row['rege'],"match") . "'>" . $row['rege'] . "</td>";
		$results .= "<td>" . $score . "</td>";
		$results .= "</tr>";
	}
?>
<!doctype html>
<html>
<head>
	<title>PrograMath-Quiz Results</title>
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
		td {
			width: 100px;
			text-align: center;
			border-bottom: 1px solid black;
		}
	</style>
	<link href="favicon.ico" rel="icon" type="image/x-icon" />
</head>
<body>
	<h1>Quiz Results</h1>
	<table>
		<tr>
			<th>Name</th>
			<th>Q#1</th>
			<th>Q#2</th>
			<th>Q#3</th>
			<th>Q#4</th>
			<th>Q#5</th>
			<th>Score</th>
		</tr>
		<?php echo $results ?>
	</table>
</body>
</html>