<?php
//デフォルトのjQueryを読み込まない
wp_deregister_script('jQuery');
add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' );
function dequeue_jquery_migrate( $scripts){
	if(!is_admin()){
		$scripts->remove( 'jquery');
	}
}

//CSS等の読み込み
function lesson24_script(){
		//言語をどこにするか
    $locale = get_locale();
    $locale = apply_filters('theme_locale',$locale,'Lesson24');
    wp_enqueue_style('GoogleFonts','https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap');
    wp_enqueue_style('reset-style','https://cdn.jsdelivr.net/npm/destyle.css@4.0.0/destyle.css',array(),'1.0.0');
    wp_enqueue_style('style',get_theme_file_uri('/style.css'),array(),'1.0.0');
    wp_enqueue_script('jQuery','https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js','','3.6.1',true);
    wp_enqueue_script('index',get_theme_file_uri('/js/index.js'),array('jQuery'),'1.0.0',true);
    //wp_enqueue_script('index',get_theme_file_uri('/js/index.js'),array('jQuery'),'1.0.0',true);
    //wp_enqueue_script('nav-height',get_theme_file_uri('/js/nav-height.js'),array('jQuery'),'1.0.0',true);
    wp_enqueue_script('on.click',get_theme_file_uri('/js/on.click.js'),array('jQuery'),'1.0.0',true);  
}

//アクションフック(porfolio_scripts)への登録
add_action('wp_enqueue_scripts', 'lesson24_script');

//テーマサポート
function custom_theme_support(){
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
    //アイキャッチ機能の有効化
    add_theme_support('post-thumbnails');
    //タイトルタグを管理画面から登録可能に
    add_theme_support('title-tag');
    //カスタムメニューの有効化
    add_theme_support('menus');
    //header.phpのtheme_locationは'header_nav_sp'とかの方
    register_nav_menus(array(
				'header_nav-sp' => esc_html__('header navigation SP','header-nav-sp'),
        'header_nav-pc' => esc_html__('header navigation PC','header-nav-pc'),
        'footer_nav' => esc_html__('footer navigation','footer-nav'),
        'header_footer_subMenu' => esc_html__('header footer subMenu','header_footer_subMenu'),
    ));
    //ブロックエディターの有効化
    add_theme_support('editor-style');
    //ブロックエディターで読み込むCSSのパス
    add_editor_style();
}
add_action('after_setup_theme','custom_theme_support');

//navメニューのliタグに任意のクラス名を付与する(付与するのは、header.phpのwp_nav_menuにて)
function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

//navメニューのaタグに任意のクラス名を付与する(付与するのは、header.phpのwp_nav_menuにて)
function add_additional_class_on_a($classes, $item, $args)
{
  if (isset($args->add_li_class)) {
    $classes['class'] = $args->add_a_class;
  }
  return $classes;
}
add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);

/*
//navメニューのaタグに任意のクラス名を付与する
add_filter('walker_nav_menu_start_el', 'add_class_on_link', 10, 4);
 function add_class_on_link($item_output, $item){
 return preg_replace('/(<a.*?)/', '$1' . " class='c-item__link--nav'", $item_output);
}
*/

/* ---------- カスタム投稿の追加 ---------- */
function create_post_type() {
  register_post_type( // カスタム投稿タイプの追加関数
    'works', //カスタム投稿タイプ名（半角英数字の小文字）
    array( //オプション（以下）
      'label' => 'works', // 管理画面上の表示（日本語でもOK）
      'public' => true, // 管理画面に表示するかどうかの指定
      'has_archive' => true, // 投稿した記事の一覧ページを作成する
      'menu_position' => 5, // 管理画面メニューの表示位置（投稿の下に追加）
      'show_in_rest' => true, // Gutenbergの有効化
      'supports' => array( // サポートする機能（以下）
        'title',  // タイトル
        'editor', // エディター
        'thumbnail', // アイキャッチ画像
        'revisions' // リビジョンの保存
      ),
    )
  );
    // 「works」のカスタム投稿にカテゴリーを追加
    register_taxonomy(
        'works-cat',
        'works', // カテゴリーを追加したいカスタム投稿タイプ名
        array(
          'label' => 'カテゴリー',
          'hierarchical' => true,
          'public' => true,
          'show_in_rest' => true,
        )
      );
}
add_action( 'init', 'create_post_type' );

