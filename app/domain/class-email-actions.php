<?php
/**
 * @since      1.0.0
 * @author     Felipe <felipe@amsterdapp.nl>
 */

namespace PasswordCheck\App\Domain;

use PasswordCheck\App\Infrastructure\Email\Interface_Email;

/**
 * Class Email_Actions
 */
class Email_Actions
{
    /**
     * @var Interface_Email
     */
     private $email_template;
    /**
     * @var string
     */
    private $mail_to;
    /**
     * @var string
     */
    private $subject;


     public function __construct($email_template, $mail_to, $subject = '')
     {
         $this->email_template = $email_template->get();
         $this->mail_to = $mail_to;
         $this->subject = $subject;
     }

     public function send()
     {
         if ( function_exists('wp_mail') ) {
             return wp_mail($this->mail_to, $this->subject, $this->email_template);
         }

         return false;
     }
}
