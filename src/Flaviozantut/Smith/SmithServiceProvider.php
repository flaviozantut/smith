<?php namespace Flaviozantut\Smith;

use Illuminate\Support\ServiceProvider;

class SmithServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('flaviozantut/smith');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['command.smith.smith'] = $this->app->share(function($app)
		{
			return new SmithCommand($app);
		});
		$this->commands(
			'command.smith.smith'
		);
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}