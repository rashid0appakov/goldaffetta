<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 *
 *  _________________________________________________________________________
 * |  Attention!
 * |  The following comments are for system use
 * |  and are required for the component to work correctly in ajax mode:
 * |  <!-- items-container -->
 * |  <!-- pagination-container -->
 * |  <!-- component-end -->
 */

$this->setFrameMode(true);

if (!empty($arResult['NAV_RESULT']))
{
  $navParams =  array(
    'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
    'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
    'NavNum' => $arResult['NAV_RESULT']->NavNum
  );
}
else
{
  $navParams = array(
    'NavPageCount' => 1,
    'NavPageNomer' => 1,
    'NavNum' => $this->randString()
  );
}

$showTopPager = false;
$showBottomPager = false;
$showLazyLoad = false;

if ($arParams['PAGE_ELEMENT_COUNT'] > 0 && $navParams['NavPageCount'] > 1)
{
  $showTopPager = $arParams['DISPLAY_TOP_PAGER'];
  $showBottomPager = $arParams['DISPLAY_BOTTOM_PAGER'];
  $showLazyLoad = $arParams['LAZY_LOAD'] === 'Y' && $navParams['NavPageNomer'] != $navParams['NavPageCount'];
}

$templateLibrary = array('popup', 'ajax', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES']))
{
  $templateLibrary[] = 'currency';
  $currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
  'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
  'TEMPLATE_LIBRARY' => $templateLibrary,
  'CURRENCIES' => $currencyList
);
unset($currencyList, $templateLibrary);

$elementEdit = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
$elementDelete = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
$elementDeleteParams = array('CONFIRM' => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));

$positionClassMap = array(
  'left' => 'product-item-label-left',
  'center' => 'product-item-label-center',
  'right' => 'product-item-label-right',
  'bottom' => 'product-item-label-bottom',
  'middle' => 'product-item-label-middle',
  'top' => 'product-item-label-top'
);

$discountPositionClass = '';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION']))
{
  foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos)
  {
    $discountPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
  }
}

$labelPositionClass = '';
if (!empty($arParams['LABEL_PROP_POSITION']))
{
  foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos)
  {
    $labelPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
  }
}

$arParams['~MESS_BTN_BUY'] = $arParams['~MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_BUY');
$arParams['~MESS_BTN_DETAIL'] = $arParams['~MESS_BTN_DETAIL'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_DETAIL');
$arParams['~MESS_BTN_COMPARE'] = $arParams['~MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_COMPARE');
$arParams['~MESS_BTN_SUBSCRIBE'] = $arParams['~MESS_BTN_SUBSCRIBE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_SUBSCRIBE');
$arParams['~MESS_BTN_ADD_TO_BASKET'] = $arParams['~MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_ADD_TO_BASKET');
$arParams['~MESS_NOT_AVAILABLE'] = $arParams['~MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE');
$arParams['~MESS_SHOW_MAX_QUANTITY'] = $arParams['~MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCS_CATALOG_SHOW_MAX_QUANTITY');
$arParams['~MESS_RELATIVE_QUANTITY_MANY'] = $arParams['~MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_MANY'] = $arParams['MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['~MESS_RELATIVE_QUANTITY_FEW'] = $arParams['~MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_FEW');
$arParams['MESS_RELATIVE_QUANTITY_FEW'] = $arParams['MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_FEW');

$arParams['MESS_BTN_LAZY_LOAD'] = $arParams['MESS_BTN_LAZY_LOAD'] ?: Loc::getMessage('CT_BCS_CATALOG_MESS_BTN_LAZY_LOAD');

$generalParams = array(
  'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
  'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
  'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
  'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
  'MESS_SHOW_MAX_QUANTITY' => $arParams['~MESS_SHOW_MAX_QUANTITY'],
  'MESS_RELATIVE_QUANTITY_MANY' => $arParams['~MESS_RELATIVE_QUANTITY_MANY'],
  'MESS_RELATIVE_QUANTITY_FEW' => $arParams['~MESS_RELATIVE_QUANTITY_FEW'],
  'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
  'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
  'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
  'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
  'ADD_PROPERTIES_TO_BASKET' => $arParams['ADD_PROPERTIES_TO_BASKET'],
  'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
  'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'],
  'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
  'COMPARE_PATH' => $arParams['COMPARE_PATH'],
  'COMPARE_NAME' => $arParams['COMPARE_NAME'],
  'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
  'PRODUCT_BLOCKS_ORDER' => $arParams['PRODUCT_BLOCKS_ORDER'],
  'LABEL_POSITION_CLASS' => $labelPositionClass,
  'DISCOUNT_POSITION_CLASS' => $discountPositionClass,
  'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
  'SLIDER_PROGRESS' => $arParams['SLIDER_PROGRESS'],
  '~BASKET_URL' => $arParams['~BASKET_URL'],
  '~ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
  '~BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE'],
  '~COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
  '~COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
  'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
  'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
  'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
  'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY'],
  'MESS_BTN_BUY' => $arParams['~MESS_BTN_BUY'],
  'MESS_BTN_DETAIL' => $arParams['~MESS_BTN_DETAIL'],
  'MESS_BTN_COMPARE' => $arParams['~MESS_BTN_COMPARE'],
  'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
  'MESS_BTN_ADD_TO_BASKET' => $arParams['~MESS_BTN_ADD_TO_BASKET'],
  'MESS_NOT_AVAILABLE' => $arParams['~MESS_NOT_AVAILABLE']
);

