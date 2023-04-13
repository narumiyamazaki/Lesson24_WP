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
            <nav class="p-header__nav__body--sp">
                <ul class="p-header__nav__items--sp">
                    <li class="p-nav__item"><a class="c-item__link--nav" href="#">トップページ</a></li>
                    <li class="p-nav__item"><a class="c-item__link--nav" href="#">商品一覧</a></li>
                    <li class="p-nav__item"><a class="c-item__link--nav" href="#">ねこブログ</a></li>
                    <li class="p-nav__item"><a class="c-item__link--nav" href="#">ねこ店員紹介</a></li>
                    <li class="p-nav__item"><a class="c-item__link--nav" href="#">よくあるご質問</a></li>
                    <li class="p-nav__item"><a class="c-item__link--nav" href="#">お問い合わせ</a></li>
                </ul>
                <ul class="p-header__nav__items--second">
                    <li class="p-nav__item--second"><a class="c-item__link--second-nav" href="./">特定商取引法に関する表記</a></li>
                    <span class="c-line__nav"></span>
                    <li class="p-nav__item--second"><a class="c-item__link--second-nav" href="./">プライバシーポリシー</a></li>
                </ul>
            </nav>
        </div>
        <div class="p-header__nav__wrapper--pc">
            <nav class="p-header__nav__body--pc">
                <ul class="p-header__nav__items--pc">
                    <li class="p-nav__item"><a class="c-item__link--nav" href="#">商品一覧</a></li>
                    <li class="p-nav__item"><a class="c-item__link--nav" href="#">ねこブログ</a></li>
                    <li class="p-nav__item"><a class="c-item__link--nav" href="#">ねこ店員紹介</a></li>
                    <li class="p-nav__item"><a class="c-item__link--nav" href="#">よくあるご質問</a></li>
                    <li class="p-nav__item"><a class="c-item__link--nav" href="#">お問い合わせ</a></li>
                </ul>
            </nav>
        </div>
        <?php 
            wp_nav_menu( array(
                'theme_location' => 'header_nav',
                'container' => 'nav',
                'container_class' => 'p-header__nav',
                //ulタグへclassを追加
                'menu_class' => 'p-header__nav__main-menu',
                //liタグへclassを追加
                'add_li_class' => 'p-header__nav__main-menu__item',
                // aタグへclass追加
                'add_a_class' => 'nav-link text-white',
            ));
        ?>
    </header>