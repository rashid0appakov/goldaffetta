<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
  die();
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <?$APPLICATION->ShowHead();?>
    <title><?$APPLICATION->ShowTitle();?></title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="HandheldFriendly" content="true">
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=PT+Sans:ital@0;1&amp;display=swap">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/vendors/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/vendors/slick/slick.css">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/assets/css/app.css">
  </head>
  <body>
    <div id="panel">
      <?$APPLICATION->ShowPanel();?>
    </div>
    <svg style="display: none">
<symbol id="search" viewBox="0 0 24 24" fill="none">
<path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M21 21L16.65 16.65" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
</symbol>
<symbol id="cart" viewBox="0 0 24 24" fill="none">
<path d="M4.5 6.6842C4.5 6.40806 4.72386 6.1842 5 6.1842H19.5333C19.8095 6.1842 20.0333 6.40806 20.0333 6.6842V19.0877C20.0333 21.0207 18.4663 22.5877 16.5333 22.5877H8C6.06701 22.5877 4.5 21.0207 4.5 19.0877V6.6842Z" stroke="currentColor"/>
<path d="M8.10776 8.93808L8.10775 4.86098C8.10776 3.92539 8.54136 3.02813 9.31317 2.36657C10.085 1.70502 11.1318 1.33336 12.2233 1.33336C13.3148 1.33336 14.3616 1.70502 15.1334 2.36657C15.9053 3.02813 16.3389 3.92539 16.3389 4.86098L16.3389 8.93808" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
</symbol>
<symbol id="arrow" viewBox="0 0 16 17" fill="none">
<path d="M8.00256 10.2132L4.71126 6.58113C4.66339 6.5283 4.60013 6.5 4.53174 6.5C4.46335 6.5 4.40009 6.5283 4.35221 6.58113L4.07523 6.88491C4.02565 6.93774 4 7.00943 4 7.08491C4 7.16038 4.02565 7.23019 4.07352 7.28302L7.82133 11.4189C7.8692 11.4717 7.93246 11.5 8.00085 11.5C8.07096 11.5 8.13593 11.4717 8.1838 11.4189L11.9265 7.28868C11.9744 7.23585 12 7.16604 12 7.09057C12 7.01509 11.9744 6.94528 11.9265 6.89245L11.6512 6.58868C11.6033 6.53585 11.5384 6.50566 11.4717 6.50566C11.4033 6.50566 11.34 6.53396 11.2922 6.58868L8.00256 10.2132Z" fill="currentColor"/>
</symbol>
<symbol id="arrow2" viewBox="0 0 23 8" fill="none">
<path d="M22.3536 4.35356C22.5488 4.1583 22.5488 3.84171 22.3536 3.64645L19.1716 0.464469C18.9763 0.269207 18.6597 0.269207 18.4645 0.464469C18.2692 0.659731 18.2692 0.976314 18.4645 1.17158L21.2929 4L18.4645 6.82843C18.2692 7.02369 18.2692 7.34027 18.4645 7.53554C18.6597 7.7308 18.9763 7.7308 19.1716 7.53554L22.3536 4.35356ZM-8.74228e-08 4.5L22 4.5L22 3.5L8.74228e-08 3.5L-8.74228e-08 4.5Z" fill="currentColor"/>
</symbol>
<symbol id="arrow3" viewBox="0 0 12 8" fill="none">
<path fill="currentColor"  d="M11.3536 4.35355C11.5488 4.15829 11.5488 3.84171 11.3536 3.64645L8.17157 0.464466C7.97631 0.269204 7.65973 0.269204 7.46447 0.464466C7.2692 0.659728 7.2692 0.976311 7.46447 1.17157L10.2929 4L7.46447 6.82843C7.2692 7.02369 7.2692 7.34027 7.46447 7.53553C7.65973 7.7308 7.97631 7.7308 8.17157 7.53553L11.3536 4.35355ZM0 4.5H11V3.5H0V4.5Z"/>
</symbol>
<symbol id="phone" viewBox="0 0 18 17" fill="none">
<path fill="currentColor" stroke="currentColor" d="M4.98916 6.7283L5.54596 5.99031C5.63473 5.8756 5.71542 5.77236 5.78401 5.68441C5.92523 5.50087 6.00189 5.41292 6.00593 5.35174C6.01399 5.28674 5.95751 5.17967 5.8526 4.96172C5.80822 4.87377 5.75577 4.7667 5.70332 4.65199L4.55341 2.21242L4.46464 2.02506C4.23466 1.52797 4.19432 1.43237 3.41561 1.39796C3.24211 1.39031 3.06862 1.39796 2.9153 1.42473C2.77811 1.44767 2.65304 1.48591 2.55217 1.53944L2.54813 1.54326C2.16886 1.74975 1.80574 2.10536 1.50313 2.52597C1.18438 2.97335 0.938261 3.48192 0.829322 3.94842C0.760731 4.34991 0.740558 4.75523 0.760731 5.16055C0.881774 7.50835 2.42305 9.9441 4.64621 11.9057C6.87743 13.8749 9.79457 15.3624 12.6593 15.8059C13.3895 15.9168 14.1158 15.9627 14.8259 15.9321C15.2576 15.8939 15.6773 15.7065 16.0444 15.4274C16.4318 15.133 16.7505 14.7353 16.9442 14.2994C17.0047 14.1464 17.0531 13.9858 17.0894 13.8252C17.1298 13.657 17.162 13.4887 17.1863 13.3167L17.1903 13.3014C17.2589 12.8387 17.2871 12.6399 17.2347 12.5596C17.1943 12.5022 17.0733 12.4487 16.8554 12.3569C16.7303 12.3034 16.577 12.2384 16.3874 12.1504L13.8455 10.9421C13.68 10.8656 13.5751 10.8044 13.4864 10.7586C13.3532 10.6859 13.2806 10.6477 13.2604 10.6515C13.2403 10.6553 13.1676 10.728 13.0143 10.8924L11.7555 12.2116C11.7232 12.246 11.6546 12.3187 11.5981 12.3837C11.4327 12.5634 11.348 12.659 11.1946 12.6934C11.0413 12.7278 10.9122 12.6819 10.6459 12.5901L10.4522 12.5213C9.23777 12.1045 8.01524 11.4621 6.98234 10.6094C6.07048 9.85615 5.30791 8.93462 4.82777 7.85631L4.79953 7.79131C4.68252 7.52747 4.63007 7.40893 4.65024 7.26363C4.67042 7.13744 4.73497 7.05714 4.85602 6.90419C4.89233 6.85831 4.93268 6.80478 4.98916 6.7283ZM5.88488 6.21591L5.32808 6.9539C5.27967 7.01891 5.22722 7.08391 5.18687 7.13744C5.10617 7.23686 5.06582 7.29039 5.06179 7.31716C5.05776 7.3554 5.0981 7.44335 5.18283 7.63836L5.21108 7.69954C5.66701 8.72049 6.38923 9.59231 7.2567 10.3112C8.24522 11.1333 9.42337 11.7489 10.5935 12.1504L10.7952 12.2192C10.9808 12.2842 11.0736 12.3187 11.1018 12.311C11.126 12.3072 11.1825 12.2422 11.2915 12.1236C11.3237 12.0854 11.3601 12.0472 11.4569 11.9478L12.5947 10.7547L12.7117 10.6286C12.9376 10.3877 13.0426 10.2768 13.2241 10.2576C13.3734 10.2423 13.4864 10.3035 13.6962 10.4144C13.793 10.4641 13.91 10.5291 14.0391 10.5903L16.573 11.7948C16.7465 11.8789 16.8998 11.9439 17.0208 11.9936C17.3113 12.116 17.4768 12.1887 17.5817 12.3454C17.7148 12.5481 17.6825 12.789 17.5978 13.3511L17.5938 13.3625C17.5655 13.5461 17.5332 13.7258 17.4889 13.9017C17.4485 14.0776 17.392 14.2535 17.3275 14.4217L17.3194 14.4409C17.1015 14.9379 16.7384 15.3891 16.2986 15.7218C15.875 16.0468 15.3746 16.261 14.8582 16.3107L14.838 16.3145C14.0997 16.3489 13.3411 16.303 12.5826 16.1845C9.63721 15.7295 6.64342 14.2038 4.35571 12.1848C2.05993 10.1582 0.466194 7.62689 0.337081 5.1682C0.312873 4.73229 0.337081 4.29638 0.409707 3.87194L0.417776 3.86812C0.538819 3.34808 0.805114 2.78599 1.15614 2.30037C1.48699 1.83769 1.89854 1.4362 2.33832 1.20295L2.35043 1.1953C2.49165 1.11882 2.66111 1.06911 2.84267 1.03852C3.02827 1.00793 3.23404 0.996463 3.43578 1.00793C4.47271 1.05382 4.5292 1.18383 4.84391 1.87211L4.92864 2.05565L6.07855 4.49522C6.13504 4.61758 6.18345 4.717 6.22784 4.80112C6.36905 5.0879 6.43764 5.22938 6.41747 5.39763C6.3973 5.56587 6.3045 5.68441 6.11486 5.92531C6.05031 5.99414 5.97768 6.08973 5.88488 6.21591Z" stroke-width="0.5"/>
</symbol>
<symbol id="soc1" viewBox="0 0 17 17" fill="none">
<g clip-path="url(#clip0)">
<path fill="currentColor" d="M8.50009 16.8564C13.1156 16.8564 16.8572 13.1148 16.8572 8.49923C16.8572 3.88371 13.1156 0.14209 8.50009 0.14209C3.88456 0.14209 0.142944 3.88371 0.142944 8.49923C0.142944 13.1148 3.88456 16.8564 8.50009 16.8564Z"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M8.18436 12.1647H8.84029C8.84029 12.1647 9.03843 12.143 9.13958 12.0339C9.23269 11.9338 9.22971 11.7458 9.22971 11.7458C9.22971 11.7458 9.2169 10.8657 9.62538 10.7361C10.0281 10.6084 10.5451 11.5867 11.0932 11.9629C11.5077 12.2475 11.8226 12.1851 11.8226 12.1851L13.2881 12.1647C13.2881 12.1647 14.0547 12.1175 13.6912 11.5147C13.6614 11.4654 13.4795 11.0689 12.6016 10.254C11.6827 9.40109 11.8058 9.53904 12.9126 8.06376C13.5868 7.16529 13.8562 6.61677 13.7721 6.38184C13.6918 6.15808 13.196 6.21722 13.196 6.21722L11.546 6.2275C11.546 6.2275 11.4236 6.21082 11.3329 6.26504C11.2443 6.31823 11.1872 6.44217 11.1872 6.44217C11.1872 6.44217 10.9261 7.13743 10.5778 7.72871C9.84303 8.97637 9.54926 9.04222 9.42918 8.96475C9.14986 8.78419 9.21958 8.2394 9.21958 7.85236C9.21958 6.64329 9.40297 6.13916 8.86249 6.00866C8.68312 5.96531 8.55113 5.93671 8.09244 5.93209C7.5037 5.92598 7.00538 5.93387 6.72322 6.07212C6.53551 6.16404 6.39071 6.36888 6.4789 6.38065C6.58795 6.39525 6.83495 6.44724 6.9659 6.62556C7.13498 6.85558 7.12903 7.37222 7.12903 7.37222C7.12903 7.37222 7.22616 8.79552 6.90214 8.97235C6.67972 9.09361 6.37462 8.84602 5.71958 7.71411C5.38394 7.13431 5.13054 6.49342 5.13054 6.49342C5.13054 6.49342 5.08168 6.37365 4.99453 6.30959C4.88876 6.23197 4.74097 6.20724 4.74097 6.20724L3.17302 6.21752C3.17302 6.21752 2.93764 6.22408 2.85124 6.32642C2.77437 6.41744 2.84513 6.60575 2.84513 6.60575C2.84513 6.60575 4.07268 9.47767 5.4626 10.9249C6.73708 12.2519 8.18436 12.1647 8.18436 12.1647Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0">
<rect width="16.7143" height="16.7143" fill="white" transform="translate(0.142944 0.14209)"/>
</clipPath>
</defs>
</symbol>
<symbol id="soc2" viewBox="0 0 17 17" fill="none">
<g clip-path="url(#clip1)">
<path fill="currentColor"  d="M8.49995 16.8564C13.1155 16.8564 16.8571 13.1148 16.8571 8.49923C16.8571 3.88371 13.1155 0.14209 8.49995 0.14209C3.88443 0.14209 0.142807 3.88371 0.142807 8.49923C0.142807 13.1148 3.88443 16.8564 8.49995 16.8564Z"/>
<path d="M10.6011 8.82645H9.10983V14.2896H6.85049V8.82645H5.77594V6.90647H6.85049V5.66403C6.85049 4.77555 7.27253 3.38428 9.12994 3.38428L10.8035 3.39128V5.25494H9.58923C9.39005 5.25494 9.10998 5.35446 9.10998 5.77829V6.90826H10.7984L10.6011 8.82645Z" fill="white"/>
</g>
<defs>
<clipPath id="clip1">
<rect width="16.7143" height="16.7143" fill="white" transform="translate(0.142807 0.14209)"/>
</clipPath>
</defs>
</symbol>
<symbol id="soc3" viewBox="0 0 21 20" fill="none">
<path fill="currentColor"  d="M17.7314 6.69688L17.7314 13.5143C17.7314 15.733 15.9264 17.5381 13.7076 17.5381L6.8901 17.5381C4.67143 17.5381 2.86638 15.733 2.86638 13.5143L2.86638 6.69676C2.86638 4.4781 4.67143 2.67304 6.8901 2.67304L13.7076 2.67304C15.9264 2.67304 17.7314 4.4781 17.7314 6.69688V6.69688ZM6.23435 10.1056C6.23435 12.3468 8.05767 14.1701 10.2989 14.1701C12.5401 14.1701 14.3634 12.3468 14.3634 10.1056C14.3634 7.86433 12.5401 6.04102 10.2989 6.04102C8.05767 6.04102 6.23435 7.86433 6.23435 10.1056ZM13.4049 5.94382C13.4049 6.60615 13.9436 7.14485 14.6059 7.14485C15.2682 7.14485 15.8071 6.60615 15.8071 5.94382C15.8071 5.2815 15.2682 4.74269 14.6059 4.74269C13.9436 4.74269 13.4049 5.2815 13.4049 5.94382Z"/>
<path fill="currentColor"  d="M12.8654 10.1054C12.8654 11.5205 11.7141 12.6719 10.2989 12.6719C8.88388 12.6719 7.73252 11.5205 7.73252 10.1054C7.73252 8.69029 8.88388 7.53902 10.2989 7.53902C11.7141 7.53902 12.8654 8.69029 12.8654 10.1054Z"/>
</symbol>
<symbol id="soc4" viewBox="0 0 17 17" fill="none">
<g clip-path="url(#clip2)">
<path fill="currentColor"  d="M16.0037 4.58344C15.8232 3.91214 15.2939 3.38296 14.6227 3.2022C13.3965 2.8667 8.49161 2.8667 8.49161 2.8667C8.49161 2.8667 3.58691 2.8667 2.36071 3.18948C1.70242 3.37005 1.16024 3.91223 0.979671 4.58344C0.656982 5.80954 0.656982 8.35232 0.656982 8.35232C0.656982 8.35232 0.656982 10.9079 0.979671 12.1212C1.16043 12.7924 1.68951 13.3216 2.36081 13.5023C3.59982 13.8379 8.4918 13.8379 8.4918 13.8379C8.4918 13.8379 13.3965 13.8379 14.6227 13.5152C15.294 13.3345 15.8232 12.8053 16.0039 12.1341C16.3265 10.9079 16.3265 8.36523 16.3265 8.36523C16.3265 8.36523 16.3394 5.80954 16.0037 4.58344ZM6.93 10.7014V6.00321L11.0087 8.35232L6.93 10.7014Z"/>
</g>
<defs>
<clipPath id="clip2">
<rect width="16.7143" height="16.7143" fill="white" transform="translate(0.142792 0.143066)"/>
</clipPath>
</defs>
</symbol>
<symbol id="soc5" viewBox="0 0 17 17" fill="none">
<g clip-path="url(#clip3)">
<path fill="currentColor"  d="M1.18747 8.26922C2.76705 7.39375 4.53028 6.66308 6.17776 5.92867C9.01206 4.72576 11.8576 3.5437 14.7319 2.44322C15.2911 2.25571 16.2959 2.07239 16.3945 2.90628C16.3405 4.08664 16.1186 5.26008 15.9663 6.43353C15.58 9.01405 15.1333 11.5857 14.6979 14.1578C14.5478 15.0144 13.4812 15.458 12.7987 14.9097C11.1586 13.795 9.50582 12.6911 7.8866 11.5505C7.35614 11.0081 7.84809 10.2294 8.3217 9.84216C9.67258 8.5025 11.1052 7.36452 12.3855 5.95575C12.7308 5.11653 11.7104 5.82375 11.3739 6.04049C9.52451 7.32282 7.7204 8.68344 5.77059 9.81044C4.77463 10.3621 3.61382 9.89065 2.61831 9.58282C1.72571 9.21097 0.417729 8.83628 1.18736 8.26933L1.18747 8.26922Z"/>
</g>
<defs>
<clipPath id="clip3">
<rect width="15.4402" height="15.4402" fill="white" transform="translate(0.95425 0.568848)"/>
</clipPath>
</defs>
</symbol>
<symbol id="close" viewBox="0 0 24 24" fill="none">
<path fill="currentColor" d="M12 10.586L16.95 5.63599L18.364 7.04999L13.414 12L18.364 16.95L16.95 18.364L12 13.414L7.04999 18.364L5.63599 16.95L10.586 12L5.63599 7.04999L7.04999 5.63599L12 10.586Z"/>
</symbol>
</svg>
    <div id="top"></div>
    <div class="header-mob">
      <div class="container">
        <div class="header-mob__inner">
          <div class="header-mob__toggler js-toggler"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/toggler.svg" alt=""></div><a class="header-mob__logo" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/logo.svg" alt=""></a><a class="header-mob__cart" href="#"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/cart.svg" alt=""></a>
        </div>
      </div>
    </div>
    <header class="header">
      <div class="container">
        <div class="header__inner">
          <div class="header-mob-close js-close-menu"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/close.svg" alt=""></div>
          <div class="header__top">
            <div class="header__top-left"><a class="header__phone" href="tel:88005005796">8??(800)??500-57-96</a>
              <div class="header__descr">?????????????? ?????????????????? ??????????????????</div>
            </div><a class="header__logo" href="/"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/svg/logo.svg" alt=""></a>
            <div class="header__top-right"><a class="header__top-link" href="/delivery/">???????????????? ?? ????????????</a>
              <div class="header__search">
                <div class="header__search-lnk">
                  ??????????<svg><use xlink:href="#search"></use></svg></div>
                <div class="header__search-in">
                  <form>
                    <input type="search" placeholder="?????????????? ???????????????? ????????????">
                    <button class="header__search-btn" type="button"><svg><use xlink:href="#search"></use></svg></button>
                  </form>
                </div>
              </div><a class="header__cart" href="/basket.php">
                ??????????????<svg><use xlink:href="#cart"></use></svg></a>
            </div>
          </div>
        <?$APPLICATION->IncludeComponent("bitrix:menu", "mymenu", Array(
    "ROOT_MENU_TYPE" => "razdel",   // ?????? ???????? ?????? ?????????????? ????????????
        "MENU_CACHE_TYPE" => "A",   // ?????? ??????????????????????
        "MENU_CACHE_TIME" => "36000000",    // ?????????? ?????????????????????? (??????.)
        "MENU_CACHE_USE_GROUPS" => "N", // ?????????????????? ?????????? ??????????????
        "MENU_THEME" => "site", // ???????? ????????
        "CACHE_SELECTED_ITEMS" => "N",
        "MENU_CACHE_GET_VARS" => "",    // ???????????????? ???????????????????? ??????????????
        "MAX_LEVEL" => "4", // ?????????????? ?????????????????????? ????????
        "CHILD_MENU_TYPE" => "razdel",  // ?????? ???????? ?????? ?????????????????? ??????????????
        "USE_EXT" => "Y",   // ???????????????????? ?????????? ?? ?????????????? ???????? .??????_????????.menu_ext.php
        "DELAY" => "N", // ?????????????????????? ???????????????????? ?????????????? ????????
        "ALLOW_MULTI_SELECT" => "N",    // ?????????????????? ?????????????????? ???????????????? ?????????????? ????????????????????????
        "COMPONENT_TEMPLATE" => "bootstrap_v4"
    ),
    false
);?>
        <a class="header-mob__tel" href="tel:88005005796">8??(800)??500-57-96</a>
        </div>
      </div>
    </header>