<?php

//$rate = 100;
//$hrs = 240;

//echo $rate * $hrs;
//$now = date('Y-m-d');
//echo date("W", strtotime($now)); // gives 201052 (Year is different than previous example)
$d=strtotime("tomorrow");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("today");
echo date("d/m/Y h:i:sa", $d) . "<br>";

$d=strtotime("next Saturday");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("+1 Months");
echo date("Y-m-d h:i:sa", $d) . "<br>";

echo date("W", strtotime($now)). "<br>"; 

echo date("W", strtotime($row['end_event'])). "<br>";

$date=date("W");
 echo $date." Week Number". "<br>";

  $date=date("W");
  echo $date. "<br>";


$today = date("F j- Y, g:i a");
 echo $today."<br>";

 $dm= date("F/Y");
 echo $dm;
?>

<!-- Sun 0
Mon  1
Tue 2
Wed 3
Thu 4
Fri 5
Sat 6 -->
