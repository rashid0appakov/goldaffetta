<footer class="footer">
      <div class="footer__top">
        <div class="container">
          <div class="footer__top-inner">
            <div class="row">
              <div class="col-xl-3 col-lg-3 col-md-12"><a class="footer__logo" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/logo.svg" alt=""></a>
                <div class="footer__soc">
                  <div class="footer__soc-title">Мы в соцсетях</div>
                  <ul>
                    <li><a href="https://vk.com/goldentreeru" target="_blank"><svg><use xlink:href="#soc1"></use></svg></a></li>
                    <li><a href="https://www.facebook.com/goldentreeru" target="_blank"><svg><use xlink:href="#soc2"></use></svg></a></li>
                    <li><a href="https://www.instagram.com/goldentree_ru/" target="_blank"><svg><use xlink:href="#soc3"></use></svg></a></li>
                    <li><a href="https://www.youtube.com/channel/UCXFwbOK6-AX6QB2613wSxIg" target="_blank"><svg><use xlink:href="#soc4"></use></svg></a></li>
                    <li><a href="https://www.t.me/goldentree_ru" target="_blank"><svg><use xlink:href="#soc5"></use></svg></a></li>
                  </ul>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-12">
                <div class="footer__menu">
                  <div class="footer__menu-title">Компания</div>
<?$APPLICATION->IncludeComponent(
    "bitrix:menu", 
    "bottom_menu_1", 
    array(
        "ALLOW_MULTI_SELECT" => "N",
        "CHILD_MENU_TYPE" => "left",
        "DELAY" => "N",
        "MAX_LEVEL" => "1",
        "MENU_CACHE_GET_VARS" => array(
        ),
        "MENU_CACHE_TIME" => "3600",
        "MENU_CACHE_TYPE" => "N",
        "MENU_CACHE_USE_GROUPS" => "Y",
        "ROOT_MENU_TYPE" => "left",
        "USE_EXT" => "N",
        "COMPONENT_TEMPLATE" => "bottom_menu_1"
    ),
    false
);?>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-12">
                <div class="footer__menu">
                  <div class="footer__menu-title">Прочее</div>
