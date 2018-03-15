<?php

require_once "schedule.class.php";

$schedule = new Schedule();
$result = $schedule->getScheduleByDay($_POST["day"]);

echo json_encode($result);



?>