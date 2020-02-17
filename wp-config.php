<?php
/**
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define( 'DB_NAME', 'wordpress' );

/** Tu nombre de usuario de MySQL */
define( 'DB_USER', 'root' );

/** Tu contraseña de MySQL */
define( 'DB_PASSWORD', '' );

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define( 'DB_HOST', 'localhost' );

/** Codificación de caracteres para la base de datos. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', 'nBqC},(8qe.XJWz q#K|J(z6;)*Jz&L>LwiE,dUh6M-8zF}65hl81m6Aq~Rcy~7x' );
define( 'SECURE_AUTH_KEY', 'FUvr}#V#4KegK6dS+AAZ~&Ff Z-e= xNlkPg%V[BZ3GppJ(^tp+ATU|3$X<n+L71' );
define( 'LOGGED_IN_KEY', 'Z)p=x0Z/gKmzaS>uPcv]W=KPrwEj!1N $Untek^jBS5dRWm5+EQvO{]g%JMY`z/J' );
define( 'NONCE_KEY', 'u^l_@Kgh{!,X4#[[ buX?,%5|ax}pM)&S+y@TP)@rg_Ex]Aef#-(!5DnDCJ|XF1z' );
define( 'AUTH_SALT', '<;Ob[9J-Mdh+xp4|;>%jKsjaj#|,Ut>[.!_0.K9&{}Cgk%17OxBY/w+Cy7nfPnAU' );
define( 'SECURE_AUTH_SALT', '9|l{Y4VFc:otAR?]<v6I2K7^7GgmbRomfZsyv(i&q$+Lx~YP;34a0r3r9nLl.7%G' );
define( 'LOGGED_IN_SALT', 'dSx$V`m@[>wf[K+BIBvVE~]nM[+6Wiu0w{BZVOh44RxDsgS,%a%#XSI3ef]s;wHk' );
define( 'NONCE_SALT', 'qoI>Yu().ohk+02e[XJzGX7j:&r6Q$z)HMS;,tw5S!t`A[y,4;NC{%@)g!1KT{]>' );

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

