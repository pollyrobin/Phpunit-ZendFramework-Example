<?php

class HelloworldController extends Zend_Controller_Action 
{
    /**
     * Simple indexaction which shows the get param in the view
     *
     * @return void
     */
    public function indexAction()
    {
        if ($this->getRequest()->getParam('hw')) {
            $this->view->helloworld = $this->getRequest()->getParam('hw');
        }
    }
}
