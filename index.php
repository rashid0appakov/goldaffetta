<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
?> 

<?$APPLICATION->IncludeComponent("bitrix:news.list", "first_banner_home_page", Array(
  "ACTIVE_DATE_FORMAT" => "d.m.Y",  // Формат показа даты
    "ADD_SECTIONS_CHAIN" => "N",  // Включать раздел в цепочку навигации
    "AJAX_MODE" => "N", // Включить режим AJAX
    "AJAX_OPTION_ADDITIONAL" => "", // Дополнительный идентификатор
    "AJAX_OPTION_HISTORY" => "N", // Включить эмуляцию навигации браузера
    "AJAX_OPTION_JUMP" => "N",  // Включить прокрутку к началу компонента
    "AJAX_OPTION_STYLE" => "Y", // Включить подгрузку стилей
    "CACHE_FILTER" => "N",  // Кешировать при установленном фильтре
    "CACHE_GROUPS" => "Y",  // Учитывать права доступа
    "CACHE_TIME" => "36000000", // Время кеширования (сек.)
    "CACHE_TYPE" => "A",  // Тип кеширования
    "CHECK_DATES" => "Y", // Показывать только активные на данный момент элементы
    "DETAIL_URL" => "", // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
    "DISPLAY_BOTTOM_PAGER" => "N",  // Выводить под списком
    "DISPLAY_DATE" => "N",  // Выводить дату элемента
    "DISPLAY_NAME" => "Y",  // Выводить название элемента
    "DISPLAY_PICTURE" => "Y", // Выводить изображение для анонса
    "DISPLAY_PREVIEW_TEXT" => "Y",  // Выводить текст анонса
    "DISPLAY_TOP_PAGER" => "N", // Выводить над списком
    "FIELD_CODE" => array(  // Поля
      0 => "",
      1 => "",
    ),
    "FILTER_NAME" => "",  // Фильтр
    "HIDE_LINK_WHEN_NO_DETAIL" => "N",  // Скрывать ссылку, если нет детального описания
    "IBLOCK_ID" => "2", // Код информационного блока
    "IBLOCK_TYPE" => "page_info", // Тип информационного блока (используется только для проверки)
    "INCLUDE_IBLOCK_INTO_CHAIN" => "N", // Включать инфоблок в цепочку навигации
    "INCLUDE_SUBSECTIONS" => "N", // Показывать элементы подразделов раздела
    "MESSAGE_404" => "",  // Сообщение для показа (по умолчанию из компонента)
    "NEWS_COUNT" => "10", // Количество новостей на странице
    "PAGER_BASE_LINK_ENABLE" => "N",  // Включить обработку ссылок
    "PAGER_DESC_NUMBERING" => "N",  // Использовать обратную навигацию
    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000", // Время кеширования страниц для обратной навигации
    "PAGER_SHOW_ALL" => "N",  // Показывать ссылку "Все"
    "PAGER_SHOW_ALWAYS" => "N", // Выводить всегда
    "PAGER_TEMPLATE" => "", // Шаблон постраничной навигации
    "PAGER_TITLE" => "",  // Название категорий
    "PARENT_SECTION" => "", // ID раздела
    "PARENT_SECTION_CODE" => "",  // Код раздела
    "PREVIEW_TRUNCATE_LEN" => "", // Максимальная длина анонса для вывода (только для типа текст)
    "PROPERTY_CODE" => array( // Свойства
      0 => "LINK_BUTTON",
      1 => "TEXT_BUTTON",
      2 => "",
    ),
    "SET_BROWSER_TITLE" => "N", // Устанавливать заголовок окна браузера
    "SET_LAST_MODIFIED" => "N", // Устанавливать в заголовках ответа время модификации страницы
    "SET_META_DESCRIPTION" => "N",  // Устанавливать описание страницы
    "SET_META_KEYWORDS" => "N", // Устанавливать ключевые слова страницы
    "SET_STATUS_404" => "N",  // Устанавливать статус 404
    "SET_TITLE" => "N", // Устанавливать заголовок страницы
    "SHOW_404" => "N",  // Показ специальной страницы
    "SORT_BY1" => "ACTIVE_FROM",  // Поле для первой сортировки новостей
    "SORT_BY2" => "SORT", // Поле для второй сортировки новостей
    "SORT_ORDER1" => "DESC",  // Направление для первой сортировки новостей
    "SORT_ORDER2" => "ASC", // Направление для второй сортировки новостей
    "STRICT_SECTION_CHECK" => "N",  // Строгая проверка раздела для показа списка
  ),
  false
);?>

    <div class="category-min">
      <div class="container">
        <div class="category-min__inner"><a class="category-min__item" href="#"><span class="category-min__img"><span class="category-min__img-inner" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/assets/images/categor-min-img1.png')"></span></span><span class="category-min__title">Хиты</span></a><a class="category-min__item" href="#"><span class="category-min__img"><span class="category-min__img-inner" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/assets/images/categor-min-img2.png')"></span></span><span class="category-min__title">Новинки</span></a><a class="category-min__item" href="#"><span class="category-min__img"><span class="category-min__img-inner" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/assets/images/categor-min-img3.png')"></span></span><span class="category-min__title">Акции</span></a><a class="category-min__item" href="#"><span class="category-min__img"><span class="category-min__img-inner" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/assets/images/categor-min-img4.png')"></span></span><span class="category-min__title">Live</span></a><a class="category-min__item" href="#"><span class="category-min__img"><span class="category-min__img-inner" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/assets/images/categor-min-img5.png')"></span></span><span class="category-min__title">Лицо</span></a><a class="category-min__item" href="#"><span class="category-min__img"><span class="category-min__img-inner" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/assets/images/categor-min-img6.png')"></span></span><span class="category-min__title">Лицо</span></a></div>
      </div>
    </div>
    <div class="catalog-min">
      <div class="container">
        <div class="title-main"><a class="title-main__lnk" href="#">все товары</a>
          <h2>Cейчас по скидке</h2>
        </div>
        <div class="catalog__list catalog__list-tile js-catalog-slider">
          <div class="catalog__item">
            <div class="catalog__item-labels">
              <div class="catalog__item-labels-item catalog__item-labels-sale">
                <div class="catalog__item-labels-tx">10%</div>
              </div>
            </div><a class="catalog__item-img" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/catalog-img1.png" alt=""></a>
            <div class="catalog__item-tx"><a class="catalog__item-title" href="#">JAYEONMAPPING ESSENCE MASK</a>
              <div class="catalog__item-descr">Тканевая маска лимон</div>
            </div>
            <div class="catalog__item-price">
              <div class="catalog__item-price-now">50</div>
              <div class="catalog__item-price-old">1000</div>
            </div>
            <div class="catalog__item-bottom"><a class="catalog__item-btn" href="#">Добавить в корзину</a></div>
          </div>
          <div class="catalog__item">
            <div class="catalog__item-labels">
              <div class="catalog__item-labels-item catalog__item-labels-sale">
                <div class="catalog__item-labels-tx">10%</div>
              </div>
            </div><a class="catalog__item-img" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/catalog-img2.png" alt=""></a>
            <div class="catalog__item-tx"><a class="catalog__item-title" href="#">JAYEONMAPPING ESSENCE MASK</a>
              <div class="catalog__item-descr">Тканевая маска лимон</div>
            </div>
            <div class="catalog__item-price">
              <div class="catalog__item-price-now">50</div>
              <div class="catalog__item-price-old">1000</div>
            </div>
            <div class="catalog__item-bottom"><a class="catalog__item-btn" href="#">Добавить в корзину</a></div>
          </div>
          <div class="catalog__item">
            <div class="catalog__item-labels">
              <div class="catalog__item-labels-item catalog__item-labels-sale">
                <div class="catalog__item-labels-tx">10%</div>
              </div>
            </div><a class="catalog__item-img" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/catalog-img3.png" alt=""></a>
            <div class="catalog__item-tx"><a class="catalog__item-title" href="#">JAYEONMAPPING ESSENCE MASK</a>
              <div class="catalog__item-descr">Тканевая маска лимон</div>
            </div>
            <div class="catalog__item-price">
              <div class="catalog__item-price-now">50</div>
              <div class="catalog__item-price-old">1000</div>
            </div>
            <div class="catalog__item-bottom"><a class="catalog__item-btn" href="#">Добавить в корзину</a></div>
          </div>
          <div class="catalog__item">
            <div class="catalog__item-labels">
              <div class="catalog__item-labels-item catalog__item-labels-sale">
                <div class="catalog__item-labels-tx">10%</div>
              </div>
            </div><a class="catalog__item-img" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/catalog-img4.png" alt=""></a>
            <div class="catalog__item-tx"><a class="catalog__item-title" href="#">JAYEONMAPPING ESSENCE MASK</a>
              <div class="catalog__item-descr">Тканевая маска лимон</div>
            </div>
            <div class="catalog__item-price">
              <div class="catalog__item-price-now">50</div>
              <div class="catalog__item-price-old">1000</div>
            </div>
            <div class="catalog__item-bottom"><a class="catalog__item-btn" href="#">Добавить в корзину</a></div>
          </div>
          <div class="catalog__item">
            <div class="catalog__item-labels">
              <div class="catalog__item-labels-item catalog__item-labels-sale">
                <div class="catalog__item-labels-tx">10%</div>
              </div>
            </div><a class="catalog__item-img" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/catalog-img2.png" alt=""></a>
            <div class="catalog__item-tx"><a class="catalog__item-title" href="#">JAYEONMAPPING ESSENCE MASK</a>
              <div class="catalog__item-descr">Тканевая маска лимон</div>
            </div>
            <div class="catalog__item-price">
              <div class="catalog__item-price-now">50</div>
              <div class="catalog__item-price-old">1000</div>
            </div>
            <div class="catalog__item-bottom"><a class="catalog__item-btn" href="#">Добавить в корзину</a></div>
          </div>
          <div class="catalog__item">
            <div class="catalog__item-labels">
              <div class="catalog__item-labels-item catalog__item-labels-sale">
                <div class="catalog__item-labels-tx">10%</div>
              </div>
            </div><a class="catalog__item-img" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/catalog-img2.png" alt=""></a>
            <div class="catalog__item-tx"><a class="catalog__item-title" href="#">JAYEONMAPPING ESSENCE MASK</a>
              <div class="catalog__item-descr">Тканевая маска лимон</div>
            </div>
            <div class="catalog__item-price">
              <div class="catalog__item-price-now">50</div>
              <div class="catalog__item-price-old">1000</div>
            </div>
            <div class="catalog__item-bottom"><a class="catalog__item-btn" href="#">Добавить в корзину</a></div>
          </div>
        </div>
        <div class="button-mob"><a class="button button-primary" href="#">
            все товары<svg><use xlink:href="#arrow3"></use></svg></a></div>
      </div>
    </div>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"two_banner_home_page", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "2",
		"IBLOCK_TYPE" => "page_info",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "10",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_TITLE" => "",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "LINK_BUTTON",
			1 => "TEXT_BUTTON",
			2 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "two_banner_home_page"
	),
	false
);?>
    <div class="catalog-min">
      <div class="container">
        <div class="title-main"><a class="title-main__lnk" href="#">все товары</a>
          <h2>Попробуй новинки</h2>
        </div>
        <div class="catalog__list catalog__list-tile js-catalog-slider">
          <div class="catalog__item">
            <div class="catalog__item-labels">
              <div class="catalog__item-labels-item catalog__item-labels-new">
                <div class="catalog__item-labels-tx">new</div>
              </div>
            </div><a class="catalog__item-img" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/catalog-img1.png" alt=""></a>
            <div class="catalog__item-tx"><a class="catalog__item-title" href="#">JAYEONMAPPING ESSENCE MASK</a>
              <div class="catalog__item-descr">Тканевая маска лимон</div>
            </div>
            <div class="catalog__item-price">
              <div class="catalog__item-price-now">50</div>
              <div class="catalog__item-price-old">1000</div>
            </div>
            <div class="catalog__item-bottom"><a class="catalog__item-btn" href="#">Добавить в корзину</a></div>
          </div>
          <div class="catalog__item">
            <div class="catalog__item-labels">
              <div class="catalog__item-labels-item catalog__item-labels-new">
                <div class="catalog__item-labels-tx">new</div>
              </div>
            </div><a class="catalog__item-img" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/catalog-img2.png" alt=""></a>
            <div class="catalog__item-tx"><a class="catalog__item-title" href="#">JAYEONMAPPING ESSENCE MASK</a>
              <div class="catalog__item-descr">Тканевая маска лимон</div>
            </div>
            <div class="catalog__item-price">
              <div class="catalog__item-price-now">50</div>
              <div class="catalog__item-price-old">1000</div>
            </div>
            <div class="catalog__item-bottom"><a class="catalog__item-btn" href="#">Добавить в корзину</a></div>
          </div>
          <div class="catalog__item">
            <div class="catalog__item-labels">
              <div class="catalog__item-labels-item catalog__item-labels-new">
                <div class="catalog__item-labels-tx">new</div>
              </div>
            </div><a class="catalog__item-img" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/catalog-img3.png" alt=""></a>
            <div class="catalog__item-tx"><a class="catalog__item-title" href="#">JAYEONMAPPING ESSENCE MASK</a>
              <div class="catalog__item-descr">Тканевая маска лимон</div>
            </div>
            <div class="catalog__item-price">
              <div class="catalog__item-price-now">50</div>
              <div class="catalog__item-price-old">1000</div>
            </div>
            <div class="catalog__item-bottom"><a class="catalog__item-btn" href="#">Добавить в корзину</a></div>
          </div>
          <div class="catalog__item">
            <div class="catalog__item-labels">
              <div class="catalog__item-labels-item catalog__item-labels-new">
                <div class="catalog__item-labels-tx">new</div>
              </div>
            </div><a class="catalog__item-img" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/catalog-img4.png" alt=""></a>
            <div class="catalog__item-tx"><a class="catalog__item-title" href="#">JAYEONMAPPING ESSENCE MASK</a>
              <div class="catalog__item-descr">Тканевая маска лимон</div>
            </div>
            <div class="catalog__item-price">
              <div class="catalog__item-price-now">50</div>
              <div class="catalog__item-price-old">1000</div>
            </div>
            <div class="catalog__item-bottom"><a class="catalog__item-btn" href="#">Добавить в корзину</a></div>
          </div>
          <div class="catalog__item">
            <div class="catalog__item-labels">
              <div class="catalog__item-labels-item catalog__item-labels-new">
                <div class="catalog__item-labels-tx">new</div>
              </div>
            </div><a class="catalog__item-img" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/catalog-img2.png" alt=""></a>
            <div class="catalog__item-tx"><a class="catalog__item-title" href="#">JAYEONMAPPING ESSENCE MASK</a>
              <div class="catalog__item-descr">Тканевая маска лимон</div>
            </div>
            <div class="catalog__item-price">
              <div class="catalog__item-price-now">50</div>
              <div class="catalog__item-price-old">1000</div>
            </div>
            <div class="catalog__item-bottom"><a class="catalog__item-btn" href="#">Добавить в корзину</a></div>
          </div>
          <div class="catalog__item">
            <div class="catalog__item-labels">
              <div class="catalog__item-labels-item catalog__item-labels-new">
                <div class="catalog__item-labels-tx">new</div>
              </div>
            </div><a class="catalog__item-img" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/catalog-img2.png" alt=""></a>
            <div class="catalog__item-tx"><a class="catalog__item-title" href="#">JAYEONMAPPING ESSENCE MASK</a>
              <div class="catalog__item-descr">Тканевая маска лимон</div>
            </div>
            <div class="catalog__item-price">
              <div class="catalog__item-price-now">50</div>
              <div class="catalog__item-price-old">1000</div>
            </div>
            <div class="catalog__item-bottom"><a class="catalog__item-btn" href="#">Добавить в корзину</a></div>
          </div>
        </div>
        <div class="button-mob"><a class="button button-primary" href="#">
            все товары<svg><use xlink:href="#arrow3"></use></svg></a></div>
      </div>
    </div>
    <div class="catalog-main">
      <div class="container">
        <div class="title-main">
          <h2>Sos beauty</h2>
        </div>
        <div class="row">
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="catalog-main__item catalog-main__item-bg1"><a href="#"></a><span class="catalog-main__title">Anty-age</span><span class="catalog-main__tx">Антивозрастной<br> уход</span><span class="catalog-main__arrow"><svg><use xlink:href="#arrow2"></use></svg></span><span class="catalog-main__img"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/catalog-main-img1.png" alt=""></span></div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="catalog-main__item catalog-main__item-bg2"><a href="#"></a><span class="catalog-main__title">Spf</span><span class="catalog-main__tx">Солнцезащитные<br> средства</span><span class="catalog-main__arrow"><svg><use xlink:href="#arrow2"></use></svg></span><span class="catalog-main__img"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/catalog-main-img2.png" alt=""></span></div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="catalog-main__item catalog-main__item-bg3"><a href="#"></a><span class="catalog-main__title">Acne</span><span class="catalog-main__tx">Для проблемной <br>кожи</span><span class="catalog-main__arrow"><svg><use xlink:href="#arrow2"></use></svg></span><span class="catalog-main__img"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/catalog-main-img3.png" alt=""></span></div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="catalog-main__item catalog-main__item-bg4"><a href="#"></a><span class="catalog-main__title">Relax & Spa</span><span class="catalog-main__tx">Время для любви <br>к себе</span><span class="catalog-main__arrow"><svg><use xlink:href="#arrow2"></use></svg></span><span class="catalog-main__img"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/catalog-main-img4.png" alt=""></span></div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="catalog-main__item catalog-main__item-bg5"><a href="#"></a><span class="catalog-main__title">Dry</span><span class="catalog-main__tx">Для сухой <br>кожи</span><span class="catalog-main__arrow"><svg><use xlink:href="#arrow2"></use></svg></span><span class="catalog-main__img"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/catalog-main-img5.png" alt=""></span></div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="catalog-main__item catalog-main__item-bg6"><a href="#"></a><span class="catalog-main__title">Beauty box</span><span class="catalog-main__tx">Наборы<br> и подарки</span><span class="catalog-main__arrow"><svg><use xlink:href="#arrow2"></use></svg></span><span class="catalog-main__img"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/catalog-main-img6.png" alt=""></span></div>
          </div>
        </div>
      </div>
    </div>
    <div class="catalog-min">
      <div class="container">
        <div class="title-main"><a class="title-main__lnk" href="#">все товары</a>
          <h2>Ваши фавориты</h2>
        </div>
        <div class="catalog__list catalog__list-tile js-catalog-slider">
          <div class="catalog__item">
            <div class="catalog__item-labels">
              <div class="catalog__item-labels-item catalog__item-labels-hit">
                <div class="catalog__item-labels-tx">ХИТ</div>
              </div>
            </div><a class="catalog__item-img" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/catalog-img1.png" alt=""></a>
            <div class="catalog__item-tx"><a class="catalog__item-title" href="#">JAYEONMAPPING ESSENCE MASK</a>
              <div class="catalog__item-descr">Тканевая маска лимон</div>
            </div>
            <div class="catalog__item-price">
              <div class="catalog__item-price-now">50</div>
              <div class="catalog__item-price-old">1000</div>
            </div>
            <div class="catalog__item-bottom"><a class="catalog__item-btn" href="#">Добавить в корзину</a></div>
          </div>
          <div class="catalog__item">
            <div class="catalog__item-labels">
              <div class="catalog__item-labels-item catalog__item-labels-hit">
                <div class="catalog__item-labels-tx">ХИТ</div>
              </div>
            </div><a class="catalog__item-img" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/catalog-img2.png" alt=""></a>
            <div class="catalog__item-tx"><a class="catalog__item-title" href="#">JAYEONMAPPING ESSENCE MASK</a>
              <div class="catalog__item-descr">Тканевая маска лимон</div>
            </div>
            <div class="catalog__item-price">
              <div class="catalog__item-price-now">50</div>
              <div class="catalog__item-price-old">1000</div>
            </div>
            <div class="catalog__item-bottom"><a class="catalog__item-btn" href="#">Добавить в корзину</a></div>
          </div>
          <div class="catalog__item">
            <div class="catalog__item-labels">
              <div class="catalog__item-labels-item catalog__item-labels-hit">
                <div class="catalog__item-labels-tx">ХИТ</div>
              </div>
            </div><a class="catalog__item-img" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/catalog-img3.png" alt=""></a>
            <div class="catalog__item-tx"><a class="catalog__item-title" href="#">JAYEONMAPPING ESSENCE MASK</a>
              <div class="catalog__item-descr">Тканевая маска лимон</div>
            </div>
            <div class="catalog__item-price">
              <div class="catalog__item-price-now">50</div>
              <div class="catalog__item-price-old">1000</div>
            </div>
            <div class="catalog__item-bottom"><a class="catalog__item-btn" href="#">Добавить в корзину</a></div>
          </div>
          <div class="catalog__item">
            <div class="catalog__item-labels">
              <div class="catalog__item-labels-item catalog__item-labels-hit">
                <div class="catalog__item-labels-tx">ХИТ</div>
              </div>
            </div><a class="catalog__item-img" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/catalog-img4.png" alt=""></a>
            <div class="catalog__item-tx"><a class="catalog__item-title" href="#">JAYEONMAPPING ESSENCE MASK</a>
              <div class="catalog__item-descr">Тканевая маска лимон</div>
            </div>
            <div class="catalog__item-price">
              <div class="catalog__item-price-now">50</div>
              <div class="catalog__item-price-old">1000</div>
            </div>
            <div class="catalog__item-bottom"><a class="catalog__item-btn" href="#">Добавить в корзину</a></div>
          </div>
          <div class="catalog__item">
            <div class="catalog__item-labels">
              <div class="catalog__item-labels-item catalog__item-labels-hit">
                <div class="catalog__item-labels-tx">ХИТ</div>
              </div>
            </div><a class="catalog__item-img" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/catalog-img2.png" alt=""></a>
            <div class="catalog__item-tx"><a class="catalog__item-title" href="#">JAYEONMAPPING ESSENCE MASK</a>
              <div class="catalog__item-descr">Тканевая маска лимон</div>
            </div>
            <div class="catalog__item-price">
              <div class="catalog__item-price-now">50</div>
              <div class="catalog__item-price-old">1000</div>
            </div>
            <div class="catalog__item-bottom"><a class="catalog__item-btn" href="#">Добавить в корзину</a></div>
          </div>
          <div class="catalog__item">
            <div class="catalog__item-labels">
              <div class="catalog__item-labels-item catalog__item-labels-hit">
                <div class="catalog__item-labels-tx">ХИТ</div>
              </div>
            </div><a class="catalog__item-img" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/catalog-img2.png" alt=""></a>
            <div class="catalog__item-tx"><a class="catalog__item-title" href="#">JAYEONMAPPING ESSENCE MASK</a>
              <div class="catalog__item-descr">Тканевая маска лимон</div>
            </div>
            <div class="catalog__item-price">
              <div class="catalog__item-price-now">50</div>
              <div class="catalog__item-price-old">1000</div>
            </div>
            <div class="catalog__item-bottom"><a class="catalog__item-btn" href="#">Добавить в корзину</a></div>
          </div>
        </div>
        <div class="button-mob"><a class="button button-primary" href="#">
            все товары<svg><use xlink:href="#arrow3"></use></svg></a></div>
      </div>
    </div>
    <div class="article-main">
      <div class="container">
        <div class="title-main"><a class="title-main__lnk" href="#">Читать все</a>
          <h2>Статьи и обзоры</h2>
        </div>
        <div class="article-main__slider js-article-main">
          <div class="article__item"><a class="article__item-img" href="#" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/assets/images/article-img1.jpg')"></a>
            <div class="article__item-data">12.05.2020</div><a class="article__item-title" href="#">Главные достоинства корейской косметики</a>
            <div class="article__item-tx">Для тех, кто активно интересуется</div>
          </div>
          <div class="article__item"><a class="article__item-img" href="#" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/assets/images/article-img2.jpg')"></a>
            <div class="article__item-data">12.05.2020</div><a class="article__item-title" href="#">Главные достоинства корейской косметики</a>
            <div class="article__item-tx">Для тех, кто активно интересуется тенденциями в индустрии красоты уже тенденциями в индустрии красоты уже</div>
          </div>
          <div class="article__item"><a class="article__item-img" href="#" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/assets/images/article-img3.jpg')"></a>
            <div class="article__item-data">12.05.2020</div><a class="article__item-title" href="#">Главные достоинства корейской косметики</a>
            <div class="article__item-tx">Для тех, кто активно интересуется тенденциями в индустрии красоты уже тенденциями в индустрии красоты уже</div>
          </div>
          <div class="article__item"><a class="article__item-img" href="#" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/assets/images/article-img3.jpg')"></a>
            <div class="article__item-data">12.05.2020</div><a class="article__item-title" href="#">Главные достоинства корейской косметики</a>
            <div class="article__item-tx">Для тех, кто активно интересуется тенденциями в индустрии красоты уже тенденциями в индустрии красоты уже</div>
          </div>
        </div>
        <div class="button-mob"><a class="button button-primary" href="#">
            читать все<svg><use xlink:href="#arrow3"></use></svg></a></div>
      </div>
    </div>
