<?php

namespace App\Service;

use App\Entity\News;
use App\Exception\NewsNotFoundException;
use App\Repository\NewsRepository;


class NewsService {
  public function __construct(private NewsRepository $newsRepository) {}

  public function create($post_data): void {
    // создаю новость из данных которые пришли из запроса
    $news = new News(
      $post_data['title'],
      $post_data['announcement'],
      $post_data['description'],
      $post_data['tags']
    );
    $this->newsRepository->save($news);  // сохраняю новость в БД
  }

  public function delete($id): void {

    if (!$this->newsRepository->existsById($id)) {
      throw new NewsNotFoundException();
    }
    
    $news = $this->newsRepository->findById($id); // нахожу нужную новость по id 
    $this->newsRepository->remove($news); // удаляю найденую новость
  }

  public function show($id): News {

    if (!$this->newsRepository->existsById($id)) {
      throw new NewsNotFoundException();
    }

    $news = $this->newsRepository->findById($id); // нахожу нужную новость по id 
    return $news; // возвращаю найденую новость
  }
  
}
