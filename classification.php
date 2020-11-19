<?php session_start();?>
<html>
<link rel="stylesheet" href="main.css">
<body class="body1">
<div class="div2">
<h1><i>Класифікація</i></h1>
<?php 
$servername="localhost";
$database="kursova";
$username="root";
$password="";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
$h=$_POST['selector'];
}
global $h;
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
      die("Подключение недоступно:<br> " . mysqli_connect_error());	  
} 
$query ="SELECT GDP,import,export,inflation,unemployment,industry,interestrate FROM economic";
$result = mysqli_query($conn,$query);
$arr = array();
while ($row = mysqli_fetch_array($result) ) {
$arr[] = $row;
}
function std_deviation($arr){
    $arr_size=count($arr);
    $mu=array_sum($arr)/$arr_size;
    $ans=0;
    foreach($arr as $elem){
        $ans+=pow(($elem-$mu),2);
    }
   return sqrt($ans/$arr_size);	
}
$middle_arr=array_sum($arr)/count($arr);
$normalization=(1-$middle_arr);
$date = array();
print("<b>1. Скористаємося агломеративним ієрархічним алгоритмом класифікації. Для відстаннні між об'єктами виберемо звичайну Евклідову відстань:</b>");
echo "<table class=table1 border=1>";
for($i=0;$i<7;$i++)
{
echo "<tr>";
for($j=0; $j<7; $j++)
{	
$distance=sqrt(pow(($arr[0][$j] - $arr[0][$i]), 2) + pow(($arr[$h][$j] - $arr[$h][$i]), 2));
$euclidian=round($distance,3);
array_push($date,$euclidian);	
echo "<td align=center>$euclidian\n</td>";
}
echo "</tr>";
}
echo "</table>";
$split = 7;
$distance1= array_chunk($date, $split);
print("<b>2.Знаходимо різницю між елементами для визначення найближчих сусідів:</b>");
$diff1= array();
echo "<table class=table1 border=1>";
for($i=6;$i>=0;$i--){	
echo "<tr>";
	for($j=6;$j>=0;$j--){
$dist1=abs($distance1[0][$i]-$distance1[0][$j]);
array_push($diff1,$dist1);	
echo "<td align=center>$dist1\n</td>";
}
echo "</tr>";
}
echo "</table>";
foreach($diff1 as $key => $value){
if ($value == 0){
unset($diff1[$key]);
}
}
print("<b>Формуємо нові матриці відстаней:</b><br/>");
$min1=min($diff1);
for($i=6;$i>=0;$i--){	
	for($j=6;$j>=0;$j--){
$dist1=abs($distance1[0][$i]-$distance1[0][$j]);	
if ($dist1==$min1){
		$i1=$i;
		$j1=$j;	
	}
}
}
print("<i>Об'єднуємо об'єкти $i1 та $j1 в один кластер</i>");	
if($distance1[0][$i1]>$distance1[0][$j1]){	
for($h=0;$h<7;$h++){	
	unset($distance1[$h][$i1]);
	unset($distance1[$i1][$h]);
}
}
else {	
for($h=0;$h<7;$h++){
	unset($distance1[$h][$j1]);
	unset($distance1[$j1][$h]);
}
}
echo "<table class=table1 border=1>";
foreach ($distance1 as $key){
	echo "<tr>";
	foreach($key as $value){
	echo "<td align=center>{$value}</td>";	
	}
	echo "</tr>";
}
echo "</table><br/>";

$diff2= array();
echo "<table class=table1 border=1>";
for($i=5;$i>=0;$i--){	
	for($j=5;$j>=0;$j--){
$dist2=abs($distance1[0][$i]-$distance1[0][$j]);
array_push($diff2,$dist2);	
}
}
foreach($diff2 as $key => $value){
if ($value == 0){
unset($diff2[$key]);
}
}
$min2=min($diff2);
for($i=5;$i>=0;$i--){	
	for($j=5;$j>=0;$j--){
$dist2=abs($distance1[0][$i]-$distance1[0][$j]);	
if ($dist2==$min2){
		$i2=$i;
		$j2=$j;
	}	
}
}
print("<i>Об'єднуємо об'єкти $i2 та $j2 в один кластер</i>");	
if($distance1[0][$i2]>$distance1[0][$j2]){
	for($h=0;$h<7;$h++){
	unset($distance1[$h][$i2]);
	unset($distance1[$i2][$h]);
}
}
else {
for($h=0;$h<7;$h++){	
	unset($distance1[$h][$j2]);
	unset($distance1[$j2][$h]);
}
}
echo "<table class=table1 border=1>";
foreach ($distance1 as $key){
	echo "<tr>";
	foreach($key as $value){
	echo "<td align=center>{$value}</td>";	
	}
	echo "</tr>";
}
echo "</table><br/>";

