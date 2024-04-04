<?php
//コアのブロックパターンを削除
remove_theme_support( 'core-block-patterns' );

//ポータルズオリジナルブロックパターンを定義
add_action('admin_init', function () {
    register_block_pattern_category('portals', ['label' => 'ポータルズ']);
    register_block_pattern_category('portals_staff', ['label' => 'スタッフ用']);

    $portals_staffpattern01 = [//ポータルズベーシックレイアウト登録
        "title" => "スマホ2列・PC3列レイアウト",
        "categories" => ["portals_staff"],
        "descripiton" => "スマホ2列・PC3列レイアウト。6つのボタン等で使用",
        "content" => '<!-- wp:columns {"className":"sp2_pc3"} -->
        <div class="wp-block-columns sp2_pc3"><!-- wp:column {"width":"16.67%"} -->
        <div class="wp-block-column" style="flex-basis:16.67%"></div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"16.67%"} -->
        <div class="wp-block-column" style="flex-basis:16.67%"></div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"16.67%"} -->
        <div class="wp-block-column" style="flex-basis:16.67%"></div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"16.67%"} -->
        <div class="wp-block-column" style="flex-basis:16.67%"></div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"16.67%"} -->
        <div class="wp-block-column" style="flex-basis:16.67%"></div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"16.67%"} -->
        <div class="wp-block-column" style="flex-basis:16.67%"></div>
        <!-- /wp:column --></div>
        <!-- /wp:columns -->'
    ];
    register_block_pattern($portals_staffpattern01["title"], $portals_staffpattern01);

    $portalspattern01 = [//ポータルズベーシックレイアウト登録
      "title" => "ポータルズベーシックレイアウト",
      "categories" => ["portals"],
      "descripiton" => "ポータルズで使用するベーシックなレイアウトのパターンです",
      "content" => '<!-- wp:image {"align":"center"} -->
      <div class="wp-block-image"><figure class="aligncenter"><img alt=""/></figure></div>
      <!-- /wp:image -->

      <!-- wp:acf/block-catchlistimage {"id":"block_60a2139dc8c14","name":"acf/block-catchlistimage","data":{"field_60a2076298ffb":{"60a213a1c8c15":{"field_60a207629dc7f":"キャッチコンテンツ"}},"field_60a20770cb254":""},"align":"","mode":"auto"} /-->

      <!-- wp:media-text -->
      <div class="wp-block-media-text alignwide is-stacked-on-mobile"><figure class="wp-block-media-text__media"></figure><div class="wp-block-media-text__content"><!-- wp:paragraph {"placeholder":"コンテンツ…","fontSize":"large"} -->
      <p class="has-large-font-size">キャッチ文章</p>
      <!-- /wp:paragraph -->

      <!-- wp:paragraph -->
      <p>導入の文章を入力します。</p>
      <!-- /wp:paragraph --></div></div>
      <!-- /wp:media-text -->

      <!-- wp:group {"align":"wide"} -->
      <div class="wp-block-group alignwide"><div class="wp-block-group__inner-container"><!-- wp:heading -->
      <h2>見出し１</h2>
      <!-- /wp:heading -->

      <!-- wp:paragraph -->
      <p>テキスト</p>
      <!-- /wp:paragraph -->

      <!-- wp:media-text {"mediaPosition":"right"} -->
      <div class="wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile"><figure class="wp-block-media-text__media"></figure><div class="wp-block-media-text__content"><!-- wp:paragraph {"placeholder":"コンテンツ…","fontSize":"large"} -->
      <p class="has-large-font-size">コンテンツ1</p>
      <!-- /wp:paragraph -->

      <!-- wp:paragraph -->
      <p>コンテンツの内容を入力します。<br>shift+enterで改行、enterのみで段落</p>
      <!-- /wp:paragraph --></div></div>
      <!-- /wp:media-text --></div></div>
      <!-- /wp:group -->

      <!-- wp:group {"align":"wide"} -->
      <div class="wp-block-group alignwide"><div class="wp-block-group__inner-container"><!-- wp:heading -->
      <h2>見出し２</h2>
      <!-- /wp:heading -->

      <!-- wp:paragraph -->
      <p>テキスト</p>
      <!-- /wp:paragraph -->

      <!-- wp:media-text -->
      <div class="wp-block-media-text alignwide is-stacked-on-mobile"><figure class="wp-block-media-text__media"></figure><div class="wp-block-media-text__content"><!-- wp:paragraph {"placeholder":"コンテンツ…","fontSize":"large"} -->
      <p class="has-large-font-size">コンテンツ２</p>
      <!-- /wp:paragraph -->

      <!-- wp:paragraph -->
      <p>コンテンツの内容を入力します。<br>shift+enterで改行、enterのみで段落</p>
      <!-- /wp:paragraph --></div></div>
      <!-- /wp:media-text --></div></div>
      <!-- /wp:group -->

      <!-- wp:group {"align":"wide"} -->
      <div class="wp-block-group alignwide"><div class="wp-block-group__inner-container"><!-- wp:heading -->
      <h2>見出し３</h2>
      <!-- /wp:heading -->

      <!-- wp:paragraph -->
      <p>テキスト</p>
      <!-- /wp:paragraph --></div></div>
      <!-- /wp:group -->

      <!-- wp:media-text {"mediaPosition":"right"} -->
      <div class="wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile"><figure class="wp-block-media-text__media"></figure><div class="wp-block-media-text__content"><!-- wp:paragraph {"placeholder":"コンテンツ…","fontSize":"large"} -->
      <p class="has-large-font-size">コンテンツ３</p>
      <!-- /wp:paragraph -->

      <!-- wp:paragraph -->
      <p>コンテンツの内容を入力します。<br>shift+enterで改行、enterのみで段落</p>
      <!-- /wp:paragraph --></div></div>
      <!-- /wp:media-text -->',
    ];
    register_block_pattern($portalspattern01["title"], $portalspattern01);

    $portalspattern02 = [//ポータルズベーシックレイアウト登録
        "title" => "ポータルズリッチレイアウト",
        "categories" => ["portals"],
        "descripiton" => "ポータルズで使用する少しリッチなレイアウトのパターンです",
        "content" => '<!-- wp:image -->
        <figure class="wp-block-image"><img alt=""/></figure>
        <!-- /wp:image -->

        <!-- wp:paragraph {"align":"center","backgroundColor":"cyan-bluish-gray"} -->
        <p class="has-text-align-center has-cyan-bluish-gray-background-color has-background">↑<br>こんなお悩みありませんか？のような画像を入れてください<br>（このブロックは削除してください）</p>
        <!-- /wp:paragraph -->

        <!-- wp:acf/block-catchlist {"id":"block_60a214375a696","name":"acf/block-catchlist","data":{"field_602a31944b220":{"60a214395a697":{"field_602a31b54b221":"キャッチコンテンツ"},"60a2143f5a698":{"field_602a31b54b221":"キャッチコンテンツ"},"60a214465a699":{"field_602a31b54b221":"キャッチコンテンツ"}}},"align":"","mode":"auto"} /-->

        <!-- wp:image -->
        <figure class="wp-block-image"><img alt=""/></figure>
        <!-- /wp:image -->

        <!-- wp:paragraph {"align":"center","backgroundColor":"cyan-bluish-gray"} -->
        <p class="has-text-align-center has-cyan-bluish-gray-background-color has-background">↑<br>このようなお悩みは私たちにお任せください！のような画像を入れてください<br>（このブロックは削除してください）</p>
        <!-- /wp:paragraph -->

        <!-- wp:media-text -->
        <div class="wp-block-media-text alignwide is-stacked-on-mobile"><figure class="wp-block-media-text__media"></figure><div class="wp-block-media-text__content"><!-- wp:paragraph {"placeholder":"コンテンツ…","fontSize":"large"} -->
        <p class="has-large-font-size">コンテンツ１</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph -->
        <p>ここにコンテンツ文章を入れてください。</p>
        <!-- /wp:paragraph --></div></div>
        <!-- /wp:media-text -->

        <!-- wp:heading -->
        <h2>見出し</h2>
        <!-- /wp:heading -->

        <!-- wp:media-text {"mediaPosition":"right"} -->
        <div class="wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile"><figure class="wp-block-media-text__media"></figure><div class="wp-block-media-text__content"><!-- wp:paragraph {"placeholder":"コンテンツ…","fontSize":"large"} -->
        <p class="has-large-font-size">コンテンツ２</p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph -->
        <p>ここにコンテンツ文章を入れてください</p>
        <!-- /wp:paragraph --></div></div>
        <!-- /wp:media-text -->

        <!-- wp:paragraph -->
        <p>テキスト</p>
        <!-- /wp:paragraph -->

        <!-- wp:heading -->
        <h2>○つのポイント</h2>
        <!-- /wp:heading -->

        <!-- wp:acf/block-point {"id":"block_60a215a55a69a","name":"acf/block-point","data":{"field_602dd7bffe042":{"row-0":{"field_602dd7cdfe043":"ポイントのタイトルを\r\n入れてください","field_602dd86dfe045":"","field_602dd838fe044":""}}},"align":"","mode":"auto"} /-->

        <!-- wp:heading -->
        <h2>料金について</h2>
        <!-- /wp:heading -->

        <!-- wp:image -->
        <figure class="wp-block-image"><img alt=""/></figure>
        <!-- /wp:image -->

        <!-- wp:paragraph {"align":"center","backgroundColor":"cyan-bluish-gray"} -->
        <p class="has-text-align-center has-cyan-bluish-gray-background-color has-background">↑<br>オファーバナーなどがあれば入れてください<br>（このブロックは削除してください）</p>
        <!-- /wp:paragraph -->

        <!-- wp:acf/block-price-row2 {"id":"block_60a216cf5a69b","name":"acf/block-price-row2","data":{"field_602e0d03b8325":{"row-0":{"field_602e0d3db8326":"料金","field_602e0ef0b8327":"100"}}},"align":"","mode":"auto"} /-->',
    ];
    register_block_pattern($portalspattern02["title"], $portalspattern02);
  });
  ?>