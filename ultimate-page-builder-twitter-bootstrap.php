<?php
    /**
     * Plugin Name: Ultimate Page Builder: Twitter Bootstrap
     * Plugin URI: http://wordpress.org/plugins/ultimate-page-builder-twitter-bootstrap/
     * Description: Ultimate Page builder twitter bootstrap grid
     * Author: Emran Ahmed
     * Version: 1.0.0
     * Domain Path: /languages
     * Text Domain: ultimate-page-builder-twitter-bootstrap
     * Author URI: http://themehippo.com/
     */

    defined( 'ABSPATH' ) or die( 'Keep Silent' );


    if ( ! class_exists( 'Ultimate_Page_Builder_Twitter_Bootstrap' ) ):

        class Ultimate_Page_Builder_Twitter_Bootstrap {

            protected static $_instance = NULL;

            public static function init() {
                if ( is_null( self::$_instance ) ) {
                    self::$_instance = new self();
                }

                return self::$_instance;
            }

            public function __construct() {

                $this->constants();
                $this->includes();
                $this->hooks();

                do_action( 'ultimate_page_builder_twitter_bootstrap_loaded', $this );
            }

            public function constants() {
                define( 'UPB_TB_PLUGIN_URI', plugin_dir_url( __FILE__ ) );
                define( 'UPB_TB_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

                define( 'UPB_TB_PLUGIN_ASSETS_URI', trailingslashit( plugin_dir_url( __FILE__ ) . 'assets' ) );
                define( 'UPB_TB_PLUGIN_VENDOR_URI', trailingslashit( plugin_dir_url( __FILE__ ) . 'vendor' ) );

                define( 'UPB_TB_PLUGIN_INCLUDE_PATH', trailingslashit( plugin_dir_path( __FILE__ ) . 'includes' ) );
                define( 'UPB_TB_PLUGIN_TEMPLATES_PATH', trailingslashit( plugin_dir_path( __FILE__ ) . 'templates' ) );
                define( 'UPB_TB_PLUGIN_TEMPLATES_URI', trailingslashit( plugin_dir_url( __FILE__ ) . 'templates' ) );

                define( 'UPB_TB_PLUGIN_DIRNAME', dirname( plugin_basename( __FILE__ ) ) );
                define( 'UPB_TB_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
                define( 'UPB_TB_PLUGIN_FILE', __FILE__ );
            }

            public function includes() {
            }

            public function hooks() {
                add_action( 'admin_notices', array( $this, 'php_requirement_notice' ) );
                add_action( 'admin_notices', array( $this, 'upb_requirement_notice' ) );
                add_action( 'init', array( $this, 'language' ) );
            }

            public function has_required_php_version() {
                return version_compare( PHP_VERSION, '5.3.0', '>' );
            }

            public function php_requirement_notice() {
                if ( ! $this->has_required_php_version() ) {
                    $class   = 'notice notice-error';
                    $text    = esc_html__( 'Please check PHP version requirement.', 'ultimate-page-builder-twitter-bootstrap' );
                    $link    = esc_url( 'https://wordpress.org/about/requirements/' );
                    $message = wp_kses( __( "It's required to use latest version of PHP to use <strong>Ultimate Page Builder Twitter Bootstrap</strong>.", 'ultimate-page-builder-twitter-bootstrap' ), array( 'strong' => array() ) );

                    printf( '<div class="%1$s"><p>%2$s <a target="_blank" href="%3$s">%4$s</a></p></div>', $class, $message, $link, $text );
                }
            }

            public function upb_requirement_notice() {
                if ( ! $this->is_upb_installed() ) {
                    $class = 'notice notice-error';

                    $text    = esc_html__( 'Ultimate Page Builder', 'ultimate-page-builder-twitter-bootstrap' );
                    $link    = esc_url( 'https://wordpress.org/plugins/ultimate-page-builder/' );
                    $message = wp_kses( __( "<strong>Ultimate Page Builder: Twitter Bootstrap</strong> is an add-on of ", 'ultimate-page-builder-twitter-bootstrap' ), array( 'strong' => array() ) );

                    printf( '<div class="%1$s"><p>%2$s <a target="_blank" href="%3$s"><strong>%4$s</strong></a></p></div>', $class, $message, $link, $text );
                }
            }

            public function language() {
                load_plugin_textdomain( 'ultimate-page-builder-twitter-bootstrap', FALSE, trailingslashit( UPB_TB_PLUGIN_DIRNAME ) . 'languages' );
            }

            public function is_upb_installed() {
                return in_array( 'ultimate-page-builder/ultimate-page-builder.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) );
            }
        }

        function UPB_TB() {
            return Ultimate_Page_Builder_Twitter_Bootstrap::init();
        }

        add_action( 'plugins_loaded', 'UPB_TB' );
    endif;