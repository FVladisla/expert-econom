<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<!-- Обертка для вакансий -->
<div class="vacancies-container" >

    <!-- Блок с якорными ссылками -->
    <div class="vacancies-nav" style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-bottom: 30px;">
        <h3 style="color: var(--primary); margin-bottom: 15px; font-size: 1.3rem;"><?=GetMessage("VACANCIES_LIST")?></h3>
        <ul style="list-style: none; columns: 2; column-gap: 30px;">
        <?
        foreach ($arResult['ITEMS'] as $key=>$val):
        ?>
            <li style="margin-bottom: 10px; break-inside: avoid;">
                <a href="#<?=$val["ID"]?>" style="color: var(--accent); text-decoration: none; transition: color 0.3s; display: flex; align-items: center;">
                    <span style="display: inline-block; width: 8px; height: 8px; background: var(--secondary); border-radius: 50%; margin-right: 10px;"></span>
                    <span class="vacancy-navigation"><?=$val['NAME']?></span>
                </a>
            </li>
        <?
        endforeach;
        ?>
        </ul>
    </div>

    <!-- Список вакансий -->
    <div class="vacancies-list">
    <?
    foreach ($arResult['ITEMS'] as $key=>$val):
        $this->AddEditAction($val['ID'], $val['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($val['ID'], $val['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('FAQ_DELETE_CONFIRM', array("#ELEMENT#" => CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_NAME")))));
    ?>
        <div id="<?=$this->GetEditAreaId($val['ID']);?>" class="vacancy-item" style="background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); padding: 25px; margin-bottom: 30px; position: relative; border-left: 3px solid var(--accent_blue);">
            <a name="<?=$val["ID"]?>"></a>
            <h3 style="color: var(--primary); margin-bottom: 15px; font-size: 1.5rem;"><?=$val['NAME']?></h3>
            
            <div class="vacancy-content" style="line-height: 1.6; color: var(--text);">
                <?=$val['PREVIEW_TEXT']?>
                <?=$val['DETAIL_TEXT']?>
            </div>
            
            <div class="vacancy-footer" style="margin-top: 20px; padding-top: 15px; border-top: 1px solid rgba(0,0,0,0.05); text-align: right;">
                <a href="#top" style="display: inline-flex; align-items: center; color: var(--gray); text-decoration: none; font-size: 0.9rem; transition: color 0.3s;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 5px;">
                        <path d="M17 15l-5-5-5 5"/>
                    </svg>
                    <?=GetMessage("SUPPORT_FAQ_GO_UP")?>
                </a>
            </div>
        </div>
    <?
    endforeach;
    ?>
    </div>
</div>