<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Политика конфиденциальности");
?>            <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadik", Array(
	"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
		"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
		"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
	),
	false
);?>
    <div class="text" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/assets/images/text-bg.png')">
      <div class="container">
        <h1>Политика конфиденциальности</h1>
        <div class="text__inner">
          <p>Целью создания настоящего веб-сайта ООО «Голден Три» (Компания) является предоставление физическим и юридическим лицам (пользователям) необходимых сведений о деятельности Компании и информирование о товарах и услугах, предоставляемых Компанией.</p>
          <p>Обращаем ваше внимание на то, что на сайте Компании имеются ссылки на другие веб-сайты и в данном случае Компания не несёт ответственность за конфиденциальность информации на других ресурсах.</p>
          <h3>Какую информацию мы собираем?</h3>
          <p>Мы собираем личную информацию о вас (персональные данные), которую вы предоставляете при регистрации на нашем веб-сайте, размещении заказа, подписке на нашу рассылку или сообщаете лично. Передавая Компании свои персональные данные, вы соглашаетесь с условиями, приведёнными здесь. В соответствии с действующим законодательством и Политикой Компании о защите персональных данных, вы можете в любое время их изменить, обновить или попросить об удалении. При регистрации на сайте, оформлении заказа мы можем попросить вас указать:</p>
          <ul>
            <li>Имя</li>
            <li>Номер контактного телефона</li>
            <li>Адрес электронной почты, по которым мы можем связаться с вами</li>
            <li>Адрес доставки вашего заказа</li>
          </ul>
          <h4>Также компания собирает некоторую статистическую информацию, например:</h4>
          <ul>
            <li>IP-адрес пользователя</li>
            <li>Тип браузера</li>
            <li>Дата, время и количество посещений</li>
            <li>Адрес сайта, с которого пользователь осуществил переход на сайт компании</li>
            <li>Сведения о местоположении</li>
            <li>Сведения о посещенных страницах, о просмотре рекламных баннеров</li>
            <li>Информация, предоставляемая вашим браузером (тип устройства, тип и версия браузера, операционная система и т.п.)</li>
          </ul>
          <h3>Как мы используем собранную информацию?</h3>
          <h4>Любая информация, предоставленная вами, может быть использована в соответствии с действующим законодательством в целях:</h4>
          <ul>
            <li>повышения качества предоставляемых товаров и услуг</li>
            <li>обработки заказа на сайте Компании или для предоставления вам доступа к специальной информации</li>
            <li>анализа данных и проведения различных исследований</li>
            <li>осуществления деятельности по продвижению товаров и услуг</li>
            <li>подготовки индивидуальных предложений, которые подходят именно вам</li>
            <li>информирования вас об акциях, скидках и специальных предложениях, присылая на указанный адрес электронный почты информационные сообщени</li>
          </ul>
          <p>Обращаем ваше внимание на то, что в любой момент вы можете отказаться от указанных сообщений, обратившись к Компании.</p>
          <h3>Гарантии</h3>
          <p>Компания ответственно относится к вопросу конфиденциальности своих пользователей и уважает право каждого пользователя сайта на конфиденциальность. Компания гарантирует, что никакая полученная от вас информация никогда и ни при каких условиях не будет предоставлена третьим лицам без вашего согласия, за исключением случаев, предусмотренных действующим законодательством Российской Федерации. Это не относится к доверенным компаниям, сотрудничающим с нами, поскольку они связаны соглашением конфиденциальности. Однако, неличная информация посетителей сайта может быть предоставлена сторонним компаниям в маркетинговых, рекламных и других целях.</p>
          <h3>Изменения в политике конфиденциальности</h3>
          <p>Компания оставляет за собой право вносить необходимые изменения на сайте, заменять или удалять любые части его содержания и ограничивать доступ к сайту в любое время по своему усмотрению. Компания также оставляет за собой право изменения Политики конфиденциальности в любое время с целью дальнейшего совершенствования системы защиты от несанкционированного доступа к сообщаемым вами персональным данным. Если мы изменим нашу политику конфиденциальности, мы опубликуем изменения на данной странице и/или обновим дату изменения политики конфиденциальности, указанную ниже. Дата последнего изменения политики конфиденциальности 17/11/2017</p>
        </div>
      </div>
    </div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>