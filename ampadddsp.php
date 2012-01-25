<html>
<head>
<title>ampCalDB - Add Item</title>
<style><!--
td { font-family: arial, verdana, sans serif }
p { font-family: arial, verdana, sans serif }
h3 { font-family: arial, verdana, sans serif; font-weight: bold; font-size: 12pt }
a { font-family: arial, verdana, sans serif; font-size: 10pt }
-->
</style>

<script language=JavaScript><!--
function doit(str)
{
  w = window.open(str, "MyWin", "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizeable=no,width=475,height=155");
}
-->
</script>
</head>
<body bgcolor=white>

<h3>ampCalDB - Calendar Items for 
<? 
print "$month/$day/$year";
?>
</h3>

<table cellpadding=5 cellspacing=5>
  <tr>
    <td valign=top bgcolor=skyblue width=20%>
      <p>
      <font face="Arial, Verdana, Sans Serif" size=2>
      <p><b>To add a new entry for this day</b>, enter the text in 
      the &quot;New Item&quot; box and click the &quot;Add&quot;
      button.  
      <p><b>To edit an existing entry</b>, click the text of the entry.  
      <p><b>To delete an entry</b>,
      click the checkbox to the left of the entry and then click the &quot;Delete&quot; button.
      
      </p>
    </td>
    <td bgcolor=silver>
      <form name=frmadd action=ampaddact.php method=post>
      <input type=hidden size=2 name=month value=<? echo $month ?>>
      <input type=hidden size=2 name=day value=<? echo $day ?>>
      <input type=hidden size=4 name=year value=<? echo $year ?>>
      <h3>Add New Item</h3>
      <table>
        <tr>
          <td>New Item:</td>
          <td><input type=text size=50 name=text></td>
        </tr>
        <tr>
          <td align=right><input type=submit value=Add></td>
        </tr>
      </table>
      </form>
      
      <hr>
      <h3>Existing Calendar Items</h3>
      
      <form name=frmdel action=ampdelact.php method=post>
      <input type=hidden size=2 name=month value=<? $month ?>>
      <input type=hidden size=4 name=year value=<? $year ?>>
      <?
        // Load up all the existing 
        // records for this day
      $sql = "select * FROM Calendar where calMonth = " . $month ;
      $sql .= " and calYear = " . $year ;
      $sql .= " and calDay  = " . $day; 

/*      
  conntemp.Open( strSource );
        rs = conntemp.Execute(sql);

      	if(rs.EOF)
          Response.write("[none]<br>");
      	else
      	{
        	while( ! rs.EOF )
        	{
        	  Response.write("<input name=delList type=checkbox value=" + 
                           rs.Fields("System_Id") + 
                           "><a href=\"#\"" + 
                           " onclick=doit('ampeditdsp.asp?id=" + rs.Fields("System_ID") + 
                           "&month=" + Request("month") +
                           "&year=" + Request("year") +
                           "'); return false;>" + 
                           rs.Fields("calText").Value + "</a><br>");

        	  rs.MoveNext();
        	}
          Response.write("<input type=submit value=Delete>\n");
        }
        rs.Close();
        rs = "";
*/
    ?>
    <br>
    </form>
    </td>
  </tr>
</table>

<p align=center>
<?
print "<a href=\"ampcal.php?nMth=" . $month . "&nYr=" . $year . "\">";
?>
Back to the Calendar</a>
</p>
</body>
</html>

