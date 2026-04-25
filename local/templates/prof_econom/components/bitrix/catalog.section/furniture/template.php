<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="catalog-list-container" style="max-width: 1200px; margin: 0 auto;">
    <?if($arParams["DISPLAY_TOP_PAGER"]):?>
        <div class="top-pager" style="margin-bottom: 30px;">
            <?=$arResult["NAV_STRING"]?>
        </div>
    <?endif;?>

    <div class="catalog-grid" style="display: flex; flex-wrap: wrap; margin: 0 -15px;">
    <?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
        <?
        $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CATALOG_ELEMENT_DELETE_CONFIRM')));
        
        // Определяем ширину карточки в зависимости от количества элементов
        $itemWidth = count($arResult["ITEMS"]) >= 3 ? 'calc(33.333% - 30px)' : 'calc(50% - 30px)';
        ?>
        
        <div class="catalog-item" id="<?=$this->GetEditAreaId($arElement['ID']);?>" 
             style="flex: 0 0 <?=$itemWidth?>; background: white; margin: 0 auto 15px;border-radius: 8px; box-shadow: 0 3px 10px rgba(0,0,0,0.05); transition: all 0.3s ease;">
            <?if(is_array($arElement["PREVIEW_PICTURE"]) || is_array($arElement["DETAIL_PICTURE"])):?>
                <div class="image-wrapper" style="height: 180px; overflow: hidden; position: relative;">
                    <a href="<?=$arElement["DETAIL_PAGE_URL"]?>" style="display: block; height: 100%;">
                        <img src="<?=is_array($arElement["PREVIEW_PICTURE"]) ? $arElement["PREVIEW_PICTURE"]["SRC"] : $arElement["DETAIL_PICTURE"]["SRC"]?>" 
                             style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease;"
                             alt="<?=$arElement["NAME"]?>" />
                    </a>
                    <div class="image-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(to top, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0) 30%);"></div>
                </div>
            <?endif;?>
            
            <div class="item-content" style="padding: 18px;">
                <h3 style="margin: 0 0 12px 0; font-size: 1.1rem; line-height: 1.3; min-height: 2.6em;">
                    <a href="<?=$arElement["DETAIL_PAGE_URL"]?>" style="color: var(--primary); text-decoration: none; font-weight: 600; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;"><?=$arElement["NAME"]?></a>
                </h3>
                
                <?foreach($arElement["PRICES"] as $code=>$arPrice):?>
                    <?if($arPrice["CAN_ACCESS"]):?>
                        <div style="font-size: 1.2rem; color: var(--secondary); font-weight: 700; margin-bottom: 12px;">
                            <?if($arPrice["DISCOUNT_VALUE"] == 0 || $arPrice["VALUE"] == 0):?>
                                Бесплатно
                            <?else:?>
                                <?=$arPrice["PRINT_VALUE"]?>
                            <?endif;?>
                        </div>
                    <?endif;?>
                <?endforeach;?>
                
                <?if($arElement["PREVIEW_TEXT"]):?>
                    <div class="preview-text" style="color: var(--text); font-size: 0.9rem; line-height: 1.4; margin-bottom: 15px; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                        <?=$arElement["PREVIEW_TEXT"]?>
                    </div>
                <?endif;?>
                
                <?if(!empty($arElement["DISPLAY_PROPERTIES"])):?>
                    <div class="properties" style="margin-bottom: 15px;">
                        <?foreach($arElement["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
                            <?if ($pid != 'PRICECURRENCY'):?>
                                <div style="font-size: 0.85rem; color: var(--dark); margin-bottom: 6px;">
                                    <span style="color: var(--gray);"><?=$arProperty["NAME"]?>:</span> 
                                    <span style="font-weight: 500;"><?=is_array($arProperty["DISPLAY_VALUE"]) ? implode(", ", $arProperty["DISPLAY_VALUE"]) : $arProperty["DISPLAY_VALUE"]?></span>
                                </div>
                            <?endif;?>
                        <?endforeach;?>
                    </div>
                <?endif;?>
                
                <a href="<?=$arElement["DETAIL_PAGE_URL"]?>" style="display: inline-flex; align-items: center; justify-content: center; padding: 8px 15px; background: var(--accent_blue); color: white; text-decoration: none; border-radius: 4px; font-size: 0.9rem; transition: all 0.3s; width: 100%; box-sizing: border-box;">
                    Подробнее
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-left: 8px;">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
    <?endforeach;?>
    </div>

    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <div class="bottom-pager" style="margin-top: 20px;">
            <?=$arResult["NAV_STRING"]?>
        </div>
    <?endif;?>
</div>

<style>
    .catalog-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
    
    .catalog-item:hover .image-wrapper img {
        transform: scale(1.05);
    }
    
    .catalog-item:hover h3 a {
        color: var(--secondary);
    }
    
    a[style*="background: var(--accent)"]:hover {
        background: var(--secondary) !important;
    }
    
    @media (max-width: 1023px) {
        .catalog-item {
            flex: 0 0 calc(50% - 30px) !important;
        }
    }
    
    @media (max-width: 767px) {
        .catalog-item {
            flex: 0 0 100% !important;
        }
        
        .catalog-grid {
            margin: 0 !important;
        }
        
        .catalog-item {
            margin: 0 0 20px 0 !important;
        }
    }
</style>