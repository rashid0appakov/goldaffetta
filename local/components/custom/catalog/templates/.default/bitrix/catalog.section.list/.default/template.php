<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$arViewModeList = $arResult['VIEW_MODE_LIST'];

$arCurView = $arViewStyles[$arParams['VIEW_MODE']];

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

?>
    <div class="catalog-page">
      <div class="container">
        <div class="catalog-page__inner">
          <div class="catalog-page__left">
            <div class="filter">
              <div class="filter__top-tt">Фильтр (1)</div>
              <div class="filter__top-close js-filter-close"><img src="assets/images/svg/close.svg" alt=""></div>
              <div class="filter__list">


<?
  $arFilter = Array('IBLOCK_ID'=>9, 'GLOBAL_ACTIVE'=>'Y', 'DEPTH_LEVEL'=>1);
  $db_list = CIBlockSection::GetList(Array($by=>$order), $arFilter, true);
  while($ar_result = $db_list->GetNext())
  {
  $PROVEROCHKA = '/catalog/'.$ar_result["CODE"].'/';
  $ParentSec = CIBlockSection::GetByID($ar_result["ID"]);
?>

                <div class="filter__item <?if($APPLICATION->GetCurPage() == $PROVEROCHKA){echo 'active open';}?>">
                  <div class="filter__title"><?=$ar_result["NAME"];?></div>
                  <div class="filter__container">
                    <div class="filter__group-check">
                      <ul>
<?
$rsParentSection = CIBlockSection::GetByID($ar_result["ID"]);
if ($arParentSection = $rsParentSection->GetNext())
{
   $arFilter = array('IBLOCK_ID' => $arParentSection['IBLOCK_ID'],'>LEFT_MARGIN' => $arParentSection['LEFT_MARGIN'],'<RIGHT_MARGIN' => $arParentSection['RIGHT_MARGIN'],'>DEPTH_LEVEL' => $arParentSection['DEPTH_LEVEL']); // выберет потомков без учета активности
   $rsSect = CIBlockSection::GetList(array('left_margin' => 'asc'),$arFilter);
   while ($arSect = $rsSect->GetNext())
   {
    $proverkapodraxdela = '/catalog/'.$arSect["CODE"].'/';
    ?>
      <li <?if($APPLICATION->GetCurPage() == $proverkapodraxdela){echo 'class="active"';}?>><a href="/catalog/<?=$arSect["CODE"]?>/"><?=$arSect["NAME"]?></a></li>
<?}}?>
                      </ul>
                    </div>
                  </div>
                </div>
<?}?>
              </div>
              <div class="filter__item open">
                <div class="filter__title open">Цена, руб.</div>
                <div class="filter__container">
                  <div class="filter__range polzunok-container-5">
                    <div class="filter__range-item">
                      <input class="polzunok-input-5-left" type="text" value="от">
                    </div>
                    <div class="filter__range-item">
                      <input class="polzunok-input-5-right" type="text" value="до">
                    </div>
                    <div class="polzunok-5"></div>
                  </div>
                </div>
              </div>
              <div class="filter__item open">
                <div class="filter__title open">Спецпредложения</div>
                <div class="filter__container">
                  <div class="filter__check">
                    <input type="checkbox" id="sale-brand1" name="sale-brand" checked>
                    <label for="sale-brand1">Скидки</label>
                  </div>
                  <div class="filter__check">
                    <input type="checkbox" id="sale-brand2" name="sale-brand">
                    <label for="sale-brand2">Новинки</label>
                  </div>
                </div>
              </div>
              <div class="filter__item">
                <div class="filter__title">Бренд</div>
                <div class="filter__container">
                  <div class="filter__check">
                    <input type="checkbox" id="brand1" name="brand">
                    <label for="brand1">Бренд</label>
                  </div>
                </div>
              </div>
              <div class="filter__item open">
                <div class="filter__total">
                  <div class="filter__total-quantity">Найдено: 400</div><a class="filter__total-all" href="#">Показать</a>
                </div>
                <div class="filter__title open">Тип кожи</div>
                <div class="filter__container">
                  <div class="filter__group-check">
                    <div class="filter__check">
                      <input type="checkbox" id="type-brand1" name="type-brand" checked>
                      <label for="type-brand1">Для всех типов кожи</label>
                    </div>
                    <div class="filter__check">
                      <input type="checkbox" id="type-brand2" name="type-brand">
                      <label for="type-brand2">Для жирной кожи</label>
                    </div>
                    <div class="filter__check">
                      <input type="checkbox" id="type-brand3" name="type-brand">
                      <label for="type-brand3">Для чувствительной кожи</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="filter__item open">
                <div class="filter__title open">Наличие</div>
                <div class="filter__container">
                  <div class="filter__check">
                    <input type="checkbox" id="now-brand1" name="now-brand" checked>
                    <label for="now-brand1">В наличии</label>
                  </div>
                </div>
              </div>
              <div class="filter__btn"><a class="button button-gray" href="#">Показать</a><a class="button button-close" href="#"><svg><use xlink:href="#close"></use></svg> Сбросить</a></div>
            </div>
          </div>
          <div class="catalog-page__content">
<?if ('Y' == $arParams['SHOW_PARENT_NAME'] && 0 < $arResult['SECTION']['ID'])
{
  $this->AddEditAction($arResult['SECTION']['ID'], $arResult['SECTION']['EDIT_LINK'], $strSectionEdit);
  $this->AddDeleteAction($arResult['SECTION']['ID'], $arResult['SECTION']['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
?>
  <h1 id="<? echo $this->GetEditAreaId($arResult['SECTION']['ID']); ?>"
  ><?
    echo (
      isset($arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]) && $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"] != ""
      ? $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]
      : $arResult['SECTION']['NAME']
    );
  ?></h1>
<?}?>
