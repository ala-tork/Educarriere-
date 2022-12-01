<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221201161758 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment ADD metier_a_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C9A5F9778 FOREIGN KEY (metier_a_id) REFERENCES metier_a (id)');
        $this->addSql('CREATE INDEX IDX_9474526C9A5F9778 ON comment (metier_a_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C9A5F9778');
        $this->addSql('DROP INDEX IDX_9474526C9A5F9778 ON comment');
        $this->addSql('ALTER TABLE comment DROP metier_a_id');
    }
}
