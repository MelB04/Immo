<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106081558 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation ADD appartement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955E1729BBA FOREIGN KEY (appartement_id) REFERENCES appartement (id)');
        $this->addSql('CREATE INDEX IDX_42C84955E1729BBA ON reservation (appartement_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955E1729BBA');
        $this->addSql('DROP INDEX IDX_42C84955E1729BBA ON reservation');
        $this->addSql('ALTER TABLE reservation DROP appartement_id');
    }
}
