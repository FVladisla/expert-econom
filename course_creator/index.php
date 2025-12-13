<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("ЭкспертЭконом");
?>
<div class="constructor-container" style="max-width: 1200px; margin: 0 auto; font-family: Arial, sans-serif; padding: 20px;">
    
    <!-- Шапка конструктора -->
    <div class="constructor-header" style="margin-bottom: 30px;">
        <h1 style="color: var(--primary); margin: 0 0 10px 0; display: flex; align-items: center;">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 10px;">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                <circle cx="12" cy="9" r="1"></circle>
                <path d="M11 12h2v4h-2z"></path>
                <path d="M14 6l-4 4M10 6l4 4"></path>
            </svg>
            Конструктор курсов
        </h1>
        <p style="color: var(--gray); margin: 0;">Создавайте и редактируйте курсы для вашей платформы</p>
    </div>

</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>