<?php
namespace VetBundle\Command\Handler;


class VetCommandCreate
{
    const path = __DIR__ . '/../../';

    public function create($content)
    {
        if (isset($content->data['category'])) {
            $name = $content->data['category'];
        } else {
            $name = $content->data['analyse'];
        }

        //dump(ucfirst(self::path . 'Entity\\' . $name . '.php'));exit;

        //TODO FINIR CREATION DES FICHIERS

        file_put_contents(
            self::path . 'Entity\\' . ucfirst($name) . '.php', $content->data['entity']);
        file_put_contents(
            self::path . 'Repository\\' . ucfirst($name) . 'Repository.php', $content->data['repository']);
        file_put_contents(
            self::path . 'Form\\' . ucfirst($name) . 'Type.php', $content->data['form']);
        file_put_contents(
            self::path . 'Resources\\views\\Vet\\' . ucfirst($name) . '.html.twig', $content->data['twig']);
        file_put_contents(
            self::path . 'Resources\\views\\Vet\\' . ucfirst($name) . 'val.html.twig', $content->data['view']);


    }

}