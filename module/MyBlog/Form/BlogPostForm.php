<?php

namespace MyBlog\Form;
use Zend\Form\Form;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BlogPostForm
 *
 * @author ecofreeon
 */
class BlogPostForm extends Form
{

    public function __construct($name = null)
    {
        
          $form = new \MyBlog\Form\BlogPostForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

                $blogpost = new \MyBlog\Entity\BlogPost();

                $blogpost->exchangeArray($form->getData());

                $blogpost->setCreated(time());
                $blogpost->setUserId(0);

                $objectManager->persist($blogpost);
                $objectManager->flush();

                // Redirect to list of blogposts
                return $this->redirect()->toRoute('blog');
            }
        }
        return array('form' => $form);
    }

}
