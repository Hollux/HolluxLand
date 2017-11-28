<?php
namespace AppBundle\Form\Handler;

use AppBundle\Entity\Forum;
use AppBundle\Form\ForumType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Form\FormFactoryInterface;
use Doctrine\ORM\EntityManager;

class ForumHandler
{

	protected $request;
	protected $form;
	protected $formFactory;
	protected $em;
	protected $options;


	public function __construct(RequestStack $requestStack, EntityManager $em, FormFactoryInterface $formFactory)
	{
		$this->request     = $requestStack->getCurrentRequest();
		$this->em          = $em;
		$this->formFactory = $formFactory;
	}


	public function process(Form $form = null, $options)
	{
		$this->options = $options;
		if(null === $form)
			$form = $this->formFactory->create(ForumType::class, new Forum());
		$this->form = $form;
		if('POST' == $this->request->getMethod()) {
			$this->form->handleRequest($this->request);
		}

		return $this;
	}

	public function isSuccess()
	{
		if($this->form->isValid()) {
			// Bind value with form
			$data = $this->form->getData();
			$data = $data->setAuthor($this->options['author']);
			$data = $data->setDate(new \DateTime());
			if($this->options['id'] != "") {
				$data = $data->addParent($this->options['forumPosts'][0]);
				$data = $data->setDepth($this->options['forumPosts'][0]->getDepth() + 1);
			}
			else {
				$data = $data->setDepth(0);
			}
			$this->em->persist($data);
			$this->em->flush();

			return true;
		}

		return false;
	}

	public function getForm()
	{
		return $this->form;
	}

}