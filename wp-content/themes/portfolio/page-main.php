<?php
/*
 * Template Name: メインページ
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section id="fv">
            <h2 class="en">ATELIER<br>HORNET</h2>
        </section>
        <div id="news">
            <div class="news-slider swiper-container">
                <ul class="swiper-wrapper">
                    <?php
                    $the_query = new WP_Query(array(
                        'post_type' => array('post', 'works'),
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'posts_per_page' => 5,
                    ));
                    if($the_query->have_posts()) {
                        while($the_query->have_posts()) {
                            $the_query->the_post();

                            $target = '';
                            $link = get_the_permalink();
                            $date = get_the_date('Y.m.d');
                            switch(get_post_type(get_the_ID())) {
                                case 'post':
                                    $post_type = 'ブログ';
                                    break;
                                case 'works':
                                    $post_type = '制作実績';
                                    $target = 'target="_blank"';
                                    $link = get_post_meta(get_the_ID(), 'EntryData_WorksUrl', true);
                                    break;
                            }
                            $title = get_the_title();

                            echo '<li class="swiper-slide"><a href="' . $link . '" ' . $target . '><time>' . $date . '</time><span>' . $post_type . '</span>' . $title . '</a></li>';
                        }
                    }
                    wp_reset_postdata();
                    ?>
                </ul>
            </div>
        </div>
        <section id="service">
            <ul>
                <li>
                    <div class="icon"><i class="fa fa-pencil" aria-hidden="true"></i></div>
                    <h3 class="en">DESIGN</h3>
                    <p class="description">ヒアリングに基づいたプランに沿って、デザインを作成いたします。ただ見栄えのいいサイトではなく、目的を達成できるデザインを心掛けています。</p>
                </li>
                <li>
                    <div class="icon"><i class="fa fa-plug" aria-hidden="true"></i></div>
                    <h3 class="en">CODING</h3>
                    <p class="description">デザインの意図を理解し、動きや効果を適切に使用することでWebサイトの仕上がりは大きく変わります。目的に合わせた適切なコーディングを行うよう心掛けています。</p>
                </li>
                <li>
                    <div class="icon"><i class="fa fa-wordpress" aria-hidden="true"></i></div>
                    <h3 class="en">WORDPRESS</h3>
                    <p class="description">カスタマイズ性に優れ、更新のしやすい Wordpressの導入をお手伝いいたします。新規製作もリニューアルもお任せください。</p>
                </li>
            </ul>
            <div class="btn">
                <a class="tveffect" href="<?= home_url(); ?>/request/">
                    <div>サービ<span class="rot1">ス</span>詳<span class="rot2">細</span>はこち<span class="rot3">ら</span></div>
                    <div>
                        <div>サービス詳細はこちら</div>
                        <div>サービス詳細はこちら</div>
                        <div>サービス詳細はこちら</div>
                    </div>
                </a>
            </div>
        </section>
        <div id="career">
            <ul class="inner">
                <li>
                    <i class="fa fa-html5" aria-hidden="true"></i>
                    <p class="num en">5<span>year</span></p>
                    <p class="text en">HTML/CSS</p>
                </li>
                <li>
                <i class="fa fa-apple" aria-hidden="true"></i>
                    <p class="num en">7<span>year</span></p>
                    <p class="text en">MACINTOSH</p>
                </li>
                <li>
                    <i class="fa fa-code-fork" aria-hidden="true"></i>
                    <p class="num en">3<span>year</span></p>
                    <p class="text en">JAVASCRIPT/PHP</p>
                </li>
                <li>
                    <i class="fa fa-wordpress" aria-hidden="true"></i>
                    <p class="num en">3<span>year</span></p>
                    <p class="text en">WORDPRESS</p>
                </li>
            </ul>
        </div>
        <section id="works">
            <div class="ttl">
                <h2 class="en">WORKS SO FAR...</h2>
                <p>
                    本職、副業合わせて40件以上のWordpressサイトの制作に携わってきました。<br>
                    PhotoshopやIllustratorなどで作成されたデザインデータの再現に定評があります。
                </p>
            </div>
            <div class="inner">
                <?php
                $args = array(
                    'post_type' => 'works',
                    'post_status' => 'publish',
                    'posts_per_page' => 6
                );
                $the_query = new WP_Query($args);
                if($the_query->have_posts()) {
                    echo '<div class="swiper-container blog-slider">
                        <div class="swiper-wrapper">';
                    while($the_query->have_posts()) {
                        $the_query->the_post();

                        $thumb = get_the_post_thumbnail_url();
                        if(empty($thumb)) $thumb = get_stylesheet_directory_uri() . '/assets/images/noimage.gif';

                        $scope = '';
                        $scopes = get_the_terms(get_the_ID(), 'scope');
                        if(!empty($scopes)) {
                            foreach($scopes as $s) {
                                $scope .= '<span>' . $s->name . '</span>';
                            }
                        }

                        $link = get_post_meta(get_the_ID(), 'EntryData_WorksUrl', true);

                        echo '<article class="swiper-slide">
                            <a href="' . $link . '" target="_blank">
                                <div class="thumb" style="background-image: url(' . $thumb . ');"></div>
                                <div class="info">
                                    <p class="tag">' . $scope . '</p>
                                    <h3>' . get_the_title() . '</h3>
                                </div>
                            </a>
                        </article>';
                    }
                    echo '</div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>';
                } else {
                    echo '<div class="no-content"><p>準備中です。</p></div>';
                }
                wp_reset_postdata();
                ?>
            </div>
            <div class="btn">
                <a class="tveffect" href="<?= home_url(); ?>/works/">
                    <div><span class="rot4">他</span>の制作実績<span class="rot5">は</span>こ<span class="rot6">ち</span>ら</div>
                    <div>
                        <div>他の制作実績はこちら</div>
                        <div>他の制作実績はこちら</div>
                        <div>他の制作実績はこちら</div>
                    </div>
                </a>
            </div>
        </section>
        <section id="blog">
            <div class="inner">
                <h2 class="en">OUR BLOG...</h2>
                <p>
                    技術的な内容や日々のできごとをブログとしてまとめています。
                </p>
                <div class="content">
                    <?= get_post_list('post', 3); ?>
                </div>
                <div class="btn">
                    <a class="tveffect" href="<?= home_url(); ?>/blog/">
                        <div>ブ<span class="rot2">ロ</span>グの<span class="rot1">一</span>覧は<span class="rot4">こ</span>ちら</div>
                        <div>
                            <div>ブログの一覧はこちら</div>
                            <div>ブログの一覧はこちら</div>
                            <div>ブログの一覧はこちら</div>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <?php /*
        <section id="contact">
            <div class="inner">
                <h2 class="en">CONTACT US...</h2>
                <p>
                    制作の依頼・ご相談などお気軽にお問い合わせください。<br>
                    下記フォームよりわかる範囲でご記入ください。必須の項目は必ず記入をお願いします。
                </p>
                <?= do_shortcode('[contact-form-7 id="73" title="footer contact"]'); ?>
            </div>
        </section>
        */ ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
