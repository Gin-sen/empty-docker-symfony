<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210204145746 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE file (id INT AUTO_INCREMENT NOT NULL, language_id INT NOT NULL, path VARCHAR(255) NOT NULL, is_original TINYINT(1) NOT NULL, INDEX IDX_8C9F361082F1BAF4 (language_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, original_file_id INT NOT NULL, owner_id INT NOT NULL, name VARCHAR(255) NOT NULL, original_author VARCHAR(255) DEFAULT NULL, original_language VARCHAR(255) NOT NULL, INDEX IDX_2FB3D0EE154BD79B (original_file_id), INDEX IDX_2FB3D0EE7E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_file (project_id INT NOT NULL, file_id INT NOT NULL, INDEX IDX_B50EFE08166D1F9C (project_id), INDEX IDX_B50EFE0893CB796C (file_id), PRIMARY KEY(project_id, file_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F361082F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE154BD79B FOREIGN KEY (original_file_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE7E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE project_file ADD CONSTRAINT FK_B50EFE08166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_file ADD CONSTRAINT FK_B50EFE0893CB796C FOREIGN KEY (file_id) REFERENCES file (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE project_file DROP FOREIGN KEY FK_B50EFE0893CB796C');
        $this->addSql('ALTER TABLE project_file DROP FOREIGN KEY FK_B50EFE08166D1F9C');
        $this->addSql('DROP TABLE file');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE project_file');
    }
}
