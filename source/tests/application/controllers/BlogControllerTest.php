<?php

class BlogControllerTest extends ControllerTestCase 
{

    /**
     * Checks if the index page can be loaded
     *
     * @return void
     */
    public function testIndexAction()
    {
        $this->disPatch('/blog/index/');
        $this->assertResponseCode(200);
    }

    /**
     * does an request to the detail action
     * checks if the code 200 is returned
     *
     * @return void
     */
    public function testDetailAction()
    {
        $this->getRequest()
            ->setParams(array('id' => '1'))
            ->setMethod('GET');
        $this->disPatch('/blog/detail/');

        $this->assertResponseCode(200);
    }     

    /**
     * Tests if the user gets redirected when the detail page does not exist
     *
     * @return void
     */
    public function testRedirectWhenDetailNotExists()
    {
        $this->getRequest()
            ->setParams(array('id' => '100213'))
            ->setMethod('GET');
        $this->disPatch('/blog/detail/');

        $this->assertEquals($this->getResponse()->getBody(), '');
    }

    /**
     * Tests if a form submit can be made with valid data
     *
     * @return void
     */
    public function testAddActionPostValidValues()
    {
        $this->getRequest()->setMethod('POST'); 
        $this->getRequest()
            ->setPost(array(
                'title' => 'test',
                'text' => 'text',
                'date_created' => new Zend_Db_Expr('NOW()')
            ));
        $this->disPatch('/blog/add/');

        $this->assertEquals($this->getResponse()->getBody(), '');
    }

    /**
     * Test if the form actually fails on invalid data
     *
     * @return void
     */
    public function testAddActionPostInvalidValues()
    {
        $this->getRequest()->setMethod('POST'); 
        $this->getRequest()
            ->setPost(array(
                'blaat' => 'test',
                'blaat' => 'text',
                'blaat' => new Zend_Db_Expr('NOW()')
            ));
        $this->disPatch('/blog/add/');

        $this->assertQuery('h1', 'Blog toevoegen'); 
    }

    /**
     * Test if the redirect works if the id is incorrect
     * 
     * @return void
     */
    public function testEditActionRedirectWhenNotExists()
    {
        $this->getRequest()
            ->setParams(array('id' => '100213'))
            ->setMethod('GET');
        $this->disPatch('/blog/edit/');

        $this->assertEquals($this->getResponse()->getBody(), '');
    }

    /**
     * Tests if the user can edit an blog item
     *
     * @return void
     */
    public function testEditActionPostValidValues()
    {
        $this->getRequest()
            ->setParams(array('id' => '1'))
            ->setMethod('GET');
        $this->disPatch('/blog/edit/');

        $this->getRequest()->setMethod('POST'); 
        $this->getRequest()
            ->setPost(array(
                'title' => 'test',
                'text' => 'text',
                'date_created' => new Zend_Db_Expr('NOW()')
            ));
        $this->disPatch('/blog/edit/');

        $this->assertQuery('h1', 'Blog aanpassen');  
    }

    /**
     * Test if the user can't enter empty or wrong values
     *
     * @return void
     */
    public function testEditActionPostInvalidValues()
    {
        $this->getRequest()->setMethod('GET'); 
        $this->getRequest()
            ->setParams(array('id' => '1'));

        $this->disPatch('/blog/edit/');

        $this->getRequest()->setMethod('POST');
        $this->getRequest()
            ->setPost(array(
                'bla' => '',
                'text' => 'this text was edited by phpunit',
                'date_created' => new Zend_Db_Expr('NOW()')
            ));
        $this->disPatch('/blog/edit/');

        $this->assertQuery('h1', 'Blog toevoegen');  
    }
}
