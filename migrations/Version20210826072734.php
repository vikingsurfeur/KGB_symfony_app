<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210826072734 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agent ADD agent_hired_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE agent ADD CONSTRAINT FK_268B9C9D74AF5C44 FOREIGN KEY (agent_hired_id) REFERENCES mission (id)');
        $this->addSql('CREATE INDEX IDX_268B9C9D74AF5C44 ON agent (agent_hired_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agent DROP FOREIGN KEY FK_268B9C9D74AF5C44');
        $this->addSql('DROP INDEX IDX_268B9C9D74AF5C44 ON agent');
        $this->addSql('ALTER TABLE agent DROP agent_hired_id');
    }
}
