<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211216143111 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lead (id INT AUTO_INCREMENT NOT NULL, civilite VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, date_reunion DATETIME DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, datetest DATETIME DEFAULT NULL, campus VARCHAR(255) NOT NULL, formation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
          $this->addSql('DROP TABLE lead');
         }
}
