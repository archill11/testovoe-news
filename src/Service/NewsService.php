<?php

namespace App\Service;

use App\Entity\News;
use App\Repository\NewsRepository;


class NewsService {
  public function __construct(private NewsRepository $subscriberRepository) {}

  public function create($post_data): void {
    $news = new News(
      $post_data['title'],
      $post_data['announcement'],
      $post_data['description'],
      $post_data['tags']
    );
    $this->subscriberRepository->save($news);
  }

  public function delete($id): void {
    $news = $this->subscriberRepository->findById($id);
    $this->subscriberRepository->remove($news);
  }

  public function show($id): News {
    $news = $this->subscriberRepository->findById($id);
    return $news;
  }
}
