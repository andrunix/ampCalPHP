<!-- <link rel="stylesheet" href="ampcal.css" type="text/css"> -->

<?
//---------------------------------------------------------------------------
//
// File:    ampCalPhp.php
// Purpose: This is the source file for the ampCalPhp Calendar.
// Author:  Andrew M. Pierce
// Date:    02/04/1999
//
// Copyright (c) 1999, Andrew M. Pierce
//
// Description:
//   This souce code is provided as is, without guarantee or warranty of
//   any kind.  
//
//   See the readme.txt file which should accompany this file for complete
//   instructions on how to use this calendar.
//
// -------------------------------------------------------------------------
//
// M O D I F I C A T I O N   H I S T O R Y
// ---------------------------------------
//
//    Date    By  Description
// ----------	--- ----------------------------------------------------------
// 02/04/1999 amp Initial revision.
// 11/14/1999 amp Updated code to be Netscape Navigator friendly.
// 07/15/2002 amp Ported from ASP and JScript to PHP
//
//---------------------------------------------------------------------------
?>

<?

function getDayOfMonth($dt) {
  $dta = getdate($dt);
  return $dta["mday"];
}

function getDayOfWeek($dt) {
  $dta = getdate($dt);
  return $dta["wday"];
}

function getMonth($dt) {
  $dta = getdate($dt);
  return $dta["mon"];
}

function getYear($dt) {
  $dta = getdate($dt);
  return $dta["year"];
}



class ampCal {

  var $rgDay;
  var $rgTxt;
  var $rgDays;
  var $rgMths;
  var $colorBackground;
  var $month;
  var $year;
  var $now;
  var $myDate;
  var $monthName;
  var $title;

  // constructor
  function ampCal($m, $y, $adm) {
    $this->admin = $adm;
    $this->colorBackground = "FFFFFF";

    $this->rgDays = array( 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ); 
    $this->rgMths = array( "January", "February", "March", "April", 
			 "May", "June", "July", "August", 
			 "September", "October", "November", "December" );

    $this->month = $m;
    $this->year  = ($y <= 100? $y+1900: $y);
    $this->now   = mktime(); 
    $this->myDate = mktime("", "", "", $this->month, 1, $this->year);
    $this->monthName = $this->rgMths[$this->month - 1];
    $this->title = $this->monthName . " " . $this->year;
    $this->setFebDays();

    // $this->loadData();
  }

  function setFebDays()
  {
    if ( $this->$month == 1 ) 
    {
      if ( $this->$year % 4 == 0 )
      {
        if ( $this->$year % 100 == 0)
        {
          if ( $this->$year % 400 == 0) 
            $this->$rgDays[1] = 29;
        }
        else
          $this->$rgDays[1] = 29;
      }
    }
  }

