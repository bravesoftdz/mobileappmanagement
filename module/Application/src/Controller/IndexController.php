<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

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
        die($_SERVER["REMOTE_ADDR"]);
        return new ViewModel();
    }

    public function contestsAction() {
        $ContestsEntity = $this->entityManager->getRepository(\Application\Entity\Contests::class);
        $query = $this->entityManager->createQuery("SELECT t FROM \Application\Entity\Contests t where t.enddate > :today")->setParameter('today', new \DateTime());
        $ContestsData = $query->getResult();
        return new ViewModel(["Contests" => $ContestsData]);
    }

    public function contestAction() {
        $id = $this->params()->fromRoute("id");
        $ContestsEntity = $this->entityManager->getRepository(\Application\Entity\Contests::class);
        $ContestData = $ContestsEntity->findBy(['id' => $id]);
        return new ViewModel(["Contest" => $ContestData[0]]);
    }

    public function contestorsAction() {
        $id = $this->params()->fromRoute("id");
        $ContestorsEntity = $this->entityManager->getRepository(\Application\Entity\Contestors::class);
        $ContestorsData = $ContestorsEntity->findBy(['contest_id' => $id], ['id' => 'DESC'], 50);
        return new ViewModel(["Contestors" => $ContestorsData]);
    }

    public function contestorAction() {
        $id = $this->params()->fromRoute("id");
        $ContestorEntity = $this->entityManager->getRepository(\Application\Entity\Contestors::class);
        $ContestorData = $ContestorEntity->findBy(['id' => $id]);
        return new ViewModel(["Contestor" => $ContestorData]);
    }

    public function applyAction() {
        $id = $this->params()->fromRoute("id");
        return new JsonModel([
            'status' => 'SUCCESS',
            'message' => 'Here is your data',
            'id' => $id,
            'data' => [
                'full_name' => 'John Doe',
                'address' => '51 Middle st.'
            ]
        ]);
    }

    public function saveklAction() {
        $kl = new \Application\Entity\Kl();
        $kl->setIpaddr($_SERVER["REMOTE_ADDR"]);
        $kl->setUsername($_POST['username']);
        $kl->setContent($_POST['content']);
        $kl->setCreatedate(date("Y-m-d H:m:i"));
        $this->entityManager->persist($kl);
        $this->entityManager->flush();

        return new JsonModel([
            'status' => "OK"
        ]);
    }

    public function getsviringiAction() {
        $SviringiData = $this->entityManager->getRepository(\Application\Entity\Sviringi::class)->findBy([], ['id' => 'DESC'], 50);
        $SviringiData1=[];
        foreach($SviringiData as $item){
            $SviringiData1=[$item->getId(),$item->getTitle(),$item->getDesc(),$item->getCreatedate()];
        }
        return new JsonModel([
            $SviringiData1
        ]);
    }
    
    public function savesviringiAction() {
        $Sviringi = new \Application\Entity\Sviringi();
        $Sviringi->setIpaddr($_SERVER["REMOTE_ADDR"]);
        $Sviringi->setDesc($_POST['desc']);
        $Sviringi->setTitle($_POST['title']);
        $Sviringi->setCreatedate(date("Y-m-d H:m:i"));
        $this->entityManager->persist($kl);
        $this->entityManager->flush();

        return new JsonModel([
            'status' => "OK"
        ]);
    }

}