$diff3= array();
echo "<table class=table1 border=1>";
for($i=4;$i>=0;$i--){	
	for($j=4;$j>=0;$j--){
$dist3=abs($distance1[0][$i]-$distance1[0][$j]);
array_push($diff3,$dist3);	
}
}
foreach($diff3 as $key => $value){
if ($value == 0){
unset($diff3[$key]);
}
}
$min3=min($diff3);
for($i=4;$i>=0;$i--){	
	for($j=4;$j>=0;$j--){
$dist3=abs($distance1[0][$i]-$distance1[0][$j]);	
if ($dist3==$min3){
		$i3=$i;
		$j3=$j;
	}	
}
}
print("<i>Об'єднуємо об'єкти $i3 та $j3 в один кластер</i>");	
if($distance1[0][$i3]>$distance1[0][$j3]){
for($h=0;$h<7;$h++){
	unset($distance1[$h][$i3]);
	unset($distance1[$i3][$h]);
}
}
else {
for($h=0;$h<7;$h++){	
	unset($distance1[$h][$j3]);
	unset($distance1[$j3][$h]);
}
}
echo "<table class=table1 border=1>";
foreach ($distance1 as $key){
	echo "<tr>";
	foreach($key as $value){
	echo "<td align=center>{$value}</td>";	
	}
	echo "</tr>";
}
echo "</table><br/>";

$diff4= array();
echo "<table class=table1 border=1>";
for($i=3;$i>=0;$i--){	
	for($j=3;$j>=0;$j--){
$dist4=abs($distance1[0][$i]-$distance1[0][$j]);
array_push($diff4,$dist4);	
}
}
foreach($diff4 as $key => $value){
if ($value == 0){
unset($diff4[$key]);
}
}
$min4=min($diff4);
for($i=3;$i>=0;$i--){	
	for($j=3;$j>=0;$j--){
$dist4=abs($distance1[0][$i]-$distance1[0][$j]);	
if ($dist4==$min4){
		$i4=$i;
		$j4=$j;
	}	
}
}
print("<i>Об'єднуємо об'єкти $i4 та $j4 в один кластер</i>");	
if($distance1[0][$i4]>$distance1[0][$j4]){
for($h=0;$h<7;$h++){
	unset($distance1[$h][$i4]);
	unset($distance1[$i4][$h]);
}
}
else {
for($h=0;$h<7;$h++){	
	unset($distance1[$h][$j4]);
	unset($distance1[$j4][$h]);
}
}
echo "<table class=table1 border=1>";
foreach ($distance1 as $key){
	echo "<tr>";
	foreach($key as $value){
	echo "<td align=center>{$value}</td>";	
	}
	echo "</tr>";
}
echo "</table><br/>";

$diff5= array();
echo "<table class=table1 border=1>";
for($i=2;$i>=0;$i--){	
	for($j=2;$j>=0;$j--){
$dist5=abs($distance1[0][$i]-$distance1[0][$j]);
array_push($diff5,$dist5);	
}
}
foreach($diff5 as $key => $value){
if ($value == 0){
unset($diff5[$key]);
}
}
$min5=min($diff5);
for($i=2;$i>=0;$i--){	
	for($j=2;$j>=0;$j--){
$dist5=abs($distance1[0][$i]-$distance1[0][$j]);	
if ($dist5==$min5){
		$i5=$i;
		$j5=$j;
	}	
}
}
$middlemin=($min1+$min2+$min3+$min4+$min5)/5;
$min3=min($diff3)/$middlemin;
$min4=min($diff4)/$middlemin;
$min5=min($diff5)/$middlemin;
print("<i>Об'єднуємо об'єкти $i5 та $j5 в один кластер</i>");	
if($distance1[0][$i5]>$distance1[0][$j5]){
for($h=0;$h<7;$h++){
	unset($distance1[$h][$i5]);
	unset($distance1[$i5][$h]);
}
}
else {
for($h=0;$h<7;$h++){	
	unset($distance1[$h][$j5]);
	unset($distance1[$j5][$h]);
}
}
$larr=array();
echo "<table class=table1 border=1>";
foreach ($distance1 as $key){
	echo "<tr>";
	foreach($key as $value){
	echo "<td align=center>{$value}</td>";	
	array_push($larr,$value);
	}
	echo "</tr>";	
}
echo "</table><br/>";
$_SESSION['ydata'] = array($min1,$min2,$min3,$min4,$min5,0);
$klaster1=array($i1,$i2,$i3,$i4,$i5);
$klaster2=array($j1,$j2,$j3,$j4,$j5);
$unique=array_unique($klaster1);
$unique1=array_unique($klaster2);
print("<b>Після об'єднання маємо два кластери (" );
foreach($unique as $key => $value){
	print_r($value.' ');	
}
$differce=array_diff($unique1,$unique);
print(" ) та ( " );
foreach($differce as $key => $value){
	print_r($value.' ');	
}
print(" ), відстань між якимим дорівнює: ");
print_r($larr[2]);
if(count($unique)>=count($differce)){
	echo "<p><i>Отже, вибрана країна належить до 1-го кластеру,а отже за класифікацією -вона розвинута країна з ринковою економікою</i>";
}
else {
	echo "<p><i>Отже, вибрана країна належить до 2-го кластеру,а саме, за класифікацією -вона країна з перехідною економікою</i></b>";
}
echo "<p><input type=submit name=getden value='Отримати дендрограмму' onclick= location.href='http://localhost/graph.php'>";
echo "<p><input type=submit name=back1 value='На головну' onclick= location.href='http://localhost/index.html'>";
echo "<p>";
?>
</body>
</html>