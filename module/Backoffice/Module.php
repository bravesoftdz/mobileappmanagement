<?php

namespace Backoffice;

use Zend\Mvc\MvcEvent;

class Module {

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/', __NAMESPACE__
                // ^-- that should be a DOT .
                ),
            ),
        );
    }

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function onBootstrap(MvcEvent $e) {
        $eventManager = $e->getApplication()->getEventManager();
        $eventManager->getSharedManager()->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e) {
            $controller = $e->getTarget();
            $controllerClass = get_class($controller);
            $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
            $config = $e->getApplication()->getServiceManager()->get('config');
            if (isset($config['module_layouts'][$moduleNamespace])) {
                die(__DIR__.'view/layout/'.$config['module_layouts'][$moduleNamespace]);
                $controller->layout(__DIR__.'view/layout/'.$config['module_layouts'][$moduleNamespace]);
            }
        }, 100);
    }

}
