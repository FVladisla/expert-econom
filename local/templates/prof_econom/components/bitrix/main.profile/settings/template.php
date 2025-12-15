<?php
use Bitrix\Main\Web\Json;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

if(isset($arResult["SHOW_SMS_FIELD"]) && $arResult["SHOW_SMS_FIELD"] == true)
{
    CJSCore::Init('phone_auth');
}
?>

<style>
/* Только визуальные стили, не трогаем логику */
.bx-auth-profile {
    max-width: 1200px;
    margin: 0 auto;
    padding: 30px 20px;
    background: #f8fafc;
    min-height: 100vh;
    font-family: 'Segoe UI', Arial, sans-serif;
}

/* Шапка */
.profile-header {
    background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
    color: white;
    padding: 35px 30px;
    border-radius: 12px;
    margin-bottom: 30px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    position: relative;
    overflow: hidden;
}

.profile-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255,255,255,0.05);
    pointer-events: none;
}

.header-content {
    position: relative;
    z-index: 2;
}

.profile-header h1 {
    margin: 0 0 12px 0;
    font-size: 28px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 15px;
}

.profile-header p {
    margin: 0;
    font-size: 16px;
    opacity: 0.9;
    max-width: 600px;
}

/* Уведомления */
.bx-notef {
    background: #d4edda;
    color: #155724;
    padding: 18px 25px;
    border-radius: 8px;
    border-left: 4px solid #28a745;
    margin: 0 0 25px 0;
    display: flex;
    align-items: center;
    gap: 15px;
    font-size: 15px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.bx-errortext {
    background: #f8d7da;
    color: #721c24;
    padding: 18px 25px;
    border-radius: 8px;
    border-left: 4px solid #dc3545;
    margin: 0 0 25px 0;
    display: flex;
    align-items: center;
    gap: 15px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

/* Основной контейнер формы */
.profile-form-wrapper {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 15px rgba(0,0,0,0.05);
    overflow: hidden;
}

/* Заголовки секций */
.profile-link {
    background: #f8f9fa;
    padding: 18px 25px;
    border-bottom: 1px solid #e9ecef;
    cursor: pointer;
    transition: background 0.3s;
    font-weight: 500;
    color: #495057;
    font-size: 16px;
    display: flex;
    align-items: center;
    gap: 12px;
}

.profile-link:hover {
    background: #e9ecef;
}

.profile-link a {
    color: inherit;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 12px;
    width: 100%;
}

.profile-link a:hover {
    color: #3498db;
}

/* Таблицы (оставляем таблицы как есть, но стилизуем) */
.profile-table.data-table {
    width: 100%;
    border-collapse: collapse;
    margin: 0;
}

.profile-table.data-table thead td {
    padding: 20px;
    background: #f8f9fa;
    font-weight: 600;
    color: #495057;
    border-bottom: 2px solid #e9ecef;
}

.profile-table.data-table tbody tr {
    border-bottom: 1px solid #e9ecef;
    transition: background 0.3s;
}

.profile-table.data-table tbody tr:hover {
    background: #f8f9fa;
}

.profile-table.data-table td {
    padding: 18px 20px;
    vertical-align: top;
}

.profile-table.data-table td:first-child {
    width: 30%;
    font-weight: 500;
    color: #495057;
}

.profile-table.data-table td:last-child {
    width: 70%;
}

/* Поля ввода (оставляем оригинальные имена классов) */
.profile-table.data-table input[type="text"],
.profile-table.data-table input[type="email"],
.profile-table.data-table input[type="tel"],
.profile-table.data-table input[type="password"] {
    width: 100%;
    max-width: 400px;
    padding: 12px 16px;
    border: 2px solid #dee2e6;
    border-radius: 6px;
    font-size: 15px;
    transition: all 0.3s;
    background: white;
}

.profile-table.data-table input[type="text"]:focus,
.profile-table.data-table input[type="email"]:focus,
.profile-table.data-table input[type="tel"]:focus,
.profile-table.data-table input[type="password"]:focus {
    outline: none;
    border-color: #3498db;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
}

.profile-table.data-table select {
    width: 100%;
    max-width: 400px;
    padding: 12px 16px;
    border: 2px solid #dee2e6;
    border-radius: 6px;
    font-size: 15px;
    background: white;
    appearance: none;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 12px center;
    background-size: 16px 12px;
    padding-right: 40px;
}

.profile-table.data-table textarea {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #dee2e6;
    border-radius: 6px;
    font-size: 15px;
    min-height: 100px;
    resize: vertical;
    font-family: inherit;
}

/* Кнопки */
.profile-table.data-table p {
    padding: 25px;
    margin: 0;
    background: #f8f9fa;
    border-top: 1px solid #e9ecef;
}

.profile-table.data-table input[type="submit"],
.profile-table.data-table input[type="reset"] {
    padding: 12px 30px;
    border: none;
    border-radius: 6px;
    font-size: 15px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.profile-table.data-table input[type="submit"] {
    background: #3498db;
    color: white;
    margin-right: 10px;
}

.profile-table.data-table input[type="submit"]:hover {
    background: #2980b9;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
}

.profile-table.data-table input[type="reset"] {
    background: white;
    color: #6c757d;
    border: 2px solid #dee2e6;
}

.profile-table.data-table input[type="reset"]:hover {
    border-color: #3498db;
    color: #3498db;
    transform: translateY(-2px);
}

/* Обязательные поля */
.starrequired {
    color: #e74c3c;
    margin-left: 3px;
}

/* Безопасность пароля */
.bx-auth-secure {
    display: inline-block;
    vertical-align: middle;
    margin-left: 8px;
    cursor: help;
}

.bx-auth-secure-icon {
    width: 18px;
    height: 18px;
    background: #28a745;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 10px;
}

/* Секции с содержимым */
.profile-block-hidden {
    display: none;
}

.profile-block-shown {
    display: block;
    animation: fadeIn 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Адаптивность */
@media (max-width: 768px) {
    .bx-auth-profile {
        padding: 20px 15px;
    }
    
    .profile-header {
        padding: 25px 20px;
    }
    
    .profile-header h1 {
        font-size: 24px;
    }
    
    .profile-table.data-table td {
        padding: 15px;
    }
    
    .profile-table.data-table td:first-child,
    .profile-table.data-table td:last-child {
        width: 100%;
        display: block;
    }
    
    .profile-table.data-table tr {
        display: block;
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 2px solid #e9ecef;
    }
    
    .profile-table.data-table input[type="text"],
    .profile-table.data-table input[type="email"],
    .profile-table.data-table input[type="tel"],
    .profile-table.data-table input[type="password"],
    .profile-table.data-table select {
        max-width: 100%;
    }
}

/* Иконки в заголовках */
.profile-link svg {
    opacity: 0.8;
}

/* Плейсхолдеры */
input::placeholder,
textarea::placeholder {
    color: #adb5bd;
}

/* Требования к паролю */
.profile-table.data-table p:last-child {
    background: transparent;
    border-top: none;
    padding: 15px 0 0 0;
    color: #6c757d;
    font-size: 14px;
}

/* Стили только для кнопок - не трогаем логику */
input[type="submit"][name="save"] {
    background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
    color: white;
    border: none;
    padding: 14px 35px;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
    position: relative;
    overflow: hidden;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

input[type="submit"][name="save"]:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(52, 152, 219, 0.4);
    background: linear-gradient(135deg, #2980b9 0%, #2573a7 100%);
}

input[type="submit"][name="save"]:active {
    transform: translateY(-1px);
    box-shadow: 0 3px 10px rgba(52, 152, 219, 0.3);
}

input[type="submit"][name="save"]::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s ease;
}

input[type="submit"][name="save"]:hover::before {
    left: 100%;
}

/* Стили для кнопки Сбросить */
input[type="reset"] {
    background: white;
    color: #6c757d;
    border: 2px solid #e9ecef;
    padding: 14px 35px;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

input[type="reset"]:hover {
    transform: translateY(-3px);
    border-color: #3498db;
    color: #3498db;
    box-shadow: 0 6px 15px rgba(52, 152, 219, 0.2);
    background: #f8f9fa;
}

input[type="reset"]:active {
    transform: translateY(-1px);
    box-shadow: 0 3px 8px rgba(52, 152, 219, 0.15);
}

/* Для SMS кнопки тоже сделаем красиво */
input[type="submit"][name="code_submit_button"] {
    background: linear-gradient(135deg, #27ae60 0%, #219955 100%);
    color: white;
    border: none;
    padding: 14px 35px;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(39, 174, 96, 0.3);
    position: relative;
    overflow: hidden;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

input[type="submit"][name="code_submit_button"]:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(39, 174, 96, 0.4);
    background: linear-gradient(135deg, #219955 0%, #1e8c4d 100%);
}

input[type="submit"][name="code_submit_button"]:active {
    transform: translateY(-1px);
    box-shadow: 0 3px 10px rgba(39, 174, 96, 0.3);
}

input[type="submit"][name="code_submit_button"]::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s ease;
}

input[type="submit"][name="code_submit_button"]:hover::before {
    left: 100%;
}

/* Контейнер для кнопок - делаем красивое расположение */
.profile-table.data-table p:last-child {
    background: #f8f9fa;
    padding: 30px 25px;
    border-radius: 0 0 12px 12px;
    border-top: 1px solid #e9ecef;
    margin: 0;
    display: flex;
    gap: 15px;
    align-items: center;
}

/* Иконки для кнопок (опционально) */
input[type="submit"][name="save"]::after {
    content: '💾';
    font-size: 18px;
    margin-left: 5px;
}

input[type="reset"]::after {
    content: '↺';
    font-size: 18px;
    margin-left: 5px;
}

input[type="submit"][name="code_submit_button"]::after {
    content: '📱';
    font-size: 18px;
    margin-left: 5px;
}

/* Адаптивность для кнопок */
@media (max-width: 768px) {
    input[type="submit"][name="save"],
    input[type="reset"],
    input[type="submit"][name="code_submit_button"] {
        width: 100%;
        padding: 16px;
        margin-bottom: 10px;
        justify-content: center;
    }
    
    .profile-table.data-table p:last-child {
        flex-direction: column;
    }
}

/* Анимация при нажатии */
@keyframes buttonClick {
    0% { transform: scale(1); }
    50% { transform: scale(0.98); }
    100% { transform: scale(1); }
}

input[type="submit"]:active,
input[type="reset"]:active {
    animation: buttonClick 0.2s ease;
}

/* Градиентная обводка для кнопки Сохранить при фокусе */
input[type="submit"][name="save"]:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.3), 0 4px 15px rgba(52, 152, 219, 0.3);
}

input[type="reset"]:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2), 0 4px 10px rgba(0,0,0,0.05);
}

/* Эффект нажатия с волной */
input[type="submit"],
input[type="reset"] {
    position: relative;
    overflow: hidden;
}

input[type="submit"]:active::after,
input[type="reset"]:active::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 5px;
    height: 5px;
    background: rgba(255, 255, 255, 0.5);
    opacity: 0;
    border-radius: 100%;
    transform: scale(1, 1) translate(-50%);
    transform-origin: 50% 50%;
}

input[type="submit"]:focus:not(:active)::after,
input[type="reset"]:focus:not(:active)::after {
    animation: ripple 1s ease-out;
}

@keyframes ripple {
    0% {
        transform: scale(0, 0);
        opacity: 0.5;
    }
    100% {
        transform: scale(40, 40);
        opacity: 0;
    }
}
</style>

<div class="bx-auth-profile">

    <!-- Красивая шапка -->
    <div class="profile-header">
        <div class="header-content">
            <h1>
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="3"></circle>
                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                </svg>
                Настройки профиля
            </h1>
            <p>Управляйте вашей личной информацией и настройками аккаунта</p>
        </div>
    </div>

    <?php ShowError($arResult["strProfileError"]); ?>
    
    <?php
    if (isset($arResult['DATA_SAVED']) && $arResult['DATA_SAVED'] == 'Y')
        ShowNote(GetMessage('PROFILE_DATA_SAVED'));
    ?>

    <?php if(isset($arResult["SHOW_SMS_FIELD"]) && $arResult["SHOW_SMS_FIELD"] == true): ?>

    <!-- SMS Verification Form - ОРИГИНАЛЬНАЯ ЛОГИКА -->
    <div class="profile-form-wrapper" style="margin-bottom: 30px;">
        <div style="padding: 25px;">
            <h3 style="margin-top: 0; margin-bottom: 20px; color: #2c3e50; font-size: 20px;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: middle; margin-right: 10px;">
                    <rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect>
                    <line x1="7" y1="2" x2="7" y2="22"></line>
                    <line x1="17" y1="2" x2="17" y2="22"></line>
                    <line x1="2" y1="12" x2="22" y2="12"></line>
                    <line x1="2" y1="7" x2="7" y2="7"></line>
                    <line x1="2" y1="17" x2="7" y2="17"></line>
                    <line x1="17" y1="17" x2="22" y2="17"></line>
                    <line x1="17" y1="7" x2="22" y2="7"></line>
                </svg>
                Подтверждение телефона
            </h3>
            
            <form method="post" action="<?=$arResult["FORM_TARGET"]?>">
            <?=$arResult["BX_SESSION_CHECK"]?>
            <input type="hidden" name="lang" value="<?=LANG?>" />
            <input type="hidden" name="ID" value=<?=$arResult["ID"]?> />
            <input type="hidden" name="SIGNED_DATA" value="<?=htmlspecialcharsbx($arResult["SIGNED_DATA"])?>" />
            
            <table class="profile-table data-table">
                <tbody>
                    <tr>
                        <td><?php echo GetMessage("main_profile_code")?><span class="starrequired">*</span></td>
                        <td>
                            <input size="30" type="text" name="SMS_CODE" value="<?=htmlspecialcharsbx($arResult["SMS_CODE"])?>" autocomplete="off" 
                                   style="font-size: 18px; letter-spacing: 2px; text-align: center;" placeholder="XXXXXX" />
                        </td>
                    </tr>
                </tbody>
            </table>

            <p style="padding: 20px 0 0 0;">
                <input type="submit" name="code_submit_button" value="<?php echo GetMessage("main_profile_send")?>" />
            </p>

            </form>

            <div id="bx_profile_error" style="display:none"><?php ShowError("error")?></div>
            <div id="bx_profile_resend"></div>
        </div>
    </div>

    <script>
    new BX.PhoneAuth({
        containerId: 'bx_profile_resend',
        errorContainerId: 'bx_profile_error',
        interval: <?=$arResult["PHONE_CODE_RESEND_INTERVAL"]?>,
        data:
            <?= Json::encode([
                'signedData' => $arResult["SIGNED_DATA"],
            ])?>,
        onError:
            function(response)
            {
                var errorDiv = BX('bx_profile_error');
                var errorNode = BX.findChildByClassName(errorDiv, 'errortext');
                errorNode.innerHTML = '';
                for(var i = 0; i < response.errors.length; i++)
                {
                    errorNode.innerHTML = errorNode.innerHTML + BX.util.htmlspecialchars(response.errors[i].message) + '<br>';
                }
                errorDiv.style.display = '';
            }
    });
    </script>

    <?php else: ?>

    <!-- Main Profile Form - ВСЯ ОРИГИНАЛЬНАЯ СТРУКТУРА БИТРИКС -->
    <div class="profile-form-wrapper">
        <form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data">
        <?=$arResult["BX_SESSION_CHECK"]?>
        <input type="hidden" name="lang" value="<?=LANG?>" />
        <input type="hidden" name="ID" value=<?=$arResult["ID"]?> />

        <!-- Основная информация - ОРИГИНАЛЬНАЯ СТРУКТУРА -->
        <div class="profile-link profile-user-div-link">
            <a title="<?=GetMessage("REG_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('reg')">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <?=GetMessage("REG_SHOW_HIDE")?>
            </a>
        </div>
        
        <div class="profile-block-<?= !str_contains($arResult["opened"], "reg") ? "hidden" : "shown"?>" id="user_div_reg">
            <table class="profile-table data-table">
                <thead>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                </thead>
                <tbody>
                <?php
                if($arResult["ID"]>0)
                {
                ?>
                <?php
                }
                ?>
                <tr>
                    <td><?php echo GetMessage("main_profile_title")?></td>
                    <td><input type="text" name="TITLE" value="<?=$arResult["arUser"]["TITLE"]?>" /></td>
                </tr>
                <tr>
                    <td><?=GetMessage('NAME')?></td>
                    <td><input type="text" name="NAME" maxlength="50" value="<?=$arResult["arUser"]["NAME"]?>" placeholder="Введите ваше имя" /></td>
                </tr>
                <tr>
                    <td><?=GetMessage('LAST_NAME')?></td>
                    <td><input type="text" name="LAST_NAME" maxlength="50" value="<?=$arResult["arUser"]["LAST_NAME"]?>" placeholder="Введите вашу фамилию" /></td>
                </tr>
                <tr>
                    <td><?=GetMessage('SECOND_NAME')?></td>
                    <td><input type="text" name="SECOND_NAME" maxlength="50" value="<?=$arResult["arUser"]["SECOND_NAME"]?>" placeholder="Введите ваше отчество" /></td>
                </tr>
                <tr>
                    <td><?=GetMessage('LOGIN')?><span class="starrequired">*</span></td>
                    <td><input type="text" name="LOGIN" maxlength="50" value="<?php echo $arResult["arUser"]["LOGIN"]?>" placeholder="Введите логин" /></td>
                </tr>
                <tr>
                    <td><?=GetMessage('EMAIL')?><?php if($arResult["EMAIL_REQUIRED"]):?><span class="starrequired">*</span><?php endif?></td>
                    <td><input type="text" name="EMAIL" maxlength="50" value="<?php echo $arResult["arUser"]["EMAIL"]?>" placeholder="email@example.com" /></td>
                </tr>
                <?php if($arResult["PHONE_REGISTRATION"]):?>
                <tr>
                    <td><?php echo GetMessage("main_profile_phone_number")?><?php if($arResult["PHONE_REQUIRED"]):?><span class="starrequired">*</span><?php endif?></td>
                    <td><input type="text" name="PHONE_NUMBER" maxlength="50" value="<?php echo $arResult["arUser"]["PHONE_NUMBER"]?>" placeholder="+7 (XXX) XXX-XX-XX" /></td>
                </tr>
                <?php endif?>
                <?php if($arResult['CAN_EDIT_PASSWORD']):?>
                <tr>
                    <td><?=GetMessage('NEW_PASSWORD_REQ')?></td>
                    <td>
                        <input type="password" name="NEW_PASSWORD" maxlength="50" value="" autocomplete="off" class="bx-auth-input" />
                        <?php if($arResult["SECURE_AUTH"]):?>
                            <span class="bx-auth-secure" id="bx_auth_secure" title="<?php echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
                                <div class="bx-auth-secure-icon"></div>
                            </span>
                            <noscript>
                            <span class="bx-auth-secure" title="<?php echo GetMessage("AUTH_NONSECURE_NOTE")?>">
                                <div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
                            </span>
                            </noscript>
                        <script>
                        document.getElementById('bx_auth_secure').style.display = 'inline-block';
                        </script>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endif?>
                <tr>
                    <td><?=GetMessage('NEW_PASSWORD_CONFIRM')?></td>
                    <td><input type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" autocomplete="off" /></td>
                </tr>
                <?php if($arResult["TIME_ZONE_ENABLED"] == true):?>
                <tr>
                    <td colspan="2" class="profile-header"><?php echo GetMessage("main_profile_time_zones")?></td>
                </tr>
                <tr>
                    <td><?php echo GetMessage("main_profile_time_zones_auto")?></td>
                    <td>
                        <select name="AUTO_TIME_ZONE" onchange="this.form.TIME_ZONE.disabled=(this.value != 'N')">
                            <option value=""><?php echo GetMessage("main_profile_time_zones_auto_def")?></option>
                            <option value="Y"<?=($arResult["arUser"]["AUTO_TIME_ZONE"] == "Y"? ' SELECTED="SELECTED"' : '')?>><?php echo GetMessage("main_profile_time_zones_auto_yes")?></option>
                            <option value="N"<?=($arResult["arUser"]["AUTO_TIME_ZONE"] == "N"? ' SELECTED="SELECTED"' : '')?>><?php echo GetMessage("main_profile_time_zones_auto_no")?></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><?php echo GetMessage("main_profile_time_zones_zones")?></td>
                    <td>
                        <select name="TIME_ZONE"<?php if($arResult["arUser"]["AUTO_TIME_ZONE"] <> "N") echo ' disabled="disabled"'?>>
                            <?php foreach($arResult["TIME_ZONE_LIST"] as $tz=>$tz_name):?>
                            <option value="<?=htmlspecialcharsbx($tz)?>"<?=($arResult["arUser"]["TIME_ZONE"] == $tz? ' SELECTED="SELECTED"' : '')?>><?=htmlspecialcharsbx($tz_name)?></option>
                            <?php endforeach?>
                        </select>
                    </td>
                </tr>
                <?php endif?>
                </tbody>
            </table>
        </div>
        
        <!-- Дополнительные свойства - ОРИГИНАЛЬНАЯ СТРУКТУРА -->
        <?php if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
        <div class="profile-link profile-user-div-link">
            <a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('user_properties')">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="3" y1="9" x2="21" y2="9"></line>
                    <line x1="9" y1="21" x2="9" y2="9"></line>
                </svg>
                <?=trim($arParams["USER_PROPERTY_NAME"]) <> '' ? $arParams["USER_PROPERTY_NAME"] : GetMessage("USER_TYPE_EDIT_TAB")?>
            </a>
        </div>
        
        <div id="user_div_user_properties" class="profile-block-<?= !str_contains($arResult["opened"], "user_properties") ? "hidden" : "shown"?>">
            <table class="data-table profile-table">
                <thead>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $first = true;?>
                    <?php foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>
                    <tr>
                        <td class="field-name">
                            <?php if ($arUserField["MANDATORY"]=="Y"):?>
                                <span class="starrequired">*</span>
                            <?php endif;?>
                            <?=$arUserField["EDIT_FORM_LABEL"]?>:
                        </td>
                        <td class="field-value">
                            <?php $APPLICATION->IncludeComponent(
                                "bitrix:system.field.edit",
                                $arUserField["USER_TYPE"]["USER_TYPE_ID"],
                                array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField), null, array("HIDE_ICONS"=>"Y"));?>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <?php endif;?>
        
        <!-- Требования к паролю и кнопки - ОРИГИНАЛЬНАЯ СТРУКТУРА -->
        <p><?php echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>
        <p>
            <input type="submit" name="save" value="<?=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?>">
            &nbsp;&nbsp;
            <input type="reset" value="<?=GetMessage('MAIN_RESET');?>">
        </p>
        
        </form>
    </div>

    <script>
    // ВСЁ ОРИГИНАЛЬНОЕ, НЕ ТРОГАЕМ
    var opened_sections = [<?
    $arResult["opened"] = $_COOKIE[$arResult["COOKIE_PREFIX"]."_user_profile_open"] ?? '';
    $arResult["opened"] = preg_replace("/[^a-z0-9_,]/i", "", $arResult["opened"]);
    if ($arResult["opened"] <> '')
    {
        echo "'".implode("', '", explode(",", $arResult["opened"]))."'";
    }
    else
    {
        $arResult["opened"] = "reg";
        echo "'reg'";
    }
    ?>];

    var cookie_prefix = '<?=$arResult["COOKIE_PREFIX"]?>';
    </script>

    <?php endif; ?>

