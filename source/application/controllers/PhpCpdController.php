<?php
/**
	ff aanpassing voor gitpush/pull test in jenkins
	edit 2
**/
class PhpCpdController extends Zend_Controller_Action 
{
    /**
     * index action fetches all available blogs from the database
     *
     * @return void
     */
    public function indexAction()
    {
        $blogModel = new Application_Model_DbTable_Blog();
        $this->view->blogs = $blogModel->fetchAll();
    }

    /**
     * Detail action fetches the blog by id
     *
     * @return void
     */
    public function detailAction()
    {
        $id = $this->getRequest()->getParam('id');

        $blogModel = new Application_Model_DbTable_Blog();
        $blog = $blogModel->find($id)
            ->current();
        
        if (null === $blog) {
            $this->_redirect('blog');
        }

        $this->view->blog = $blog;
    }

    /**
     * Saves an new blog to the database
     *
     * @return void
     */
    public function addAction()
    {
        $form = new Application_Form_Blog();
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            if ($form->isValid($data)) {
                $data = array(
                    'title' => $data['title'],
                    'text' => $data['text'],
                    'date_created' => new Zend_Db_Expr('NOW()'),
                );

                $blogModel = new Application_Model_DbTable_Blog();            
                $blogModel->save($data);

                $this->_redirect('blog');
            }
        }
        $this->view->form = $form;
    }
    /**
     * copy pasta van de methode hierboven
	 * met als hoofdreden het testen van phpcpd 
     *
     * @return void
     */
    public function addcpdAction()
    {
        $form = new Application_Form_Blog();
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            if ($form->isValid($data)) {
                $data = array(
                    'title' => $data['title'],
                    'text' => $data['text'],
                    'date_created' => new Zend_Db_Expr('NOW()'),
                );

                $blogModel = new Application_Model_DbTable_Blog();            
                $blogModel->save($data);

                $this->_redirect('blog');
            }
        }
        $this->view->form = $form;
    }


    /**
     * Edit an blog with the newly given user data
     * 
     * @return void
     */
    public function editAction()
    {
        $id = $this->getRequest()->getParam('id');

        $blogModel = new Application_Model_DbTable_Blog();
        $blog = $blogModel->find($id)
            ->current();

        if (null === $blog) {
            $this->_redirect('blog');
        }
        
        $form = new Application_Form_Blog();
        $form->populate($blog->toArray()); 

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            if ($form->isValid($data)) {
            
                $data = array(
                    'title' => $data['title'],
                    'text' => $data['text'],
                    'date_created' => new Zend_Db_Expr('NOW()'),
                );

                $blogModel->save($data, $id);

                $this->_redirect('blog');
            }
        }
        $this->view->form = $form;
    }
}
