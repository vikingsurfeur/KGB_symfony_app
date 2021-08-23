<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210823095706 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_880E0D768B8E8428 ON admin');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_880E0D76E7927C74 ON admin (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_268B9C9DDA8E8A7B ON agent (agent_code)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4C62E6385FEAB267 ON contact (contact_code)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2C2FE1597BD0A117 ON hideout (hideout_code)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9067F23C5E579C97 ON mission (mission_code)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_466F2FFCBA0D2629 ON target (target_code)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_880E0D76E7927C74 ON admin');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_880E0D768B8E8428 ON admin (created_at)');
        $this->addSql('DROP INDEX UNIQ_268B9C9DDA8E8A7B ON agent');
        $this->addSql('DROP INDEX UNIQ_4C62E6385FEAB267 ON contact');
        $this->addSql('DROP INDEX UNIQ_2C2FE1597BD0A117 ON hideout');
        $this->addSql('DROP INDEX UNIQ_9067F23C5E579C97 ON mission');
        $this->addSql('DROP INDEX UNIQ_466F2FFCBA0D2629 ON target');
    }
}
