<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
PHP two-dimensional arrays
Author: Elena Machkasova elenam@morris.umn.edu
Last modified: 2/25/10
-->
<?php
$data = array(array(2.8, 6.7, 4.5, 3.7, 5.0),
              array(6.3, 7.8, 5.6, 8.0, 6.7, 7.9),
              array(3.4, 5.2, 3.9, 4.6, 3.5));
$temperature = array("2/28/06" => array(24, 32, 41, 27),
                     "3/1/06" => array(25, 30, 37, 19),
                     "3/2/06" => array(15, 22, 26, 18));
?>

<html  xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>
Two-dimensional arrays
</title>
</head>
<body>
<?php
print "<h3>data:</h3>\n";
print "<p>\n";
print_r($data);
print "</p>\n";

print "<h3>temperature:</h3>\n";
print "<p>\n";
print_r($temperature);
print "</p>\n";

print "<h3>Accessing an element in a 2D array:</h3>\n";
print "<p>\n";
print $data[2][3]."<br/>\n";
print $temperature["3/1/06"][1]."<br/>\n";
print "</p>\n";

// we use nested 'for' loops here, we could use 'foreach' instead (see below)
print "<h3>Finding the average of each row of data</h3>\n";
print "<p>\n";
for ($i = 0; $i < count($data); $i++) {
  $sum = 0;
  for ($j = 0; $j < count($data[$i]); $j++) {
    $sum = $sum + $data[$i][$j];
  }
  $average = $sum/count($data[$i]);
  print "The average for row $i is $average<br/>\n";
 }
print "</p>\n";

print "<h3>Finding the average of each row of temperature</h3>\n";
print "<p>\n";
foreach ($temperature as $day => $temps) {
  $sum = 0;
  foreach ($temps as $temp) {
    $sum = $sum + $temp;
  }
  $average = $sum/count($temps);
  // need brackets around $average, otherwise it's read as $averageF
  print "The average temperature for $day is {$average}F<br/>\n";
}
print "</p>\n";
?>
</body>
</html>