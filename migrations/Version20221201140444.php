<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221201140444 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE description ADD metier_a_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE description ADD CONSTRAINT FK_6DE440269A5F9778 FOREIGN KEY (metier_a_id) REFERENCES metier_a (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6DE440269A5F9778 ON description (metier_a_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE description DROP FOREIGN KEY FK_6DE440269A5F9778');
        $this->addSql('DROP INDEX UNIQ_6DE440269A5F9778 ON description');
        $this->addSql('ALTER TABLE description DROP metier_a_id');
    }
}
