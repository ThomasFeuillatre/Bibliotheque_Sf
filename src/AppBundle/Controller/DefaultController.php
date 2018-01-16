<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Borrow;
use AppBundle\Entity\Reader;
use AppBundle\Form\BookType;
use AppBundle\Form\BorrowType;
use AppBundle\Form\ReaderType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $repositoryBook = $this->getDoctrine()->getRepository("AppBundle:Book");
        $listBook = $repositoryBook->findAll();

        $repositoryReader = $this->getDoctrine()->getRepository("AppBundle:Reader");
        $listReader = $repositoryReader->findAll();
        $listAboToday = $repositoryReader->getListAboToday();
        $repositoryBorrow = $this->getDoctrine()->getRepository("AppBundle:Borrow");
        $listBorrow = $repositoryBorrow->findAll();

        return $this->render("default/index.html.twig",array('listBook' => $listBook, 'listReader' => $listReader, 'listBorrow' => $listBorrow, 'listAbo' => $listAboToday));
    }


    /**
     * @Route("/AjoutLecteur/{id}", name="addReader")
     */
    public function addReader(Request $request, $id = null)
    {
        $em = $this->getDoctrine()->getManager();
        $reader = new Reader;

        if($id)
        {
            $repositoryJeu = $this->getDoctrine()->getRepository(Reader::class);
            $reader = $repositoryJeu->find($id);
        }

        $form = $this->createForm(ReaderType::class, $reader);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($reader);
            $em->flush();
            return $this->redirect($this->generateUrl('homepage'));
        }

        return $this->render("default/addReader.html.twig", array(
            'form' => $form->createView(),
            'reader' => $reader
        ));
    }
    /**
     * @Route("/AjoutLivre", name="addBook")
     */
    public function addBook(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(BookType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($form->getData());
            $em->flush();
            return $this->redirect($this->generateUrl('homepage'));
        }
        return $this->render("default/addBook.html.twig",array('form' => $form->createView()));
    }

    /**
     * @Route("/Emprunt", name="borrowManager")
     */
    public function borrowManager(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(BorrowType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em->persist($form->getData());
            $em->flush();
            return $this->redirect($this->generateUrl('homepage'));
        }
        return $this->render("default/borrowManager.html.twig", array('form' => $form->createView()));
    }

    /**
     * @Route("/Rendu/{id}", name="rendu")
     */
    public function rendu(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $repositoryBorrow = $this->getDoctrine()->getRepository(Borrow::class);
        $borrow = $repositoryBorrow->find($id);
        $borrow->setStatut(1);
        $em->persist($borrow);
        $em->flush();
        return $this->redirectToRoute('homepage');
    }

    /**
     * @Route("/Prolonger/{id}", name="prolong")
     * @param Request $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function prolong(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $repositoryBorrow = $this->getDoctrine()->getRepository(Borrow::class);
        $borrow = $repositoryBorrow->find($id);
        $dateDeadline = new \DateTime($borrow->getDeadline());
        $dateDeadline->add(new \DateInterval('P10D'));
        //$dateDeadline = $dateDeadline->format('Y-m-d');
        $borrow->setDeadline($dateDeadline);
        $em->persist($borrow);
        $em->flush();
        return $this->redirectToRoute('homepage');
    }

     /**
      * @Route("/detailLecteur/{id}", name="detailReader")
      */
     public function detailReader(Request $request, $id)
     {
         $repositoryReader = $this->getDoctrine()->getRepository(Reader::class);
         $reader = $repositoryReader->find($id);

         return $this->render("default/detailReader.html.twig",array('reader' => $reader));
     }
}
