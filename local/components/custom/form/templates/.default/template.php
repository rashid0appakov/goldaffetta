<?
/**
 * @var $APPLICATION
 * @var $templateFolder
 * @var $arParams
 * @var $arResult
 */
?>

<script src="<?= $templateFolder ?>/js/jquery-3.4.1.min.js"></script>
<script src="<?= $templateFolder ?>/js/jquery-ui.js"></script>
<script src="<?= $templateFolder ?>/js/jquery.paroller.min.js"></script>
<script src="<?= $templateFolder ?>/js/bootstrap.min.js"></script>
<script src="<?= $templateFolder ?>/js/datepicker/bootstrap-datepicker.min.js"></script>


          <form id="form_<?= $arParams['TOKEN'] ?>" enctype="multipart/form-data" type="post">
            <div class="form__holder">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form__row">
                    <div class="form__cell">
                      <input type="text" placeholder="Имя*" name="name" id="name" required>
                    </div>
                  </div>
                  <div class="form__row">
                    <div class="form__cell">
                      <input type="tel" placeholder="Телефон*" id="phone" name="phone" required>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form__row">
                    <div class="form__cell">
                      <textarea placeholder="Вопрос" name="message" rows="5" id="message" required></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12 col-md-12">
                  <div class="form__row form__row-bottom">
                    <button class="button button-primary" type="submit" name="button">Задать вопрос</button>
                    <div class="form__text">Нажимая кнопку, я даю согласие на обработку своих персональных данных <br>в соответствии с <a href="/policy/">Политикой конфиденциальности</a></div>
                  </div>
                </div>
              </div>
            </div>
          </form>

<?php
if ($arParams['RECAPTCHA_ENABLED'] === 'Y') {
    include('script.recaptcha.php');
} else {
    include('script.php');
}
