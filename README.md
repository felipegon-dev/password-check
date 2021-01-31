# password-check WordPress plugin

The WordPress plugin structure is based on https://github.com/DevinVinson/WordPress-Plugin-Boilerplate
but I implement a DDD structure to separate different layers of the application

I use unit testing to validate some parts of the application not of all.

I respect the names, and the declarations based on the boilerplate plugin because this can work with PHP 5 versions

#Important: 

We use this external lib: https://github.com/bjeavons/zxcvbn-php needs php >= 7.1.33 if your version < 7.1.33 the score will be set to 0

#Installation

All external files all installed in vendor/ but if you want you can execute
<pre>
cd wp-content/plugins/password-check
composer install --no-dev
</pre>

#How to do the testing:

<pre>
cd wp-content/plugins/password-check
composer install
php vendor/bin/codecept run tests/unit/
</pre>

 


#Author:
Felipe González López
<ul>
<li>Linkedin: <a href="https://www.linkedin.com/in/felipe-gonz%C3%A1lez-l%C3%B3pez-70970a31">https://www.linkedin.com/in/felipe-gonz%C3%A1lez-l%C3%B3pez-70970a31</a></li>
<li><a href="http://www.amsterdapp.nl/">http://www.amsterdapp.nl/</a></li>
</ul>

