<?php
/**
 * @since      1.0.0
 * @author     Felipe <felipe@amsterdapp.nl>
 */

namespace PasswordCheck\App\Application\Views;

use PasswordCheck\App\Domain\Parse_User_Params;
use PasswordCheck\App\Domain\Password\Password_Score;
use PasswordCheck\App\Infrastructure\Error_Messages;
use WP_Error;

/**
 * Class Login_View
 */
class Login_View
{
    /**
     * show
     */
    public static function show(Parse_User_Params $user_params)
    {
        $score = Password_Score::getScore($user_params->get_pwd());
        $wp_err = new WP_Error();
        $wp_err->add('password_check_err', sprintf(__(Error_Messages::ERR_001), $score));

        login_header(__('Log In'), '', $wp_err);
        wp_login_form();
        login_footer();
        exit;
    }
}