</div>

<script>
// Простые улучшения UX без изменения логики

// Плавная анимация при открытии/закрытии секций
document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('.profile-link a');
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            const targetId = this.getAttribute('onclick').match(/'([^']+)'/)[1];
            const section = document.getElementById('user_div_' + targetId);
            
            if (section) {
                if (section.classList.contains('profile-block-hidden')) {
                    section.style.opacity = '0';
                    section.style.transform = 'translateY(-10px)';
                    section.classList.remove('profile-block-hidden');
                    section.classList.add('profile-block-shown');
                    
                    setTimeout(() => {
                        section.style.opacity = '1';
                        section.style.transform = 'translateY(0)';
                    }, 10);
                }
            }
        });
    });
    
    // Подсветка обязательных полей
    const requiredStars = document.querySelectorAll('.starrequired');
    requiredStars.forEach(star => {
        star.style.fontWeight = 'bold';
        star.style.marginLeft = '3px';
    });
    
    // Улучшение внешнего вида полей ввода при фокусе
    const inputs = document.querySelectorAll('input[type="text"], input[type="email"], input[type="tel"], input[type="password"], select, textarea');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.style.boxShadow = '0 0 0 3px rgba(52, 152, 219, 0.2)';
        });
        
        input.addEventListener('blur', function() {
            this.style.boxShadow = '';
        });
        
        // Добавляем плейсхолдеры если их нет
        if (!this.getAttribute('placeholder') && this.type !== 'password') {
            const label = this.closest('tr').querySelector('td:first-child');
            if (label && label.textContent) {
                const labelText = label.textContent.replace('*', '').trim();
                this.setAttribute('placeholder', 'Введите ' + labelText.toLowerCase());
            }
        }
    });
    
    // Улучшение кнопок
    const submitBtn = document.querySelector('input[type="submit"][name="save"]');
    const resetBtn = document.querySelector('input[type="reset"]');
    
    if (submitBtn) {
        submitBtn.style.transition = 'all 0.3s ease';
        submitBtn.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        submitBtn.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    }
    
    if (resetBtn) {
        resetBtn.style.transition = 'all 0.3s ease';
        resetBtn.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        resetBtn.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    }
});
</script>