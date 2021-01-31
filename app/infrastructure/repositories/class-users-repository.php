<?php
/**
 * @since      1.0.0
 * @author     Felipe <felipe@amsterdapp.nl>
 */

namespace PasswordCheck\App\Infrastructure\Repositories;

/**
 * Class Users_Repository
 */
class Users_Repository extends Abstract_Wp_Connector implements Interface_User_Repository
{
    const TABLE_NAME = 'users';

    public function __construct($table_name = Users_Repository::TABLE_NAME, $wpdb = null)
    {
        parent::__construct($table_name, $wpdb);
    }

    /**
     *
     * @param string $user Can be email or user_login
     */
    public function get_user($user)
    {
        $sql = $this->wpdb->prepare("SELECT * FROM {$this->current_table_name} where user_login = %s or user_email = %s", $user, $user);
        return $this->wpdb->get_row($sql);
    }
}
