<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


    <h3 class="sidebar-news-title" style="color: var(--primary); font-size: 1.2rem; margin: 0 0 20px 0; padding-bottom: 12px; border-bottom: 2px solid var(--secondary); position: relative;">
        <?=GetMessage('NEWS_TITLE')?>
        <span style="position: absolute; bottom: -2px; left: 0; width: 40px; height: 2px; background: var(--accent_blue);"></span>
    </h3>
    
    <div class="sidebar-news-list" style="list-style: none; padding: 0; margin: 0;">
    <?foreach($arResult["ITEMS"] as $i => $arItem):?>
        <div class="sidebar-news-item" style="margin-bottom: 18px; position: relative; padding-bottom: 18px;<?=($i < count($arResult["ITEMS"])-1 ? 'border-bottom: 1px solid rgba(52, 152, 219, 0.15);' : '')?>">
            
            <div class="news-date" style="color: var(--gray); font-size: 0.75rem; margin-bottom: 5px; font-weight: 500; display: flex; align-items: center;">
                
                <?echo $arItem["DISPLAY_ACTIVE_FROM"]?>
            </div>
            
            <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="news-link" style="color: var(--dark); text-decoration: none; display: block; line-height: 1.4; transition: all 0.3s; font-size: 0.9rem; ">
                <?echo TruncateText($arItem["PREVIEW_TEXT"], 60)?>
            </a>
            
            <?if($i < count($arResult["ITEMS"])-1):?>
                <div class="news-divider" style="position: absolute; bottom: 0; left: 16px; right: 0; height: 1px; background: linear-gradient(90deg, rgba(52,152,219,0.2) 0%, var(--accent_blue) 50%, rgba(52,152,219,0.2) 100%);"></div>
            <?endif;?>
        </div>
    <?endforeach;?>
    </div>
    
    
    <div class="sidebar-all-news" style="margin-top: 10px; text-align: right;">
        <a href="/news/" style="color: var(--accent_blue); text-decoration: none; font-size: 0.85rem; display: inline-flex; align-items: center; transition: all 0.3s;">
            <span>Все новости</span>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-left: 5px; transition: transform 0.3s;">
                <path d="M5 12h14M12 5l7 7-7 7"/>
            </svg>
        </a>
    </div>
    


<style>
    .sidebar-news-item:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
    }
    
    .news-link:hover.news-date {
        transform: translateX(10px);
    }
    .news-link:hover {
        color: var(--secondary);
        transform: translateX(10px);
    }
    .sidebar-all-news a:hover {
        color: var(--secondary);
    }
    .sidebar-all-news a:hover span{
        color: var(--secondary);
    }
    .sidebar-all-news a:hover svg {
        transform: translateX(3px);
        stroke: var(--secondary);
    }
</style>