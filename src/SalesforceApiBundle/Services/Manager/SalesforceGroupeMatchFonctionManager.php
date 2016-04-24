<?php
namespace SalesforceApiBundle\Services\Manager;

use SalesforceApiBundle\Entity\SalesforceGroupeMatchFonction;
use AppBundle\Services\Manager\AbstractManager;

/**
 * Class SalesforceGroupeMatchFonctionManager
 * @package SalesforceApiBundle\Services\Manager
 */
class SalesforceGroupeMatchFonctionManager extends AbstractManager
{
    /**
     * @param $itemToSet
     * @param $itemLoad
     * @return SalesforceGroupeMatchFonction
     */
    public function globalSetItem($itemToSet, $itemLoad)
    {
        $itemToSet->setFonctionId($itemLoad['fonctionId']);
        $itemToSet->setSalesforceGroupe($itemLoad['salesforceGroupe']);

        return $itemToSet;
    }

    /**
     * @param $itemLoad
     * @return mixed
     */
    public function createArray($itemLoad)
    {
        $itemToTransform = $this->getRepository()->findBy(array('fonctionId' => $itemLoad));
        $itemArray = [];
        foreach ($itemToTransform as $item) {
            $itemArray[] = $item->getSalesforceGroupe();
        }
        return $itemArray;
    }
}