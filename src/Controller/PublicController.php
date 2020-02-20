<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Page;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class PublicController extends AbstractController
{
    /**
     * @Route("/", name="public")
     */
    public function index()
    {
        return $this->render('public/index.html.twig', [
            'controller_name' => 'PublicController',
        ]);
    }

    /**
     * @Route("/contact", name="public_contact")
     */
    public function contact()
    {
        return $this->render('public/contact.html.twig', [
            'controller_name' => 'PublicController',
        ]);
    }

    /**
     * @Route("/mentions_megales", name="public_mentions")
     */
    public function mentions()
    {
        return $this->render('public/mentions.html.twig', [
            'controller_name' => 'PublicController',
        ]);
    }

    /**
     * @Route("/public/menu", name="public_menu")
     */
    public function menu()
    {
        $pages = $this->getDoctrine()
            ->getRepository(Page::class)
            ->isMenu();

        return $this->render('public/menu.html.twig',
            ['pages'=> $pages]
        );
    }

    /**
     * @Route("/public/{slug}", name="page_show_public", methods={"GET"})
     */
    public function show2(Page $page): Response
    {
        return $this->render('public/show2.html.twig', [
            'page' => $page,
        ]);
    }

    /**
     * @Route("/public/page/articles/{page}", name="public_page_articles_list", methods={"GET"})
     */
    public function List_articles_page($page): Response
    {
        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->listArticles($page);

        return $this->render('public/articles.html.twig', [
            'articles' => $articles,
        ]);
    }
}
