<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221127145708 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE description (id INT AUTO_INCREMENT NOT NULL, description_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_6DE44026D9F966B (description_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE description ADD CONSTRAINT FK_6DE44026D9F966B FOREIGN KEY (description_id) REFERENCES metier_a (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE description DROP FOREIGN KEY FK_6DE44026D9F966B');
        $this->addSql('DROP TABLE description');
    }
}
