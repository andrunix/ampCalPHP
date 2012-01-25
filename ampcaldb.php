<?

function db_connect()
{
  // Fill in host, user, and password values for the database here
  $result = mysql_connect("localhost", "user", "password");
  if(!result)
    return false;

  if(!mysql_select_db("fmadmin"))
    return false;

  return $result;
}

function db_exec($sql)
{
  $res = db_connect();
  if($res) {
    $added = mysql_query($sql);
    mysql_close($res);
    return $added;
  }
  else 
    return false;
}

function db_exec_results($sql) 
{
  $link = db_connect();
  $e_res = mysql_query($sql);
  return $e_res;
}

function getCategories() {
  $sql = "SELECT * FROM ww_category ORDER BY cat_desc";
  return db_exec_results($sql);
}

function getMonthCalData($mth, $yr)
{
  $sql = "select * FROM ac_calendar where cal_month = " . $mth .
         " and cal_year = " . $yr . " order by cal_day"; 

  $mth_res = db_exec_results($sql);
  return $mth_res;
}

function getDayCalData($mth, $day, $yr) {
  $sql = "select * FROM ac_calendar where cal_month = " . $mth ;
  $sql .= " and cal_year = " . $yr ;
  $sql .= " and cal_day  = " . $day; 

  $day_res = db_exec_results($sql);
  return $day_res;
}

function getItemData($id) {
  $sql = "select * FROM ac_calendar where cal_entry_id = " . $id;
  $item_res = db_exec_results($sql);
  return $item_res;
}

function updateCalendarEntry($i, $t, $c) {
  $sql = "update ac_calendar set cal_disp_text = '" . 
    htmlspecialchars(addslashes($t)) . 
    "', cal_category = " . $c . " where cal_entry_id = " . $i; 

db_exec($sql);
}




?>
