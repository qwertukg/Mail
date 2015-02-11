<?php

if (!File::exists(path('base').'vendor/autoload.php'))
{
    throw new Exception('You need to run composer update to complete installation of this project.');
}

require path('base').'vendor/autoload.php';

Autoloader::namespaces(array(
	'Mail' => Bundle::path('mail')
));

IoC::register('Mail', function()
{
	return new Mail\Libraries\Mail;
}); 
