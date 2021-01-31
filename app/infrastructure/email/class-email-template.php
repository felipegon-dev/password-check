<?php
/**
 * @since      1.0.0
 * @author     Felipe <felipe@amsterdapp.nl>
 */
namespace PasswordCheck\App\Infrastructure\Email;

/**
 * Class Email_Template
 * @package PasswordCheck\App\Infrastructure\Email
 */
class Email_Template implements Interface_Email
{
    /**
     * @var string
     */
    private $values;

    /**
     * Email_Template constructor.
     *
     * @param mixed ...$values
     */
    public function __construct(...$values)
    {
        $this->values = $values;
    }

    /**
     * @param int $id
     *
     * @return string
     */
    public function get($id = 1)
    {
        switch ($id) {
            default:
                $template = file_get_contents( dirname( __FILE__ ) . '/templates/template1.txt');
                return sprintf($template, ...$this->values);
        }
    }
}
