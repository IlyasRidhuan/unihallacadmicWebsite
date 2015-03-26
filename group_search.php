<!DOCTYPE html>
<html>
<head>
        <title>University Academic Website</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/style" href="css/style.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 	<script language="JavaScript" type="text/javascript" src="css/js/bootstrap.js"></script>
	<script>
                $(function() {
                        var $research = $('.research');
                        $research.find("tr").not('.accordion').hide();
                        $research.find("tr").eq(0).show();
    
                        $research.find(".accordion").click(function(){
                                $research.find('.accordion').not(this).siblings().fadeOut(500);
                                $(this).siblings().fadeToggle(500);
                                }).eq(0).trigger('click');
                        });
		function addStudyGroup(){
			window.location="insert_group.php";
		}

        </script>
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
			<div class="col-md-10">
				<h2 style="display:inline; padding-right:100px"> STUDY GROUPS </h2>
				<button class="btn btn-info" style="float:right" onclick="addStudyGroup()">Add to studygroup</button>
			</div>
<!--			<table class="research ">
			<thead>
				<tr>
					<th class="tableHead">Unit</th>
					<th class="tableHead">Name</th>
					<th class="tableHead">Email</th>
				</tr>
			</thead>
			<tbody>
				 <tr class="accordion table-striped">
                                 <td colspan="3">
				 </tr>-->
	<?php
					
					$dir='sqlite:peerContact.db';
                                        $dbh=new PDO($dir) or die("cannot open databse");
                                        //$query="SELECT * FROM CONTACTS ";
                                        $stmt=$dbh->prepare('SELECT DISTINCT(UNIT) FROM STUDYGROUPS WHERE UNIT LIKE :unit');
                                        $stmt->bindValue(':unit','%'.$_GET['groupSearch'].'%');
                                        $stmt->execute();
                                        $result = $stmt->fetchAll();
                        //                $stmt2=$dbh->prepare('SELECT UNIT,NAME,EMAIL FROM STUDYGROUPS WHERE UNIT LIKE :unit');
                        //                $stmt2->bindValue(':unit','%'.$_GET['groupSearch'].'%');
			//		$stmt2->execute();
                        //                $result2 = $stmt2->fetchAll();
                                        foreach($result as $row)
					{
					echo '<table class="research ">';
					echo '<div class="col-md-12"><hr></div>';
                        			echo '<tbody>';
                                 			echo '<tr class="accordion ">';
                                 				echo '<td class="td-clicker" colspan="0" style="font-size:200%">'.$row[0].'</td>';
							echo '</tr>';
							echo '<tr>';
			
                                 			echo '</tr>';
                        //               $dir='sqlite:peerContact.db';
                        //                $dbh=new PDO($dir) or die("cannot open databse");
                                        //$query="SELECT * FROM CONTACTS ";
                                        $stmt2=$dbh->prepare('SELECT UNIT,NAME,EMAIL FROM STUDYGROUPS WHERE UNIT LIKE :unit');
                                        $stmt2->bindValue(':unit',$row[0]);
					$stmt2->execute();
                                        $result2 = $stmt2->fetchAll();
					foreach($result2 as $row2)
					{
						echo '<tr>';
						echo '<td nowrap style="opacity:0">'.$row2[0] . '</td><br>';
						for($i=1;$i<3;$i++)
						{
							echo '<td nowrap>' . $row2[$i].'</td>';
						}
						echo '</tr>';
					}

					echo '</tbody>';

					echo '</table>';

				}
				?>
		</div>
	</div>
</body>
</html>
