<!DOCTYPE html>
<html>
<head>
        <title>University Academic Website</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/style" href="css/style.css">
</head>
<body>
        <div class="container">
                <div class="row">
                        <div class="col-md-6">
                                <a href="home.html">
                                        <img class="img-responsive" src="images/uni-hall.png" alt="Unihall Logo" style="width:120px">
                                </a>
                        </div>
                        <div class="col-md-6 text-right text-uppercase" >
                                <h1>University Hall</h1>
                                <h4>Academic Program Website </h4>
                        </div>
                </div>
                <div class="row">
                        <div class="col-md-12">
                                <hr>
                        </div>
                </div>
		<div>
			<h2>Add To A Study Group</h2>
		</div>

		<div class="col-md-8">
			<h4 class="newh4">Select the study group you wish to join</h4>
			<select name="unitList" form="studyGroupForm">
			<?php
				$dir='sqlite:peerContact.db';
				$dbh=new PDO($dir) or die("cannot open database");
				$stmt=$dbh->prepare('SELECT DISTINCT(UNIT) FROM STUDYGROUPS');
				$stmt->execute();
				$result=$stmt->fetchAll();
				var_dump($result);
				foreach($result as $row)
				{
				echo '<option value='.$row[0].'>'.$row[0].'</option>';
				}
			?>
			</select>
			<br>
			<br>
			<form action="save.php" id="studyGroupForm" method="POST">
				<input type="text" name="name" placeholder="Enter Your Name">
				<br>
				<br>
				<input type="text" name="email" placeholder="Enter Your Student Number" style="width: 204.22222232818604px;">@student.uwa.edu.au
				<br>
				<br>
				<input type="submit" value="Add to StudyGroup">
			</form>
		</div>	
	</div>
</body>
</html>