$obName = 'ob'.preg_replace('/[^a-zA-Z0-9_]/', 'x', $this->GetEditAreaId($navParams['NavNum']));
$containerName = 'container-'.$navParams['NavNum'];

if ($showTopPager)
{
  ?>
  <div data-pagination-num="<?=$navParams['NavNum']?>">
    <!-- pagination-container -->
    <?=$arResult['NAV_STRING']?>
    <!-- pagination-container -->
  </div>
  <?
}

?>

<div data-entity="<?=$containerName?>">

            <div class="catalog-page__content-top">
              <div class="catalog-page__content-sorting">
                <div class="catalog-page__content-sorting-title">Сортировать по:</div>
                <ul>
                  <li class="active"><a href="#">Цена по возрастанию</a></li>
                  <li><a href="#">Цена по убыванию</a></li>
                  <li><a href="#">Новизне</a></li>
                </ul>
              </div>
              <div class="catalog-page__content-filter js-filter-mob"><img src="assets/images/svg/filter.svg" alt=""><span>фильтры (3)</span></div>
              <div class="catalog-page__content-view"><a class="catalog-page__content-view-item active" href="#"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M22 12.999V20C22 20.2652 21.8946 20.5196 21.7071 20.7071C21.5196 20.8946 21.2652 21 21 21H13V12.999H22ZM11 12.999V21H3C2.73478 21 2.48043 20.8946 2.29289 20.7071C2.10536 20.5196 2 20.2652 2 20V12.999H11ZM11 3V10.999H2V4C2 3.73478 2.10536 3.48043 2.29289 3.29289C2.48043 3.10536 2.73478 3 3 3H11ZM21 3C21.2652 3 21.5196 3.10536 21.7071 3.29289C21.8946 3.48043 22 3.73478 22 4V10.999H13V3H21Z"/>