//カスタム投稿でタグの追加
add_action( 'init', function () {
  register_taxonomy( 'post_tag', [ 'post', 'works' ],
      [
          'hierarchical' => false,
          'query_var'    => 'tag',
          'label'        => 'Worksのタグ'
      ]
  );
});

//お知らせ用のカスタム投稿作成用コード
//functions.phpに記述
function create_post_type_news(){
  register_post_type( 
   'news',
   array(
    'labels' => array(
     'name' => 'News'
    ),
    'public' => true,
    'has_archive' => true,
    'supports' => array('title','editor','thumbnail','author'),
    'show_in_rest' => true,
    'taxonomies' => array( 'category' )
   )
  );
 }
 add_action( 'init', 'create_post_type_news' );

 //shortcodeの作成
 function shortcode_news_list() {
  global $post;
  $args = array(
   'posts_per_page' => 3,  // 一覧に表示させる件数
   'post_type' => 'news',  // お知らせのスラッグ
   'post_status' => 'publish'
  );
  $the_query = new WP_Query( $args );
  
  // お知らせ一覧用HTMLコード作成
  // .=について(結合代入演算子)
  if ( $the_query->have_posts() ) {
   $html = '<ul class"p-news__items">';
   while ( $the_query->have_posts() ) :
   $the_query->the_post();
   $url = get_permalink();
   $title = get_the_title();
   $date = get_the_date('Y/m/d');
   $html .= '<li class="p-news__item">';
   $html .= '<p class="c-text--datetime datetime='.$date.'">'.$date.'</time>';
   $html .= '<div class="p-news__tag__wrapper">';
   if( has_category( '新商品' ) ){
    $html .= '<span class="c-tag__news--latest">入荷情報</span>';
   }else{
      $html .= '<span class="c-tag__news">入荷情報</span>';
   }
   /*
   if(has_tag('新商品')){
    $html .= '<span class="c-tag__news--latest">入荷情報</span>';
   }else{
      $html .= '<span class="c-tag__news">入荷情報</span>';
    }
    */
   $html .= '</div>';
   $html .= '<a class="c-text--news" href="'.$url.'">'.$title.'</a>';   
   $html .= '</li>';
   endwhile;
   $html .= '</ul>';
  }
  return $html;
 }
 add_shortcode("news_list", "shortcode_news_list");

add_action('pre_get_posts', function ($query){
  if ( is_admin() && ! $query->is_main_query() ) {
      return;
  }
  if ( $query->is_category() || $query->is_tag() ) {
      $query->set('post_type', ['post','works']);
  }
});

//お知らせ用のカスタム投稿作成用コード
//functions.phpに記述
function create_post_type_recommend(){
  register_post_type( 
   'recommend',
   array(
    'labels' => array(
     'name' => 'recommend'
    ),
    'public' => true,
    'has_archive' => true,
    'supports' => array('title','editor','thumbnail','author'),
    'show_in_rest' => true,
    'taxonomies' => array( 'category' )
   )
  );
 }
 add_action( 'init', 'create_post_type_recommend');

 //お知らせ用のカスタム投稿作成用コード
//functions.phpに記述
function create_post_type_items(){
  register_post_type( 
   'items',
   array(
    'labels' => array(
     'name' => '商品一覧'
    ),
    'public' => true,
    'has_archive' => true,
    'supports' => array('title','editor','thumbnail','author'),
    'show_in_rest' => true,
    'taxonomies' => array( 'category' )
   )
  );
  register_taxonomy(
    'items-slug',
    'items', // 機能を追加したいカスタム投稿タイプ名
    array(
      'public' => true,
      'show_in_rest' => true,
      'rewrite' => array( 'slug' => 'items' ),
    )
  );
 }
 add_action( 'init', 'create_post_type_items');