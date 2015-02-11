# Mail
Simple mail bundle for Laravel 3

Instalation
-----------
This bundle is using [**Swift Mailer v5.3**](http://swiftmailer.org/) library.
Require it via Composer like this:

	"require" : {
		"swiftmailer/swiftmailer": "5.3.*"
	}

Copy Mail folder to you bundles directory.
Register Mail bundle like this:

	'mail' => array('auto' => true)

**Done!**

Usage
-----
Send your message like this:

	IoC::resolve('Mail')
		->setSubject('Subject')
		->setTo(array('daniil.rakhmatulin@gmail.com' => 'Daniil Rakhmatulin'))
		->setBody('I am a message.')
		->send();

**That's all!**

Configuration
-------------

See [options](https://github.com/qwertukg/Captcha/blob/master/Captcha/config/options.php) :)

**Good luck!**
