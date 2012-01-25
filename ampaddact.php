<?
  $strSql = "insert into Calendar (calMonth, calDay, calYear, calText) values (" .
                $month . ", " .
                $day . ", " .
                $year . ", '" .
                $text . "')";
	     
/*
  conntemp = Server.CreateObject("ADODB.Connection");
  strSource = "DRIVER=Microsoft Access Driver (*.mdb);UID=;FIL=MS Access;DBQ=" + 
                Server.MapPath(Application("ampCalDBName"));
  conntemp.Open( strSource );
  rsLocal = conntemp.Execute(strSql);
*/

  header("Location: ampcal.php?nMth=" . $month . "&nYr=" . $year );
  exit;
?>

