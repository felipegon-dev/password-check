<?php

namespace PasswordCheck\App\Tests;

require dirname( __FILE__ ) . '/../../app/vendor/autoload.php';

use Mockery;
use PasswordCheck\App\Infrastructure\Repositories\Users_Repository;

/**
 * Class User_Repository
 */
class User_Repository extends \Codeception\Test\Unit
{
    // use get_user() to get user display name
    public function test_user_repository()
    {
        $wpdb = Mockery::mock('\wpdb');
        $wpdb->prefix = 'test';
        $wpdb->shouldReceive('prepare')->andReturn('test');
        $wpdb->shouldReceive('get_row')->andReturn('test');
        $users_repository = new Users_Repository(Users_Repository::TABLE_NAME, $wpdb);
        $this->assertEquals($users_repository->get_user('test'), 'test');
    }
}
