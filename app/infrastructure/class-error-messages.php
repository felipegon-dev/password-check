<?php
/**
 * @since      1.0.0
 * @author     Felipe <felipe@amsterdapp.nl>
 */

namespace PasswordCheck\App\Infrastructure;

use WP_Error;

/**
 * Class Error_Messages
 */
abstract class Error_Messages
{
    const ERR_001 = 'Your password is not strong enough, it has a score of %d. Please change it to be allowed to log in again.';
}
