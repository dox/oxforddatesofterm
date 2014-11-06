<?php
/*
 * Oxford Dates of Term
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
	if ($compareDate == NULL) {
		$compareDate = date('Y-m-d');
	} else {
		$compareDate = date('Y-m-d', strtotime($compareDate));
	}
	
	$term[] = array("name" => "Michaelmas", "startDate" => "2011-10-09", "endDate" => "2011-12-03");
	$term[] = array("name" => "Michaelmas", "startDate" => "2012-10-07", "endDate" => "2012-12-01");
	$term[] = array("name" => "Michaelmas", "startDate" => "2013-10-13", "endDate" => "2013-12-07");
	
	$term[] = array("name" => "Hilary", "startDate" => "2012-01-15", "endDate" => "2012-03-10");
	$term[] = array("name" => "Hilary", "startDate" => "2013-01-13", "endDate" => "2013-03-09");
	$term[] = array("name" => "Hilary", "startDate" => "2014-01-19", "endDate" => "2014-03-15");
	
	$term[] = array("name" => "Trinity", "startDate" => "2012-04-22", "endDate" => "2012-06-16");
	$term[] = array("name" => "Trinity", "startDate" => "2013-04-21", "endDate" => "2013-06-15");
	$term[] = array("name" => "Trinity", "startDate" => "2014-04-27", "endDate" => "2014-06-21");
	
	//echo "<pre>";
	//print_r($term);
	//echo "</pre>";
	
	foreach($term AS $uTerm) {
		//$termDateMinus7 = date('Y-m-d', strtotime ('-1 week', strtotime ($uTerm['startDate']))) . "<br />";
		$termDateMinus7 = date('Y-m-d', strtotime('-1 week', strtotime($uTerm['startDate']))) . "<br />";
		echo $compareDateMinus7;
		
		if ($termDateMinus7 <= $compareDate) {
			if ($uTerm['endDate'] >= $compareDate) {
				$calculatedStartTerm = $uTerm['startDate'];
				$calculatedEndTerm = $uTerm['endDate'];
				$calculatedTermName = $uTerm['name'];
				
				$daysDiff = floor(strtotime($compareDate)/(60*60*24)) - floor(strtotime(date('Y-m-d'))/(60*60*24));
				
				if ($daysDiff < 0) {
					$calculatedWeekName = "0th Week";
				} elseif ($daysDiff < 14) {
					$calculatedWeekName = "1st Week";
				} elseif ($daysDiff < 21) {
					$calculatedWeekName = "2nd Week";
				} elseif ($daysDiff < 28) {
					$calculatedWeekName = "3rd Week";
				} elseif ($daysDiff < 35) {
					$calculatedWeekName = "4th Week";
				} elseif ($daysDiff < 42) {
					$calculatedWeekName = "5th Week";
				} elseif ($daysDiff < 49) {
					$calculatedWeekName = "6th Week";
				} elseif ($daysDiff < 56) {
					$calculatedWeekName = "7th Week";
				} elseif ($daysDiff < 63) {
					$calculatedWeekName = "8th Week";
				}
				
				goto foundTermName;
			}
		}
	}
	
	$calculatedStartTerm = "";
	$calculatedEndTerm = "";
	$calculatedTermName = "Unknown";
	$calculatedWeekName = "Unknown";

	foundTermName:
	
	$returnArray = array("lookupDate" => $compareDate, "termStartDate" => $calculatedStartTerm, "termEndDate" => $calculatedEndTerm, "termName" => $calculatedTermName, "weekName" => $calculatedWeekName);
	
	return $returnArray;
}

echo "<pre>";
print_r(ox_term_date());
echo "</pre>";
?>