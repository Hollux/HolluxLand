<?php
namespace VetBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use VetBundle\Component\AnabelArrays;
use Symfony\Component\Console\Input\ArrayInput;

class VetCommand extends ContainerAwareCommand
{
    const path = __DIR__ . '/../';

    protected $vetCommandHandler;


    protected function configure()
    {
        $this
            ->setName('createvetanalyses')
            ->setDescription('Create entity form and html for analyses');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->vetCommandHandler = $this->getContainer()->get('VetCommandHandler');
        $this->vetCommandCreate = $this->getContainer()->get('VetCommandCreate');

        $io = new SymfonyStyle($input, $output);

        // foreach de base
        // [all] as Avortement => base[]
        foreach (anabelArrays::All as $analyse => $infosAnalyse) {
        //Contenu de base
            //initialiser objet master
            $master = new \stdClass();

            $this->vetCommandHandler->initiate($master, $analyse);

            //base[] as base => brucella[]
            foreach ($infosAnalyse as $category => $detailAnalyse) {
                //sous categorie

                // initialise ou reinitialise objet content
                $content = new \stdClass();
                if (ucfirst($category) === 'Base') {
                    $category = ucfirst($category.$analyse);
                }
                //creation sous categorie
                $this->vetCommandHandler->initiateCategory($content, $master, $category);
                //brucella[] as brucella => key[]
                foreach ($detailAnalyse as $field => $details) {
                    //key[] as key => ['type', 'label', 'array']
                    foreach ($details as $fieldType => $lastLvl) {



                        $this->vetCommandHandler->addContent(
                            $content, $field, $fieldType, $lastLvl);
                    }
                }



                if ($category !== 'base') {
                    $this->vetCommandHandler->end($content);
                    $this->vetCommandCreate->create($content);
                    $master = $content->data['master'];
                } else {
                    $master = $content;
                }
            }
            $this->vetCommandHandler->end($master);
            $this->vetCommandCreate->create($master);
        }

        //info commande pour générer get/set
        $command = $this->getApplication()->find('d:g:entities');

        $arguments = array(
            'command' => 'd:g:entities',
            'name'  => 'VetBundle',
        );

        $greetInput = new ArrayInput($arguments);
        //execution commande pour get/set
        $command->run($greetInput, $output);


        $io->success('OK !');
    }
}