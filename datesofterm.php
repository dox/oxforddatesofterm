<?php
/*
 * Oxford Dates of Term
 * Version 2014-01
 *
 * A small function that will pass a date ('YYYY-mm-dd') and
 * providing that date falls within an Oxford term, it will 
 * return the start date, end date and term name.
 *
 * Dates taken from http://www.ox.ac.uk/about_the_university/university_year/dates_of_term.html
 *
 * Made by Andrew Breakspear @ St Edmund Hall
 * Feel free to use this in anyway you want, with or without credit
*/

function ox_term_date($compareDate = NULL) {
	
	// set lookup date to today if it isn't specified
	if ($compareDate == NULL) {
		$compareDate = date('Y-m-d');
	} else {
		$compareDate = date('Y-m-d', strtotime($compareDate));
	}
	
	// lookup array of Oxford term dates in the format 'start_date,_end_date,term_name'
	$term[] = array("2011-10-09","2011-12-03","Michaelmas");
	$term[] = array("2012-01-15","2012-03-10","Hilary");
	$term[] = array("2012-04-22","2012-06-16","Trinity");
	$term[] = array("2012-10-07","2012-12-01","Michaelmas");
	$term[] = array("2013-01-13","2013-03-09","Hilary");
	$term[] = array("2013-04-21","2013-06-15","Trinity");
	$term[] = array("2013-10-13","2013-12-07","Michaelmas");
	$term[] = array("2014-01-19","2014-03-15","Hilary");
	$term[] = array("2014-04-27","2014-06-21","Trinity");
	$term[] = array("2014-10-12","2014-12-06","Michaelmas");
	$term[] = array("2015-01-18","2015-03-14","Hilary");
	$term[] = array("2015-04-26","2015-06-20","Trinity");
	$term[] = array("2015-10-11","2015-12-05","Michaelmas");
	$term[] = array("2016-01-17","2016-03-12","Hilary");
	$term[] = array("2016-04-24","2016-06-18","Trinity");
	
	foreach($term AS $date) {
		if (check_in_range($date[0], $date[1], $compareDate)) {
			$weekNum = strtotime($compareDate) - strtotime($date[0]);
			$weekNum = floor($weekNum/(60*60*24*7))+1;
			
			$ends = array('th','st','nd','rd','th','th','th','th','th','th');
			if (($weekNum %100) >= 11 && ($weekNum%100) <= 13) {
				$abbreviation = 'th';
			} else {
				$abbreviation = $ends[$weekNum % 10];
			}
			
			$foundTerm['term_name'] = $date[2];
			$foundTerm['week_num'] = $weekNum;
			$foundTerm['week_name'] = $weekNum . $abbreviation;
			$foundTerm['term_start'] = $date[0];
			$foundTerm['term_end'] = $date[1];
		}
	}
	
	if ($foundTerm['term_name'] == NULL) {
		$foundTerm['term_name'] = "Vacation";
	}
	
	return $foundTerm;
}

function check_in_range($start_date, $end_date, $date_from_user) {
	// Convert to timestamp
	$start_ts = strtotime($start_date);
	$end_ts = strtotime($end_date);
	$user_ts = strtotime($date_from_user);
	
	// Check that user date is between start & end
	return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
}

echo "<pre>";
print_r(ox_term_date('2014-04-28'));
echo "</pre>";
?>
