<?php
/*
 * Template Name: about
 */
get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <section id="about">
                <h2 class="en">ABOUT</h2>
                <div class="inner data">
                    <div class="thumb">
                        <img src="<?= get_stylesheet_directory_uri(); ?>/assets/images/profile.jpg">
                    </div>
                    <div class="info">
                        <dl>
                            <dt>名称</dt>
                            <dd>Atelier Hornet（アトリエホーネット）</dd>
                            <dt>所在地</dt>
                            <dd>静岡県沼津市</dd>
                            <dt>事業内容</dt>
                            <dd>デザイン、HTML・CSSコーディング、スマートフォンサイト、CMS導入等</dd>
                        </dl>
                        <p>
                            静岡県沼津市にてフリーランスのWeb制作をしております。<br>
                            2017年から2年半ほど東京の制作会社でデザイン・コーディングなどの業務を担当し、<br>
                            2019年の夏、プログラミングスクールのインストラクター兼社内エンジニアとして就業。<br>
                            転職を機にフリーランスエンジニアとして活動を開始しました。
                        </p>
                    </div>
                </div>
            </section>
            <section id="strong">
                <h2 class="en">STRONG AND WEAK POINTS</h2>
                <div class="inner">
                    <div class="like">
                        <h3>得意なこと</h3>
                        <ul>
                            <li>御社の強みを生かしたサイト制作</li>
                        </ul>
                    </div>
                    <div class="dislike">
                        <h3>苦手なこと</h3>
                        <ul>
                            <li>結果を求めない趣味だけのサイト制作</li>
                            <li>使い勝手の悪いユーザー目線ではないサイト制作</li>
                            <li>妥協</li>
                        </ul>
                    </div>
                </div>
            </section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
