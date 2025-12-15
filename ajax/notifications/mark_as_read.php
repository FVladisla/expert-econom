<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$userId = $USER->GetID();
$notificationId = $_POST['id'] ?? 0;

// Здесь код для обновления статуса уведомления в БД
// UPDATE notifications SET is_read = 1 WHERE id = ? AND user_id = ?

echo json_encode(['success' => true]);
?>