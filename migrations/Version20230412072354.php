<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230412072354 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movie ADD acteurs_id INT NOT NULL');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26F71A27AFC FOREIGN KEY (acteurs_id) REFERENCES acteur (id)');
        $this->addSql('CREATE INDEX IDX_1D5EF26F71A27AFC ON movie (acteurs_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movie DROP FOREIGN KEY FK_1D5EF26F71A27AFC');
        $this->addSql('DROP INDEX IDX_1D5EF26F71A27AFC ON movie');
        $this->addSql('ALTER TABLE movie DROP acteurs_id');
    }
}
