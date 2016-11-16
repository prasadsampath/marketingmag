<?php
$to = $userEmail;
$subject = $subject;
$report = $reportHtml;
$headers = "From: ".$sysEmail;

mail($to,$subject,$txt,$headers);

?>
