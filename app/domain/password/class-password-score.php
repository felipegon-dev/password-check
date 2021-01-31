<?php
/**
 * @since      1.0.0
 * @author     Felipe <felipe@amsterdapp.nl>
 */

namespace PasswordCheck\App\Domain\Password;

use ZxcvbnPhp\Zxcvbn;

/**
 * Class Password_Score
 */
class Password_Score
{
    /**
     * @param $username
     * @param $password
     *
     * @return mixed
     */
    public static function getScore($password)
    {
        if (version_compare(phpversion(), '7.1.33', '>=')) {
            return (new Zxcvbn())->passwordStrength($password)['score'];
        } else {
            return 0;
        }
    }
}
