<?php
/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @author     Felipe <felipe@amsterdapp.nl
 */

namespace PasswordCheck\App\Application\Init;

class Password_Check_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'password_check';

        $sql = "
        CREATE TABLE IF NOT EXISTS `$table_name` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `user_id` int(11) NOT NULL,
        `count` int(11) NOT NULL,
        PRIMARY KEY (`id`) 
        ) ENGINE=MyISAM";
        $wpdb->query($sql);
	}
}
