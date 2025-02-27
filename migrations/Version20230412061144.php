<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230412061144 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE page_pdf ADD position INT NOT NULL, ADD file VARCHAR(255) NOT NULL, ADD updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE recipe CHANGE type type ENUM(\'entrée\', \'pièces cocktail\', \'plat principal\', \'dessert\'), CHANGE difficulty difficulty ENUM(\'facile\', \'moyen\', \'difficile\')');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE page_pdf DROP position, DROP file, DROP updated_at');
        $this->addSql('ALTER TABLE recipe CHANGE type type VARCHAR(255) DEFAULT NULL, CHANGE difficulty difficulty VARCHAR(255) DEFAULT NULL');
    }
}
