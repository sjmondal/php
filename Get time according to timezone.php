<?php 
function date_to_timezone($timeZoneFrom = 'UTC', $timeZoneTo = 'UTC', $dateTimeRaw = null, $dateFormat = 'Y-m-d H:i:s'){
		$dateTimeRaw = $dateTimeRaw ? $dateTimeRaw : date("Y-m-d H:i:s");
		$date = new DateTime($dateTimeRaw, new DateTimeZone($timeZoneFrom));
		$date->setTimeZone(new DateTimeZone($timeZoneTo));
		return $date->format($dateFormat);
	}

	?>