  function Display()
  {
    $strDeadCell = "<td width=14% height=70 class=bwdDeadCell>&nbsp;</td>";
    $strDeadCellA = "<td width=14% height=70 class=bwdDeadCell>";
    $strDeadCellB = "</td>";
    $strHdrCell  = "<td align=center width=14% class=bwdHeader>" ;

?>
    <table align=center border="0" width="100%">
      <tr><td align=center valign=bottom class=bwdTitle>
        <table align=center width="100%">
          <tr><td align=left width="10%">

<?
    // previous month arrow
    print "<a href=ampcal.php?nMth=" . 
     ((getMonth($this->myDate)==1) ?12 : getMonth($this->myDate)-1) . 
     "&nYr=" .
     ((getMonth($this->myDate)==1)? (getYear($this->myDate)-1) :getYear($this->myDate)) .
     "><img alt=\"Previous Month\" border=\"0\" src=\"prevarrow.gif\"></a></td>\n";


?>
    <td class=bwdTitleBar align=center width="80%">

      <? echo $this->title ?></td>
    <td align=right width="10%">

<?
    // Next month arrow
    print "<a href=ampcal.php" .
      "?nMth=" .
      ((getMonth($this->myDate)+1)==13 ?1 :(getMonth($this->myDate)+1)) .
      "&nYr=" .
      ((getMonth($this->myDate)+1)==13 ? getYear($this->myDate)+1 :getYear($this->myDate)) . 
      "><img alt=\"Next Month\" border=\"0\" src=\"nextarrow.gif\"></a>\n";

?>
    </td></tr></table>
  
    </td></tr>
    <tr><td>
    <table border="1" cellpadding="3" 
      bordercolor="#<? echo $this->colorBackground ?>" 
      bordercolordark="#<? echo $this->colorBackground ?>"
      bordercolorlight="#<? echo $this->colorBackground ?>"
      width="100%">
      <tr>
<?
    print $strHdrCell . "Sunday</td>\n";
    print $strHdrCell . "Monday</td>\n";
    print $strHdrCell . "Tuesday</td>\n";
    print $strHdrCell . "Wednesday</td>\n";
    print $strHdrCell . "Thursday</td>\n";
    print $strHdrCell . "Friday</td>\n";
    print $strHdrCell . "Saturday</td>\n";
    print "</tr>";
    print "</tr>";


    // now create each row
    for ($j = 0; $j < 6; $j++)
    {
      if( 5 == $j && getDayOfMonth($this->myDate) < 30 )
      {
        // Check to see if we've already printed all
        // the days.  If so, get out without doing another row.
        break;
      }
      $x = 0;

      ?>

      <tr>

      <?

      for( $i = 0; $i < 7; $i++)
      {
        // Is this a "dead" cell?
        if ( getDayOfWeek($this->myDate) > ($i + $x) || 
             getMonth($this->myDate) != $this->month) {
          print $strDeadCell;
        }
        else
        {
          if ( getYear($this->myDate) < getYear($this->now) )
            $strClass = "bwdPast";
          else if ( getYear($this->myDate) > getYear($this->now))
            $strClass = "bwdFuture";
          else
          {
            // Same year...
            if ( getMonth($this->myDate) < getMonth($this->now) )
              $strClass = "bwdPast";
            else if ( getMonth($this->myDate) > getMonth($this->now) )
              $strClass = "bwdFuture";
            else
            {
              // Same month...
              if ( getDayOfMonth($this->myDate) < getDayOfMonth($this->now))
                $strClass = "bwdPast";
              else if (getDayOfMonth($this->myDate) > getDayOfMonth($this->now))
                $strClass = "bwdFuture";
              else
                $strClass = "bwdNow";
            }
          }

          $strDateNum  = getDayOfMonth($this->myDate);

          # TODO: implement gettext
          $strCellText = "";
          # $strCellText = this.getText( this.m_myDate.getDate() );

          $strCellContents = "<td valign=\"top\" width=\"14%\" height=70 " .
            " class=" . $strClass . "><b>";


          if (!strcmp($this->admin, "1"))
	    {
	      $strCellContents .= "<a href=\"ampadddsp.php?day=" . $strDateNum;
	      $strCellContents .= "&month=" . $this->month;
	      $strCellContents .= "&year=" . $this->year;
	      $strCellContents .= "\">";
	    }

          $strCellContents .= $strDateNum;

          if(strcmp($this->admin, "1"))
            $strCellContents .= "</a>";


          $strCellContents .= "</b><br>" .
            $strCellText . "\n</td>\n";
          print $strCellContents ;

          $tDay = getDayOfMonth($this->myDate) + 1;
          $tMth = getMonth($this->myDate);
          $tYr  = getYear($this->myDate);

          // add one day to our date
          $this->myDate = mktime("", "", "", 
            $tMth, $tDay, $tYr);
        }
      }
      print "</tr>\n";
      $x += 7;
    }
?>

  </table>
  <tr>
    <td>
    <center>

    <a class=bwdLink href="http://www.foomonkey.com/ampcal.html" target="_top">
    ampCalPhp</a> Version 1.0, © 2002, foomonkey.com |

    <?
      print "<a class=bwdLink href=\"amplogin.php?nMth=" . $this->month . "&nYr=" . $this->year . "\">";
    ?>
    Admin 
    <?
      if(strlen($this->admin) > 0)
	{
	  if(strcmp($this->admin, "1"))    // not equal to 1, logged out
	    print "Login";
	else
	  print "Logout";
	}
      else
	  print "Login";
     ?>

    </a>
      </center> 
    </td>
    </tr>

    <tr><td>
    <?
    print "</td></tr></table>\n";
  }


		/*

		function loadData()
		{
		var rs = this.getRecordSet( this.month, this.year );
		var nPrevDay, x = -1;
		
		// Truncate the arrays
		this.m_rgDay.length = 0;
		this.m_rgTxt.length = 0;
		
		// Load everything up into arrays
		nPrevDay = 0;
		while( ! rs.EOF )
		{
			if( rs.Fields("calDay").Value != nPrevDay )
			{
				x++;
				this.m_rgDay[x] = rs.Fields("calDay").Value;
				this.m_rgTxt[x] = rs.Fields("calText").Value;
			}
			else
				this.m_rgTxt[x] += "<br><hr>" + rs.Fields("calText").Value;
		
			nPrevDay = rs.Fields("calDay").Value;
				
		
			rs.MoveNext();
		}
		rs.Close();
		}
***************/
		

}

?>





<?
/*

function ampCalDB_setItem( nDay, strText )
{
  x = this.m_rgDay.length;
  this.m_rgDay[x + 1] = nDay;
	this.m_rgTxt[x + 1] = strText;
}

function ampCalDB_getText( n )
{
  var x = 0;
	while( x < this.m_rgDay.length ) 
	{
		if ( n == this.m_rgDay[x] ) 
			return this.m_rgTxt[x] ;

		x++;
	}
  return "";
}

function ampCalDB_getRecordSet()
{
  var rsLocal;
  var sql = "select * FROM Calendar where calMonth = " + this.month + 
            " and calYear = " + this.year + 
						" order by calDay"; 

  conntemp = Server.CreateObject("ADODB.Connection");
  strSource = "DRIVER=Microsoft Access Driver (*.mdb);UID=;FIL=MS Access;DBQ=" + 
              Server.MapPath( Application("ampCalDBName") );
  conntemp.Open( strSource );
  rsLocal = conntemp.Execute(sql);

  return rsLocal;
}




*/
?>

