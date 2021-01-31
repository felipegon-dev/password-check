<?php
/**
 * @since      1.0.0
 * @author     Felipe <felipe@amsterdapp.nl>
 */

namespace PasswordCheck\App\Infrastructure\Repositories;

/**
 * Class Abstract_Wp_Connector
 */
abstract class Abstract_Wp_Connector
{
    /**
     * @var \wpdb
     */
    protected $wpdb;

    /**
     * Users_Repository constructor.
     *
     * @param null $wpdb
     */
    protected function __construct($table_name, $wpdb = null)
    {
        if ($wpdb === null ) {
            global $wpdb;
        }
        $this->wpdb = $wpdb;
        $this->current_table_name = $this->wpdb->prefix . $table_name;
    }
}
