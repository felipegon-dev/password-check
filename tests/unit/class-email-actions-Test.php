<?php

namespace PasswordCheck\App\Tests;

require dirname( __FILE__ ) . '/../../app/vendor/autoload.php';

use PasswordCheck\App\Domain\Email_Actions;
use Mockery;

/**
 * Class Password_Check_Test
 */
class Email_Actions_Test extends \Codeception\Test\Unit
{
    /**
     * test if the email was sent
     */
    public function test_send()
    {
        $email_template = Mockery::mock('PasswordCheck\App\Infrastructure\Email\Email_Template');
        $email_template->shouldReceive('get')->andReturn('test');
        $email_Actions = new Email_Actions($email_template, 'test@test.com', 'test');
        // if you want to test if the mail has been sent, you need to test the functionality of wp_mail
        $this->assertFalse($email_Actions->send());
    }
}
