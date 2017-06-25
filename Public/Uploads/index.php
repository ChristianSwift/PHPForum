<?php
header('Content-Type: application/json; charset=UTF-8');
$res = array();
$res['code'] = 403;
$res['message'] = 'Permission Denied ...';
$res['request_id'] = date('Ymdhis',time());
die(json_encode($res));
?>