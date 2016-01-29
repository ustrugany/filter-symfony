<?php

namespace Ustrugany\FilterBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Ustrugany\FilterBundle\Form\SearcherForm;
use Ustrugany\FilterBundle\Model\DeveloperIdFilter;
use Ustrugany\FilterBundle\Model\FilterCollection;

class FilterController extends Controller
{
    /**
     * @Route("/search")
     * @Template(template="UstruganyFilterBundle:Filter:search.html.twig")
     */
    public function searchAction(Request $request)
    {
        $form = $this->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            var_dump($this->getFilterModelCollection(), $form->getData());
        }

        return ['form' => $form->createView()];
    }

    /**
     * @return \Symfony\Component\Form\Form
     */
    private function getForm()
    {
        return $this->createForm(
            new SearcherForm(),
            $this->getFilterModelCollection(),
            ['method' => 'GET']
        );
    }

    /**
     * @return FilterCollection
     */
    private function getFilterModelCollection()
    {
        return new FilterCollection([
            'id' => new DeveloperIdFilter(2),
        ]);
    }

}
