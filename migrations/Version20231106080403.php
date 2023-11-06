<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106080403 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avoir_pour_tarif ADD saison_id INT DEFAULT NULL, ADD categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE avoir_pour_tarif ADD CONSTRAINT FK_F073D510F965414C FOREIGN KEY (saison_id) REFERENCES saison (id)');
        $this->addSql('ALTER TABLE avoir_pour_tarif ADD CONSTRAINT FK_F073D510BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_F073D510F965414C ON avoir_pour_tarif (saison_id)');
        $this->addSql('CREATE INDEX IDX_F073D510BCF5E72D ON avoir_pour_tarif (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avoir_pour_tarif DROP FOREIGN KEY FK_F073D510F965414C');
        $this->addSql('ALTER TABLE avoir_pour_tarif DROP FOREIGN KEY FK_F073D510BCF5E72D');
        $this->addSql('DROP INDEX IDX_F073D510F965414C ON avoir_pour_tarif');
        $this->addSql('DROP INDEX IDX_F073D510BCF5E72D ON avoir_pour_tarif');
        $this->addSql('ALTER TABLE avoir_pour_tarif DROP saison_id, DROP categorie_id');
    }
}
