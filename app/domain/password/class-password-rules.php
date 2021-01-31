<?php
/**
 * @since      1.0.0
 * @author     Felipe <felipe@amsterdapp.nl>
 */

namespace PasswordCheck\App\Domain\Password;

/**
 * Class Password_Rules
 */
class Password_Rules {

    const RULES_REGEX = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*['.Password_Rules::RULES_SPECIAL_CHARS.'])[A-Za-z\d'.Password_Rules::RULES_SPECIAL_CHARS.']{16,}$/';
    const RULES_SPECIAL_CHARS = '!"#$%&\'()*+,-.\/:;<=>?@[\\]^_`{|}~';

    /**
     * @return false|int
     */
    public static function check_rules($password)
    {
        return preg_match(Password_Rules::RULES_REGEX, $password);
    }
}
