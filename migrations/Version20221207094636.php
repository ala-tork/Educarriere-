<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221207094636 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE score ADD moyenne_algo DOUBLE PRECISION DEFAULT NULL, ADD moyenne_math DOUBLE PRECISION DEFAULT NULL, ADD moyenne_bd DOUBLE PRECISION DEFAULT NULL, ADD moyenne_physique DOUBLE PRECISION DEFAULT NULL, ADD moyenne_tic DOUBLE PRECISION DEFAULT NULL, ADD moyenne_science DOUBLE PRECISION DEFAULT NULL, ADD moyenne_gestion DOUBLE PRECISION DEFAULT NULL, ADD moyenne_eco DOUBLE PRECISION DEFAULT NULL, ADD moyenne_histoir_geo DOUBLE PRECISION DEFAULT NULL, ADD moyenne_technique DOUBLE PRECISION DEFAULT NULL, ADD moyenne_phylo DOUBLE PRECISION DEFAULT NULL, ADD moyenne_arab DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE score DROP moyenne_algo, DROP moyenne_math, DROP moyenne_bd, DROP moyenne_physique, DROP moyenne_tic, DROP moyenne_science, DROP moyenne_gestion, DROP moyenne_eco, DROP moyenne_histoir_geo, DROP moyenne_technique, DROP moyenne_phylo, DROP moyenne_arab');
    }
}
