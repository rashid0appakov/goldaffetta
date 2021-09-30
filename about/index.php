<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О компании");
?>

    <div class="article-announcement">
      <div class="container">
        <div class="article-announcement__inner">
          <div class="article-announcement__text">
            <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadik", Array(
	"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
		"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
		"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
	),
	false
);?>
            <h1>О компании</h1>
            <p><b>GOLDEN TREE</b> – это мультибрендовый интернет-магазин с тщательно отобранным ассортиментом косметики, парфюмерии и бытовой химии преимущественно южнокорейского производства. Наша компания стремится раскрыть красоту каждого клиента, предлагая только проверенные и качественные продукты. При подборе средств мы используем индивидуальный подход, а также накопленные знания и собственный опыт.</p>
          </div>
          <div class="article-announcement__img" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/assets/images/article-img-main2.jpg')"></div>
        </div>
      </div>
    </div>
    <div class="article-description">
      <div class="container">
        <div class="article-description__inner">
          <div class="article-description__left">
            <div class="article-description__text">
              <h3>Подлинность товара</h3>
              <p> Наша компания является официальным дистрибьютером брендов The Yeon, Touch in SOL и The Face Shop, напрямую сотрудничая с заводами-производителями. Это значит, что каждый товар мы регистрируем, получая сертификат подлинности, а также разрабатываем и клеим стикер с описанием.</p>
              <p>  Мы дорожим нашей репутацией, поэтому сотрудничаем только с компаниями, которые официально представляют бренды на территории Российской Федерации, подтверждая подлинность товара сертификатом.</p>
              <h3>Оптовые продажи</h3>
              <p>Компания GOLDEN TREE зарекомендовала себя как надежный партнер также в сфере оптовых продаж. Мы сотрудничаем с крупнейшими розничными и интернет-магазинами Российской Федерации и СНГ. Подробную информацию по вопросам оптовых закупок Вы можете получить по почте sales@goldentree.su, а также на сайте goldentree.su</p>
            </div>
          </div>
        </div>
      </div>
    </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>