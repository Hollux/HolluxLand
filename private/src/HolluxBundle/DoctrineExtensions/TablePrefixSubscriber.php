<?php
namespace HolluxBundle\DoctrineExtensions;

use \Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use \Doctrine\Common\EventSubscriber;

class TablePrefixSubscriber implements EventSubscriber
{
    protected $prefix = '';

    public function __construct($prefix)
    {
        $this->prefix = (string) $prefix;
    }

    public function loadClassMetadata(LoadClassMetadataEventArgs $eventArgs)
    {
        $classMetadata = $eventArgs->getClassMetadata();

        if(stripos($classMetadata->getName(), "Alcyon") !== false)
        {
            if(stripos($this->prefix, "alcyon_") === false)
            {
                $this->prefix = $this->prefix."alcyon_";
            }
        }

        $classMetadata->setTableName($this->prefix . $classMetadata->getTableName());
        foreach ($classMetadata->getAssociationMappings() as $fieldName => $mapping) {
            if ($mapping['type'] == \Doctrine\ORM\Mapping\ClassMetadataInfo::MANY_TO_MANY
                && array_key_exists('name', $classMetadata->associationMappings[$fieldName]['joinTable']) ) {     // Check if "joinTable" exists, it can be null if this field is the reverse side of a ManyToMany relationship
                $mappedTableName = $classMetadata->associationMappings[$fieldName]['joinTable']['name'];
                $classMetadata->associationMappings[$fieldName]['joinTable']['name'] = $this->prefix . $mappedTableName;
            }
        }
    }

    public function getSubscribedEvents()
    {
        return array('loadClassMetadata');
    }
}