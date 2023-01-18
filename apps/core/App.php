<?php

class App {
	protected 
		$controler="Wellcome", 
		$method="Main", 
		$arg=[];

	private $dirControler = 'apps/controlers/';

	private $url;

	public function __construct()
	{
		$this->parseUrl();

		if (file_exists($this->dirControler . @$this->url[0] . '.php')):
			$this->controler = $this->url[0];
			unset($this->url[0]);
		endif;

		require_once $this->dirControler . $this->controler . '.php';
		$this->controler = new $this->controler;


		if (method_exists($this->controler, @$this->url[1])):
			$this->method = $this->url[1];
			unset($this->url[1]);
		endif;

		if (!empty($this->url)):
			$this->arg = array_values($this->url);
		endif;

		call_user_func_array([$this->controler, $this->method], $this->arg);

	}
	private function parseUrl(){
		if(isset($_GET['url'])):
			
			$this->url = explode('/',filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
			
		endif;
	}
}