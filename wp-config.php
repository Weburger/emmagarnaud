<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'emmagarnaud' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'pommede5' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost:3306' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'N+IEYq+V+}5wk|G1Db^xKII>SA5ikQ .{e04^P0RkX_omMQ(+ofl>`e=3/?T_/|Z' );
define( 'SECURE_AUTH_KEY',  'cQ[;8rZq>9I}174jzEj3OqKc;1V)VplYV#W8f<Gq-O,[Ev{,GNKS2YeMCH[;r]yb' );
define( 'LOGGED_IN_KEY',    ' 9;>PlN<:UOl(skEJ<utxs.l-E[;~$8P.+yYa|*2CO7&Z^J3Oi:bH:f,^Y*;!$Je' );
define( 'NONCE_KEY',        '7G|,5`1o7#*S2>rvW!2qI`2Qt_wXpOZ2gx~;b*%]Rzly3RzCRX!?`8Y:<3ez#udP' );
define( 'AUTH_SALT',        ')Q2.1w4iPQ~f#iWu`J5r)eHW=(B^nHj.orLg3)k,CF4Lh]%hwMK!CYtd3uMHvfrl' );
define( 'SECURE_AUTH_SALT', ',KPaA8G3laX;s3`<+[cqYd(BY/p1DKBTDn2*3v7lWRPl52rdsMqf`kVPlO${W!cO' );
define( 'LOGGED_IN_SALT',   ',~zh8tvXuXg}8SY8-wi~S7{>g#3)Vq,)r);@d_tNBJn6)6-zu*_$.$Y.;+p1{%$*' );
define( 'NONCE_SALT',       'ogYgw,H^zJ2Vz[B_Dxbgx{dEqW35WM#wo_@w5LAl8tRgZ*tjK4{kD4X:I&${lcQ)' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs et développeuses d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
