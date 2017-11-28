<?php
namespace VetBundle\Command\Handler;

class VetCommandHandler
{
    protected $vetCommandEntity;
    protected $vetCommandRepository;
    protected $vetCommandForm;
    protected $vetCommandTwig;
    protected $vetCommandView;

    public function __construct(vetCommandEntity $vetCommandEntity,
                                VetCommandRepository $vetCommandRepository,
                                VetCommandForm $vetCommandForm,
                                VetCommandTwig $vetCommandTwig,
                                VetCommandView $vetCommandView)
    {
        $this->vetCommandEntity = $vetCommandEntity;
        $this->vetCommandRepository = $vetCommandRepository;
        $this->vetCommandForm = $vetCommandForm;
        $this->vetCommandTwig = $vetCommandTwig;
        $this->vetCommandView = $vetCommandView;
    }

    public function initiate($master, $anayse)
    {
        $master->data = ['entity' => '',
                    'repository' => '',
                    'form' => '',
                    'twig' => '',
                    'view' => '',
                    'analyse' => $anayse];
    }

    public function initiateCategory($content, $master, $category)
    {
        $content->data = ['entity' => '',
            'repository' => '',
            'form' => '',
            'twig' => '',
            'view' => '',
            'category' => $category,
            'master' => $master];

        $this->vetCommandEntity->liaison($content);
        $this->vetCommandRepository->liaison($content);
        $this->vetCommandForm->liaison($content);
        $this->vetCommandTwig->liaison($content);
        $this->vetCommandView->liaison($content);
    }

    public function addContent($content, $field, $fieldType, $lastLvl)
    {
        $this->vetCommandEntity->addContent($content, $field, $fieldType, $lastLvl);
        $this->vetCommandForm->addContent($content, $field, $fieldType, $lastLvl);
        $this->vetCommandTwig->addContent($content, $field, $fieldType, $lastLvl);
        $this->vetCommandView->addContent($content, $field, $fieldType, $lastLvl);
    }

    public function end($content)
    {
        $this->vetCommandEntity->end($content);
        $this->vetCommandRepository->end($content);
        $this->vetCommandForm->end($content);
        $this->vetCommandTwig->end($content);
        $this->vetCommandView->end($content);
    }

}