</svg></a><a class="catalog-page__content-view-item" href="#"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M22 12.999V20C22 20.2652 21.8946 20.5196 21.7071 20.7071C21.5196 20.8946 21.2652 21 21 21H12V12.999H22ZM12 12.999V21H3C2.73478 21 2.48043 20.8946 2.29289 20.7071C2.10536 20.5196 2 20.2652 2 20V12.999H12ZM12 3V10.999H2V4C2 3.73478 2.10536 3.48043 2.29289 3.29289C2.48043 3.10536 2.73478 3 3 3H12ZM21 3C21.2652 3 21.5196 3.10536 21.7071 3.29289C21.8946 3.48043 22 3.73478 22 4V10.999H12V3H21Z"/>
</svg></a></div>
            </div>
            <div class="filter__top">
              <div class="filter__top-title">Фильтр (1)</div>
            </div>
            <div class="catalog-page__content-wrapper">
              <div class="row">  
  <?
  if (!empty($arResult['ITEMS']) && !empty($arResult['ITEM_ROWS']))
  {
    $areaIds = array();

    foreach ($arResult['ITEMS'] as $item)
    {
      $uniqueId = $item['ID'].'_'.md5($this->randString().$component->getAction());
      $areaIds[$item['ID']] = $this->GetEditAreaId($uniqueId);
      $this->AddEditAction($uniqueId, $item['EDIT_LINK'], $elementEdit);
      $this->AddDeleteAction($uniqueId, $item['DELETE_LINK'], $elementDelete, $elementDeleteParams);
    }
    ?>
    <!-- items-container -->
    <?
    foreach ($arResult['ITEM_ROWS'] as $rowData)
    {
      $rowItems = array_splice($arResult['ITEMS'], 0, $rowData['COUNT']);
      ?>

        <?
        switch ($rowData['VARIANT'])
        {
          case 0:
            ?>
            <div class="col-xs-12 product-item-small-card">
              <div class="row">
                <div class="col-xs-12 product-item-big-card">
                  <div class="row">
                    <div class="col-md-12">
                      <?
                      $item = reset($rowItems);
                      $APPLICATION->IncludeComponent(
                        'bitrix:catalog.item',
                        '',
                        array(
                          'RESULT' => array(
                            'ITEM' => $item,
                            'AREA_ID' => $areaIds[$item['ID']],
                            'TYPE' => $rowData['TYPE'],
                            'BIG_LABEL' => 'N',
                            'BIG_DISCOUNT_PERCENT' => 'N',
                            'BIG_BUTTONS' => 'N',
                            'SCALABLE' => 'N'
                          ),
                          'PARAMS' => $generalParams
                            + array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
                        ),
                        $component,
                        array('HIDE_ICONS' => 'Y')
                      );
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?
            break;

          case 1:
            ?>
            <div class="col-xs-12 product-item-small-card">
              <div class="row">
                <?
                foreach ($rowItems as $item)
                {
                  ?>
                  <div class="col-xs-6 product-item-big-card">
                    <div class="row">
                      <div class="col-md-12">
                        <?
                        $APPLICATION->IncludeComponent(
                          'bitrix:catalog.item',
                          '',
                          array(
                            'RESULT' => array(
                              'ITEM' => $item,
                              'AREA_ID' => $areaIds[$item['ID']],
                              'TYPE' => $rowData['TYPE'],
                              'BIG_LABEL' => 'N',
                              'BIG_DISCOUNT_PERCENT' => 'N',
                              'BIG_BUTTONS' => 'N',
                              'SCALABLE' => 'N'
                            ),
                            'PARAMS' => $generalParams
                              + array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
                          ),
                          $component,
                          array('HIDE_ICONS' => 'Y')
                        );
                        ?>
                      </div>
                    </div>
                  </div>
                  <?
                }
                ?>
              </div>
            </div>
            <?
            break;

          case 2:
            ?>

                <?
                foreach ($rowItems as $item)
                { //наш
                  ?>
                  <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                  <div class="catalog__item">
                        <?
                        $APPLICATION->IncludeComponent(
                          'custom:catalog.item',
                          '',
                          array(
                            'RESULT' => array(
                              'ITEM' => $item,
                              'AREA_ID' => $areaIds[$item['ID']],
                              'TYPE' => $rowData['TYPE'],
                              'BIG_LABEL' => 'N',
                              'BIG_DISCOUNT_PERCENT' => 'N',
                              'BIG_BUTTONS' => 'Y',
                              'SCALABLE' => 'N'
                            ),
                            'PARAMS' => $generalParams
                              + array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
                          ),
                          $component,
                          array('HIDE_ICONS' => 'Y')
                        );
                        ?>
                      </div>
                </div>
                  <?
                }
                ?>
  
            <?
            break;

          case 3:
            ?>
            <div class="col-xs-12 product-item-small-card">
              <div class="row">
                <?
                foreach ($rowItems as $item)
                {
                  ?>
                  <div class="col-xs-6 col-md-3">
                    <?
                    $APPLICATION->IncludeComponent(
                      'bitrix:catalog.item',
                      '',
                      array(
                        'RESULT' => array(
                          'ITEM' => $item,
                          'AREA_ID' => $areaIds[$item['ID']],
                          'TYPE' => $rowData['TYPE'],
                          'BIG_LABEL' => 'N',
                          'BIG_DISCOUNT_PERCENT' => 'N',
                          'BIG_BUTTONS' => 'N',
                          'SCALABLE' => 'N'
                        ),
                        'PARAMS' => $generalParams
                          + array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
                      ),
                      $component,
                      array('HIDE_ICONS' => 'Y')
                    );
                    ?>
                  </div>
                  <?
                }
                ?>
              </div>
            </div>
            <?
            break;

          case 4:
            $rowItemsCount = count($rowItems);
            ?>
            <div class="col-sm-6 product-item-big-card">
              <div class="row">
                <div class="col-md-12">
                  <?
                  $item = array_shift($rowItems);
                  $APPLICATION->IncludeComponent(
                    'bitrix:catalog.item',
                    '',
                    array(
                      'RESULT' => array(
                        'ITEM' => $item,
                        'AREA_ID' => $areaIds[$item['ID']],
                        'TYPE' => $rowData['TYPE'],
                        'BIG_LABEL' => 'N',
                        'BIG_DISCOUNT_PERCENT' => 'N',
                        'BIG_BUTTONS' => 'Y',
                        'SCALABLE' => 'Y'
                      ),
                      'PARAMS' => $generalParams
                        + array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
                    ),
                    $component,
                    array('HIDE_ICONS' => 'Y')
                  );
                  unset($item);
                  ?>
                </div>
              </div>
            </div>
            <div class="col-sm-6 product-item-small-card">
              <div class="row">
                <?
                for ($i = 0; $i < $rowItemsCount - 1; $i++)
                {
                  ?>
                  <div class="col-xs-6">
                    <?
                    $APPLICATION->IncludeComponent(
                      'bitrix:catalog.item',
                      '',
                      array(
                        'RESULT' => array(
                          'ITEM' => $rowItems[$i],
                          'AREA_ID' => $areaIds[$rowItems[$i]['ID']],
                          'TYPE' => $rowData['TYPE'],
                          'BIG_LABEL' => 'N',
                          'BIG_DISCOUNT_PERCENT' => 'N',
                          'BIG_BUTTONS' => 'N',
                          'SCALABLE' => 'N'
                        ),
                        'PARAMS' => $generalParams
                          + array('SKU_PROPS' => $arResult['SKU_PROPS'][$rowItems[$i]['IBLOCK_ID']])
                      ),
                      $component,
                      array('HIDE_ICONS' => 'Y')
                    );
                    ?>
                  </div>
                  <?
                }
                ?>
              </div>
            </div>
            <?
            break;

          case 5:
            $rowItemsCount = count($rowItems);
            ?>
            <div class="col-sm-6 product-item-small-card">
              <div class="row">
                <?
                for ($i = 0; $i < $rowItemsCount - 1; $i++)
                {
                  ?>
                  <div class="col-xs-6">
                    <?
                    $APPLICATION->IncludeComponent(
                      'bitrix:catalog.item',
                      '',
                      array(
                        'RESULT' => array(
                          'ITEM' => $rowItems[$i],
                          'AREA_ID' => $areaIds[$rowItems[$i]['ID']],
                          'TYPE' => $rowData['TYPE'],
                          'BIG_LABEL' => 'N',
                          'BIG_DISCOUNT_PERCENT' => 'N',
                          'BIG_BUTTONS' => 'N',
                          'SCALABLE' => 'N'
                        ),
                        'PARAMS' => $generalParams
                          + array('SKU_PROPS' => $arResult['SKU_PROPS'][$rowItems[$i]['IBLOCK_ID']])
                      ),
                      $component,
                      array('HIDE_ICONS' => 'Y')
                    );
                    ?>
                  </div>
                  <?
                }
                ?>
              </div>
            </div>
            <div class="col-sm-6 product-item-big-card">
              <div class="row">
                <div class="col-md-12">
                  <?
                  $item = end($rowItems);
                  $APPLICATION->IncludeComponent(
                    'bitrix:catalog.item',
                    '',
                    array(
                      'RESULT' => array(
                        'ITEM' => $item,
                        'AREA_ID' => $areaIds[$item['ID']],
                        'TYPE' => $rowData['TYPE'],
                        'BIG_LABEL' => 'N',
                        'BIG_DISCOUNT_PERCENT' => 'N',
                        'BIG_BUTTONS' => 'Y',
                        'SCALABLE' => 'Y'
                      ),
                      'PARAMS' => $generalParams
                        + array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
                    ),
                    $component,
                    array('HIDE_ICONS' => 'Y')
                  );
                  unset($item);
                  ?>
                </div>
              </div>
            </div>
            <?
            break;

          case 6:
            ?>
            <div class="col-xs-12 product-item-small-card">
              <div class="row">
                <?
                foreach ($rowItems as $item)
                {
                  ?>
                  <div class="col-xs-6 col-sm-4 col-md-2">
                    <?
                    $APPLICATION->IncludeComponent(
                      'bitrix:catalog.item',
                      '',
                      array(
                        'RESULT' => array(
                          'ITEM' => $item,
                          'AREA_ID' => $areaIds[$item['ID']],
                          'TYPE' => $rowData['TYPE'],
                          'BIG_LABEL' => 'N',
                          'BIG_DISCOUNT_PERCENT' => 'N',
                          'BIG_BUTTONS' => 'N',
                          'SCALABLE' => 'N'
                        ),
                        'PARAMS' => $generalParams
                          + array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
                      ),
                      $component,
                      array('HIDE_ICONS' => 'Y')
                    );
                    ?>
                  </div>
                  <?
                }
                ?>
              </div>
            </div>
            <?
            break;

          case 7:
            $rowItemsCount = count($rowItems);
            ?>
            <div class="col-sm-6 product-item-big-card">
              <div class="row">
                <div class="col-md-12">
                  <?
                  $item = array_shift($rowItems);
                  $APPLICATION->IncludeComponent(
                    'bitrix:catalog.item',
                    '',
                    array(
                      'RESULT' => array(
                        'ITEM' => $item,
                        'AREA_ID' => $areaIds[$item['ID']],
                        'TYPE' => $rowData['TYPE'],
                        'BIG_LABEL' => 'N',
                        'BIG_DISCOUNT_PERCENT' => 'N',
                        'BIG_BUTTONS' => 'Y',
                        'SCALABLE' => 'Y'
                      ),
                      'PARAMS' => $generalParams
                        + array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
                    ),
                    $component,
                    array('HIDE_ICONS' => 'Y')
                  );
                  unset($item);
                  ?>
                </div>
              </div>
            </div>
            <div class="col-sm-6 product-item-small-card">
              <div class="row">
                <?
                for ($i = 0; $i < $rowItemsCount - 1; $i++)
                {
                  ?>
                  <div class="col-xs-6 col-md-4">
                    <?
                    $APPLICATION->IncludeComponent(
                      'bitrix:catalog.item',
                      '',
                      array(
                        'RESULT' => array(
                          'ITEM' => $rowItems[$i],
                          'AREA_ID' => $areaIds[$rowItems[$i]['ID']],
                          'TYPE' => $rowData['TYPE'],
                          'BIG_LABEL' => 'N',
                          'BIG_DISCOUNT_PERCENT' => 'N',
                          'BIG_BUTTONS' => 'N',
                          'SCALABLE' => 'N'
                        ),
                        'PARAMS' => $generalParams
                          + array('SKU_PROPS' => $arResult['SKU_PROPS'][$rowItems[$i]['IBLOCK_ID']])
                      ),
                      $component,
                      array('HIDE_ICONS' => 'Y')
                    );
                    ?>
                  </div>
                  <?
                }
                ?>
              </div>
            </div>
            <?
            break;

          case 8:
            $rowItemsCount = count($rowItems);
            ?>
            <div class="col-sm-6 product-item-small-card">
              <div class="row">
                <?
                for ($i = 0; $i < $rowItemsCount - 1; $i++)
                {
                  ?>
                  <div class="col-xs-6 col-md-4">
                    <?
                    $APPLICATION->IncludeComponent(
                      'bitrix:catalog.item',
                      '',
                      array(
                        'RESULT' => array(
                          'ITEM' => $rowItems[$i],
                          'AREA_ID' => $areaIds[$rowItems[$i]['ID']],
                          'TYPE' => $rowData['TYPE'],
                          'BIG_LABEL' => 'N',
                          'BIG_DISCOUNT_PERCENT' => 'N',
                          'BIG_BUTTONS' => 'N',
                          'SCALABLE' => 'N'
                        ),
                        'PARAMS' => $generalParams
                          + array('SKU_PROPS' => $arResult['SKU_PROPS'][$rowItems[$i]['IBLOCK_ID']])
                      ),
                      $component,
                      array('HIDE_ICONS' => 'Y')
                    );
                    ?>
                  </div>
                  <?
                }
                ?>
              </div>
            </div>
            <div class="col-sm-6 product-item-big-card">
              <div class="row">
                <div class="col-md-12">
                  <?
                  $item = end($rowItems);
                  $APPLICATION->IncludeComponent(
                    'bitrix:catalog.item',
                    '',
                    array(
                      'RESULT' => array(
                        'ITEM' => $item,
                        'AREA_ID' => $areaIds[$item['ID']],
                        'TYPE' => $rowData['TYPE'],
                        'BIG_LABEL' => 'N',
                        'BIG_DISCOUNT_PERCENT' => 'N',
                        'BIG_BUTTONS' => 'Y',
                        'SCALABLE' => 'Y'
                      ),
                      'PARAMS' => $generalParams
                        + array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
                    ),
                    $component,
                    array('HIDE_ICONS' => 'Y')
                  );
                  unset($item);
                  ?>
                </div>
              </div>
            </div>
            <?
            break;

          case 9:
            ?>
            <div class="col-xs-12">
              <div class="row">
                <?
                foreach ($rowItems as $item)
                {
                  ?>
                  <div class="col-xs-12 product-item-line-card">
                    <?
                    $APPLICATION->IncludeComponent(
                      'bitrix:catalog.item',
                      '',
                      array(
                        'RESULT' => array(
                          'ITEM' => $item,
                          'AREA_ID' => $areaIds[$item['ID']],
                          'TYPE' => $rowData['TYPE'],
                          'BIG_LABEL' => 'N',
                          'BIG_DISCOUNT_PERCENT' => 'N',
                          'BIG_BUTTONS' => 'N'
                        ),
                        'PARAMS' => $generalParams
                          + array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
                      ),
                      $component,
                      array('HIDE_ICONS' => 'Y')
                    );
                    ?>
                  </div>
                  <?
                }
                ?>

              </div>
            </div>
            <?
            break;
        }
        ?>

      <?
    }
    unset($generalParams, $rowItems);
    ?>
    <!-- items-container -->
    <?
  }
  else
  {
    // load css for bigData/deferred load
    $APPLICATION->IncludeComponent(
      'bitrix:catalog.item',
      '',
      array(),
      $component,
      array('HIDE_ICONS' => 'Y')
    );
  }
  ?>
           </div>
            </div>
