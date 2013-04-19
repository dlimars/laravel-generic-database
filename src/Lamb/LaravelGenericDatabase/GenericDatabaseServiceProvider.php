<?php namespace Lamb\LaravelGenericDatabase;

use Illuminate\Support\ServiceProvider;

class GenericDatabaseServiceProvider extends ServiceProvider {

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
		$this->package('lamb/laravel-generic-database');
		$factory = $this->app['db'];
		$connections = $this->app['config']['database']['connections'];
		foreach($connections as $connection_name => $connection_config) {
			if ($connection_config['driver'] == 'generic') {
				$factory->extend($connection_name,function($config) {
					if ( ! isset($config['prefix']))
					{
						$config['prefix'] = '';
					}

					if ( ! isset($config['database']))
					{
						$config['database'] = '';
					}
			
					$connector =  new GenericConnector();
						$pdo = $connector->connect($config);
					return new GenericConnection($pdo, $config['database'], $config['prefix']);
				});
			}
		}
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
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