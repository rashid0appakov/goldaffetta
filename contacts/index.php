<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>
    <div class="contacts">
      <div class="container">
        <div class="contacts__inner">
          <div class="contacts__description">
<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"breadik",
	Array(
		"PATH" => "",
		"SITE_ID" => "s1",
		"START_FROM" => "0"
	)
);?>
            <h1>Контакты</h1>
            <div class="contacts__description-info"><a class="contacts__description-phone" href="tel:+78005005796">+7 (800) 500- 57-96</a><a class="contacts__description-mail" href="mailto:info@goldentree.ru">info@goldentree.ru</a></div>
            <div class="contacts__description-address">
              <div class="contacts__description-address-title">Москва</div>
              <div class="contacts__description-address-tx">Кантемировская ул., д. 58, Россия, 115477</div>
              <div class="contacts__description-address-tx">Ежедневно с 9:00 - 20:00</div>
            </div>
          </div>
          <div class="contacts__map">
            <div id="map"></div><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/map.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
    <div class="form" style="background-image: url('<?=SITE_TEMPLATE_PATH?>/assets/images/form-bg.jpg')">
      <div class="container">
        <div class="form__inner">
          <h2>Остались вопросы Пишите!</h2>
          <div class="form__description">Наши менеджеры свяжутся с вами</div>
<?
$APPLICATION->IncludeComponent(
    "custom:form",
    "",
    array(
        'IBLOCK_ID' => '6',
        'MAIL_EVENT' => 'FORM_SENDED',
        'RECAPTCHA_ENABLED' => 'N',
        'RECAPTCHA_PUBLIC_KEY' => 'GoogleRecaptchaPublicKey',
        'RECAPTCHA_PRIVATE_KEY' => 'GoogleRecaptchaPrivateKey',
        'ACTIVE' => 'Y',
        'TOKEN' => 'form001',
        'FORM_NAME' => 'Form 1',
        'PROPS' => array(
            'NAME', // type - string
            'EMAIL', // type - string
            'PHONE', // type - string
            'SELECT', // type - select
            'CHECKBOX', // type - string
            'DATE', // type - date
            'MESSAGE,TEXT', // type - html/text
            'DOCUMENT,FILE', // type - file
            'DOCUMENTS,FILES' // type - multiple files
        ),
    )
);
?>
        </div>
      </div>
    </div>

 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>