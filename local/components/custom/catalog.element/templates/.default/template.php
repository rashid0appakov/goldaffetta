<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);

$templateLibrary = array('popup', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES']))
{
  $templateLibrary[] = 'currency';
  $currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
  'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
  'TEMPLATE_LIBRARY' => $templateLibrary,
  'CURRENCIES' => $currencyList,
  'ITEM' => array(
    'ID' => $arResult['ID'],
    'IBLOCK_ID' => $arResult['IBLOCK_ID'],
    'OFFERS_SELECTED' => $arResult['OFFERS_SELECTED'],
    'JS_OFFERS' => $arResult['JS_OFFERS']
  )
);
unset($currencyList, $templateLibrary);

$mainId = $this->GetEditAreaId($arResult['ID']);
$itemIds = array(
  'ID' => $mainId,
  'DISCOUNT_PERCENT_ID' => $mainId.'_dsc_pict',
  'STICKER_ID' => $mainId.'_sticker',
  'BIG_SLIDER_ID' => $mainId.'_big_slider',
  'BIG_IMG_CONT_ID' => $mainId.'_bigimg_cont',
  'SLIDER_CONT_ID' => $mainId.'_slider_cont',
  'OLD_PRICE_ID' => $mainId.'_old_price',
  'PRICE_ID' => $mainId.'_price',
  'DESCRIPTION_ID' => $mainId.'_description',
  'DISCOUNT_PRICE_ID' => $mainId.'_price_discount',
  'PRICE_TOTAL' => $mainId.'_price_total',
  'SLIDER_CONT_OF_ID' => $mainId.'_slider_cont_',
  'QUANTITY_ID' => $mainId.'_quantity',
  'QUANTITY_DOWN_ID' => $mainId.'_quant_down',
  'QUANTITY_UP_ID' => $mainId.'_quant_up',
  'QUANTITY_MEASURE' => $mainId.'_quant_measure',
  'QUANTITY_LIMIT' => $mainId.'_quant_limit',
  'BUY_LINK' => $mainId.'_buy_link',
  'ADD_BASKET_LINK' => $mainId.'_add_basket_link',
  'BASKET_ACTIONS_ID' => $mainId.'_basket_actions',
  'NOT_AVAILABLE_MESS' => $mainId.'_not_avail',
  'COMPARE_LINK' => $mainId.'_compare_link',
  'TREE_ID' => $mainId.'_skudiv',
  'DISPLAY_PROP_DIV' => $mainId.'_sku_prop',
  'DISPLAY_MAIN_PROP_DIV' => $mainId.'_main_sku_prop',
  'OFFER_GROUP' => $mainId.'_set_group_',
  'BASKET_PROP_DIV' => $mainId.'_basket_prop',
  'SUBSCRIBE_LINK' => $mainId.'_subscribe',
  'TABS_ID' => $mainId.'_tabs',
  'TAB_CONTAINERS_ID' => $mainId.'_tab_containers',
  'SMALL_CARD_PANEL_ID' => $mainId.'_small_card_panel',
  'TABS_PANEL_ID' => $mainId.'_tabs_panel'
);
$obName = $templateData['JS_OBJ'] = 'ob'.preg_replace('/[^a-zA-Z0-9_]/', 'x', $mainId);
$name = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])
  ? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
  : $arResult['NAME'];
$title = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE'])
  ? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE']
  : $arResult['NAME'];
$alt = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT'])
  ? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']
  : $arResult['NAME'];

$haveOffers = !empty($arResult['OFFERS']);
if ($haveOffers)
{
  $actualItem = $arResult['OFFERS'][$arResult['OFFERS_SELECTED']] ?? reset($arResult['OFFERS']);
  $showSliderControls = false;

  foreach ($arResult['OFFERS'] as $offer)
  {
    if ($offer['MORE_PHOTO_COUNT'] > 1)
    {
      $showSliderControls = true;
      break;
    }
  }
}
else
{
  $actualItem = $arResult;
  $showSliderControls = $arResult['MORE_PHOTO_COUNT'] > 1;
}

