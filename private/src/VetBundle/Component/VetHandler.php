<?php
namespace VetBundle\Component;


class VetHandler
{

    public function formAnalyse($objet, $request, $analyse)
    {
        $form = $this->formFactory->create(($analyse.Type::class), $objet);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $this->em->persist($objet);
                $this->em->flush();
            } else {
                $request->getSession()->getFlashBag()->add('error', "formBuilder Create invalid");
            }
        }

        return $form;
    }

}