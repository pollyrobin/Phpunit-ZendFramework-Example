<?php

class Application_Model_DbTable_Blog extends Zend_Db_Table_Abstract
{
    public $_name = 'blog';    

    /**
     * Saves or inserts an blog
     *
     * @param array $data
     *
     * @return boolean
     */
    public function save($data, $id = null)
    {
        if ($id === null) {
            $this->insert($data);
        }

        $where = $this->getAdapter()->quoteInto('id = ?', $id);
        $this->update($data, $where);
    }
}