$skuProps = array();
$price = $actualItem['ITEM_PRICES'][$actualItem['ITEM_PRICE_SELECTED']];
$measureRatio = $actualItem['ITEM_MEASURE_RATIOS'][$actualItem['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'];
$showDiscount = $price['PERCENT'] > 0;

if ($arParams['SHOW_SKU_DESCRIPTION'] === 'Y')
{
  $skuDescription = false;
  foreach ($arResult['OFFERS'] as $offer)
  {
    if ($offer['DETAIL_TEXT'] != '' || $offer['PREVIEW_TEXT'] != '')
    {
      $skuDescription = true;
      break;
    }
  }
  $showDescription = $skuDescription || !empty($arResult['PREVIEW_TEXT']) || !empty($arResult['DETAIL_TEXT']);
}
else
{
  $showDescription = !empty($arResult['PREVIEW_TEXT']) || !empty($arResult['DETAIL_TEXT']);
}

$showBuyBtn = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION']);
$buyButtonClassName = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showAddBtn = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION']);
$showButtonClassName = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-default' : 'btn-link';
$showSubscribe = $arParams['PRODUCT_SUBSCRIPTION'] === 'Y' && ($arResult['PRODUCT']['SUBSCRIBE'] === 'Y' || $haveOffers);

$arParams['MESS_BTN_BUY'] = $arParams['MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCE_CATALOG_BUY');
$arParams['MESS_BTN_ADD_TO_BASKET'] = $arParams['MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCE_CATALOG_ADD');
$arParams['MESS_NOT_AVAILABLE'] = $arParams['MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE');
$arParams['MESS_BTN_COMPARE'] = $arParams['MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCE_CATALOG_COMPARE');
$arParams['MESS_PRICE_RANGES_TITLE'] = $arParams['MESS_PRICE_RANGES_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_PRICE_RANGES_TITLE');
$arParams['MESS_DESCRIPTION_TAB'] = $arParams['MESS_DESCRIPTION_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_DESCRIPTION_TAB');
$arParams['MESS_PROPERTIES_TAB'] = $arParams['MESS_PROPERTIES_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_PROPERTIES_TAB');
$arParams['MESS_COMMENTS_TAB'] = $arParams['MESS_COMMENTS_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_COMMENTS_TAB');
$arParams['MESS_SHOW_MAX_QUANTITY'] = $arParams['MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCE_CATALOG_SHOW_MAX_QUANTITY');
$arParams['MESS_RELATIVE_QUANTITY_MANY'] = $arParams['MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_FEW'] = $arParams['MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_FEW');

$positionClassMap = array(
  'left' => 'product-item-label-left',
  'center' => 'product-item-label-center',
  'right' => 'product-item-label-right',
  'bottom' => 'product-item-label-bottom',
  'middle' => 'product-item-label-middle',
  'top' => 'product-item-label-top'
);

$discountPositionClass = 'product-item-label-big';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION']))
{
  foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos)
  {
    $discountPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
  }
}

$labelPositionClass = 'product-item-label-big';
if (!empty($arParams['LABEL_PROP_POSITION']))
{
  foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos)
  {
    $labelPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
  }
}
?>


<div class="bx-catalog-element" id="<?=$itemIds['ID']?>"
  itemscope itemtype="http://schema.org/Product">

