<?php
    date_default_timezone_set("UTC");
try{
	//echo "THE SELECT VALUE IS ";
	//echo $_POST['unitList'];
	//echo $_POST['name'];
	//echo $_POST['email'];
	$dir='sqlite:peerContact.db';
	$dbh=new PDO($dir) or die("cannot open databse");
        //$stmt=$dbh->prepare("INSERT INTO STUDYGROUPS(UNIT,NAME,EMAIL) VALUES('ANHB1101','Ilyas','placeholder');");
	var_dump($dbh);
	$stmt=$dbh->prepare('INSERT INTO STUDYGROUPS(UNIT,NAME,EMAIL)VALUES(:unit,:name,:email)');
	$stmt->bindValue(':unit',$_POST['unitList']);
	$stmt->bindValue(':name',$_POST['name']);
	$stmt->bindValue(':email',$_POST['email']."@student.uwa.edu.au");
	$stmt->execute() or die("Unable to execute");
	header('Location: group_search.php');
}
catch (PDOException $e){
	echo $e->getMessage();
}
?>
