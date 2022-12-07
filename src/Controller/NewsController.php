<?php

namespace App\Controller;

use App\Entity\News;
use App\Service\NewsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class NewsController extends AbstractController {
  public function __construct(private NewsService $newsService) {}


  #[Route(path: '/create', methods: ['POST'])]
  public function createNews(Request $request) {

    $post_data = json_decode($request->getContent(), true);


    $this->newsService->create($post_data);

    return $this->json("sucсess");
  }
}
