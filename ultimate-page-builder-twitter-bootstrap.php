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
            }
        }

        function UPB_TB() {
            return Ultimate_Page_Builder_Twitter_Bootstrap::init();
        }

        add_action( 'plugins_loaded', 'UPB_TB' );
    endif;