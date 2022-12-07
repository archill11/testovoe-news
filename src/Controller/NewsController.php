<?php

namespace App\Controller;

use App\Service\NewsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends AbstractController {
  public function __construct(private NewsService $newsService) {} // инжектируем сервис в контроллер


  #[Route(path: '/create', methods: ['POST'])]
  public function createNews(Request $request) {

    $post_data = json_decode($request->getContent(), true);

    $this->newsService->create($post_data);

    return $this->json("sucсess");
  }


  #[Route(path: '/delete', methods: ['GET'])]
  public function deleteNews(Request $request) {

    $newsId = $request->query->get('id');

    $this->newsService->delete($newsId);

    return $this->json("news was sucсess removed");
  }


  #[Route(path: '/news', methods: ['GET'])]
  public function showNews(Request $request) {

    $newsId = $request->query->get('id');

    $news = $this->newsService->show($newsId);

    return new Response(
      '<html><body>
        <h1>'.$news->getTitle().'</h1>
        <h2>'.$news->getAnnouncement().'</h2>
        <h3>'.$news->getDescription().'</h3>
        <h4>'.implode(", ", ($news->getTags())).'</h4>
      </body></html>'
    );
  }

}
