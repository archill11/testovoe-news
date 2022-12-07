<?php

namespace App\Controller;

use App\Service\NewsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class NewsController extends AbstractController {
  public function __construct(private NewsService $newsService) {} // инжектируем сервис в контроллер

/**
 * Здесь я ожидаю что ко мне в теле запроса придет объект следующего вида
 * {
 *  "title": "title news",
 *  "announcement": "news announcement",
 *  "description": "news description",
 *  "tags": ["tag1", "tag2", 1, 2]
 * }
 */
  #[Route(path: '/create', methods: ['POST'])]
  public function createNews(Request $request) {

    $post_data = json_decode($request->getContent(), true); 

    $this->newsService->create($post_data);

    return $this->json("news successfully created");
  }


  /**
   * Здесь я ожидаю что запрос будет следующего вида 
   * http://localhost:8000/delete?id=5
   */
  #[Route(path: '/delete', methods: ['GET'])]
  public function deleteNews(Request $request) {

    $newsId = $request->query->get('id');

    $this->newsService->delete($newsId);

    return $this->json("news successfully deleted");
  }


  /**
   * Здесь я ожидаю что запрос будет следующего вида 
   * http://localhost:8000/news?id=2
   */
  #[Route(path: '/news', methods: ['GET'])]
  public function showNews(Request $request) {

    $newsId = $request->query->get('id');

    $news = $this->newsService->show($newsId);

    return $this->render('NewsTemplate.html.twig', [
      'title' => $news->getTitle(),
      'announcement' => $news->getAnnouncement(),
      'description' => $news->getDescription(),
      'tags' => implode(", ", ($news->getTags()))
    ]);
  }

}
