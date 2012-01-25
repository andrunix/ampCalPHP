<?
  if(!strcmp($HTTP_COOKIE_VARS["ampAdmin"], "1"))
  {
    setcookie("ampAdmin", "0");
    header("Location: ampcal.php");
    exit;
  }
?>

<html>
<head>
<link rel="stylesheet" href="ampcal.css" type="text/css">

<style><!--
td { font-family: arial, verdana, sans serif }
p { font-family: arial, verdana, sans serif }
h3 { font-family: arial, verdana, sans serif; font-weight: bold; font-size: 12pt }
a { font-family: arial, verdana, sans serif; font-size: 10pt }
-->
</style>

<title>ampCalPhp - Administration Login</title>
</head>
<body>

<table class=bwdMaint>
  <tr>
    <td>
      <h3>ampCalPhp - Administration Login</h3>
      <hr>
    </td>
  </tr>
  <tr>
    <td>
      <form name=frmlogin action=amploginact.php method=post>
      <input type=hidden name=nMth value=<? echo $nMth ?>>
      <input type=hidden name=nYr value=<? echo $nYr ?>>
      <table class=bwdMaint>
        <tr>
        <td class=bwdMaint>Login Id:</td>
          <td class=bwdMaint><input type=text size=50 name=ampId></td>
        </tr>
        <tr>
        <td class=bwdMaint>Password:</td>
          <td class=bwdMaint><input type=password size=50 name=ampPw></td>
        </tr>
        <tr>
        <td class=bwdMaint><input type=submit value=Login>
        </td>
        <td class=bwdMaint>&nbsp;</td>
        </tr>
      </table>
      </form>
    </td>
  </tr>
</table>
</body>
</html>


