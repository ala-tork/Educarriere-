<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221201134315 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE metier_a ADD description_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE metier_a ADD CONSTRAINT FK_AFC8F8F0D9F966B FOREIGN KEY (description_id) REFERENCES description (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AFC8F8F0D9F966B ON metier_a (description_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE metier_a DROP FOREIGN KEY FK_AFC8F8F0D9F966B');
        $this->addSql('DROP INDEX UNIQ_AFC8F8F0D9F966B ON metier_a');
        $this->addSql('ALTER TABLE metier_a DROP description_id');
    }
}
