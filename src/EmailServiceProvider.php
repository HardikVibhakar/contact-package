<?php

namespace Devdojo\Calculator;

use Illuminate\Support\ServiceProvider;

class EmailServiceProvider extends ServiceProvider
{
	public function boot()
	{
		$this->loadViewsFrom(__DIR__.'/views', 'calculator');
		$this->loadRoutesFrom(__DIR__.'/routes.php');
		$this->loadMigrationsFrom(__DIR__.'/database/migrations');
		include __DIR__.'/Models/Contact.php';
		$this->mergeConfigFrom(
	        __DIR__.'/config/contact.php', 'calculator'
	    );
	    $this->publishes([
	        __DIR__.'/config/contact.php' => config_path('contact.php'),
	    ]);
	}

	public function register()
	{
		// register our controller
    	$this->app->make('Devdojo\Calculator\EmailController');
	}
}