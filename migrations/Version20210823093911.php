<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210823093911 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skill ADD agent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE4773414710B FOREIGN KEY (agent_id) REFERENCES agent (id)');
        $this->addSql('CREATE INDEX IDX_5E3DE4773414710B ON skill (agent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE4773414710B');
        $this->addSql('DROP INDEX IDX_5E3DE4773414710B ON skill');
        $this->addSql('ALTER TABLE skill DROP agent_id');
    }
}
