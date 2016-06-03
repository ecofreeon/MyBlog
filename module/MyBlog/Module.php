<?php

namespace MyBlog;

/**
 * Description of Module
 *
 * @author ecofreeon
 */
class Module
{
    
    public function getAutoloaderConfig()
    {
        var_dump("Все плохо");
        return array(
            
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                    var_dump(__DIR__ . '/src/' . __NAMESPACE__),
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

}