<div class="col-md-6 col-sm-12" style="display:none;">
        <div class="product-item-detail-slider-container" id="<?=$itemIds['BIG_SLIDER_ID']?>">
          <span class="product-item-detail-slider-close" data-entity="close-popup"></span>
          <div class="product-item-detail-slider-block
            <?=($arParams['IMAGE_RESOLUTION'] === '1by1' ? 'product-item-detail-slider-block-square' : '')?>"
            data-entity="images-slider-block">
            <span class="product-item-detail-slider-left" data-entity="slider-control-left" style="display: none;"></span>
            <span class="product-item-detail-slider-right" data-entity="slider-control-right" style="display: none;"></span>
            <div class="product-item-label-text <?=$labelPositionClass?>" id="<?=$itemIds['STICKER_ID']?>"
              <?=(!$arResult['LABEL'] ? 'style="display: none;"' : '' )?>>
              <?php
              if ($arResult['LABEL'] && !empty($arResult['LABEL_ARRAY_VALUE']))
              {
                foreach ($arResult['LABEL_ARRAY_VALUE'] as $code => $value)
                {
                  ?>
                  <div<?=(!isset($arParams['LABEL_PROP_MOBILE'][$code]) ? ' class="hidden-xs"' : '')?>>
                    <span title="<?=$value?>"><?=$value?></span>
                  </div>
                  <?php
                }
              }
              ?>
            </div>
            <?php
            if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y')
            {
              if ($haveOffers)
              {
                ?>
                <div class="product-item-label-ring <?=$discountPositionClass?>" id="<?=$itemIds['DISCOUNT_PERCENT_ID']?>"
                  style="display: none;">
                </div>
                <?php
              }
              else
              {
                if ($price['DISCOUNT'] > 0)
                {
                  ?>
                  <div class="product-item-label-ring <?=$discountPositionClass?>" id="<?=$itemIds['DISCOUNT_PERCENT_ID']?>"
                    title="<?=-$price['PERCENT']?>%">
                    <span><?=-$price['PERCENT']?>%</span>
                  </div>
                  <?php
                }
              }
            }
            ?>
            <div class="product-item-detail-slider-images-container" data-entity="images-container">
              <?php
              if (!empty($actualItem['MORE_PHOTO']))
              {
                foreach ($actualItem['MORE_PHOTO'] as $key => $photo)
                {
                  ?>
                  <div class="product-item-detail-slider-image<?=($key == 0 ? ' active' : '')?>" data-entity="image" data-id="<?=$photo['ID']?>">
                    <img src="<?=$photo['SRC']?>" alt="<?=$alt?>" title="<?=$title?>"<?=($key == 0 ? ' itemprop="image"' : '')?>>
                  </div>
                  <?php
                }
              }

              if ($arParams['SLIDER_PROGRESS'] === 'Y')
              {
                ?>
                <div class="product-item-detail-slider-progress-bar" data-entity="slider-progress-bar" style="width: 0;"></div>
                <?php
              }
              ?>
            </div>
          </div>
          <?php
          if ($showSliderControls)
          {
            if ($haveOffers)
            {
              foreach ($arResult['OFFERS'] as $keyOffer => $offer)
              {
                if (!isset($offer['MORE_PHOTO_COUNT']) || $offer['MORE_PHOTO_COUNT'] <= 0)
                  continue;

                $strVisible = $arResult['OFFERS_SELECTED'] == $keyOffer ? '' : 'none';
                ?>
                <div class="product-item-detail-slider-controls-block" id="<?=$itemIds['SLIDER_CONT_OF_ID'].$offer['ID']?>" style="display: <?=$strVisible?>;">
                  <?php
                  foreach ($offer['MORE_PHOTO'] as $keyPhoto => $photo)
                  {
                    ?>
                    <div class="product-item-detail-slider-controls-image<?=($keyPhoto == 0 ? ' active' : '')?>"
                      data-entity="slider-control" data-value="<?=$offer['ID'].'_'.$photo['ID']?>">
                      <img src="<?=$photo['SRC']?>">
                    </div>
                    <?php
                  }
                  ?>
                </div>
                <?php
              }
            }
            else
            {
              ?>
              <div class="product-item-detail-slider-controls-block" id="<?=$itemIds['SLIDER_CONT_ID']?>">
                <?php
                if (!empty($actualItem['MORE_PHOTO']))
                {
                  foreach ($actualItem['MORE_PHOTO'] as $key => $photo)
                  {
                    ?>
                    <div class="product-item-detail-slider-controls-image<?=($key == 0 ? ' active' : '')?>"
                      data-entity="slider-control" data-value="<?=$photo['ID']?>">
                      <img src="<?=$photo['SRC']?>">
                    </div>
                    <?php
                  }
                }
                ?>
              </div>
              <?php
            }
          }
          ?>
        </div>
      </div>

    <div class="cart-product">
      <div class="container">
        <div class="cart-product__holder">
          <div class="cart-product__info">
            <div class="cart-product__slider">
              <div class="cart-product__slider-nav slider-nav slick-slider">
                <?php foreach ($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $key => $img): ?>
                  <?$img_slider = CFile::GetFileArray($img);?>
                  <div class="cart-product__slider-nav-item">
                    <div class="cart-product__slider-nav-item-inner" style="background-image: url('<?=$img_slider["SRC"]?>')"></div>
                  </div>
                <?php endforeach ?>
              </div>
              <div class="cart-product__slider-for slider-for slick-slider">
                <?php foreach ($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $key => $img): ?>
                  <?$img_slider = CFile::GetFileArray($img);?>
                  <div class="cart-product__slider-for-item">
                    <a class="img" href="<?=$img_slider["SRC"]?>" data-fancybox="gallery" style="background-image: url('<?=$img_slider["SRC"]?>')"></a>
                  </div>
                <?php endforeach ?>
              </div>
            </div>
            <div class="cart-product__description">
              <div class="cart-product__description-info">
                <div class="cart-product__description-info-item">Артикул: <?=$arResult["PROPERTIES"]["CML2_ARTICLE"]["VALUE"]?></div>
                <div class="cart-product__description-info-item">В наличии <?=$arResult["PRODUCT"]["QUANTITY"]?> штук</div>
              </div>
              <h1><?=$name?></h1>
              <div class="cart-product__description-tx">
                <div class="cart-product__description-tx-table">
                  <?php foreach ($arResult["PROPERTIES"] as $propetries): ?>
                   <?php if ($propetries['CODE'] == "TIP_KOZHI" || $propetries['CODE'] == "OBSHCHIY_SROK_GODNOSTI_MES" || $propetries['CODE'] == "AROMAT"): ?>
                    <?php if (!empty($propetries['VALUE'])): ?>
                    <div class="cart-product__description-tx-table-row">
                      <div class="cart-product__description-tx-table-cell"><?=$propetries['NAME']?></div>
                      <div class="cart-product__description-tx-table-cell"><?=$propetries['VALUE']?></div>
                    </div>
                    <?php endif ?>
                   <?php endif; ?>
                   <?php if($propetries['CODE'] == "CML2_MANUFACTURER"): ?>
                    <?php if (!empty($propetries['VALUE'])): ?>
                      <div class="cart-product__description-tx-table-row">
                        <div class="cart-product__description-tx-table-cell">Производитель</div>
                        <a class="cart-product__description-tx-table-cell" href="#">KERASYS</a>
                      </div>
                    <?php endif; ?>  
                   <?php endif; ?> 
                    
                  <?php endforeach ?>
                </div>
              </div>
              <div class="cart-product__description-top">
                
              <?php
              foreach ($arParams['PRODUCT_PAY_BLOCK_ORDER'] as $blockName)
              {
                switch ($blockName)
                {
                  case 'rating':
                    if ($arParams['USE_VOTE_RATING'] === 'Y')
                    {
                      ?>
                      <div class="product-item-detail-info-container">
                        <?php
                        $APPLICATION->IncludeComponent(
                          'bitrix:iblock.vote',
                          'stars',
                          array(
                            'CUSTOM_SITE_ID' => $arParams['CUSTOM_SITE_ID'] ?? null,
                            'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
                            'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                            'ELEMENT_ID' => $arResult['ID'],
                            'ELEMENT_CODE' => '',
                            'MAX_VOTE' => '5',
                            'VOTE_NAMES' => array('1', '2', '3', '4', '5'),
                            'SET_STATUS_404' => 'N',
                            'DISPLAY_AS_RATING' => $arParams['VOTE_DISPLAY_AS_RATING'],
                            'CACHE_TYPE' => $arParams['CACHE_TYPE'],
                            'CACHE_TIME' => $arParams['CACHE_TIME']
                          ),
                          $component,
                          array('HIDE_ICONS' => 'Y')
                        );
                        ?>
                      </div>
                      <?php
                    }

                    break;

                  case 'price':
                    ?>
                    <div class="cart-product__description-price">
                      <div class="cart-product__description-price-now" id="<?=$itemIds['PRICE_ID']?>">
                        <?=$price['PRINT_RATIO_PRICE']?>
                      </div>
                      <?php
                      if ($arParams['SHOW_OLD_PRICE'] === 'Y')
                      {
                        ?>
                        <div class="cart-product__description-price-old" id="<?=$itemIds['OLD_PRICE_ID']?>"
                          style="display: <?=($showDiscount ? '' : 'none')?>;">
                          <?=($showDiscount ? $price['PRINT_RATIO_BASE_PRICE'] : '')?>
                        </div>
                        <?php
                      }
                      ?>
                    </div>
                    <?php
                    break;

                  case 'priceRanges':
                    if ($arParams['USE_PRICE_COUNT'])
                    {
                      $showRanges = !$haveOffers && count($actualItem['ITEM_QUANTITY_RANGES']) > 1;
                      $useRatio = $arParams['USE_RATIO_IN_RANGES'] === 'Y';
                      ?>
                      <div class="product-item-detail-info-container"
                        <?=$showRanges ? '' : 'style="display: none;"'?>
                        data-entity="price-ranges-block">
                        <div class="product-item-detail-info-container-title">
                          <?=$arParams['MESS_PRICE_RANGES_TITLE']?>
                          <span data-entity="price-ranges-ratio-header">
                            (<?=(Loc::getMessage(
                              'CT_BCE_CATALOG_RATIO_PRICE',
                              array('#RATIO#' => ($useRatio ? $measureRatio : '1').' '.$actualItem['ITEM_MEASURE']['TITLE'])
                            ))?>)
                          </span>
                        </div>
                        <dl class="product-item-detail-properties" data-entity="price-ranges-body">
                          <?php
                          if ($showRanges)
                          {
                            foreach ($actualItem['ITEM_QUANTITY_RANGES'] as $range)
                            {
                              if ($range['HASH'] !== 'ZERO-INF')
                              {
                                $itemPrice = false;

                                foreach ($arResult['ITEM_PRICES'] as $itemPrice)
                                {
                                  if ($itemPrice['QUANTITY_HASH'] === $range['HASH'])
                                  {
                                    break;
                                  }
                                }

                                if ($itemPrice)
                                {
                                  ?>
                                  <dt>
                                    <?php
                                    echo Loc::getMessage(
                                        'CT_BCE_CATALOG_RANGE_FROM',
                                        array('#FROM#' => $range['SORT_FROM'].' '.$actualItem['ITEM_MEASURE']['TITLE'])
                                      ).' ';

                                    if (is_infinite($range['SORT_TO']))
                                    {
                                      echo Loc::getMessage('CT_BCE_CATALOG_RANGE_MORE');
                                    }
                                    else
                                    {
                                      echo Loc::getMessage(
                                        'CT_BCE_CATALOG_RANGE_TO',
                                        array('#TO#' => $range['SORT_TO'].' '.$actualItem['ITEM_MEASURE']['TITLE'])
                                      );
                                    }
                                    ?>
                                  </dt>
                                  <dd><?=($useRatio ? $itemPrice['PRINT_RATIO_PRICE'] : $itemPrice['PRINT_PRICE'])?></dd>
                                  <?php
                                }
                              }
                            }
                          }
                          ?>
                        </dl>
                      </div>
                      <?php
                      unset($showRanges, $useRatio, $itemPrice, $range);
                    }

                    break;

                  case 'quantityLimit':
                    if ($arParams['SHOW_MAX_QUANTITY'] !== 'N')
                    {
                      if ($haveOffers)
                      {
                        ?>
                        <div class="product-item-detail-info-container" id="<?=$itemIds['QUANTITY_LIMIT']?>" style="display: none;">
                          <div class="product-item-detail-info-container-title">
                            <?=$arParams['MESS_SHOW_MAX_QUANTITY']?>:
                            <span class="product-item-quantity" data-entity="quantity-limit-value"></span>
                          </div>
                        </div>
                        <?php
                      }
                      else
                      {
                        if (
                          $measureRatio
                          && (float)$actualItem['PRODUCT']['QUANTITY'] > 0
                          && $actualItem['CHECK_QUANTITY']
                        )
                        {
                          ?>
                          <div class="product-item-detail-info-container" id="<?=$itemIds['QUANTITY_LIMIT']?>">
                            <div class="product-item-detail-info-container-title">
                              <?=$arParams['MESS_SHOW_MAX_QUANTITY']?>:
                              <span class="product-item-quantity" data-entity="quantity-limit-value">
                                <?php
                                if ($arParams['SHOW_MAX_QUANTITY'] === 'M')
                                {
                                  if ((float)$actualItem['PRODUCT']['QUANTITY'] / $measureRatio >= $arParams['RELATIVE_QUANTITY_FACTOR'])
                                  {
                                    echo $arParams['MESS_RELATIVE_QUANTITY_MANY'];
                                  }
                                  else
                                  {
                                    echo $arParams['MESS_RELATIVE_QUANTITY_FEW'];
                                  }
                                }
                                else
                                {
                                  echo $actualItem['PRODUCT']['QUANTITY'].' '.$actualItem['ITEM_MEASURE']['TITLE'];
                                }
                                ?>
                              </span>
                            </div>
                          </div>
                          <?php
                        }
                      }
                    }

                    break;

                  case 'quantity':
                    if ($arParams['USE_PRODUCT_QUANTITY'])
                    {
                      ?>
                     
                        <div class="cart-product__description-top-in">
                          <div class="amount">
                            <div class="product-item-amount-field-container">
                              <span class="product-item-amount-field-btn-minus no-select down" id="<?=$itemIds['QUANTITY_DOWN_ID']?>"></span>
                              <input class="product-item-amount-field" id="<?=$itemIds['QUANTITY_ID']?>" type="number"
                                value="<?=$price['MIN_QUANTITY']?>">
                              <span class="product-item-amount-field-btn-plus no-select up" id="<?=$itemIds['QUANTITY_UP_ID']?>"></span>
                            </div>
                          </div>
                      <?php
                        if ($showAddBtn)
                        {
                          ?>
                  
                            <a class="product-item-detail-buy-button button button-primary" id="<?=$itemIds['ADD_BASKET_LINK']?>"
                              href="javascript:void(0);">
                              <span>Добавить</span> в корзину
                            </a>
                    
                          <?php
                        }
                      ?>
                        </div>
                 
                      <?php
                    }

                    break;

                  case 'buttons':
                    ?>
                    <div data-entity="main-button-container">
                      <div id="<?=$itemIds['BASKET_ACTIONS_ID']?>" style="display: <?=($actualItem['CAN_BUY'] ? '' : 'none')?>;">

                      </div>
                      <?php
                      if ($showSubscribe)
                      {
                        ?>
                        <div class="product-item-detail-info-container">
                          <?php
                          $APPLICATION->IncludeComponent(
                            'bitrix:catalog.product.subscribe',
                            '',
                            array(
                              'CUSTOM_SITE_ID' => $arParams['CUSTOM_SITE_ID'] ?? null,
                              'PRODUCT_ID' => $arResult['ID'],
                              'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
                              'BUTTON_CLASS' => 'btn btn-default product-item-detail-buy-button',
                              'DEFAULT_DISPLAY' => !$actualItem['CAN_BUY'],
                              'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
                            ),
                            $component,
                            array('HIDE_ICONS' => 'Y')
                          );
                          ?>
                        </div>
                        <?php
                      }
                      ?>
                      <div class="product-item-detail-info-container">
                        <a class="btn btn-link product-item-detail-buy-button" id="<?=$itemIds['NOT_AVAILABLE_MESS']?>"
                          href="javascript:void(0)"
                          rel="nofollow" style="display: <?=(!$actualItem['CAN_BUY'] ? '' : 'none')?>;">
                          <?=$arParams['MESS_NOT_AVAILABLE']?>
                        </a>
                      </div>
                    </div>
                    <?php
                    break;
                }
              }?>
              </div>
            </div>
          </div>
          <div class="cart-product__content">
            <div class="cart-product__content-tab">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item"><a class="nav-link active" href="#about" id="about-tab" data-toggle="tab" role="tab" aria-controls="about" aria-selected="true">Описание</a></li>
                <li class="nav-item"><a class="nav-link" href="#delivery" id="delivery-tab" data-toggle="tab" role="tab" aria-controls="delivery" aria-selected="true">Состав</a></li>
                <li class="nav-item"><a class="nav-link" href="#pay" id="pay-tab" data-toggle="tab" role="tab" aria-controls="pay" aria-selected="true">Способ применения</a></li>
                <li class="nav-item"><a class="nav-link" href="#rev" id="rev-tab" data-toggle="tab" role="tab" aria-controls="rev" aria-selected="true">Отзывы 

                <?
