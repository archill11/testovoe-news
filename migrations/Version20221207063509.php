<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221207063509 extends AbstractMigration {
  public function getDescription(): string {
    return '';
  }

  public function up(Schema $schema): void {
    // this up() migration is auto-generated, please modify it to your needs
    $this->addSql('DROP SEQUENCE book_id_seq CASCADE');
    $this->addSql('DROP SEQUENCE book_category_id_seq CASCADE');
    $this->addSql('DROP SEQUENCE subscriber_id_seq CASCADE');
    $this->addSql('CREATE SEQUENCE news_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
    $this->addSql('CREATE TABLE news (id INT NOT NULL, title VARCHAR(255) NOT NULL, announcement VARCHAR(255) NOT NULL, description VARCHAR(1500) NOT NULL, tags TEXT DEFAULT NULL, published_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
    $this->addSql('COMMENT ON COLUMN news.tags IS \'(DC2Type:simple_array)\'');
    $this->addSql('COMMENT ON COLUMN news.published_at IS \'(DC2Type:datetime_immutable)\'');
  }

  public function down(Schema $schema): void {
    // this down() migration is auto-generated, please modify it to your needs
    $this->addSql('CREATE SCHEMA heroku_ext');
    $this->addSql('CREATE SCHEMA public');
    $this->addSql('DROP SEQUENCE news_id_seq CASCADE');
    $this->addSql('CREATE SEQUENCE book_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
    $this->addSql('CREATE SEQUENCE book_category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
    $this->addSql('CREATE SEQUENCE subscriber_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
    $this->addSql('DROP TABLE news');
  }
}
