<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210823095454 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE UNIQUE INDEX UNIQ_880E0D7635C246D5 ON admin (password)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_880E0D768B8E8428 ON admin (created_at)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_880E0D7635C246D5 ON admin');
        $this->addSql('DROP INDEX UNIQ_880E0D768B8E8428 ON admin');
    }
}
