<?php

namespace MyBlog\Form;

use Zend\Form\Form;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;



/**
 * Description of BlogPostForm
 *
 * @author ecofreeon
 */
class BlogPostForm extends Form
{

    public function __construct($name = null)
    {
        var_dump("Все плохо");
        $this->setInputFilter(new \MyBlog\Form\BlogPostInputFilter());
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
