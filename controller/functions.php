<?php

    function dateFormatter($date)
    {
        $day = substr($date,0,1);
        $month = substr($date,3,4);
        $year = substr($date,6,9);
        return $year."/".$month."/".$day;

    }

?>