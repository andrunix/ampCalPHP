<?
require("ampcaldb.php");

$txtIds = "";

for($i = 0; $i < sizeof($delList); $i++)
{
  $txtIds .= $delList[$i];
  if($i < (sizeof($delList) - 1))
    $txtIds .= ", ";
}
$sql = "DELETE FROM ac_calendar WHERE cal_entry_id in (" . $txtIds . ")";

$link = db_connect();
$result = mysql_query($sql) or die("Could not delete entry.<br>");

mysql_close($link);

header("Location: ampcal.php?nMth=" . $month . "&nYr=" . $year);
exit;


?>

