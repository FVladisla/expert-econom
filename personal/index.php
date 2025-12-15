<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Практико-ориентированные курсы с симуляторами реальных бизнес-процессов. • Уникальные кейсы из российской практики • Интерактивные тренажеры финансовых решений • Гибкие форматы обучения для студентов и предпринимателей • Корпоративные решения для бизнеса  Освойте прикладные навыки управления финансами предприятия в цифровом формате!");
$APPLICATION->SetTitle("ЭкспертЭконом");
?>



<?
if ($USER->IsAuthorized()) {
	$APPLICATION->IncludeComponent(
		"bitrix:main.include",
		"",
		Array(
			"AREA_FILE_SHOW" => "file",
			"AREA_FILE_SUFFIX" => "inc",
			"EDIT_TEMPLATE" => "",
			"PATH" => "/include/personal.php"
		)
	);
} else { 
	header("Location: /login/");
	exit();
}?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>