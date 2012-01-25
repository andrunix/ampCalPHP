<?
$g_admin = $HTTP_COOKIE_VARS["ampAdmin"];
?>
<? require("ampcalphp.php") ?>



<html>
<head>
<style>
.bwdHeader
{
  background-color: #663300;
  color: #ffffff;
  font-family: arial, verdana, helvetica, sans-serif;
  font-weight: bold;
  font-size: 12pt;
}
.bwdDeadCell
{
  background-color: #999999;
}
.bwdTitle
{
  background-color: #663300;
  color: #ffffff;
  font-family: arial, verdana, helvetica, sans-serif;
  font-weight: bold;
  font-size: 14pt;
}

.bwdTitleBar
{
  background-color: #663300;
  color: #ffffff;
  font-family: arial, verdana, helvetica, sans-serif;
  font-weight: bold;
  font-size: 14pt;
}

.bwdFuture
{
  background-color: #e6f3ff;
  color: #000000;
  font-family: verdana, arial, helvetica, sans-serif;
  font-size: 8pt;
}

.bwdPast
{
  background-color: #ffffcc;
  font-family: verdana, arial, helvetica, sans-serif;
  font-size: 8pt;
}

.bwdNow
{
  background-color: #ff9999;
  color: #000000;
  font-family: verdana, arial, sans-serif;
  font-size: 8pt;
}

</style>
</head>
<body>

<?
if(!isset($nMth)) {
  $dt = mktime();
  $dta = getdate($dt);
  $nMth = $dta["mon"];
  $nYr = $dta["year"];
}

$cal = new ampCal($nMth, $nYr, $HTTP_COOKIE_VARS["ampAdmin"]);
$cal->Display();


?>

</body>
</html>

