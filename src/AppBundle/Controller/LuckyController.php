<?php

namespace AppBundle\Controller;

use AppBundle\Entity\RandomNumber;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number")
     */
    public function numberAction()
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }

    /**
     * @Route("/lucky/number/create/{number}")
     */
    public function createAction($number)
    {
        $randomNumber = new RandomNumber();
        $randomNumber->setNumber($number);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($randomNumber);
        $entityManager->flush();

        return new Response('Saved new product with id '.$randomNumber->getId());
    }
}