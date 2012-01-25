<?
require("ampcaldb.php");
?>

<html>

<style><!--
td { font-family: arial, verdana, sans serif }
p { font-family: arial, verdana, sans serif }
h3 { font-family: arial, verdana, sans serif; font-weight: bold; font-size: 12pt }
a { font-family: arial, verdana, sans serif; font-size: 10pt }
-->
</style>

<script language=JavaScript>
<!--
function saveMe(strGoto)
{
  frmadd.submit();
}

function closeMe()
{
  window.close();
}
--></script>

<head>

<title>ampCalDB - Edit Item</title>
</head>
<body bgcolor=silver>

<h3>ampCalDB - Edit Item</h3>

<?

$res = getItemData($id);
$row = mysql_fetch_array($res, MYSQL_ASSOC);

if( $row ) {
   $strText =  stripslashes($row["cal_disp_text"]);
   $cat = $row["cal_category"];
}

mysql_free_result($res);

?>

<form name=frmadd action=ampeditact.php method=post>

<input type=hidden size=4 name=id value=<? echo $id ?>>
<input type=hidden size=2 name=month value=<? echo $month ?>>
<input type=hidden size=4 name=year value=<? echo $year ?>>

<hr>

<table>
  <tr>
    <td>Category:</td>
    <td>
      <select name="cat">
<?
      $cats = getCategories();
while($row = mysql_fetch_array($cats, MYSQL_ASSOC)) {
  print "<option value=" . $row["cat_id"];
  if($row["cat_id"] == $cat)
        print " SELECTED";
  print ">" . stripslashes($row["cat_desc"]) . "</option>\n";
}
?>
      </select>
    </td>
  </tr>

  <tr>
    <td>Text:</td>
    <td><input type=text size=50 name="caltext" value="<? echo $strText ?>"></td>
  </tr>
  <tr>
  <td><input type=submit value=Save></td>
  <td><input type=reset value=Cancel onclick=closeMe();></td>
  </tr>
</table>
</form>

</body>
</html>


