<?php

namespace BookingApp; 

use Silex\Application as SilexApplication;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\TwigServiceProvider;

class Application extends SilexApplication 
{
	public function __construct(array $values = []) {
		parent::__construct($values);

		$this->configureServices();
		
		$this->configureControllers();
	}

	/**
     * Config app options and register services.
     */
    private function configureServices()
    {
        $this['debug'] = true;

        $this->register(new TwigServiceProvider(), [
            'twig.path' => __DIR__.'/../views',
        ]);


// Database configuration
        $this->register(new DoctrineServiceProvider(), [
            'db.options' => [
                'driver' => 'pdo_sqlite',
                'path' => __DIR__.'/../database/app.db',
            ],
        ]);
    } 

private function configureControllers()
    {
$this->get('/bookings/create', function() {
	return $this['twig']->render('base.html.twig');
});
}


} //klassi sulg