<?
require("ampcaldb.php");
updateCalendarEntry($id, $caltext, $cat);
?>

<html>
<head>
</head>
<body bgcolor=silver>

<script language=JavaScript>
  <?
$str = "ampcal.php";
$str .= "?nMth=";
$str .= $month;
$str .= "&nYr=";
$str .= $year;
  
  print "window.opener.location.href=\"" . $str . "\";";
  ?>
  window.close();
</script>

</body>
</html>
