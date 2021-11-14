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
            <div id="map">
              <iframe src="https://yandex.ru/map-widget/v1/-/CCUqqCrQwA" width="100%" height="100%" frameborder="1" allowfullscreen="true" style="position:relative;border:0px;"></iframe></div>
            </div>
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
    ".default", 
    array(
        "IBLOCK_ID" => "6",
        "MAIL_EVENT" => "FORM_SENDED",
        "RECAPTCHA_ENABLED" => "N",
        "RECAPTCHA_PUBLIC_KEY" => "GoogleRecaptchaPublicKey",
        "RECAPTCHA_PRIVATE_KEY" => "GoogleRecaptchaPrivateKey",
        "ACTIVE" => "Y",
        "TOKEN" => "form001",
        "FORM_NAME" => "Form 1",
        "PROPS" => array(
            0 => "NAME",
            1 => "EMAIL",
            2 => "PHONE",
            3 => "SELECT",
            4 => "CHECKBOX",
            5 => "DATE",
            6 => "MESSAGE",
            7 => "DOCUMENT,FILE",
            8 => "DOCUMENTS,FILES",
        ),
        "COMPONENT_TEMPLATE" => ".default"
    ),
    false
);
?>
        </div>
      </div>
    </div>

 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>