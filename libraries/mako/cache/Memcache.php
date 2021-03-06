<?php

namespace mako\cache;

use \Memcache as PHP_Memcache;
use \RuntimeException;

/**
 * Memcache adapter.
 *
 * @author     Frederic G. Østby
 * @copyright  (c) 2008-2013 Frederic G. Østby
 * @license    http://www.makoframework.com/license
 */

class Memcache extends \mako\cache\Adapter
{
	//---------------------------------------------
	// Class properties
	//---------------------------------------------

	/**
	 * Memcache object.
	 *
	 * @var Memcache
	 */

	protected $memcache;

	/**
	 * Compression level.
	 *
	 * @var int
	 */

	protected $compression = 0;

	//---------------------------------------------
	// Class constructor, destructor etc ...
	//---------------------------------------------

	/**
	 * Constructor.
	 *
	 * @access  public
	 * @param   array   $config  Configuration
	 */

	public function __construct(array $config)
	{
		parent::__construct($config['identifier']);
		
		if(class_exists('\Memcache', false) === false)
		{
			throw new RuntimeException(vsprintf("%s(): Memcache is not available.", array(__METHOD__)));
		}
		
		$this->memcache = new PHP_Memcache();

		if($config['compress_data'] !== false)
		{
			$this->compression = MEMCACHE_COMPRESSED;
		}

		// Add servers to the connection pool

		foreach($config['servers'] as $server)
		{
			$this->memcache->addServer($server['server'], $server['port'], $server['persistent_connection'], $server['weight'], $config['timeout']);
		}
	}

	/**
	 * Destructor.
	 *
	 * @access  public
	 */

	public function __destruct()
	{
		if($this->memcache !== null)
		{
			$this->memcache->close();
		}
	}

	//---------------------------------------------
	// Class methods
	//---------------------------------------------

	/**
	 * Store variable in the cache.
	 *
	 * @access  public
	 * @param   string   $key    Cache key
	 * @param   mixed    $value  The variable to store
	 * @param   int      $ttl    (optional) Time to live
	 * @return  boolean
	 */

	public function write($key, $value, $ttl = 0)
	{
		if($ttl !== 0)
		{
			$ttl += time();
		}

		if($this->memcache->replace("{$this->identifier}_{$key}", $value, $this->compression, $ttl) === false)
		{
			return $this->memcache->set("{$this->identifier}_{$key}", $value, $this->compression, $ttl);
		}

		return true;
	}

	/**
	 * Fetch variable from the cache.
	 *
	 * @access  public
	 * @param   string  $key  Cache key
	 * @return  mixed
	 */

	public function read($key)
	{
		return $this->memcache->get("{$this->identifier}_{$key}");
	}

	/**
	 * Delete a variable from the cache.
	 *
	 * @access  public
	 * @param   string   $key  Cache key
	 * @return  boolean
	 */

	public function delete($key)
	{
		return $this->memcache->delete("{$this->identifier}_{$key}", 0);
	}

	/**
	 * Clears the user cache.
	 *
	 * @access  public
	 * @return  boolean
	 */

	public function clear()
	{
		return $this->memcache->flush();
	}
}

/** -------------------- End of file --------------------**/