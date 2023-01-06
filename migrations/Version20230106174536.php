<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230106174536 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE home_block ADD image VARCHAR(60) DEFAULT NULL');
        $this->addSql('ALTER TABLE image ADD image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE page ADD image VARCHAR(60) DEFAULT NULL');
        $this->addSql('ALTER TABLE recipe CHANGE type type ENUM(\'entrée\', \'pièces cocktail\', \'plat principal\', \'dessert\'), CHANGE difficulty difficulty ENUM(\'facile\', \'moyen\', \'difficile\')');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE home_block DROP image');
        $this->addSql('ALTER TABLE image DROP image');
        $this->addSql('ALTER TABLE page DROP image');
        $this->addSql('ALTER TABLE recipe CHANGE type type VARCHAR(255) DEFAULT NULL, CHANGE difficulty difficulty VARCHAR(255) DEFAULT NULL');
    }
}
