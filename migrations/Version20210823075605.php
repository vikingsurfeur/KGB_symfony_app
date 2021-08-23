<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210823075605 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agent (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, date_of_birth DATETIME NOT NULL, agent_code INT NOT NULL, nationality VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP INDEX contact_code ON contact');
        $this->addSql('DROP INDEX hideout_code ON hideout');
        $this->addSql('DROP INDEX target_code ON target');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE agent');
        $this->addSql('CREATE UNIQUE INDEX contact_code ON contact (contact_code)');
        $this->addSql('CREATE UNIQUE INDEX hideout_code ON hideout (hideout_code)');
        $this->addSql('CREATE UNIQUE INDEX target_code ON target (target_code)');
    }
}
