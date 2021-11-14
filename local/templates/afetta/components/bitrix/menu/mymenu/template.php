<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

if (empty($arResult["ALL_ITEMS"]))
  return;

CUtil::InitJSCore();

$menuBlockId = "catalog_menu_".$this->randString();
?>
          <div class="header__menu">
            <ul>
<?
    foreach($arResult["MENU_STRUCTURE"] as $itemID => $arColumns)
    {
        //--first level--
      $existPictureDescColomn = ($arResult["ALL_ITEMS"][$itemID]["PARAMS"]["picture_src"] || $arResult["ALL_ITEMS"][$itemID]["PARAMS"]["description"]) ? true : false;
      $class = "bx-nav-1-lvl bx-nav-list-".(($existPictureDescColomn) ? count($arColumns)+1 : count($arColumns))."-col";
      if($arResult["ALL_ITEMS"][$itemID]["SELECTED"])
      {
        $class .= " bx-active";
      }
      if(is_array($arColumns) && count($arColumns) > 0)
      {
        $class .= " bx-nav-parent";
      }
?>
              <li class="drop"><a href="<?=$arResult["ALL_ITEMS"][$itemID]["LINK"]?>"><?=htmlspecialcharsbx($arResult["ALL_ITEMS"][$itemID]["TEXT"], ENT_COMPAT, false)?></a><span class="arr"><svg><use xlink:href="#arrow"></use></svg></span>
                
        <?
        if (is_array($arColumns) && count($arColumns) > 0)
        {
        ?>
                <div class="drop-bl">
                  <div class="drop-bl__inner">
                    <?
                    foreach($arColumns as $key=>$arRow)
                    {
                    ?>
                    <div class="drop-bl__item">
                      <div class="drop-bl__item-title">Лицо</div>
                      <ul>
                        <?foreach($arRow as $itemIdLevel_2=>$arLevel_3):?>
                        <li><a href="<?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["LINK"]?>"><?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["TEXT"]?></a></li>
                        <?endforeach;?>
                      </ul>
                    </div>
                    <?
                    }
                    ?>
                    
                    <div class="drop-bl__img" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/assets/images/menu-img.jpg')"></div>
                  </div>
                </div>
         <?}?>       
              </li>
    <?
    }
    ?>              
            </ul>
          </div>