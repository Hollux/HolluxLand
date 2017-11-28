<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DataTableController extends Controller
{
	/**
	 * @Route("/categorieList", name="categorieList")
	 */
	public function indexAction()
	{
		return $this->render('AppBundle:DataTable:categorie.html.twig', []);
	}

	/**
	 * @Route("/paginate", name="categorie_paginate")
	 */
	public function paginateAction(Request $request)
	{
		$length     = $request->get('length');
		$length     = $length && ($length != -1) ? $length : 0;
		$start      = $request->get('start');
		$start      = $length ? ($start && ($start != -1) ? $start : 0) / $length : 0;
		$search     = $request->get('search');
		$filters    = ['query' => @$search['value']];
		$categories = $this->getDoctrine()->getRepository('AppBundle:Categorie')->search($filters, $start, $length);
		$output     = ['data' => [], 'recordsFiltered' => count($categories), 'recordsTotal' => count($categories)];
		foreach($categories as $categorie) {
			$output['data'][] = ['id'        => $categorie->getId(), 'name' => $categorie->getName(),
			                     'createdAt' => $categorie->getCreatedAt()->format('Y-m-d'),];
		}

		return new Response(json_encode($output), 200, ['Content-Type' => 'application/json']);
	}
}

