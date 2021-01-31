<?php

namespace PasswordCheck\App\Tests;

require dirname( __FILE__ ) . '/../../app/vendor/autoload.php';

use Mockery;
use PasswordCheck\App\Domain\Counts;

/**
 * Class Counts_Test
 */
class Counts_Test extends \Codeception\Test\Unit
{
    /**
     * figure out the number of unsuccessful attempts
     */
    public function test_add_count()
    {
        $count = Mockery::mock('\stdClass');
        $count->count = 1;
        $password_check_repository = Mockery::mock('PasswordCheck\App\Infrastructure\Repositories\Password_Check_Repository');
        $password_check_repository->shouldReceive('get_count')->andReturn($count);
        $password_check_repository->shouldReceive('update_count');
        $counts = new Counts($password_check_repository, 1);
        $counts->add_count();
        $this->assertEquals($counts->get_count(), 2);

        $password_check_repository = Mockery::mock('PasswordCheck\App\Infrastructure\Repositories\Password_Check_Repository');
        $password_check_repository->shouldReceive('get_count')->andReturn(null);
        $password_check_repository->shouldReceive('insert_count');
        $counts = new Counts($password_check_repository, 1);
        $counts->add_count();
        $this->assertEquals($counts->get_count(), 1);
    }

    /**
     * check if the limit has been reached
     */
    public function test_over_max_counts()
    {
        $count = Mockery::mock('\stdClass');
        $count->count = 5;
        $password_check_repository = Mockery::mock('PasswordCheck\App\Infrastructure\Repositories\Password_Check_Repository');
        $password_check_repository->shouldReceive('get_count')->andReturn($count);
        $password_check_repository->shouldReceive('update_count');
        $counts = new Counts($password_check_repository, 1);
        $counts->add_count();
        $this->assertTrue($counts->over_max_counts());
    }
}
