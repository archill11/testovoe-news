<?php

namespace App\Service;

use App\Entity\News;
use App\Repository\NewsRepository;


class NewsService {
  public function __construct(private NewsRepository $subscriberRepository) {}

  public function create($post_data): void {
    // создаю новость из данных которые пришли из запроса
    $news = new News(
      $post_data['title'],
      $post_data['announcement'],
      $post_data['description'],
      $post_data['tags']
    );
    $this->subscriberRepository->save($news);  // сохраняю новость в БД
  }

  public function delete($id): void {
    $news = $this->subscriberRepository->findById($id); // нахожу нужную новость по id 
    $this->subscriberRepository->remove($news); // удаляю найденую новость
  }

  public function show($id): News {
    $news = $this->subscriberRepository->findById($id); // нахожу нужную новость по id 
    return $news; // возвращаю найденую новость
  }
  
}
