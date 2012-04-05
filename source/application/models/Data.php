<?php

class Model_Data 
{
    /**
     * @var $_items array
     */
    protected $_items = array();

    /**
     * Add an item to the items array
     *
     * @return void
     */
    public function addItem($data)
    {
        $this->_items[] = $data;
    }

    /**
     * Clear all items from the array
     *
     * @return void
     */
    public function clearItems()
    {
        $this->_items = array();
    }

    /**
     * Returns the items param
     *
     * @return array
     */
    public function getItems()
    {
        return $this->_items;
    }
}
