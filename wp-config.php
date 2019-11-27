<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.osdn.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'portfolio');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'root');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', 'root');

/** MySQL のホスト名 */
define('DB_HOST', 'localhost');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'R#<Lq}o9Nm0izVf!-Qz.-VMh>SRp<LQYSJq~%Ddya!e(.FaJ|F6~2W5X=U42LzCH');
define('SECURE_AUTH_KEY', '#RCKZiR?&TrDNeM1RrMSITtX(L%GLEYa~Td~-pZ:CEqj#yn7PjU4sUD0&p7xcY=o');
define('LOGGED_IN_KEY', 'wge7Nxx7gRoNebL*UD4I_qp|)62"[`-foi:X[a"{1U0w2[IV0$aL}]HaYddVq()(');
define('NONCE_KEY', '({BTW^{vU|/o/]Z>Qe<T<)z7Wl`bi@CGdBQw~*0GUEWxYGRDHl9D>7R!-YJow_Fj');
define('AUTH_SALT', 'i>|HdZb3hI/<c2Jz"%|h6HIg6|T-#v8.uh^N|t5Rr+"4wg:ubdj:6W.0=fe{OAJ-');
define('SECURE_AUTH_SALT', ',x[qU}w`T(WzuyH{IvPAn1Cbohp+L|=WZ)^5Yp~.2-#R?_JJ&jB-kJ$Ur!8-)(Na');
define('LOGGED_IN_SALT', '^dHv3"6#RC_*NOVU9<y`)Ye*^FE-W3?X8d|-{%KA)85TzB^W|uizU>Z`|yo^pJ`E');
define('NONCE_SALT', 'Cqv=l/z=Yw;cK79V</Z)@hFlfY@,%1*TL?Bi!7$L.EUse"X-I#$-"2fep_>F]RqY');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
  define('ABSPATH', dirname(__FILE__) . '/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
