<?php
/**
 * Require dependencies
 */
require_once 'Zend/Application.php';
require_once 'Zend/Test/PHPUnit/ControllerTestCase.php';

abstract class ControllerTestCase extends Zend_Test_PHPUnit_ControllerTestCase
{
	/**
	 * @var Zend_Application
	 */
	protected $application;

    /**
     * Set up the application so it is runnable
     * 
     * @return void
     */
    public function setUp()
    {
        $this->application = new Zend_Application(
            APPLICATION_ENV,
            APPLICATION_PATH . '/configs/application.ini'
        );

        $this->bootstrap = array($this, 'appBootstrap');
        parent::setUp();
    }

    /**
     * Bootstrap the application
     *
     * @return void
     */
    public function appBootstrap()
    {
        $this->application->bootstrap();
    }
}
