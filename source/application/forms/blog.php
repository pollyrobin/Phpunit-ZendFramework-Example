<?php 

class Application_Form_Blog extends Zend_Form 
{
    public function init()
    {
        $title = new Zend_Form_Element_Text('title');
        $title->setRequired(true)
            ->setLabel('Titel');

        $text = new Zend_Form_Element_Textarea('text');
        $text->setRequired(true)
            ->setLabel('text');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Opslaan');
        
        $this->addElements(array(
            $title,
            $text,
            $submit
        ));
    }    
}
