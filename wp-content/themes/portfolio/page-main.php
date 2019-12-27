<?php
/*
 * Template Name: メインページ
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section id="fv">
            <h2>PORTFOLIO</h2>
        </section>
        <section id="news">
            <h2>NEWS</h2>
            <ul>
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

                        $link = get_the_permalink();
                        $date = get_the_date('Y.m.d');
                        switch(get_post_type(get_the_ID())) {
                            case 'post':
                                $post_type = 'ブログ';
                                break;
                            case 'works':
                                $post_type = '制作実績';
                                break;
                        }
                        $title = get_the_title();

                        echo '<li><a href="' . $link . '"><time>' . $date . '</time><span>' . $post_type . '</span>' . $title . '</a></li>';
                    }
                }
                wp_reset_postdata();
                ?>
            </ul>
        </section>
        <section id="service">
            <div class="inner">
                <ul>
                    <li>
                        <div class="thumb" style="background-image: url(<?= get_stylesheet_directory_uri(); ?>/assets/images/service001.jpg);"></div>
                        <div class="info">
                            <h3>デザイン</h3>
                            <p class="description">ヒアリングに基づいたプランに沿って、デザインを作成いたします。ただ見栄えのいいサイトではなく、目的を達成できるデザインを心掛けています。</p>
                            <a href="">詳しくはこちら</a>
                        </div>
                    </li>
                    <li>
                        <div class="thumb" style="background-image: url(<?= get_stylesheet_directory_uri(); ?>/assets/images/service002.jpg);"></div>
                        <div class="info">
                            <h3>コーディング</h3>
                            <p class="description">デザインの意図を理解し、動きや効果を適切に使用することでWebサイトの仕上がりは大きく変わります。目的に合わせた適切なコーディングを行うよう心掛けています。</p>
                            <a href="">詳しくはこちら</a>
                        </div>
                    </li>
                    <li>
                        <div class="thumb" style="background-image: url(<?= get_stylesheet_directory_uri(); ?>/assets/images/service003.jpg);"></div>
                        <div class="info">
                            <h3>Wordpress導入</h3>
                            <p class="description">カスタマイズ性に優れ、更新のしやすい Wordpressの導入をお手伝いいたします。新規製作もリニューアルもお任せください。</p>
                            <a href="">詳しくはこちら</a>
                        </div>
                        </p>
                    </li>
                </ul>
            </div>
        </section>
        <section id="works">
            <h2>WORKS</h2>
            <?php
            $args = array(
                'post_type' => 'works',
                'post_status' => 'publish',
                'posts_per_page' => 6
            );
            $the_query = new WP_Query($args);
            if($the_query->have_posts()) {
                echo '<div class="swiper-container">
                    <div class="swiper-wrapper">';
                while($the_query->have_posts()) {
                    $the_query->the_post();

                    $thumb = get_the_post_thumbnail_url('medium');
                    if(empty($thumb)) $thumb = get_stylesheet_directory_uri() . '/assets/images/noimage.gif';

                    $scope = '';
                    $scopes = get_the_terms(get_the_ID(), 'scope');
                    if(!empty($scopes)) {
                        foreach($scopes as $s) {
                            $scope .= '<span>' . $s->name . '</span>';
                        }
                    }

                    echo '<article class="swiper-slide">
                        <a href="' . get_the_permalink() . '">
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
        </section>
        <section id="blog">
            <div class="content">
                <h2>BLOG</h2>
                <div class="inner">
                    <?= get_post_list('post', 6); ?>
                </div>
            </div>
            <div class="side"></div>
        </section>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
