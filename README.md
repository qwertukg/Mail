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
		->setTo(array('daniil.rakhmatulin@gmail.com' => 'Daniil Rakhmatulin', 'another@example.com'))
		->setBody('I am a message.')
		->send();

Set custom from header:

	->setFrom(array('john.doe@example.com' => 'John'))

Set attachment:

- from filesystem:

	->attach('path/to/file.txt')

- from data:

	->attach(array(
		'data' => 'I am an attachmrnt',
		'name' => 'readme.txt',
		'type' => 'text/plain',
	))

And all methods from [Swift_Message](http://swiftmailer.org/docs/messages.html)

**That's all!**

Configuration
-------------

See [smtp](https://github.com/qwertukg/Mail/blob/master/mail/config/smtp.php) :)

**Good luck!**
