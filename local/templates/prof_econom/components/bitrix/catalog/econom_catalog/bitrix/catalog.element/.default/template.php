<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="catalog-detail" style="max-width: 1200px; margin: 0 auto; padding: 20px;">
    <div class="catalog-item" style="background: white; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); overflow: hidden;">
        <div class="catalog-item-header" style="padding: 25px; border-bottom: 1px solid rgba(0,0,0,0.05);">
            <h1 style="color: var(--primary); margin: 0 0 10px 0; font-size: 1.8rem;"><?=$arResult["NAME"]?></h1>
            
            <!-- <?foreach($arResult["PRICES"] as $code=>$arPrice):?>
                <?if($arPrice["PRINT_VALUE"] > 0):?>
                    <div class="catalog-item-price" style="font-size: 1.4rem; color: var(--secondary); margin: 15px 0; font-weight: 700;">
                        <span style="font-size: 1rem; color: var(--gray);"><?=GetMessage('CR_PRICE')?>:</span> 
                        <?=$arPrice["PRINT_VALUE"]?>
                    </div>
                <?endif;?>
            <?endforeach;?> -->
            
            <!-- Новая кнопка "Пройти курс" -->
            <!-- Блок цены и кнопки -->
            <?$isFreeCourse = ($arResult['PROPERTIES']['TYPE_OF_PRICE']['VALUE_XML_ID'] == 'FREE');?>
            
            <?if(!$isFreeCourse && !empty($arResult["PRICES"])):?>
                <?foreach($arResult["PRICES"] as $code=>$arPrice):?>
                    <?if($arPrice["PRINT_VALUE"] > 0):?>
                        <div class="catalog-item-price" style="font-size: 1.4rem; color: var(--secondary); margin: 15px 0; font-weight: 700;">
                            <span style="font-size: 1rem; color: var(--gray);"><?=GetMessage('CR_PRICE')?>:</span> 
                            <?=$arPrice["PRINT_VALUE"]?>
                        </div>
                    <?endif;?>
                <?endforeach;?>
            <?endif;?>
            
            <!-- Кнопка в зависимости от типа курса -->
            <div class="course-actions" style="margin-top: 25px;">
                <?if($isFreeCourse):?>
                    <a href="/learning/<?=$arResult['ID']?>/" 
                       class="start-course-btn" 
                       style="display: inline-block; padding: 12px 30px; background: var(--accent_blue); color: white; text-decoration: none; border-radius: 4px; font-weight: 600; transition: all 0.3s;">
                        Начать бесплатно
                    </a>
                <?elseif($USER->IsAuthorized()):?>
                    <a href="/learning/<?=$arResult['ID']?>/" 
                       class="start-course-btn" 
                       style="display: inline-block; padding: 12px 30px; background: var(--accent_blue); color: white; text-decoration: none; border-radius: 4px; font-weight: 600; transition: all 0.3s;">
                        Продолжить обучение
                    </a>
                <?else:?>
                    <button class="buy-course-btn" 
                            style="padding: 12px 30px; background: var(--secondary); color: white; border: none; border-radius: 4px; font-weight: 600; cursor: pointer; transition: all 0.3s;"
                            onclick="BX.util.popup.showAuthForm()">
                        Купить курс
                    </button>
                    <div class="course-trial" style="margin-top: 15px; font-size: 0.9rem; color: var(--gray);">
                        Доступен <a href="/free-lesson/?course=<?=$arResult['ID']?>" style="color: var(--accent);">бесплатный пробный урок</a>
                    </div>
                <?endif;?>
            </div>
        </div>

        <div class="catalog-item-content" style="display: flex; flex-wrap: wrap; width: 100%; flex-direction: column;">
            <?if($arParams['DETAIL_SHOW_PICTURE'] != 'N' && (is_array($arResult["PREVIEW_PICTURE"]) || is_array($arResult["DETAIL_PICTURE"]))):?>
                <div class="catalog-item-image" style="width: 100%; flex: 1; min-width: 300px; padding: 20px; background: #f9f9f9; display: flex; align-items: center; justify-content: center;">
                    <?if(is_array($arResult["DETAIL_PICTURE"])):?>
                        <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" 
                             style="max-width: 100%; height: auto; border-radius: 4px; box-shadow: 0 3px 10px rgba(0,0,0,0.1);" 
                             alt="<?=$arResult["NAME"]?>" 
                             title="<?=$arResult["NAME"]?>" />
                    <?elseif(is_array($arResult["PREVIEW_PICTURE"])):?>
                        <img src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" 
                             style="max-width: 100%; height: auto; border-radius: 4px; box-shadow: 0 3px 10px rgba(0,0,0,0.1);" 
                             alt="<?=$arResult["NAME"]?>" 
                             title="<?=$arResult["NAME"]?>" />
                    <?endif;?>
                </div>
            <?endif;?>

            <div class="catalog-item-desc" style="flex: 2; min-width: 300px; padding: 25px;">
                <?if($arResult["DETAIL_TEXT"]):?>
                    <div class="catalog-text" style="line-height: 1.6; margin-bottom: 30px;">
                        <?=$arResult["DETAIL_TEXT"]?>
                    </div>
                <?elseif($arResult["PREVIEW_TEXT"]):?>
                    <div class="catalog-text" style="line-height: 1.6; margin-bottom: 30px;">
                        <?=$arResult["PREVIEW_TEXT"]?>
                    </div>
                <?endif;?>

                <!-- Блок "Содержание курса" -->
                <div class="course-structure" style="margin-bottom: 30px;">
                    <? // Получаем этапы курса с более подробной информацией ?>
                    <?$arStages = []; 
                    $rsStages = CIBlockElement::GetList(
                        ['PROPERTY_STAGE_ORDER' => 'ASC'],
                        [
                            'IBLOCK_ID' => 5, // ID инфоблока "Этапы курсов"
                            'PROPERTY_COURSE_ID' => $arResult['ID'],
                            'ACTIVE' => 'Y'
                        ],
                        false,
                        false,
                        ['ID', 'NAME', 'CODE', 'PROPERTY_STAGE_ORDER', 'PROPERTY_DURATION']
                    );
                    
                    while($stage = $rsStages->GetNext()) {
                        $arStages[] = $stage;
                    }
                    ?>
                    <? // Получаем этапы курса с более подробной информацией ?>
                    <?$arTheory = []; 
                    $rsTheory = CIBlockElement::GetList(
                        ['PROPERTY_STAGE_ORDER' => 'ASC'],
                        [
                            'IBLOCK_ID' => 6, // ID инфоблока "Этапы курсов"
                            'PROPERTY_T_COURSE_ID' => $arResult['ID'],
                            'ACTIVE' => 'Y'
                        ],
                        false,
                        false,
                        ['ID', 'NAME', 'CODE', 'PROPERTY_TEXT_COURSE',]
                    );
                    
                    while($theory = $rsTheory->GetNext()) {
                        $arTheory[] = $theory;
                    }
                    ?>
                    <?if(!empty($arTheory)):?>
                        <h3 style="color: var(--primary); margin-bottom: 20px; font-size: 1.3rem;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: middle; margin-right: 8px;">
                                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                            </svg>
                            Теоретические материалы курса
                        </h3>
                        
                        
                        <div class="stages-list" style="border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                            <?foreach($arTheory as $index => $theory):?>
                                <div class="stage-item" style="border-bottom: 1px solid rgba(0,0,0,0.05); background: white;">
                                    <a href="/theory/course/<?=$theory['CODE']?>/" 
                                    style="display: block; padding: 20px; text-decoration: none; color: inherit; transition: all 0.3s;"
                                    onmouseover="this.style.backgroundColor='#f9f9f9'"
                                    onmouseout="this.style.backgroundColor='white'">
                                        <div style="display: flex; align-items: center; justify-content: space-between;">
                                            <div style="display: flex; align-items: center; gap: 15px;">
                                                <div style="width: 36px; height: 36px; background: var(--accent_blue); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600;">
                                                    <?=$index+1?>
                                                </div>
                                                <div>
                                                    <div style="font-weight: 600; color: var(--primary); margin-bottom: 5px;"><?=$theory['NAME']?></div>
                                                    
                                                </div>
                                            </div>
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M9 18l6-6-6-6"/>
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                            <?endforeach;?>
                        </div>
                    <?endif;?>

                    <?if(!empty($arStages)):?>
                        <h3 style="color: var(--primary); margin-bottom: 20px; font-size: 1.3rem;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: middle; margin-right: 8px;">
                                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                            </svg>
                            Программа курса
                        </h3>
                        
                        <?if($arResult['PROPERTIES']['DURATION_OF_TIME']['VALUE']):?>
                            <div style="font-weight: 500; margin-bottom: 15px; color: var(--dark);">
                                Общая длительность: <?=$arResult['PROPERTIES']['DURATION_OF_TIME']['VALUE']?> ч.
                            </div>
                        <?endif;?>
                        
                        <div class="stages-list" style="border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                            <?foreach($arStages as $index => $stage):?>
                                <div class="stage-item" style="border-bottom: 1px solid rgba(0,0,0,0.05); background: white;">
                                    <a href="/stages/course/<?=$stage['CODE']?>/" 
                                    style="display: block; padding: 20px; text-decoration: none; color: inherit; transition: all 0.3s;"
                                    onmouseover="this.style.backgroundColor='#f9f9f9'"
                                    onmouseout="this.style.backgroundColor='white'">
                                        <div style="display: flex; align-items: center; justify-content: space-between;">
                                            <div style="display: flex; align-items: center; gap: 15px;">
                                                <div style="width: 36px; height: 36px; background: var(--accent_blue); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600;">
                                                    <?=$index+1?>
                                                </div>
                                                <div>
                                                    <div style="font-weight: 600; color: var(--primary); margin-bottom: 5px;"><?=$stage['NAME']?></div>
                                                    <?if($stage['PROPERTY_DURATION_VALUE']):?>
                                                        <div style="font-size: 0.85rem; color: var(--gray);">Длительность: <?=$stage['PROPERTY_DURATION_VALUE']?> ч.</div>
                                                    <?endif;?>
                                                </div>
                                            </div>
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M9 18l6-6-6-6"/>
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                            <?endforeach;?>
                        </div>
                        <h3 style="color: var(--primary); margin-bottom: 20px; font-size: 1.3rem;">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align: middle; margin-right: 8px;">
                                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                            </svg>
                            Бизнес-симулятор
                        </h3>
                        <div class="stages-list" style="border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                            <div class="stage-item" style="border-bottom: 1px solid rgba(0,0,0,0.05); background: white;">
                                <a href="/simulator/" 
                                style="display: block; padding: 20px; text-decoration: none; color: inherit; transition: all 0.3s;"
                                onmouseover="this.style.backgroundColor='#f9f9f9'"
                                onmouseout="this.style.backgroundColor='white'">
                                    <div style="display: flex; align-items: center; justify-content: space-between;">
                                        <div style="display: flex; align-items: center; gap: 15px;">
                                            <div style="width: 36px; height: 36px; background: var(--accent_blue); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 600;">
                                                1
                                            </div>
                                            <div>
                                                <div style="font-weight: 600; color: var(--primary); margin-bottom: 5px;">Фабрика прибыли: Оптимизация производства</div>
                                                
                                            </div>
                                        </div> 
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M9 18l6-6-6-6"/>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?endif;?>
                </div>
                                                    </div>
        <div class="catalog-item-footer" style="padding: 20px 25px; border-top: 1px solid rgba(0,0,0,0.05); text-align: center;">
            <?if(is_array($arResult["SECTION"])):?>
                <a href="<?=$arResult["SECTION"]["SECTION_PAGE_URL"]?>" 
                   style="color: var(--accent_blue); text-decoration: none; display: inline-flex; align-items: center; transition: all 0.3s;"
                   onmouseover="this.style.color='var(--secondary)'" 
                   onmouseout="this.style.color='var(--accent_blue)'">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;">
                        <path d="M19 12H5M12 19l-7-7 7-7"/>
                    </svg>
                    <?=GetMessage("CATALOG_BACK")?>
                </a>
            <?elseif (is_array($arResult['IBLOCK'])):?>
                <a href="<?=$arResult["IBLOCK"]["LIST_PAGE_URL"]?>" 
                   style="color: var(--accent_blue); text-decoration: none; display: inline-flex; align-items: center; transition: all 0.3s;"
                   onmouseover="this.style.color='var(--secondary)'" 
                   onmouseout="this.style.color='var(--accent_blue)'">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 8px;">
                        <path d="M19 12H5M12 19l-7-7 7-7"/>
                    </svg>
                    <?=GetMessage("CATALOG_BACK")?>
                </a>
            <?endif;?>
        </div>
    </div>
</div>

<style>
    .start-course-btn:hover {
        background: var(--secondary) !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .buy-course-btn:hover {
        background: var(--primary) !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    @media (max-width: 768px) {
        .catalog-item-content {
            flex-direction: column;
        }
        .catalog-item-image {
            order: -1;
        }
        .properties-grid {
            grid-template-columns: 1fr;
        }
        
        .start-course-btn, 
        .buy-course-btn {
            width: 100%;
            text-align: center;
        }
    }
</style>

<script>
    // Трекинг начала курса
    document.querySelector('.start-course-btn')?.addEventListener('click', function() {
        BX.ajax.runComponentAction('custom:courses', 'trackStart', {
            mode: 'ajax',
            data: {
                courseId: <?=$arResult['ID']?>,
                sessid: BX.bitrix_sessid()
            }
        });
    });
</script>