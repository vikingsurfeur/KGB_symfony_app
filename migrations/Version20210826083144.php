<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210826083144 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agent (id INT AUTO_INCREMENT NOT NULL, mission_id INT DEFAULT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, date_of_birth DATETIME NOT NULL, agent_code INT NOT NULL, nationality VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_268B9C9DDA8E8A7B (agent_code), INDEX IDX_268B9C9DBE6CAE90 (mission_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, mission_id INT DEFAULT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, date_of_birth DATETIME NOT NULL, contact_code INT NOT NULL, nationality VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_4C62E6385FEAB267 (contact_code), INDEX IDX_4C62E638BE6CAE90 (mission_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hideout (id INT AUTO_INCREMENT NOT NULL, mission_id INT DEFAULT NULL, address VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, hideout_code INT NOT NULL, UNIQUE INDEX UNIQ_2C2FE1597BD0A117 (hideout_code), INDEX IDX_2C2FE159BE6CAE90 (mission_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mission (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, country VARCHAR(255) NOT NULL, mission_code INT NOT NULL, type VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, skill_requirement VARCHAR(255) NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, UNIQUE INDEX UNIQ_9067F23C5E579C97 (mission_code), INDEX IDX_9067F23CA76ED395 (user_id), FULLTEXT INDEX IDX_9067F23C2B36786B6DE44026 (title, description), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, agent_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_5E3DE4773414710B (agent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE target (id INT AUTO_INCREMENT NOT NULL, mission_id INT DEFAULT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, date_of_birth DATETIME NOT NULL, target_code INT NOT NULL, nationality VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_466F2FFCBA0D2629 (target_code), INDEX IDX_466F2FFCBE6CAE90 (mission_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649C808BA5A (last_name), UNIQUE INDEX UNIQ_8D93D649A9D1C132 (first_name), UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agent ADD CONSTRAINT FK_268B9C9DBE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E638BE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id)');
        $this->addSql('ALTER TABLE hideout ADD CONSTRAINT FK_2C2FE159BE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE4773414710B FOREIGN KEY (agent_id) REFERENCES agent (id)');
        $this->addSql('ALTER TABLE target ADD CONSTRAINT FK_466F2FFCBE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE4773414710B');
        $this->addSql('ALTER TABLE agent DROP FOREIGN KEY FK_268B9C9DBE6CAE90');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E638BE6CAE90');
        $this->addSql('ALTER TABLE hideout DROP FOREIGN KEY FK_2C2FE159BE6CAE90');
        $this->addSql('ALTER TABLE target DROP FOREIGN KEY FK_466F2FFCBE6CAE90');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23CA76ED395');
        $this->addSql('DROP TABLE agent');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE hideout');
        $this->addSql('DROP TABLE mission');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE target');
        $this->addSql('DROP TABLE user');
    }
}
