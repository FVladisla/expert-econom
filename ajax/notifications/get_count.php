<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$userId = $USER->GetID();
$count = 0;

// Здесь код для получения количества непрочитанных уведомлений
// SELECT COUNT(*) FROM notifications WHERE user_id = ? AND is_read = 0

echo json_encode(['count' => $count]);
?>