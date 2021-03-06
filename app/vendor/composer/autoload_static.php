<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit48822c97a5d56a3444e8e9b1424f3bf5
{
    public static $classMap = array (
        'ComposerAutoloaderInit48822c97a5d56a3444e8e9b1424f3bf5' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit48822c97a5d56a3444e8e9b1424f3bf5' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'PasswordCheck\\App\\Application\\Actions\\Login_Action' => __DIR__ . '/../..' . '/application/actions/class-login-action.php',
        'PasswordCheck\\App\\Application\\Init\\Password_Check' => __DIR__ . '/../..' . '/application/init/class-password-check.php',
        'PasswordCheck\\App\\Application\\Init\\Password_Check_Activator' => __DIR__ . '/../..' . '/application/init/class-password-check-activator.php',
        'PasswordCheck\\App\\Application\\Init\\Password_Check_Deactivator' => __DIR__ . '/../..' . '/application/init/class-password-check-deactivator.php',
        'PasswordCheck\\App\\Application\\Init\\Password_Check_Loader' => __DIR__ . '/../..' . '/application/init/class-password-check-loader.php',
        'PasswordCheck\\App\\Application\\Views\\Login_View' => __DIR__ . '/../..' . '/application/views/class-login-view.php',
        'PasswordCheck\\App\\Domain\\Counts' => __DIR__ . '/../..' . '/domain/class-counts.php',
        'PasswordCheck\\App\\Domain\\Email_Actions' => __DIR__ . '/../..' . '/domain/class-email-actions.php',
        'PasswordCheck\\App\\Domain\\Parse_User_Params' => __DIR__ . '/../..' . '/domain/class-parse-user-params.php',
        'PasswordCheck\\App\\Domain\\Password\\Password_Rules' => __DIR__ . '/../..' . '/domain/password/class-password-rules.php',
        'PasswordCheck\\App\\Domain\\Password\\Password_Score' => __DIR__ . '/../..' . '/domain/password/class-password-score.php',
        'PasswordCheck\\App\\Infrastructure\\Email\\Email_Template' => __DIR__ . '/../..' . '/infrastructure/email/class-email-template.php',
        'PasswordCheck\\App\\Infrastructure\\Email\\Interface_Email' => __DIR__ . '/../..' . '/infrastructure/email/interface-email.php',
        'PasswordCheck\\App\\Infrastructure\\Error_Messages' => __DIR__ . '/../..' . '/infrastructure/class-error-messages.php',
        'PasswordCheck\\App\\Infrastructure\\Repositories\\Abstract_Wp_Connector' => __DIR__ . '/../..' . '/infrastructure/repositories/abstract-class-wp-connector.php',
        'PasswordCheck\\App\\Infrastructure\\Repositories\\Interface_Password_Check_Repository' => __DIR__ . '/../..' . '/infrastructure/repositories/interface-password-check-repository.php',
        'PasswordCheck\\App\\Infrastructure\\Repositories\\Interface_User_Repository' => __DIR__ . '/../..' . '/infrastructure/repositories/interface-user-repository.php',
        'PasswordCheck\\App\\Infrastructure\\Repositories\\Password_Check_Repository' => __DIR__ . '/../..' . '/infrastructure/repositories/class-password-check-repository.php',
        'PasswordCheck\\App\\Infrastructure\\Repositories\\Users_Repository' => __DIR__ . '/../..' . '/infrastructure/repositories/class-users-repository.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit48822c97a5d56a3444e8e9b1424f3bf5::$classMap;

        }, null, ClassLoader::class);
    }
}
