<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'hypnosehumaniste');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', '');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ']l!p>Z?*0cJJRCJRpwVgbh_r+4Vo?3z>*o.hEU(;~aow,*nt^&AX?Zj^gu{/yPC ');
define('SECURE_AUTH_KEY',  'EFq!X7^7Qbge(8u^yB_)ouEiaofA%E0c(?:#kMh>Nf(G(yJThh|B%bDe.W(<?ok+');
define('LOGGED_IN_KEY',    'nA0J8n0ls6D>rwy4K-|w>To)a;294p<({/zuQo>*pA$HkSQgrn&fTp&LsH03rT| ');
define('NONCE_KEY',        'c=k5/7,wvOgaIQds~43*B&3H#80(_W=k_kVFN1=uN/y&=p=>0p4FU$!d$S5XwJ|)');
define('AUTH_SALT',        'oNKYnu. .P!Jq{J/.( ;fw}KuN|Vo)*?s`n`flkv)2D2:NY&F%|$WuGXwy;{5I?Q');
define('SECURE_AUTH_SALT', ':*JCCX^D W)c&Hv##69mCg?Y:2sx ,9z)x>z95$gX*Z~#+dIr%[G4h4)Pio>*X:n');
define('LOGGED_IN_SALT',   'DTDWqrK_5fzm5k1}01nZ#,;#1N(C>)vP`=3;b.Da+N|j6#pXr_Ppy*8G!J&>@VW1');
define('NONCE_SALT',       'qt6|AHrrK*3je`<d@=sPD*r!vQ2FUvv61[GKh49,AOR(DkD-A:BNKJ,zT],pf:uu');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');