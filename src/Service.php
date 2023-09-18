<?php

namespace JavascriptFrameworks\React;

/**
 *  Service Class
 *
 *  Use to facilitate all the vehicle operations.
 */
class Service
{
	/** @var object $factory an instance of Factory class */
	private $factory;

	/** @var object $provider an instance of Provider class */
	private $provider;

	/**
	 * @method Constructor
	 *
	 * @param object $factory	contains the object or instance of Factory object.
	 * @param object $provider	contains the object or instance of Provider object.
	 *
	 * @throws InvalidArgumentException if the Validator class is not loaded
	 */
	public function __construct(Factory $factory, Provider $provider)
	{
		// initialize provider and factory
		$this->setProvider($provider);
		$this->setFactory($factory);
	}

	/**
	 * @method setProvider get and assigned the provider object to the provider property
	 *
	 * @throws InvalidArgumentException if the parameter is not a Provider object
	 */
	private function setProvider(Provider $provider)
	{
		if (!$provider instanceof Provider) {
			throw new \InvalidArgumentException('Parameter for setProvider method does not appear a Provider object');
		}

		$this->provider = $provider;
	}

	/**
	 * @method setFactory get and assigned the factory object to the factory property
	 *
	 * @throws InvalidArgumentException if the parameter is not a Factory object
	 */
	private function setFactory(Factory $factory)
	{
		if (!$factory instanceof Factory) {
			throw new \InvalidArgumentException('Parameter for setFactory method does not appear a Factory object');
		}

		$this->factory = $factory;
	}

	/**
	 * Get the list of Car Make Name
	 *
	 * @return void
	 */
	public function getCarMakeList()
	{
		return $this->provider->findCarMakes();
	}
}
