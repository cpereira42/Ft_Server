<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'wordpress' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '~Z[([lo2&2CR=hln!8JGc)@_,0k4^a/R|Ssl4MC2.lb7E56`|YDOh]N|4wP)70Vl');
define('SECURE_AUTH_KEY',  'lNryKb:o*,v7G1d(wUrHj9zqCO%~ToQ2`nFTTQ:=M)ZC,0[p|<br4J `?=?U1d83');
define('LOGGED_IN_KEY',    'Hs-9`yE:W3Rloh7-^1c?DlR*~J&+s(+rNbaLWrc;:U|#UEXfiCc<G/sKZ-gZW[1a');
define('NONCE_KEY',        '2x=6}vUou+IovAju=Zb`*dI9ApL6$c-DAgI?q;3qb*+*^)Iw|Ej--LDTBFtupe?>');
define('AUTH_SALT',        'qlO=p}gKFcq&*J,HXLt$wFg2EEa8]$OQfqQiC1<o/H44P}zIlW.TZ/|A^)fMB&_x');
define('SECURE_AUTH_SALT', '4sCiN61_dLN1~zMN!/=-u!KEbQQ?Qe+T*`]}i3m0*&u@#-fL1lR000<>.M]-?n`&');
define('LOGGED_IN_SALT',   'f_lmPj2i5r6>cAu`%<lzu:f,{;6K0UMLK9DJq O;du-L5f2EL&1qsXCTX#4J}0LA');
define('NONCE_SALT',       'r<XhvM9pGpl8^BdwAES/6Xk+l+55omFL@d|LWp+<Jtx0v $c%f<V%C79V%/5%@vv');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
