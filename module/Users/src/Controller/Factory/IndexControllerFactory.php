<?php

namespace Users\Controller\Factory;

use Interop\Container\ContainerInterface;
use Users\Controller\IndexController;
use Zend\ServiceManager\Factory\FactoryInterface;
use Users\Service\UserManager;
use Users\Service\AuthManager;
use Zend\Authentication\AuthenticationService;

/**
 * This is the factory for AuthController. Its purpose is to instantiate the controller
 * and inject dependencies into its constructor.
 */
class IndexControllerFactory implements FactoryInterface { 

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $entityManager = $container->get('doctrine.entitymanager.orm_default');        
        $userManager = $container->get(UserManager::class);
        $authManager = $container->get(AuthManager::class);
        $authService = $container->get(AuthenticationService::class);
        return new IndexController($entityManager, $authManager, $authService, $userManager);
    }

}
