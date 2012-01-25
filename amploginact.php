<?
setcookie("ampAdmin", "0");
if(!strcmp($ampId, "admin"))
  {
    if(!strcmp($ampPw, "password")) 
      {
      setcookie("ampAdmin", "1");
      }
  }

$str = "ampcal.php" . "?nMth=" . $nMth . "&nYr=" . $nYr;
header("Location: " . $str);
exit;
?>


