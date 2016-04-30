<?php
namespace OdigoApiBundle\Factory\Actions;

use OdigoApiBundle\Factory\AbstractFactory;
use OdigoApiBundle\Entity\Actions\CreateAgentStruct;

/**
 * Class CreateAgentStructFactory
 * @package OdigoApiBundle\Factory\Actions
 */
class CreateAgentStructFactory extends AbstractFactory
{
    /**
     * @param $createAgentStruct
     * @return CreateAgentStruct
     */
    public function createFromEntity($createAgentStruct)
    {
        $createAgentStruct = new CreateAgentStruct(
            $createAgentStruct['wsLogin'],
            $createAgentStruct['wsPassword'],
            $createAgentStruct['userBean']
        );

        return $createAgentStruct;
    }
}