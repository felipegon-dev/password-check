<?php
/**
 * @since      1.0.0
 * @author     Felipe <felipe@amsterdapp.nl>
 */

namespace PasswordCheck\App\Domain;

use PasswordCheck\App\Infrastructure\Repositories\Interface_Password_Check_Repository;

/**
 * Class Counts
 */
class Counts
{
    /**
     * @var Interface_Password_Check_Repository
     */
    private $password_repository;

    /**
     * @var int
     */
    private $user_id;

    /**
     * @var int
     */
    private $count = 0;

    const MAX_COUNTS = 5;

    /**
     * Counts constructor.
     *
     * @param $password_repository
     * @param $user_id
     */
    public function __construct($password_repository, $user_id)
    {
        $this->password_repository = $password_repository;
        $this->user_id = $user_id;
    }


    public function add_count()
    {
        $count_obj = $this->password_repository->get_count($this->user_id);

        if (isset($count_obj->count) && $count_obj->count > 0) {
            $this->count = $count_obj->count;
            $this->count++;
            $this->password_repository->update_count($this->user_id, $this->count);
        } else {
            $this->count = 1;
            $this->password_repository->insert_count($this->user_id, $this->count);
        }
    }

    /**
     * @param $user_id
     *
     * @return bool
     */
    public function over_max_counts()
    {
        return (Counts::MAX_COUNTS <= $this->count);

    }

    /**
     * @return int
     */
    public function get_count()
    {
        return $this->count;
    }
}