<?
if ($showLazyLoad)
{
  ?>
  <div class="button-center">
    <div class="btn btn-lg center-block button button-secondary button-center"
      data-use="show-more-<?=$navParams['NavNum']?>">
      Показать больше
    </div>
  </div>
  <?
}

if ($showBottomPager)
{
  ?>
  <div data-pagination-num="<?=$navParams['NavNum']?>">
    <!-- pagination-container -->
    <?=$arResult['NAV_STRING']?>
    <!-- pagination-container -->
  </div>
  <?
}

$signer = new \Bitrix\Main\Security\Sign\Signer;
$signedTemplate = $signer->sign($templateName, 'catalog.section');
$signedParams = $signer->sign(base64_encode(serialize($arResult['ORIGINAL_PARAMETERS'])), 'catalog.section');
?>
<script>
  BX.message({
    BTN_MESSAGE_BASKET_REDIRECT: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_BASKET_REDIRECT')?>',
    BASKET_URL: '<?=$arParams['BASKET_URL']?>',
    ADD_TO_BASKET_OK: '<?=GetMessageJS('ADD_TO_BASKET_OK')?>',
    TITLE_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_TITLE_ERROR')?>',
    TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCS_CATALOG_TITLE_BASKET_PROPS')?>',
    TITLE_SUCCESSFUL: '<?=GetMessageJS('ADD_TO_BASKET_OK')?>',
    BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_BASKET_UNKNOWN_ERROR')?>',
    BTN_MESSAGE_SEND_PROPS: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_SEND_PROPS')?>',
    BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE')?>',
    BTN_MESSAGE_CLOSE_POPUP: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
    COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_OK')?>',
    COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
    COMPARE_TITLE: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_TITLE')?>',
    PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCS_CATALOG_PRICE_TOTAL_PREFIX')?>',
    RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY'])?>',
    RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
    BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT')?>',
    BTN_MESSAGE_LAZY_LOAD: '<?=CUtil::JSEscape($arParams['MESS_BTN_LAZY_LOAD'])?>',
    BTN_MESSAGE_LAZY_LOAD_WAITER: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_LAZY_LOAD_WAITER')?>',
    SITE_ID: '<?=CUtil::JSEscape($component->getSiteId())?>'
  });
  var <?=$obName?> = new JCCatalogSectionComponent({
    siteId: '<?=CUtil::JSEscape($component->getSiteId())?>',
    componentPath: '<?=CUtil::JSEscape($componentPath)?>',
    navParams: <?=CUtil::PhpToJSObject($navParams)?>,
    deferredLoad: false, // enable it for deferred load
    initiallyShowHeader: '<?=!empty($arResult['ITEM_ROWS'])?>',
    bigData: <?=CUtil::PhpToJSObject($arResult['BIG_DATA'])?>,
    lazyLoad: !!'<?=$showLazyLoad?>',
    loadOnScroll: !!'<?=($arParams['LOAD_ON_SCROLL'] === 'Y')?>',
    template: '<?=CUtil::JSEscape($signedTemplate)?>',
    ajaxId: '<?=CUtil::JSEscape($arParams['AJAX_ID'])?>',
    parameters: '<?=CUtil::JSEscape($signedParams)?>',
    container: '<?=$containerName?>'
  });
</script>
<!-- component-end -->