<?php namespace Mail\Libraries;

use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;
use Swift_Attachment;
use Laravel\Config;

class Mail {

	public $transport;
	public $mailer;
	public $message;

	public $server;
	public $port;
	public $encryption;
	public $username;
	public $password;
	public $realname;

	public function __construct()
	{
		$this->server = Config::get('mail::smtp.server');
		$this->port = Config::get('mail::smtp.port');
		$this->encryption = Config::get('mail::smtp.encryption');
		$this->username = Config::get('mail::smtp.username');
		$this->password = Config::get('mail::smtp.password');
		$this->realname = Config::get('mail::smtp.realname');

		$this->transport = Swift_SmtpTransport::newInstance($this->server, $this->port, $this->encryption)
			->setUsername($this->username)
			->setPassword($this->password);

		$this->mailer = Swift_Mailer::newInstance($this->transport);

		$this->message = Swift_Message::newInstance();

		// Set default sender.
		$this->message->setFrom(array($this->username => $this->realname));
	}

	public function __call($method, $parameters)
	{
		if (method_exists($this->message, $method))
		{
			call_user_func_array(array($this->message, $method), $parameters);
		}

		return $this;
	}

	public function attach($parameters)
	{
		if (is_array($parameters) and array_key_exists('data', $parameters) and array_key_exists('name', $parameters) and array_key_exists('type', $parameters))
		{
			$attach = Swift_Attachment::newInstance($parameters['data'], $parameters['name'], $parameters['type']);
		}
		else
		{
			$attach = Swift_Attachment::fromPath($parameters);
		}

		$this->message->attach($attach);
		
		return $this;
	}

	public function send()
	{
		return $this->mailer->send($this->message);
	}

}