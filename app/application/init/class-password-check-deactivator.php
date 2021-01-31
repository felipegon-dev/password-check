<?php
/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @author     Felipe <felipe@amsterdapp.nl
 */

namespace PasswordCheck\App\Application\Init;

class Password_Check_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'password_check';

        $sql = "DROP TABLE `$table_name`";
        $wpdb->query($sql);
	}
}
