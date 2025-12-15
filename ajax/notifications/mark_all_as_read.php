<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$userId = $USER->GetID();

// Здесь код для пометки всех уведомлений как прочитанных
// UPDATE notifications SET is_read = 1 WHERE user_id = ? AND is_read = 0

echo json_encode(['success' => true]);
?>