<?php

namespace PasswordCheck\App\Tests;

require dirname( __FILE__ ) . '/../../app/vendor/autoload.php';

use PasswordCheck\App\Infrastructure\Email\Email_Template;
use Mockery;

/**
 * Class Email_Template_Test
 */
class Email_Template_Test extends \Codeception\Test\Unit
{
    /**
     * test if the correct text was generated
     */
    public function test_get()
    {
        $email_template = new Email_Template('test', 'test', 1);
        $template = $email_template->get();
        $this->assertEquals($template, 'User test has tried to log in with an unsuitable password too many times to your site test.

The system has identified 1 unsuccessful login attempts.
');
    }
}
