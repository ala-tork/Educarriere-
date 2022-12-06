<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221205203720 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE filiere (id INT AUTO_INCREMENT NOT NULL, filiere_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE university (id INT AUTO_INCREMENT NOT NULL, ville_id INT NOT NULL, university_name VARCHAR(255) NOT NULL, INDEX IDX_A07A85ECA73F0036 (ville_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE university_filiere (university_id INT NOT NULL, filiere_id INT NOT NULL, INDEX IDX_8E57F8A9309D1878 (university_id), INDEX IDX_8E57F8A9180AA129 (filiere_id), PRIMARY KEY(university_id, filiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE university ADD CONSTRAINT FK_A07A85ECA73F0036 FOREIGN KEY (ville_id) REFERENCES governorats (id)');
        $this->addSql('ALTER TABLE university_filiere ADD CONSTRAINT FK_8E57F8A9309D1878 FOREIGN KEY (university_id) REFERENCES university (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE university_filiere ADD CONSTRAINT FK_8E57F8A9180AA129 FOREIGN KEY (filiere_id) REFERENCES filiere (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE university DROP FOREIGN KEY FK_A07A85ECA73F0036');
        $this->addSql('ALTER TABLE university_filiere DROP FOREIGN KEY FK_8E57F8A9309D1878');
        $this->addSql('ALTER TABLE university_filiere DROP FOREIGN KEY FK_8E57F8A9180AA129');
        $this->addSql('DROP TABLE filiere');
        $this->addSql('DROP TABLE university');
        $this->addSql('DROP TABLE university_filiere');
    }
}