CModule::IncludeModule("iblock"); 
$arFilter = Array("IBLOCK_ID"=>11, "ACTIVE"=>"Y");
$res_count = CIBlockElement::GetList(Array(), $arFilter, Array(), false, Array('PROPERTY_LINK'));
$res = CIBlockElement::GetList(array(), $arFilter, false, false, array('ID','NAME','ACTIVE','PREVIEW_TEXT','PROPERTY_RATING', 'CREATED_DATE', 'PROPERTY_LINK'));

while ($element = $res->GetNext()) {
  if($element['PROPERTY_LINK_VALUE'] == $APPLICATION->GetCurPage()){
    echo '('.$res_count.')';
  }
  else{
    echo "(0)";
  }
}

                ?>
                </a></li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                  <div class="cart-product__content-inner">
                    <div class="cart-product__content-inner-left">
                      <p><?=$arResult["DETAIL_TEXT"]?></p>
                    </div>
                    <div class="cart-product__content-inner-right">
                      <div class="cart-product__content-del">
                        <div class="cart-product__content-del-img"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/del.svg" alt=""></div>
                        <div class="cart-product__content-del-title">Бесплатная<br> доставка от 3 000 ₽</div><a class="button button-bord" href="#">узнать больше</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="delivery" role="tabpanel" aria-labelledby="delivery-tab">
                  <div class="cart-product__content-inner">
                    <div class="cart-product__content-inner-left">
                      <div class="cart-product__content-title">Экстракты и ингредиенты</div>
                      <div class="cart-product__content-list">
                        <div class="cart-product__content-list-item">Зеленый чай<img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/list1.svg" alt="">
                          <div class="cart-product__content-list-drop">
                            <div class="cart-product__content-list-drop-tx">Улучшает внешний вид. Регулирует работу сальных желез. Способствует более быстрому заживлению ран. Стимулирует выработку необходимых гормонов. Влияет на работу щитовидной железы и поджелудочной железы.</div><a class="cart-product__content-list-drop-link" href="#">Перейти в каталог</a>
                          </div>
                        </div>
                        <div class="cart-product__content-list-item">Органический цинк<img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/list2.svg" alt="">
                          <div class="cart-product__content-list-drop">
                            <div class="cart-product__content-list-drop-tx">Улучшает внешний вид. Регулирует работу сальных желез. Способствует более быстрому заживлению ран. Стимулирует выработку необходимых гормонов. Влияет на работу щитовидной железы и поджелудочной железы.</div><a class="cart-product__content-list-drop-link" href="#">Перейти в каталог</a>
                          </div>
                        </div>
                        <div class="cart-product__content-list-item">Аденозин<img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/list3.svg" alt="">
                          <div class="cart-product__content-list-drop">
                            <div class="cart-product__content-list-drop-tx">Улучшает внешний вид. Регулирует работу сальных желез. Способствует более быстрому заживлению ран. Стимулирует выработку необходимых гормонов. Влияет на работу щитовидной железы и поджелудочной железы.</div><a class="cart-product__content-list-drop-link" href="#">Перейти в каталог</a>
                          </div>
                        </div>
                        <div class="cart-product__content-list-item">Икра рыб<img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/list4.svg" alt="">
                          <div class="cart-product__content-list-drop">
                            <div class="cart-product__content-list-drop-tx">Улучшает внешний вид. Регулирует работу сальных желез. Способствует более быстрому заживлению ран. Стимулирует выработку необходимых гормонов. Влияет на работу щитовидной железы и поджелудочной железы.</div><a class="cart-product__content-list-drop-link" href="#">Перейти в каталог</a>
                          </div>
                        </div>
                        <div class="cart-product__content-list-item">Древесный уголь<img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/list5.svg" alt="">
                          <div class="cart-product__content-list-drop">
                            <div class="cart-product__content-list-drop-tx">Улучшает внешний вид. Регулирует работу сальных желез. Способствует более быстрому заживлению ран. Стимулирует выработку необходимых гормонов. Влияет на работу щитовидной железы и поджелудочной железы.</div><a class="cart-product__content-list-drop-link" href="#">Перейти в каталог</a>
                          </div>
                        </div>
                        <div class="cart-product__content-list-item">Арбутин<img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/list6.svg" alt="">
                          <div class="cart-product__content-list-drop">
                            <div class="cart-product__content-list-drop-tx">Улучшает внешний вид. Регулирует работу сальных желез. Способствует более быстрому заживлению ран. Стимулирует выработку необходимых гормонов. Влияет на работу щитовидной железы и поджелудочной железы.</div><a class="cart-product__content-list-drop-link" href="#">Перейти в каталог</a>
                          </div>
                        </div>
                        <div class="cart-product__content-list-item">Золото<img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/list5.svg" alt="">
                          <div class="cart-product__content-list-drop">
                            <div class="cart-product__content-list-drop-tx">Улучшает внешний вид. Регулирует работу сальных желез. Способствует более быстрому заживлению ран. Стимулирует выработку необходимых гормонов. Влияет на работу щитовидной железы и поджелудочной железы.</div><a class="cart-product__content-list-drop-link" href="#">Перейти в каталог</a>
                          </div>
                        </div>
                        <div class="cart-product__content-list-item">Ягоды годжи<img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/list6.svg" alt="">
                          <div class="cart-product__content-list-drop">
                            <div class="cart-product__content-list-drop-tx">Улучшает внешний вид. Регулирует работу сальных желез. Способствует более быстрому заживлению ран. Стимулирует выработку необходимых гормонов. Влияет на работу щитовидной железы и поджелудочной железы.</div><a class="cart-product__content-list-drop-link" href="#">Перейти в каталог</a>
                          </div>
                        </div>
                        <div class="cart-product__content-list-item">Экстракт улитки<img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/list5.svg" alt="">
                          <div class="cart-product__content-list-drop">
                            <div class="cart-product__content-list-drop-tx">Улучшает внешний вид. Регулирует работу сальных желез. Способствует более быстрому заживлению ран. Стимулирует выработку необходимых гормонов. Влияет на работу щитовидной железы и поджелудочной железы.</div><a class="cart-product__content-list-drop-link" href="#">Перейти в каталог</a>
                          </div>
                        </div>
                        <div class="cart-product__content-list-item">ВНА-кислота<img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/list3.svg" alt="">
                          <div class="cart-product__content-list-drop">
                            <div class="cart-product__content-list-drop-tx">Улучшает внешний вид. Регулирует работу сальных желез. Способствует более быстрому заживлению ран. Стимулирует выработку необходимых гормонов. Влияет на работу щитовидной железы и поджелудочной железы.</div><a class="cart-product__content-list-drop-link" href="#">Перейти в каталог</a>
                          </div>
                        </div>
                        <div class="cart-product__content-list-btn js-list-btn"><span class="op">Показать все ингредиенты</span><span class="cl">Скрыть ингредиенты</span></div>
                      </div>
                      <p>Water, Sodium laureth sulfate, Sodium lauroyl sarcosinate, Sodium cocoylalaninate, Linoleamidopropyl PG-dimomium chloride phosphate, Cocamide MEA, Cocamidopropyl betaine, Stearyl alcohol, Cetyl alcohol, Hydroxypropyltrimoniumhydrolyzed wheat protein.</p>
                    </div>
                    <div class="cart-product__content-inner-right">
                      <div class="cart-product__content-del">
                        <div class="cart-product__content-del-img"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/del.svg" alt=""></div>
                        <div class="cart-product__content-del-title">Бесплатная<br> доставка от 3 000 ₽</div><a class="button button-bord" href="#">узнать больше</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="pay" role="tabpanel" aria-labelledby="pay-tab">
                  <div class="cart-product__content-inner">
                    <div class="cart-product__content-inner-left">
                      <ul>
                        <li>Нанесите на мокрые волосы небольшое количество шампуня</li>
                        <li>Вспеньте и тщательно смойте водой</li>
                        <li>При необходимости повторите</li>
                      </ul>
                    </div>
                    <div class="cart-product__content-inner-right">
                      <div class="cart-product__content-del">
                        <div class="cart-product__content-del-img"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/del.svg" alt=""></div>
                        <div class="cart-product__content-del-title">Бесплатная<br> доставка от 3 000 ₽</div><a class="button button-bord" href="#">узнать больше</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="rev" role="tabpanel" aria-labelledby="rev-tab">
                  <div class="cart-product__content-inner">
                    <div class="cart-product__content-inner-left tw">
                      <div class="cart-product__content-reviews">
