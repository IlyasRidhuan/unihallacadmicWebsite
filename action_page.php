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
						<th class="tableHead" nowrap>Peer Contact</th>
						<th class="tableHead" nowrap>Email Address</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$dir='sqlite:peerContact.db';
					$dbh=new PDO($dir) or die("cannot open databse");
					//$query="SELECT * FROM CONTACTS ";

					if(isset($_GET['unitSearch']) && !isset($_GET['peerSearch']))
					{
						$stmt=$dbh->prepare('SELECT * FROM CONTACTS WHERE UNIT LIKE :unit ORDER BY UNIT');
						$stmt->bindValue(':unit','%'.$_GET['unitSearch'].'%');
						$stmt->execute();
						$result = $stmt->fetchAll();
						/*$rows = sqlite_num_rows($result);
						if($rows==0)
						{
							echo "<h3>There are no currently no peer contacts for ".$_GET['unitSearch']."</h3>";
						}*/
						foreach($result as $row)
						{	
							echo "<tr>";
							for($i=0;$i<3;$i++)
							{
								echo "<td>" . $row[$i] . "</td>";
							}
							echo "</tr>";
						}
					}
					if(isset($_GET['peerSearch']) && !isset($_GET['unitSearch']))
					{
      						$stmt=$dbh->prepare('SELECT * FROM CONTACTS WHERE NAME LIKE :contact');
                                                $stmt->bindValue(':contact','%'.$_GET['peerSearch'].'%');
                                                $stmt->execute();
                                                $result = $stmt->fetchAll();
                                                foreach($result as $row)
                                                {
                                                        echo "<tr>";
                                                        for($i=0;$i<3;$i++)
                                                        {
                                                                echo "<td>" . $row[$i] . "</td>";
                                                        }
                                                        echo "</tr>";
                                                }
					}
					if(isset($_GET['unitSearch']) && isset($_GET['peerSearch']))
					{
						$stmt=$dbh->prepare('SELECT * FROM CONTACTS WHERE UNIT LIKE :unit AND NAME LIKE :contact');
                                                $stmt->bindValue(':contact','%'.$_GET['peerSearch'].'%');
                                                $stmt->bindValue(':unit','%'.$_GET['unitSearch'].'%');
						$stmt->execute();
                                                $result = $stmt->fetchAll();
                                                foreach($result as $row)
                                                {
                                                        echo "<tr>";
                                                        for($i=0;$i<3;$i++)
                                                        {
                                                                echo "<td>" . $row[$i] . "</td>";
                                                        }
                                                        echo "</tr>";
                                                }
					}
					unset($dbh);
				?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>
