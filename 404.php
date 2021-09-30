<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");

?>
    <div class="https404" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/assets/images/bg404.png')">
      <div class="container">
        <div class="https404__inner">
          <div class="https404__img"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/img404.png" alt=""></div>
          <div class="https404__title">К сожалению страница не найдена</div>
			<p>Возможно она была удалена или находится на доработке.</p><a class="button button-primary" href="/">вернуться на главную</a>
        </div>
      </div>
    </div>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>