<?$APPLICATION->IncludeComponent(
  "bitrix:menu", 
  "bottom_menu_1", 
  array(
    "ALLOW_MULTI_SELECT" => "N",
    "CHILD_MENU_TYPE" => "left",
    "DELAY" => "N",
    "MAX_LEVEL" => "1",
    "MENU_CACHE_GET_VARS" => array(
    ),
    "MENU_CACHE_TIME" => "3600",
    "MENU_CACHE_TYPE" => "N",
    "MENU_CACHE_USE_GROUPS" => "Y",
    "ROOT_MENU_TYPE" => "top",
    "USE_EXT" => "N",
    "COMPONENT_TEMPLATE" => "bottom_menu_1"
  ),
  false
);?>
                </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-12">
                <div class="footer__menu footer__menu-all">
                  <div class="footer__menu-title">Контакты</div>
                  <ul class="footer__menu-list">
                    <li>Россия, г. Москва, ул. Кантемировская, д.58, 115477</li>
                    <li>Режим работы: 9:00-20:00</li>
                  </ul><a class="footer__mail" href="mailto:info@goldentree.ru">info@goldentree.ru</a>
                  <div class="footer__call"><a class="footer__call-lnk" href="tel:+78005005796">+7 (800) 500-57-96</a><a class="footer__call-title" href="#" data-toggle="modal" data-target="#modalForm">Заказать звонок</a></div>
                </div>
              </div>
            </div><a class="footer__lnk-top" href="#top"><span class="footer__lnk-top-arrow"><svg><use xlink:href="#arrow2"></use></svg></span><span class="footer__lnk-top-tx">Наверх</span></a>
          </div>
        </div>
      </div>
      <div class="footer__bottom">
        <div class="container">
          <div class="footer__bottom-inner">
            <div class="footer__bottom-tx">© ООО «Голден Три»</div><a class="footer__bottom-lnk" href="/policy/">Политика конфиденциальности</a><a class="footer__bottom-lnk" href="https://affetta.ru/" target="_blank">Сделано в Affetta</a>
          </div>
        </div>
      </div>
    </footer><!-- Modal -->
    <div class="modal fade" id="modalAddCart" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/close.svg" alt=""></button>
          <div class="modal__text">
            <div class="modal__text-title">Товар добавлен в корзину</div>
            <p>Вы можете продолжить покупки или перейти в корзину</p>
            <div class="button-group"><a class="button button-gray" href="#">Вернуться в каталог</a><a class="button button-bord3" href="#">перейти в корзину</a></div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modalThanks" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/close.svg" alt=""></button>
          <div class="modal__text">
            <div class="modal__text-title">Спасибо за отклик!</div>
            <p>Ваша заявка будет рассмотрена, в ближайшее время</p>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modalOrder" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/close.svg" alt=""></button>
          <div class="modal__text">
            <div class="modal__text-title">Ваш заказ офомлен!</div>
            <p>Спасибо, за Ваш заказ! В ближайшее время<br> мы свяжемся с Вами для уточнения деталей.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="modal frm fade" id="modalForm" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/close.svg" alt=""></button>
          <div class="modal__form">
            <div class="modal__text-title">Остались вопросы?<br> Пишите!</div>

            <form>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form__row">
                    <div class="form__cell">
                      <label for="modal-name-form">ФИО</label>
                      <input id="modal-name-form" type="text" placeholder="Иван Иванов">
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form__row">
                    <div class="form__cell">
                      <label for="modal-tel-form">Телефон</label>
                      <input id="modal-tel-form" type="text" placeholder="+7">
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form__row">
                    <div class="form__cell">
                      <label for="modal-tx-form">Вопрос</label>
                      <textarea id="modal-tx-form" placeholder="Введите ваш комментарий"></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form__row form__row-bottom">
                    <button class="button button-gray" type="submit">Отправить</button>
                    <div class="form__text">Нажимая кнопку, я даю согласие на обработку своих персональных данных в соответствии с <a href="#">Политикой конфиденциальности</a></div>
                  </div>
                </div>
              </div>
            </form>
            
          </div>
        </div>
      </div>
    </div>
    <div class="modal frm fade" id="modalReviews" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/close.svg" alt=""></button>
          <div class="modal__form">
            <div class="modal__text-title">Оставить отзыв</div>
            <form action="" method="post" enctype="multipart/form-data" class="form-rew">
            <div class="modal__rating">
              <div class="modal__rating-title">Оцените товар</div>
                <div class="rating rating-area">
                  <input type="radio" id="star-5" name="RATING" value="5">
                  <label for="star-5" title="Оценка «5»"></label> 
                  <input type="radio" id="star-4" name="RATING" value="4">
                  <label for="star-4" title="Оценка «4»"></label>    
                  <input type="radio" id="star-3" name="RATING" value="3">
                  <label for="star-3" title="Оценка «3»"></label>  
                  <input type="radio" id="star-2" name="RATING" value="2">
                  <label for="star-2" title="Оценка «2»"></label>    
                  <input type="radio" id="star-1" name="RATING" value="1">
                  <label for="star-1" title="Оценка «1»"></label>
                </div>     
            </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form__row">
                    <div class="form__cell">
                      <label for="modal-name-reviews">Имя</label>
                      <input id="modal-name-reviews" type="text" placeholder="Иван Иванов" name="NAME">
                      <input type="hidden" name="LINK" value="<?=$APPLICATION->GetCurDir()?>">
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form__row">
                    <div class="form__cell">
                      <label for="modal-name-reviews2">Комментарий</label>
                      <textarea id="modal-name-reviews2" placeholder="Введите ваш комментарий" name="REVIEW"></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form__row form__row-bottom">
                    <button class="button button-primary" type="submit" name="OK">Оставить отзыв</button>
                    <div class="form__text">Нажимая кнопку, я даю согласие на обработку своих персональных данных в соответствии с <a href="/policy/">Политикой конфиденциальности</a></div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
<?$dir = $APPLICATION->GetCurPage();?>
<?if($dir != '/vacancies/'):?>
    <script src="<?=SITE_TEMPLATE_PATH?>/vendors/jquery/dist/jquery.min.js"></script>
<?endif;?>    
    <script src="<?=SITE_TEMPLATE_PATH?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/vendors/jquery-ui/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/vendors/slick/slick.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/vendors/jquery.mCustomScrollbar.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/assets/js/app.js"></script>
    <?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
  die();
?>
  </body>
</html>