<footer class="l-footer">
            <button id="js-pagetop" class="c-button__scroll-top" type="button"></button>
            <!--ロゴ・ナビメニューのwrapper-->
            <div class="p-footer__contents__wrapper">
                <img class="p-footer__logo" src="<?php echo get_theme_file_uri("./img/logo_footer.svg"); ?>" alt="">
                <!--ナビメニューのwrapper-->
                <nav class="p-footer__nav__wrapper">
                    <ul class="p-footer__nav__items--top">
                        <li class="p-footer__nav__item"><a class="c-footer__nav__item--link" href="#" >トップページ</a></li>
                        <li class="p-footer__nav__item"><a class="c-footer__nav__item--link" href="./products/index.html" >商品一覧</a></li>
                        <li class="p-footer__nav__item"><a class="c-footer__nav__item--link" href="./blog/index.html" >ねこブログ</a></li>
                        <li class="p-footer__nav__item"><a class="c-footer__nav__item--link" href="./staff/index.html" >ねこ店員紹介</a></li>
                        <li class="p-footer__nav__item"><a class="c-footer__nav__item--link" href="./faq/index.html" >よくあるご質問</a></li>
                        <li class="p-footer__nav__item"><a class="c-footer__nav__item--link" href="./contact/index.html" >お問い合わせ</a></li>
                    </ul>
                    <ul class="p-footer__nav__items--bottom">
                        <li class="p-footer__nav__item--bottom"><a class="c-footer__nav__item--link footer-bottom" href="./law/index.html">特定商取引法に関する表記</a></li>
                        <li class="p-footer__nav__item--bottom"><a class="c-footer__nav__item--link footer-bottom" href="./privacy/index.html">プライバシーポリシー</a></li>
                    </ul>
                </nav>
            </div>
            <!--SNSがナビゲーションメニューの下に来る場合はここに記述-->
            <small class="p-footer__right">&copy;l'atelier&nbsp;Queue&nbsp;All&nbsp;Rights&nbsp;Reserved.&nbsp;2021</span></small>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>