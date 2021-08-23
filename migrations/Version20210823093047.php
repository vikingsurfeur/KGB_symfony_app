<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210823093047 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mission ADD admin_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23CDF6E65AD FOREIGN KEY (admin_id_id) REFERENCES admin (id)');
        $this->addSql('CREATE INDEX IDX_9067F23CDF6E65AD ON mission (admin_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23CDF6E65AD');
        $this->addSql('DROP INDEX IDX_9067F23CDF6E65AD ON mission');
        $this->addSql('ALTER TABLE mission DROP admin_id_id');
    }
}
