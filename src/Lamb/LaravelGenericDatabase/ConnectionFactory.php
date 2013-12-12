<?php namespace Lamb\LaravelGenericDatabase;

class ConnectionFactory extends \Illuminate\Database\Connectors\ConnectionFactory {

	/**
	 * Establish a PDO connection based on the configuration.
	 *
	 * @param  array   $config
	 * @param  string  $name
	 * @return \Illuminate\Database\Connection
	 */
	public function make(array $config, $name = null)
	{
		$config['database'] = '';

		return parent::make($config, $name);
	}

	/**
	 * Create a connector instance based on the configuration.
	 *
	 * @param  array  $config
	 * @return \Illuminate\Database\Connectors\ConnectorInterface
	 */
	public function createConnector(array $config)
	{
	    if ($config['driver'] == 'generic') {
	        return new GenericConnector;
	    }
	    
		return parent::createConnector($config);
	}

	/**
	 * Create a new connection instance.
	 *
	 * @param  string  $driver
	 * @param  PDO     $connection
	 * @param  string  $database
	 * @param  string  $prefix
	 * @param  array   $config
	 * @return \Illuminate\Database\Connection
	 */
	protected function createConnection($driver, PDO $connection, $database, $prefix = '', $config = null)
	{
	    if ($driver == 'generic') {
	        return new GenericConnection($connection, $database, $prefix, $config);
	    }
	    
		return parent::createConnection($driver, $connection, $database, $prefix, $config);
	}

}