<?
$arFilter = array(
    'IBLOCK_ID' => 11, 
    'ACTIVE' => 'Y',
);

$res = CIBlockElement::GetList(array(), $arFilter, false, false, array('ID','NAME','ACTIVE','PREVIEW_TEXT','PROPERTY_RATING', 'CREATED_DATE', 'PROPERTY_LINK'));


// вывод элементов
while ($element = $res->GetNext()) {
    // $element['NAME'];
    // и другие свойства элемента

  if($element['PROPERTY_LINK_VALUE'] == $APPLICATION->GetCurPage()){

  
?>

                        <div class="cart-product__content-reviews-item">
                          <div class="cart-product__content-reviews-top">
                            <div class="cart-product__content-reviews-title"><?=$element['NAME']?></div>
                            <div class="cart-product__content-reviews-top-right">
                              <div class="cart-product__content-reviews-data"><?=$element['CREATED_DATE']?></div>
                              <div class="rating rating-result">
                                <?php if ($element["PROPERTY_RATING_VALUE"] == 1): ?>
                                  <span class="active"></span>  
                                  <span></span>    
                                  <span></span>  
                                  <span></span>    
                                  <span></span>
                                <?elseif ($element["PROPERTY_RATING_VALUE"] == 2):?>  
                                  <span class="active"></span>  
                                  <span class="active"></span>    
                                  <span></span>  
                                  <span></span>    
                                  <span></span>
                                <?elseif ($element["PROPERTY_RATING_VALUE"] == 3):?>
                                  <span class="active"></span>  
                                  <span class="active"></span>    
                                  <span class="active"></span>  
                                  <span></span>    
                                  <span></span>                                  
                                <?elseif ($element["PROPERTY_RATING_VALUE"] == 4):?>
                                  <span class="active"></span>  
                                  <span class="active"></span>    
                                  <span class="active"></span>  
                                  <span class="active"></span>    
                                  <span></span>                                  
                                <?elseif ($element["PROPERTY_RATING_VALUE"] == 5):?>
                                  <span class="active"></span>  
                                  <span class="active"></span>    
                                  <span class="active"></span>  
                                  <span class="active"></span>    
                                  <span class="active"></span>                                  
                                <?php endif ?>
                              </div>
                            </div>
                          </div>
                          <p><?=$element['PREVIEW_TEXT']?></p>
                        </div>
<?}}?>
                      </div>
                    </div>
                    <div class="cart-product__content-inner-right">
                      <div class="cart-product__content-del">
                        <div class="cart-product__content-del-img"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/del.svg" alt=""></div>
                        <div class="cart-product__content-del-title">Бесплатная<br> доставка от 3 000 ₽</div><a class="button button-bord" href="#">узнать больше</a>
                      </div>
                      <div class="cart-product__content-rat">
                        <div class="cart-product__content-rat-inner">
                          <div class="rating"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/start-act.svg" alt=""><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/start-act.svg" alt=""><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/start-act.svg" alt=""><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/start-act.svg" alt=""><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/start-dis.svg" alt=""></div>
                          <div class="cart-product__content-rat-tt">3,6 / 5.0</div>
                        </div><a class="button button-gray" href="#" data-toggle="modal" data-target="#modalReviews">написать отзыв</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>    

    <?php
  

  $jsParams = array(
    'CONFIG' => array(
      'USE_CATALOG' => $arResult['CATALOG'],
      'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
      'SHOW_PRICE' => !empty($arResult['ITEM_PRICES']),
      'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'] === 'Y',
      'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'] === 'Y',
      'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
      'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
      'MAIN_PICTURE_MODE' => $arParams['DETAIL_PICTURE_MODE'],
      'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
      'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'] === 'Y',
      'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
      'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
      'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
      'USE_STICKERS' => true,
      'USE_SUBSCRIBE' => $showSubscribe,
      'SHOW_SLIDER' => $arParams['SHOW_SLIDER'],
      'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
      'ALT' => $alt,
      'TITLE' => $title,
      'MAGNIFIER_ZOOM_PERCENT' => 200,
      'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
      'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
      'BRAND_PROPERTY' => !empty($arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']])
        ? $arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']]['DISPLAY_VALUE']
        : null
    ),
    'VISUAL' => $itemIds,
    'PRODUCT_TYPE' => $arResult['PRODUCT']['TYPE'],
    'PRODUCT' => array(
      'ID' => $arResult['ID'],
      'ACTIVE' => $arResult['ACTIVE'],
      'PICT' => reset($arResult['MORE_PHOTO']),
      'NAME' => $arResult['~NAME'],
      'SUBSCRIPTION' => true,
      'ITEM_PRICE_MODE' => $arResult['ITEM_PRICE_MODE'],
      'ITEM_PRICES' => $arResult['ITEM_PRICES'],
      'ITEM_PRICE_SELECTED' => $arResult['ITEM_PRICE_SELECTED'],
      'ITEM_QUANTITY_RANGES' => $arResult['ITEM_QUANTITY_RANGES'],
      'ITEM_QUANTITY_RANGE_SELECTED' => $arResult['ITEM_QUANTITY_RANGE_SELECTED'],
      'ITEM_MEASURE_RATIOS' => $arResult['ITEM_MEASURE_RATIOS'],
      'ITEM_MEASURE_RATIO_SELECTED' => $arResult['ITEM_MEASURE_RATIO_SELECTED'],
      'SLIDER_COUNT' => $arResult['MORE_PHOTO_COUNT'],
      'SLIDER' => $arResult['MORE_PHOTO'],
      'CAN_BUY' => $arResult['CAN_BUY'],
      'CHECK_QUANTITY' => $arResult['CHECK_QUANTITY'],
      'QUANTITY_FLOAT' => is_float($arResult['ITEM_MEASURE_RATIOS'][$arResult['ITEM_MEASURE_RATIO_SELECTED']]['RATIO']),
      'MAX_QUANTITY' => $arResult['PRODUCT']['QUANTITY'],
      'STEP_QUANTITY' => $arResult['ITEM_MEASURE_RATIOS'][$arResult['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'],
      'CATEGORY' => $arResult['CATEGORY_PATH']
    ),
    'BASKET' => array(
      'ADD_PROPS' => $arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y',
      'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
      'PROPS' => $arParams['PRODUCT_PROPS_VARIABLE'],
      'EMPTY_PROPS' => $emptyProductProperties,
      'BASKET_URL' => $arParams['BASKET_URL'],
      'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
      'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
    )
  );
  unset($emptyProductProperties);

