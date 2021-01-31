<?php
/**
 * @since      1.0.0
 * @author     Felipe <felipe@amsterdapp.nl>
 */
namespace PasswordCheck\App\Application\Actions;

use PasswordCheck\App\Application\Init\Password_Check;
use PasswordCheck\App\Application\Views\Login_View;
use PasswordCheck\App\Domain\Counts;
use PasswordCheck\App\Domain\Email_Actions;
use PasswordCheck\App\Domain\Parse_User_Params;
use PasswordCheck\App\Domain\Password\Password_Rules;
use PasswordCheck\App\Domain\View;
use PasswordCheck\App\Infrastructure\Email\Email_Template;
use PasswordCheck\App\Infrastructure\Repositories\Password_Check_Repository;
use PasswordCheck\App\Infrastructure\Repositories\Users_Repository;

/**
 * Class Login_Action
 */
class Login_Action
{
    private $user_params;

    public function __construct()
    {
        $this->user_params = new Parse_User_Params($_POST);
    }

    // Avoid redirects from login
    public function login_redirect() {}

    /**
     * The user has been logged
     */
    public function wp_login()
    {
        if ($this->user_params->validate() && !Password_Rules::check_rules($this->user_params->get_pwd())) {
            wp_logout();

            $user = (new Users_Repository())->get_user($this->user_params->get_log());

            $counts = new Counts(new Password_Check_Repository(), $user->ID);

            $counts->add_count();

            if ($counts->over_max_counts()) {
                $email_template = new Email_Template($user->user_nicename, get_site_url(), $counts->get_count());
                $email_actions = new Email_Actions($email_template, get_bloginfo('admin_email'), get_bloginfo('name') . ' - ['.Password_Check::PLUGIN_NAME.']');
                $email_actions->send();
            }

            Login_View::show($this->user_params);

        } else {
            wp_redirect(get_admin_url());
        }
    }
}
