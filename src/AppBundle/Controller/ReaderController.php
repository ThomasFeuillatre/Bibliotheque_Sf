<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Reader;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ReaderController extends Controller
{
    /**
     * @Route("/lecteurs", name="thirdReaders")
     */
    public function get3FirstReader()
    {
        $em = $this->getDoctrine()->getManager();
        $readerRepo = $em->getRepository(Reader::class);
        $readers = $readerRepo->get3FirstReader();
        return $this->render('default/listReader.html.twig', array('readers' => $readers));
    }
}
