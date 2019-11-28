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
        <section id="blog">
            <h2>BLOG</h2>
            <div class="inner">
                <?= get_post_list('post', 6); ?>
            </div>
        </section>
        <section id="profile">
            <h2>PROFILE</h2>
        </section>
        <section id="works">
            <h2>WORKS</h2>
            <div class="inner">
                <?= get_post_list('works', 6); ?>
            </div>
        </section>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
