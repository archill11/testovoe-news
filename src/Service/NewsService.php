<?php

namespace App\Service;

use App\Entity\News;
use App\Entity\Subscriber;
use App\Exception\SubscriberAlreadyExistsException;
use App\Model\SubscriberRequest;
use App\Repository\NewsRepository;
use App\Repository\SubscriberRepository;
use Monolog\Handler\FirePHPHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;

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
}
