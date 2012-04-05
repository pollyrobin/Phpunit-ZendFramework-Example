<?php
/**
 * Require the model which needs testing
 */
require_once APPLICATION_PATH .'/models/Data.php';

class Model_DataTest extends ControllerTestCase
{
    /**
     * @var Model_Data
     */
    protected $_data;

    /**
     * Set up creates an instance of the model which needs to be tested
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->_data = new Model_Data();
    }

    /**
     * Adds an item to the model checks if the item exist
     * 
     * @return void
     */
    public function testcanAddItem()
    {
        $this->_data->addItem('test');

        $items = $this->_data->getItems();
        $this->assertEquals($items[0], 'test');
    }

    /**
     * Checks if the clear functionality of this model works
     *
     * @return void
     */
    public function testcanClearItems()
    {
        $this->_data->addItem('test');
        $this->_data->clearItems();
        $this->assertEquals(count($this->_data->getItems()), 0);
    }
}
