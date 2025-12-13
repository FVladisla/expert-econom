<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<style>
    .name{
        color: #2c3e50;
        margin-top: 0;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
        margin-bottom: 20px;
    font-size: 1.5rem;
    }
</style>
<div class="news-detail">
	<h3 class="name"><?=$arResult["NAME"]?><br></h3>
		<p><?=$arResult["PROPERTIES"]["TEXT_COURSE"]["VALUE"]?></p></br>
</div>


<?php
// Получаем ID привязанного курса
$courseId = $arResult['PROPERTIES']['T_COURSE_ID']['VALUE'];

// Получаем символьный код курса
$courseCode = '';
if ($courseId) {
    $res = CIBlockElement::GetByID($courseId);
    if ($arCourse = $res->GetNext()) {
        $courseCode = $arCourse['CODE'];
    }
}
?>

<!-- Кнопка "Назад" -->
<div style="margin-bottom: 20px;">
    
        <a href="/products/4/<?=htmlspecialcharsbx($courseId)?>/" 
           style="display: inline-flex; align-items: center; color: var(--accent_blue); text-decoration: none;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" style="margin-right: 8px;">
                <path d="M19 12H5M12 19l-7-7 7-7"/>
            </svg>
            Вернуться к курсу
        </a>
</div>
