<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106080044 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avoir_pour_tarif (id INT AUTO_INCREMENT NOT NULL, num_saison_id INT DEFAULT NULL, code_categorie_id INT DEFAULT NULL, prix_semaine DOUBLE PRECISION NOT NULL, INDEX IDX_F073D5108BBB3590 (num_saison_id), INDEX IDX_F073D51077DD1548 (code_categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, libelle_categorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE immeuble (id INT AUTO_INCREMENT NOT NULL, nom_immeuble VARCHAR(255) NOT NULL, rue_immeuble VARCHAR(255) NOT NULL, ville_immeuble VARCHAR(255) NOT NULL, cp_immeuble INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE saison (id INT AUTO_INCREMENT NOT NULL, libelle_saison VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avoir_pour_tarif ADD CONSTRAINT FK_F073D5108BBB3590 FOREIGN KEY (num_saison_id) REFERENCES saison (id)');
        $this->addSql('ALTER TABLE avoir_pour_tarif ADD CONSTRAINT FK_F073D51077DD1548 FOREIGN KEY (code_categorie_id) REFERENCES categorie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avoir_pour_tarif DROP FOREIGN KEY FK_F073D5108BBB3590');
        $this->addSql('ALTER TABLE avoir_pour_tarif DROP FOREIGN KEY FK_F073D51077DD1548');
        $this->addSql('DROP TABLE avoir_pour_tarif');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE immeuble');
        $this->addSql('DROP TABLE saison');
    }
}
