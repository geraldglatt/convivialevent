<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220527081213 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image ADD recipe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('CREATE INDEX IDX_C53D045F59D8A214 ON image (recipe_id)');
        $this->addSql('ALTER TABLE recipe_ingredient ADD recipe_id INT NOT NULL');
        $this->addSql('ALTER TABLE recipe_ingredient ADD CONSTRAINT FK_22D1FE1359D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('CREATE INDEX IDX_22D1FE1359D8A214 ON recipe_ingredient (recipe_id)');
        $this->addSql('ALTER TABLE recipe_step ADD recipe_id INT NOT NULL');
        $this->addSql('ALTER TABLE recipe_step ADD CONSTRAINT FK_3CA2A4E359D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id)');
        $this->addSql('CREATE INDEX IDX_3CA2A4E359D8A214 ON recipe_step (recipe_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F59D8A214');
        $this->addSql('DROP INDEX IDX_C53D045F59D8A214 ON image');
        $this->addSql('ALTER TABLE image DROP recipe_id');
        $this->addSql('ALTER TABLE recipe_ingredient DROP FOREIGN KEY FK_22D1FE1359D8A214');
        $this->addSql('DROP INDEX IDX_22D1FE1359D8A214 ON recipe_ingredient');
        $this->addSql('ALTER TABLE recipe_ingredient DROP recipe_id');
        $this->addSql('ALTER TABLE recipe_step DROP FOREIGN KEY FK_3CA2A4E359D8A214');
        $this->addSql('DROP INDEX IDX_3CA2A4E359D8A214 ON recipe_step');
        $this->addSql('ALTER TABLE recipe_step DROP recipe_id');
    }
}
