<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106081355 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appartement (id INT AUTO_INCREMENT NOT NULL, immeuble_id INT DEFAULT NULL, categorie_id INT DEFAULT NULL, superficie DOUBLE PRECISION NOT NULL, descriptif LONGTEXT NOT NULL, INDEX IDX_71A6BD8D63768E3F (immeuble_id), INDEX IDX_71A6BD8DBCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, date_reserv DATE NOT NULL, nom_client VARCHAR(255) NOT NULL, prenom_client VARCHAR(255) NOT NULL, rue_client VARCHAR(255) NOT NULL, cp_client INT NOT NULL, ville_client VARCHAR(255) NOT NULL, tel_client INT NOT NULL, num_cheque_compte INT NOT NULL, montant_acompte DOUBLE PRECISION NOT NULL, etat_reserv INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_semaine (reservation_id INT NOT NULL, semaine_id INT NOT NULL, INDEX IDX_1CD8306FB83297E7 (reservation_id), INDEX IDX_1CD8306F122EEC90 (semaine_id), PRIMARY KEY(reservation_id, semaine_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE semaine (id INT AUTO_INCREMENT NOT NULL, saison_id INT DEFAULT NULL, annee INT NOT NULL, date_debut DATE NOT NULL, INDEX IDX_7B4D8BEAF965414C (saison_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appartement ADD CONSTRAINT FK_71A6BD8D63768E3F FOREIGN KEY (immeuble_id) REFERENCES immeuble (id)');
        $this->addSql('ALTER TABLE appartement ADD CONSTRAINT FK_71A6BD8DBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE reservation_semaine ADD CONSTRAINT FK_1CD8306FB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_semaine ADD CONSTRAINT FK_1CD8306F122EEC90 FOREIGN KEY (semaine_id) REFERENCES semaine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE semaine ADD CONSTRAINT FK_7B4D8BEAF965414C FOREIGN KEY (saison_id) REFERENCES saison (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appartement DROP FOREIGN KEY FK_71A6BD8D63768E3F');
        $this->addSql('ALTER TABLE appartement DROP FOREIGN KEY FK_71A6BD8DBCF5E72D');
        $this->addSql('ALTER TABLE reservation_semaine DROP FOREIGN KEY FK_1CD8306FB83297E7');
        $this->addSql('ALTER TABLE reservation_semaine DROP FOREIGN KEY FK_1CD8306F122EEC90');
        $this->addSql('ALTER TABLE semaine DROP FOREIGN KEY FK_7B4D8BEAF965414C');
        $this->addSql('DROP TABLE appartement');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE reservation_semaine');
        $this->addSql('DROP TABLE semaine');
    }
}
