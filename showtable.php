<html>
<head>
<link rel="stylesheet" href="main.css">
</head>
<body class="body1">
<meta charset="UTF-8">
<div class="div2">
<h1><i>Економічні показники різних країн</i></h1>
<?php
$servername="localhost";
$database="kursova";
$username="root";
$password="";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
      die("Помилка підключення:<br> " . mysqli_connect_error());	  
} 
$query ="SELECT * FROM economic"; 
$result = mysqli_query($conn, $query) or die("Помилка " . mysqli_error($link)); 
if($result){
$rows = mysqli_num_rows($result);     
echo "<table class=table1 border=1><tr><th>Id</th><th>Сountry</th><th>GDP</th><th>Import</th>
<th>Export</th><th>Inflation</th><th>Unemployment</th><th>Industry</th>
<th>Interestrate</th></tr>";
for ($i=0;$i<$rows;++$i)
{
$row = mysqli_fetch_row($result);
echo "<tr>";
for ($j = 0 ; $j < 9 ; ++$j) echo "<td>$row[$j]</td>";
echo "</tr>";
}
echo "</table>";  
mysqli_free_result($result);
}
?>
<p><input type="submit" name="back" value="На головну" onclick= location.href='http://localhost/index.html'>
</div>
</body>
</html>