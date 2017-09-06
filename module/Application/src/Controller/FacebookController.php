<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class FacebookController extends AbstractActionController {

    /**
     * Entity manager.
     * @var Doctrine\ORM\EntityManager
     */
    private $entityManager;

    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }

    public function indexAction() {

        $UserEntity = $this->entityManager->getRepository(\Application\Entity\User::class);
        $UserData = $UserEntity->findAll();

        return new ViewModel(["users" => $UserData]);
    }

    public function AuthAction() {
        $id = $this->params()->fromPost("id");
        $name = $this->params()->fromPost("name");
        $accessToken = $this->params()->fromPost("atoken");
        $UserEntity = $this->entityManager->getRepository(\Application\Entity\User::class);
        $UserEntity->setEmail();
        $UserEntity->setFullName($name);
        return new JsonModel([$id, $name, $accessToken]);
    }

    public function callbackAction() {
        //$ContestsEntity = $this->entityManager->getRepository(\Application\Entity\Contests::class);
        $query = $this->entityManager->createQuery("SELECT t FROM \Application\Entity\Contests t where t.enddate > :today")->setParameter('today', new \DateTime());
        $ContestsData = $query->getResult();
        return new JsonModel($ContestsData);
    }

    public function ppolicyAction() {
        return new ViewModel();
    }
    
    public function tserviceAction() {
        return new ViewModel();
    }

}
