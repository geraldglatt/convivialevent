<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230109162127 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_880E0D76F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, full_name VARCHAR(50) NOT NULL, email VARCHAR(180) NOT NULL, phone VARCHAR(15) DEFAULT NULL, event_date DATETIME NOT NULL, adult_guest INT DEFAULT NULL, child_guest INT DEFAULT NULL, message LONGTEXT NOT NULL, brunch LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE home_block (id INT AUTO_INCREMENT NOT NULL, page_id INT NOT NULL, title VARCHAR(120) NOT NULL, file VARCHAR(255) NOT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', link VARCHAR(255) DEFAULT NULL, content LONGTEXT NOT NULL, position INT NOT NULL, INDEX IDX_88E16EB2C4663E4 (page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, recipe_id INT DEFAULT NULL, position INT NOT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', file VARCHAR(255) NOT NULL, INDEX IDX_C53D045F59D8A214 (recipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, page_id INT NOT NULL, title VARCHAR(255) NOT NULL, position INT NOT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', file VARCHAR(255) NOT NULL, INDEX IDX_E01FBE6AC4663E4 (page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(255) NOT NULL, title VARCHAR(120) NOT NULL, content LONGTEXT NOT NULL, meta_desc LONGTEXT NOT NULL, file VARCHAR(255) NOT NULL, updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page_pdf (id INT AUTO_INCREMENT NOT NULL, page_id INT NOT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_C24FD31DC4663E4 (page_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipe (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(60) NOT NULL, title VARCHAR(60) NOT NULL, nb_portion INT NOT NULL, type ENUM(\'entrée\', \'pièces cocktail\', \'plat principal\', \'dessert\'), difficulty ENUM(\'facile\', \'moyen\', \'difficile\'), time INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipe_ingredient (id INT AUTO_INCREMENT NOT NULL, recipe_id INT NOT NULL, name VARCHAR(100) NOT NULL, quantity INT NOT NULL, quantity_name VARCHAR(120) NOT NULL, INDEX IDX_22D1FE1359D8A214 (recipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recipe_step (id INT AUTO_INCREMENT NOT NULL, recipe_id INT NOT NULL, title VARCHAR(100) NOT NULL, content VARCHAR(255) NOT NULL, position INT NOT NULL, INDEX IDX_3CA2A4E359D8A214 (recipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE home_block ADD CONSTRAINT FK_88E16EB2C4663E4 FOREIGN KEY (page_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6AC4663E4 FOREIGN KEY (page_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE page_pdf ADD CONSTRAINT FK_C24FD31DC4663E4 FOREIGN KEY (page_id) REFERENCES page (id)');
        $this->addSql('ALTER TABLE recipe_ingredient ADD CONSTRAINT FK_22D1FE1359D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('ALTER TABLE recipe_step ADD CONSTRAINT FK_3CA2A4E359D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE home_block DROP FOREIGN KEY FK_88E16EB2C4663E4');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6AC4663E4');
        $this->addSql('ALTER TABLE page_pdf DROP FOREIGN KEY FK_C24FD31DC4663E4');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F59D8A214');
        $this->addSql('ALTER TABLE recipe_ingredient DROP FOREIGN KEY FK_22D1FE1359D8A214');
        $this->addSql('ALTER TABLE recipe_step DROP FOREIGN KEY FK_3CA2A4E359D8A214');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE home_block');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE page');
        $this->addSql('DROP TABLE page_pdf');
        $this->addSql('DROP TABLE recipe');
        $this->addSql('DROP TABLE recipe_ingredient');
        $this->addSql('DROP TABLE recipe_step');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
