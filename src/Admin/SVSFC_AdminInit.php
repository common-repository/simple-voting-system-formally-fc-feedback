<?php
/**
 * Admin Init.
 * Php version 8.0.0
 *
 * @category Plugin
 * @package  svsfc-Feedback
 * @author   Adnan Hyder Pervez <12345adnan@gmail.com>
 * @license  GNU General Public License v3.0
 * @link     #
 */

namespace SVSFC_Feedback\Admin;

use SVSFC_Feedback\Front\SVSFC_FrontInit;

defined('ABSPATH') || exit;

/**
 * Class Admin Init.
 * Php version 8.0.0
 *
 * @category Plugin
 * @package  svsfc-Feedback
 * @author   Adnan Hyder Pervez <12345adnan@gmail.com>
 * @license  GNU General Public License v3.0
 * @link     #
 */
class SVSFC_AdminInit
{

    /**
     * The single instance of the class.
     *
     * @var   SVSFC_AdminInit|null $instance.
     * @since 1.0.0
     */
    protected static $instance = null;

    /**
     * Constructor.
     *
     * @since 1.0.0
     */
    protected function __construct()
    {
        $this->hooks();

    }

    /**
     * Hooks Loaded.
     *
     * @since  1.0.0
     * @return void
     */
    public function hooks()
    {
        add_action('add_meta_boxes', array( $this, 'svsfc_feedback_meta_box' ), 10);

    }

    /**
     * Registering Meta box.
     *
     * @since  1.0.0
     * @return void.
     */
    public function svsfc_feedback_meta_box()
    {
        add_meta_box(
            'svsfc_feedback_meta_box',
            __('Voting Results', 'svsfc-feedback'),
            array($this, 'svsfc_feedback_meta_box_content'),
            'post',
            'side',
            'default'
        );

    }

    /**
     * Meta box Content to Display.
     *
     * @param $post object
     *
     * @since 1.0.0
     *
     * @return string Html
     */
    public function svsfc_feedback_meta_box_content($post)
    {
        $data = SVSFC_FrontInit::instance()->get_vote_count_by_postid($post->ID);
        ob_start();
        include trailingslashit(SVSFC_INCLUDES_DIR) . trailingslashit('views') .'admin_voting.php';
        $voting_html = ob_get_clean();
        $voting_html = apply_filters('svsfc_feedback_results', $voting_html);
	    echo wp_kses(
		    $voting_html,
		    [
			    'a'   => [
				    'href'  => [],
				    'title' => [],
			    ],
			    'div' => [],
			    'span' => [],
		    ]
	    );
    }

	/**
	 * AdminInit Instance.
     * Ensures only one instance of the class is loaded or can be loaded.
     *
     * @return SVSFC_AdminInit instance.
     * @since  1.0.0
     */
    public static function instance(): SVSFC_AdminInit
    {

        if (is_null(self::$instance) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Cloning is forbidden.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function __clone()
    {
        // Override this PHP function to prevent unwanted copies of your instance.
        // Implement your own error or use `wc_doing_it_wrong().
    }

    /**
     * Unserializing instances of this class is forbidden.
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function __wakeup()
    {
        // Override this PHP function to prevent unwanted copies of your instance.
        // Implement your own error or use `wc_doing_it_wrong().
    }
}
