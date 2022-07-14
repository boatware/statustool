<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220714005352 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE board (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, logo_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_58562B47A76ED395 (user_id), UNIQUE INDEX UNIQ_58562B47F98F144A (logo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE board_settings (id INT AUTO_INCREMENT NOT NULL, board_id INT NOT NULL, display_status_title TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_75B2A37CE7EC5785 (board_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, hex VARCHAR(6) NOT NULL, r INT NOT NULL, g INT NOT NULL, b INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE file (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, size INT NOT NULL, location VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, board_id INT NOT NULL, color_id INT NOT NULL, icon_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_7B00651CE7EC5785 (board_id), UNIQUE INDEX UNIQ_7B00651C7ADA1FB5 (color_id), UNIQUE INDEX UNIQ_7B00651C54B9D732 (icon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE board ADD CONSTRAINT FK_58562B47A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE board ADD CONSTRAINT FK_58562B47F98F144A FOREIGN KEY (logo_id) REFERENCES file (id)');
        $this->addSql('ALTER TABLE board_settings ADD CONSTRAINT FK_75B2A37CE7EC5785 FOREIGN KEY (board_id) REFERENCES board (id)');
        $this->addSql('ALTER TABLE status ADD CONSTRAINT FK_7B00651CE7EC5785 FOREIGN KEY (board_id) REFERENCES board (id)');
        $this->addSql('ALTER TABLE status ADD CONSTRAINT FK_7B00651C7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE status ADD CONSTRAINT FK_7B00651C54B9D732 FOREIGN KEY (icon_id) REFERENCES file (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE board_settings DROP FOREIGN KEY FK_75B2A37CE7EC5785');
        $this->addSql('ALTER TABLE status DROP FOREIGN KEY FK_7B00651CE7EC5785');
        $this->addSql('ALTER TABLE status DROP FOREIGN KEY FK_7B00651C7ADA1FB5');
        $this->addSql('ALTER TABLE board DROP FOREIGN KEY FK_58562B47F98F144A');
        $this->addSql('ALTER TABLE status DROP FOREIGN KEY FK_7B00651C54B9D732');
        $this->addSql('DROP TABLE board');
        $this->addSql('DROP TABLE board_settings');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE file');
        $this->addSql('DROP TABLE status');
    }
}
