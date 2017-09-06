<?php

namespace Backoffice\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Zend\Authentication\Result;
use Zend\Uri\Uri;

class IndexController extends AbstractActionController {

    /**
     * Entity manager.
     * @var Doctrine\ORM\EntityManager 
     */
    private $entityManager;


    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }

    public function indexAction() {
        return new ViewModel();
    }

    /**
     * The "logout" action performs logout operation.
     */
    public function logoutAction() {
        $this->authManager->logout();

        return $this->redirect()->toRoute('login');
    }

}
