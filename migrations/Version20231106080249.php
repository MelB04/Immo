<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106080249 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avoir_pour_tarif DROP FOREIGN KEY FK_F073D51077DD1548');
        $this->addSql('ALTER TABLE avoir_pour_tarif DROP FOREIGN KEY FK_F073D5108BBB3590');
        $this->addSql('DROP INDEX IDX_F073D5108BBB3590 ON avoir_pour_tarif');
        $this->addSql('DROP INDEX IDX_F073D51077DD1548 ON avoir_pour_tarif');
        $this->addSql('ALTER TABLE avoir_pour_tarif DROP num_saison_id, DROP code_categorie_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avoir_pour_tarif ADD num_saison_id INT DEFAULT NULL, ADD code_categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE avoir_pour_tarif ADD CONSTRAINT FK_F073D51077DD1548 FOREIGN KEY (code_categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE avoir_pour_tarif ADD CONSTRAINT FK_F073D5108BBB3590 FOREIGN KEY (num_saison_id) REFERENCES saison (id)');
        $this->addSql('CREATE INDEX IDX_F073D5108BBB3590 ON avoir_pour_tarif (num_saison_id)');
        $this->addSql('CREATE INDEX IDX_F073D51077DD1548 ON avoir_pour_tarif (code_categorie_id)');
    }
}
