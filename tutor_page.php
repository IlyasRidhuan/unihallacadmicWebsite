<!DOCTYPE html>
<html>
<head>
        <title>University Academic Website</title>
	<meta charset="UTF-8">
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
		<div class="responsive-table">
			<table class="table table-striped">
				<thead>
					<tr>
						<th class="tableHead">Unit</th>
						<th class="tableHead" nowrap>Tutor Name</th>
						<th class="tableHead" nowrap>Email Address</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$dir='sqlite:peerContact.db';
					$dbh=new PDO($dir) or die("cannot open databse");
					//$query="SELECT * FROM CONTACTS ";

						$stmt=$dbh->prepare('SELECT * FROM TUTORS WHERE UNIT LIKE :unit OR NAME LIKE :name');
						$stmt->bindValue(':unit','%'.$_GET['tutorSearch'].'%');
						$stmt->bindValue(':name','%'.$_GET['tutorSearch'].'%');
						$stmt->execute();
						$result = $stmt->fetchAll();
						foreach($result as $row)
						{	
							echo "<tr>";
							for($i=0;$i<3;$i++)
							{
								echo "<td nowrap>" . $row[$i] . "</td>";
							}
							echo "</tr>";
						}
				?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>
