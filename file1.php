<html>
<head>
<link rel="stylesheet" href="main.css">
</head>
<body class="body1">
<meta charset="UTF-8">
<div class="div2">
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
$country=$_POST['country'];
$GDP=$_POST['GDP'];	
$import=$_POST['import'];
$export=$_POST['export'];
$inflation=$_POST['inflation'];
$unemployment=$_POST['unemployment'];
$industry=$_POST['industry'];
$interestrate=$_POST['interestrate'];
}
$servername="localhost";
$database="kursova";
$username="root";
$password="";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
      die("Помилка підключення до бази даних:<br> " . mysqli_connect_error());
}	  
else {
$sql = "INSERT INTO economic (country,GDP,import,export,inflation,unemployment,industry,interestrate) 
VALUES ('$country','$GDP','$import','$export','$inflation','$unemployment','$industry','$interestrate')";
if (mysqli_query($conn, $sql)) {
      echo "<meta http-equiv=refresh content=0.5;URL=http://localhost/index.html />";
} else {
      echo "Помилка: " . $sql . "<br><br>" . mysqli_error($conn);	
}
echo "<p><input type=submit name=back1 value='На головну' onclick= location.href='http://localhost/index.html'>";
mysqli_close($conn);
}
?>
</div>
</body>
</html>