if ($arParams['DISPLAY_COMPARE'])
{
  $jsParams['COMPARE'] = array(
    'COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
    'COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
    'COMPARE_PATH' => $arParams['COMPARE_PATH']
  );
}
?>
<script>
  BX.message({
    ECONOMY_INFO_MESSAGE: '<?=GetMessageJS('CT_BCE_CATALOG_ECONOMY_INFO2')?>',
    TITLE_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_ERROR')?>',
    TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_BASKET_PROPS')?>',
    BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_BASKET_UNKNOWN_ERROR')?>',
    BTN_SEND_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_SEND_PROPS')?>',
    BTN_MESSAGE_BASKET_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_BASKET_REDIRECT')?>',
    BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE')?>',
    BTN_MESSAGE_CLOSE_POPUP: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
    TITLE_SUCCESSFUL: '<?=GetMessageJS('CT_BCE_CATALOG_ADD_TO_BASKET_OK')?>',
    COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_OK')?>',
    COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
    COMPARE_TITLE: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_TITLE')?>',
    BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT')?>',
    PRODUCT_GIFT_LABEL: '<?=GetMessageJS('CT_BCE_CATALOG_PRODUCT_GIFT_LABEL')?>',
    PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_PRICE_TOTAL_PREFIX')?>',
    RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY'])?>',
    RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
    SITE_ID: '<?=CUtil::JSEscape($component->getSiteId())?>'
  });

  var <?=$obName?> = new JCCatalogElement(<?=CUtil::PhpToJSObject($jsParams, false, true)?>);
</script>
<?

  if(CModule::IncludeModule("iblock")){ 
    if($_POST["NAME"]!="" && $_POST["REVIEW"]!=""){
      $el = new CIBlockElement;
      $PROP = array();
      $PROP[362] = $_POST["LINK"]; 
      $PROP[361] = $_POST["RATING"];
      $arLoadProductArray = Array(
        "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
        "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
        "IBLOCK_ID"      => 11, // id инфоблока, который вы создали
        "NAME" => $_POST["NAME"], // имя пользователя будет именем элемента
        "ACTIVE"         => "N",            // убираем активность
        "PREVIEW_TEXT"    => $_POST["REVIEW"], // контактные данные клиента
        "PROPERTY_VALUES" => $PROP
        );
      if($PRODUCT_ID = $el->Add($arLoadProductArray))
        echo "";
      else
        echo "Error: ".$el->LAST_ERROR; 
    }
  }

?>

<?php
unset($actualItem, $itemIds, $jsParams);    