<?$APPLICATION->IncludeComponent("bitrix:news.list", "tree_banner_home_page", Array(
  "ACTIVE_DATE_FORMAT" => "d.m.Y",  // Формат показа даты
    "ADD_SECTIONS_CHAIN" => "N",  // Включать раздел в цепочку навигации
    "AJAX_MODE" => "N", // Включить режим AJAX
    "AJAX_OPTION_ADDITIONAL" => "", // Дополнительный идентификатор
    "AJAX_OPTION_HISTORY" => "N", // Включить эмуляцию навигации браузера
    "AJAX_OPTION_JUMP" => "N",  // Включить прокрутку к началу компонента
    "AJAX_OPTION_STYLE" => "Y", // Включить подгрузку стилей
    "CACHE_FILTER" => "N",  // Кешировать при установленном фильтре
    "CACHE_GROUPS" => "Y",  // Учитывать права доступа
    "CACHE_TIME" => "36000000", // Время кеширования (сек.)
    "CACHE_TYPE" => "A",  // Тип кеширования
    "CHECK_DATES" => "Y", // Показывать только активные на данный момент элементы
    "DETAIL_URL" => "", // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
    "DISPLAY_BOTTOM_PAGER" => "N",  // Выводить под списком
    "DISPLAY_DATE" => "N",  // Выводить дату элемента
    "DISPLAY_NAME" => "Y",  // Выводить название элемента
    "DISPLAY_PICTURE" => "Y", // Выводить изображение для анонса
    "DISPLAY_PREVIEW_TEXT" => "Y",  // Выводить текст анонса
    "DISPLAY_TOP_PAGER" => "N", // Выводить над списком
    "FIELD_CODE" => array(  // Поля
      0 => "",
      1 => "",
    ),
    "FILTER_NAME" => "",  // Фильтр
    "HIDE_LINK_WHEN_NO_DETAIL" => "N",  // Скрывать ссылку, если нет детального описания
    "IBLOCK_ID" => "4", // Код информационного блока
    "IBLOCK_TYPE" => "page_info", // Тип информационного блока (используется только для проверки)
    "INCLUDE_IBLOCK_INTO_CHAIN" => "N", // Включать инфоблок в цепочку навигации
    "INCLUDE_SUBSECTIONS" => "N", // Показывать элементы подразделов раздела
    "MESSAGE_404" => "",  // Сообщение для показа (по умолчанию из компонента)
    "NEWS_COUNT" => "10", // Количество новостей на странице
    "PAGER_BASE_LINK_ENABLE" => "N",  // Включить обработку ссылок
    "PAGER_DESC_NUMBERING" => "N",  // Использовать обратную навигацию
    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000", // Время кеширования страниц для обратной навигации
    "PAGER_SHOW_ALL" => "N",  // Показывать ссылку "Все"
    "PAGER_SHOW_ALWAYS" => "N", // Выводить всегда
    "PAGER_TEMPLATE" => "", // Шаблон постраничной навигации
    "PAGER_TITLE" => "",  // Название категорий
    "PARENT_SECTION" => "", // ID раздела
    "PARENT_SECTION_CODE" => "",  // Код раздела
    "PREVIEW_TRUNCATE_LEN" => "", // Максимальная длина анонса для вывода (только для типа текст)
    "PROPERTY_CODE" => array( // Свойства
      0 => "LINK_BUTTON",
      1 => "TEXT_BUTTON",
      2 => "",
    ),
    "SET_BROWSER_TITLE" => "N", // Устанавливать заголовок окна браузера
    "SET_LAST_MODIFIED" => "N", // Устанавливать в заголовках ответа время модификации страницы
    "SET_META_DESCRIPTION" => "N",  // Устанавливать описание страницы
    "SET_META_KEYWORDS" => "N", // Устанавливать ключевые слова страницы
    "SET_STATUS_404" => "N",  // Устанавливать статус 404
    "SET_TITLE" => "N", // Устанавливать заголовок страницы
    "SHOW_404" => "N",  // Показ специальной страницы
    "SORT_BY1" => "ACTIVE_FROM",  // Поле для первой сортировки новостей
    "SORT_BY2" => "SORT", // Поле для второй сортировки новостей
    "SORT_ORDER1" => "DESC",  // Направление для первой сортировки новостей
    "SORT_ORDER2" => "ASC", // Направление для второй сортировки новостей
    "STRICT_SECTION_CHECK" => "N",  // Строгая проверка раздела для показа списка
  ),
  false
);?>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>