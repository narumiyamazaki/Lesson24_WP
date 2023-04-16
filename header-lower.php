<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name=”description” content=”ハンドメイド猫グッズのお店ねこのもの” />
    <!-- CSS -->
    <?php wp_head(); ?>
    </head>
	<body>
    <!--topに戻るボタン-->
    <header class="l-header">
        <div class="p-header__top__container">
            <div class="p-header__top__wrapper">
                <h1 class="p-heading1">
                    <img class="c-logo--top" src="<?php echo get_theme_file_uri("./img/logo_top_header.svg") ?>" alt="ハンドメイド猫グッズのお店 ねこのもの l'atelier Queue">
                </h1>
                <p class="c-text--top-explanation">“Queue(クー)”は、フランス語で「しっぽ」の意味です。<br>猫にも人にも心地好いをモットーに、猫おもちゃ、雑貨を作っています。</p>
            </div>
            <div class="c-img--mv"></div>
            <p class="p-nav__btn">
                <a href="javascript:void(0)">
                    <span>メニューを開く</span>
                </a>
                <span class="c-btn__text active">menu</span>
                <span class="c-btn__text">close</span>
            </p>
        </div>
        <!--gnav-->
        <div class="p-header__nav__wrapper--sp">
            <div class="c-logo__header__nav--sp u-margin-bottom--35px"></div>
            <?php 
                wp_nav_menu( array(
                    'theme_location' => 'header_nav-sp',
                    'container' => 'nav',
                    'container_class' => 'p-header__nav__body--sp',
                    //ulタグへclassを追加
                    'menu_class' => 'p-header__nav__items--sp',
                    //liタグへclassを追加
                    'add_li_class' => 'p-nav__item',
                    //aタグへclassを追加
                    'add_a_class' => 'c-item__link--nav',
                ));
            ?>
            <?php 
                wp_nav_menu( array(
                    'theme_location' => 'header_footer_subMenu',
                    'container' => 'false',
                    //ulタグへclassを追加
                    'menu_class' => 'p-header__nav__items--second',
                    //liタグへclassを追加
                    'add_li_class' => 'p-nav__item--second',
                    //aタグへclassを追加
                    'add_a_class' => 'c-item__link--second-nav',
                ));
            ?>
        </div>
        <div class="p-header__nav__wrapper--pc">
            <?php 
                wp_nav_menu( array(
                    'theme_location' => 'header_nav-pc',
                    'container' => 'nav',
                    'container_class' => 'p-header__nav__body--pc',
                    //ulタグへclassを追加
                    'menu_class' => 'p-header__nav__items--pc',
                    //liタグへclassを追加
                    'add_li_class' => 'p-nav__item',
                    //aタグへclassを追加
                    'add_a_class' => 'c-item__link--nav',
                ));
            ?>
        </div>
    </header>