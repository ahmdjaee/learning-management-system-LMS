<?php

/**
 * Convert minutes to hours
 */
if(!function_exists('convertMinutesToHours')){
    function convertMinutesToHours(int $minutes):string {
        $hours = floor($minutes / 60);
        $minutes = $minutes % 60;
        return sprintF('%dh %02dm', $hours, $minutes); // Return format : 1h 30m
    }
}

