# drop table ac_calendar;

CREATE TABLE ac_calendar (
  cal_entry_id int(11) NOT NULL auto_increment,
  cal_month int(11) NOT NULL,
  cal_day int(11) NOT NULL,
  cal_year int(11) NOT NULL,
  cal_disp_text varchar(200) NOT NULL,
  cal_long_text blob,
  cal_category int(11) NOT NULL,
  cal_beg_hour int(11) NOT NULL,
  cal_beg_min int(11) NOT NULL,
  cal_end_hour int (11) NOT NULL,
  cal_end_min int(11) NOT NULL,
  cal_all_day int(11) NOT NULL,
  PRIMARY KEY (cal_entry_id),
  KEY cal_key1 (cal_month, cal_day, cal_year, cal_beg_hour, cal_beg_min),
  KEY cal_key2 (cal_category, cal_month, cal_day, cal_year, cal_beg_hour, cal_beg_min)
) TYPE=MyISAM;
