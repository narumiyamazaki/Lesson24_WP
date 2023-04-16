<main class="p-main">
    <article class="p-news">
        <div class="p-heading2__container">
            <span class="c-cat__img"></span>
            <div class="p-heading__news__wrapper">
                <h2 class="c-heading2">お知らせ</h2>
                <a class="c-link__news-list">一覧へ</a>
            </div>
        </div>
        <?php echo do_shortcode("[news_list]") ?>
    </article>
    <article class="p-recommendation">
        <div class="p-heading2__container">
            <span class="c-cat__img"></span>
            <div class="p-heading__news__wrapper">
                <h2 class="c-heading2">おすすめ商品</h2>
            </div>
        </div>
        <div class="p-recommendation__card__container">
            <!--サブループの書き方-->
            <?php
            //取得するする投稿の条件を指定
            $args = array(
            'post_type' => 'recommend',
            'posts_per_page' => 3, // 表示する投稿数を指定。-1にするとすべての投稿を表示する。
            );

            //WP_Queryオブジェクト（クエリオブジェクト）の生成
            //新しく生成したWP_Queryに取得する条件の情報を入れる
            $my_query = new WP_Query($args);

            //インスタンスのメソッドとしてループ関数を実行
            //(have_post()と言うかたちにしていないということ)
            if($my_query->have_posts()):
                $counter = 0;
            while($my_query->have_posts()): $my_query->the_post();?>
            <section class="p-recommendation__card__wrapper">
                <?php if ( has_post_thumbnail()){
                    the_post_thumbnail( 'full', array('class' => 'c-card__thumbnail--recommendation'));
                }
                ?>
                <!--
                <img class="c-card__thumbnail--recommendation" alt="【焼印付】爪とぎ型キーホルダー" src="<?php echo get_theme_file_uri("./img/dmy_pd001.jpg")?>">
                -->
                <?php if($counter === 0){
                    echo '<span class="c-tag__new-item">新商品</span>';
                }
                ?>
                <dl class="p-recommendation__card__text__wrapper">
                    <dt class="c-card__title--recommendation"><?php the_title(); ?></dt>
                    <dd class="c-card__text--recommendation"><?php the_content(); ?></dd>
                </dl>
                <div class="p-card__text__price__wrapper">
                    <span class="c-card__text--price"><?php the_field('price'); ?>円</span><span class="c-card__text--tax">(税抜)</span>
                </div>
                <a class="p-recommendation__card__link" href="#">詳細を見る<span class="c-arrow--right"></span></a>
            </section>            
            <?php $counter++;?>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </article>
    <article class="p-product-cat">
        <div class="p-heading2__container">
            <span class="c-cat__img"></span>
            <div class="p-heading__news__wrapper">
                <h2 class="c-heading2">商品カテゴリー</h2>
            </div>
        </div>
        <ul class="p-product-cat__card__container">
            <li class="p-product-cat__card__wrapper">
                <a class="p-product-cat__card__link" href="#">
                    <div class="c-card__thumbnail__product-cat cat-resin"></div>
                    <h3 class="c-card__heading3--product-cat u-margin-left--20px">レジンブローチ</h3>
                </a>
            </li>
            <li class="p-product-cat__card__wrapper">
                <a class="p-product-cat__card__link" href="#">
                    <div class="c-card__thumbnail__product-cat cat-collar"></div>
                    <h3 class="c-card__heading3--product-cat u-margin-left--20px">猫用首輪</h3>
                </a>
            </li>
            <li class="p-product-cat__card__wrapper">
                <a class="p-product-cat__card__link" href="#">
                    <div class="c-card__thumbnail__product-cat cat-stuffed-toy"></div>
                    <h3 class="c-card__heading3--product-cat u-margin-left--20px">けりぐるみ</h3>
                </a>
            </li>
            <li class="p-product-cat__card__wrapper">
                <a class="p-product-cat__card__link" href="#">
                    <div class="c-card__thumbnail__product-cat cat-accessories"></div>
                    <h3 class="c-card__heading3--product-cat u-margin-left--20px">アクセサリー</h3>
                </a>
            </li>
            <li class="p-product-cat__card__wrapper">
                <a class="p-product-cat__card__link" href="#">
                    <div class="c-card__thumbnail__product-cat cat-other"></div>
                    <h3 class="c-card__heading3--product-cat u-margin-left--20px">その他雑貨</h3>
                </a>
            </li>
        </ul>
    </article>
    <article class="p-consignment-sales">                
        <h2 class="c-heading2--consignment-sales">委託販売先</h2>
        <p class="p-consignment-sales__text c-text--basic">当店は現在以下の3店舗のレンタルボックスにて委託販売をさせていただいております。<br>商品を実際に手にとってお確かめいただけますので、お近くの方はお気軽にお立ち寄り下さい。</p>
        <!--notionテンプレートパーツ用-->
        <div class="p-consignment-sales__content__wrapper">
            <div class="p-consignment-sales__content">
                <img class="c-image--consignment-sales" src="<?php echo get_theme_file_uri("./img/img_rental_kuroneko_douhua.jpg");?>" alt="台湾スイーツ豆花専門黒猫豆花様外観">
                <div class="p-consignment-sales__shop-info__container">
                    <h3 class="p-consignment-sales-heading3">台湾スイーツ豆花専門&nbsp;黒猫豆花&nbsp;様</h3>
                    <dl class="p-consignment-sales__shop-info__wrapper">
                        <div class="p-consignment-sales__shop-info">
                            <dt class="p-consignment-sales__shop-info--term">住所</dt>
                            <dd class="p-consignment-sales__shop-info--description">神奈川県川崎市高津区二子2丁目7-40<span class="u-margin-left--8px"></span>フォーレスト多摩川102</dd>
                        </div>
                        <div class="p-consignment-sales__shop-info">
                            <dt class="p-consignment-sales__shop-info--term">営業時間</dt>
                            <dd class="p-consignment-sales__shop-info--description">10:00-21:00（時短営業中は20:00まで）</dd>
                        </div>
                        <div class="p-consignment-sales__shop-info">
                            <dt class="p-consignment-sales__shop-info--term">定休日</dt>
                            <dd class="p-consignment-sales__shop-info--description">水曜日</dd>
                        </div>
                        <div class="p-consignment-sales__shop-info">
                            <dt class="p-consignment-sales__shop-info--term">website</dt>
                            <dd class="p-consignment-sales__shop-info--description"><a class="c-text--basic" href="https://kuroneko-douhua.com/">https://kuroneko-douhua.com/</a></dd>
                        </div>
                    </dl>
                </div>
            </div>
            <div class="p-consignment-sales__content">
                <img class="c-image--consignment-sales" src="<?php echo get_theme_file_uri("./img/img_rental_mayscafe.jpg"); ?>" alt="May's Cafe -ハンドメイド雑貨&CAFE- 様">
                <div class="p-consignment-sales__shop-info__container">
                    <h3 class="p-consignment-sales-heading3">May&lsquo;&nbsp;Cafe&nbsp;-ハンドメイド雑貨&amp;CAFE-&nbsp;様</h3>
                    <dl class="p-consignment-sales__shop-info__wrapper">
                        <div class="p-consignment-sales__shop-info">
                            <dt class="p-consignment-sales__shop-info--term">住所</dt>
                            <dd class="p-consignment-sales__shop-info--description">東京都世田谷区太子堂5-17-20-1F</dd>
                        </div>
                        <div class="p-consignment-sales__shop-info">
                            <dt class="p-consignment-sales__shop-info--term">営業時間</dt>
                            <dd class="p-consignment-sales__shop-info--description">土日祝日11:00〜19:00のみ営業中</dd>
                        </div>
                        <div class="p-consignment-sales__shop-info">
                            <dt class="p-consignment-sales__shop-info--term">定休日</dt>
                            <dd class="p-consignment-sales__shop-info--description">月〜金曜日</dd>
                        </div>
                        <div class="p-consignment-sales__shop-info">
                            <dt class="p-consignment-sales__shop-info--term"></dt>
                            <dd class="p-consignment-sales__shop-info--description"><a class="c-text--basic" href="https://www.instagram.com/mays._.cafe/">https://www.instagram.com/mays._.cafe/</a></dd>
                        </div>
                    </dl>
                </div>
            </div>
            <div class="p-consignment-sales__content">
                <img class="c-image--consignment-sales" src="<?php echo get_theme_file_uri("./img/img_rental_nekoshiki.jpg"); ?>" alt="里親募集型猫カフェ 猫式 様">
                <div class="p-consignment-sales__shop-info__container">
                    <h3 class="p-consignment-sales-heading3">里親募集型猫カフェ&nbsp;猫式&nbsp;様</h3>
                    <dl class="p-consignment-sales__shop-info__wrapper">
                        <div class="p-consignment-sales__shop-info">
                            <dt class="p-consignment-sales__shop-info--term">住所</dt>
                            <dd class="p-consignment-sales__shop-info--description">神奈川県川崎市高津区溝口1-20-10 東方ビル3F</dd>
                        </div>
                        <div class="p-consignment-sales__shop-info">
                            <dt class="p-consignment-sales__shop-info--term">営業時間</dt>
                            <dd class="p-consignment-sales__shop-info--description">12:00～20:00（最終受付19:30）</dd>
                        </div>
                        <div class="p-consignment-sales__shop-info">
                            <dt class="p-consignment-sales__shop-info--term">定休日</dt>
                            <dd class="p-consignment-sales__shop-info--description">月曜日</dd>
                        </div>
                        <div class="p-consignment-sales__shop-info">
                            <dt class="p-consignment-sales__shop-info--term">Website</dt>
                            <dd class="p-consignment-sales__shop-info--description"><a class="c-text--basic" href="https://www.neko-shiki.net/">https://www.neko-shiki.net/</a></dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </article>
    <article class="p-profile">
        <h2 class="p-profile__heading2">プロフィール</h2>
        <img class="p-profile__img" src="<?php echo get_theme_file_uri("./img/img_profile.jpg"); ?>" alt="プロフィール画像(右へのぞき込むねこの正面画像)">
        <p class="p-profile__sns-user-name">@latelierqueue</p>
        <p class="p-profile__text">猫雑貨・猫おもちゃ、その他ハンドメイド<br>時々農家になります。</p>
        <div class="p-profile__icon__wrapper">
            <a class="c-icon--twitter" href="#"></a>
            <a class="c-icon--Instagram" href="#"></a>
        </div>
    </article>
</main>
<?php get_footer(); ?>