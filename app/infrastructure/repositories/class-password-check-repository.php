<?php
/**
 * @since      1.0.0
 * @author     Felipe <felipe@amsterdapp.nl>
 */

namespace PasswordCheck\App\Infrastructure\Repositories;

/**
 * Class Password_Check_Repository
 */
class Password_Check_Repository extends Abstract_Wp_Connector implements Interface_Password_Check_Repository
{
    const TABLE_NAME = 'password_check';

    public function __construct($table_name = Password_Check_Repository::TABLE_NAME, $wpdb = null)
    {
        parent::__construct($table_name, $wpdb);
    }

    /**
     * @param $user_id
     *
     * @return array|object|void|null
     */
    public function get_count($user_id)
    {
        $sql = $this->wpdb->prepare("SELECT count FROM {$this->current_table_name} where user_id = %s", $user_id);
        return $this->wpdb->get_row($sql);
    }

    /**
     * @param     $user_id
     * @param int $count
     */
    public function insert_count($user_id, $count=1)
    {
        $this->wpdb->insert($this->current_table_name, array('user_id' => $user_id, 'count' => $count));
    }

    /**
     * @param $user_id
     * @param $countz
     */
    public function update_count($user_id, $count)
    {
        $this->wpdb->update($this->current_table_name, array('count'=>$count), array('user_id'=> $user_id));
    }
}
