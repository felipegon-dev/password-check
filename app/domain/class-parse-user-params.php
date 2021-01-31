<?php
/**
 * @since      1.0.0
 * @author     Felipe <felipe@amsterdapp.nl>
 */
namespace PasswordCheck\App\Domain;

/**
 * Class Parse_User_Params
 */
class Parse_User_Params
{
    /**
     * @var string|null
     */
    private $log;
    /**
     * @var string|null
     */
    private $pwd;

    /**
     * Parse_User_Params constructor.
     *
     * @param $post_data array
     */
    public function __construct($post_data)
    {
        $this->set_params($post_data);
    }

    /**
     * @return string|null
     */
    public function get_log()
    {
        return $this->log;
    }

    /**
     * @return string|null
     */
    public function get_pwd()
    {
        return $this->pwd;
    }

    /**
     * @return bool
     */
    public function validate()
    {
        return ($this->log !== null && $this->pwd !== null);
    }

    /**
     * @param $post_data
     */
    private function set_params($post_data)
    {
        foreach ($post_data as $key => $value) {
            if ($key === 'log') {
                $this->log = $value;
            }
            if ($key === 'pwd') {
                $this->pwd = $value;
            }
        }
    }
}
