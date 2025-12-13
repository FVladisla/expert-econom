<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<?$APPLICATION->ShowHead();?>
<link href="<?=SITE_TEMPLATE_PATH?>/common.css" type="text/css" rel="stylesheet" />
<link href="<?=SITE_TEMPLATE_PATH?>/colors.css" type="text/css" rel="stylesheet" />
<?
	use Bitrix\Main\Page\Asset;
	$asset = Asset::getInstance();
	
	$asset->addJs(SITE_TEMPLATE_PATH . "/template_scripts.js");
	$asset->addJs('/local/js/swiper/swiper-bundle.min.js');
	$asset->addJs('/local/js/axios.min.js');
	$asset->addCss('/local/css/swiper-bundle.min.css');
	$asset->addCss(SITE_TEMPLATE_PATH . "/common.css");
	$asset->addCss('https://fonts.googleapis.com/css2?family=Manrope&family=Roboto+Flex:opsz,wght@8..144,100..1000&display=swap');?>

	<!--[if lte IE 6]>
	<style type="text/css">
		
		#banner-overlay { 
			background-image: none;
			filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?=SITE_TEMPLATE_PATH?>images/overlay.png', sizingMethod = 'crop'); 
		}
		
		div.product-overlay {
			background-image: none;
			filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?=SITE_TEMPLATE_PATH?>images/product-overlay.png', sizingMethod = 'crop');
		}
		
	</style>
	<![endif]-->

	<title><?$APPLICATION->ShowTitle()?></title>
</head>
<body>
	<div id="page-wrapper">
	<div id="panel"><?$APPLICATION->ShowPanel();?></div>
		<div class="header">
			<div class="logo__container"><a href="<?=SITE_DIR?>" title="<?=GetMessage('CFT_MAIN')?>"><span class="header_logo">Эксперт Эконом</span></a></div>
				
			<div class="right-halv">
				<div class="top-menu" >
					<div id="top-menu-inner" style="width: 100%;">
						<?$APPLICATION->IncludeComponent("bitrix:menu", "horizontal_multilevel", array(
							"ROOT_MENU_TYPE" => "top",
							"MAX_LEVEL" => "2",
							"CHILD_MENU_TYPE" => "left",
							"USE_EXT" => "Y",
							"MENU_CACHE_TYPE" => "A",
							"MENU_CACHE_TIME" => "36000000",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"MENU_CACHE_GET_VARS" => ""
							),
							false,
							array(
							"ACTIVE_COMPONENT" => "Y"
							)
						);?>
					</div>
				</div>
				
				<!-- <div class="top-icons">
					<a href="<?=SITE_DIR?>" class="home-icon" title="<?=GetMessage('CFT_MAIN')?>"></a>
					<a href="<?=SITE_DIR?>search/" class="search-icon" title="<?=GetMessage('CFT_SEARCH')?>"></a>
					<a href="<?=SITE_DIR?>contacts/" class="feedback-icon" title="<?=GetMessage('CFT_FEEDBACK')?>"></a>
				</div> -->
			</div>
		</div>
		
		
		<div id="content">
		
			<div id="sidebar">
				<?$APPLICATION->IncludeComponent("bitrix:menu", "left", array(
					"ROOT_MENU_TYPE" => "left",
					"MENU_CACHE_TYPE" => "A",
					"MENU_CACHE_TIME" => "36000000",
					"MENU_CACHE_USE_GROUPS" => "Y",
					"MENU_CACHE_GET_VARS" => array(
					),
					"MAX_LEVEL" => "1",
					"CHILD_MENU_TYPE" => "left",
					"USE_EXT" => "Y",
					"ALLOW_MULTI_SELECT" => "N"
					),
					false,
					array(
						"ACTIVE_COMPONENT" => "Y"
					)
				);?>
				
					<div class="sidebar-news-block" style="background: white; border-radius: 8px; padding: 20px; box-shadow: 0 2px 12px rgba(0,0,0,0.05); margin-bottom:30px;">
						<h2><?=GetMessage('CFT_NEWS')?></h2>
							
							<?
								$APPLICATION->IncludeComponent("bitrix:news.list", "expert_news_left", array(
									"IBLOCK_TYPE" => "news",
									"IBLOCK_ID" => "1",
									"NEWS_COUNT" => "3",
									"SORT_BY1" => "ACTIVE_FROM",
									"SORT_ORDER1" => "DESC",
									"SORT_BY2" => "SORT",
									"SORT_ORDER2" => "ASC",
									"FILTER_NAME" => "",
									"FIELD_CODE" => array(),
									"PROPERTY_CODE" => array(),
									"CHECK_DATES" => "Y",
									"DETAIL_URL" => "",
									"AJAX_MODE" => "N",
									"AJAX_OPTION_SHADOW" => "Y",
									"AJAX_OPTION_JUMP" => "N",
									"AJAX_OPTION_STYLE" => "Y",
									"AJAX_OPTION_HISTORY" => "N",
									"CACHE_TYPE" => "A",
									"CACHE_TIME" => "36000000",
									"CACHE_FILTER" => "N",
									"CACHE_GROUPS" => "Y",
									"PREVIEW_TRUNCATE_LEN" => "100",
									"ACTIVE_DATE_FORMAT" => "d.m.Y",
									"DISPLAY_PANEL" => "N",
									"SET_TITLE" => "N",
									"SET_STATUS_404" => "N",
									"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
									"ADD_SECTIONS_CHAIN" => "N",
									"HIDE_LINK_WHEN_NO_DETAIL" => "N",
									"PARENT_SECTION" => "",
									"PARENT_SECTION_CODE" => "",
									"DISPLAY_TOP_PAGER" => "N",
									"DISPLAY_BOTTOM_PAGER" => "N",
									"PAGER_TITLE" => "Новости",
									"PAGER_SHOW_ALWAYS" => "N",
									"PAGER_TEMPLATE" => "",
									"PAGER_DESC_NUMBERING" => "N",
									"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
									"PAGER_SHOW_ALL" => "N",
									"AJAX_OPTION_ADDITIONAL" => ""
									),
									false
								);
								?>
					</div>
				
				
				<div class="content-block">
					<div class="content-block-inner">
						
						<?
						$APPLICATION->IncludeComponent("bitrix:search.form", "flat", Array(
							"PAGE" => "#SITE_DIR#search/",
						),
							false
						);
						?>
					</div>
				</div>

				<!-- <div class="information-block">
					<div class="top"></div>
					<div class="information-block-inner">
						<h3><?=GetMessage('CFT_FEATURED')?></h3>
							<?
							$APPLICATION->IncludeFile(
								SITE_DIR."include/random.php",
								Array(),
								Array("MODE"=>"html")
							);
							?>						
					</div>
					<div class="bottom"></div>
				</div> -->
			</div>
		
			<div id="workarea">
				
