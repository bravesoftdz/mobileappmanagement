<?php

namespace Backoffice\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Zend\Authentication\Result;
use Zend\Uri\Uri;

class PagesController extends AbstractActionController {

    /**
     * Entity manager.
     * @var Doctrine\ORM\EntityManager 
     */
    private $entityManager;

    public function __construct($entityManager) {
        $this->entityManager = $entityManager;
    }

    public function pagesAction() {
        $PagesEntity = $this->entityManager->getRepository(\Backoffice\Entity\Pages::class);
        $pagesData = $PagesEntity->findAll();
        return new ViewModel(['pages' => $pagesData]);
    }

    public function pageAction() {
        $id = $this->params()->fromRoute("id");
        $PagesEntity = $this->entityManager->getRepository(\Backoffice\Entity\Pages::class);
        $LangsEntity = $this->entityManager->getRepository(\Backoffice\Entity\Langs::class);
        $LangsData = $LangsEntity->findAll();

        $op = $this->params()->fromPost('op', null);
        if ($op == "save") {
            foreach ($LangsData as $item) {
                $this->entityManager->createQuery("update \Backoffice\Entity\Pages p set p.title = '" . $this->params()->fromPost('title' . $item->getId(), null) . "',p.content='" . $this->params()->fromPost('page_content' . $item->getId(), null) . "' where p.group_id=" . $id . " and p.lang_id=" . $item->getId())->execute();
            }
        }



        $_pageData = [];
        $_DefaultPageData = [];
        foreach ($LangsData as $item) {//print_r($item);exit;
            $_pageData[$item->getId()] = $PagesEntity->findOneBy(['group_id' => $id, 'lang_id' => $item->getId()]);
            if ($item->getDefault() == 1)
                $_DefaultPageData = $PagesEntity->findOneBy(['group_id' => $id, 'lang_id' => $item->getId()]);
        }
        return new ViewModel(['page' => $_pageData, 'default' => $_DefaultPageData, 'langs' => $LangsData]);
    }

}
