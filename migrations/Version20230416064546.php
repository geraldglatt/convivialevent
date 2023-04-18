<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230416064546 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recipe ADD is_published TINYINT(1) NOT NULL, DROP state, CHANGE type type ENUM(\'entrée\', \'pièces cocktail\', \'plat principal\', \'dessert\'), CHANGE difficulty difficulty ENUM(\'facile\', \'moyen\', \'difficile\')');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recipe ADD state VARCHAR(255) NOT NULL, DROP is_published, CHANGE type type VARCHAR(255) DEFAULT NULL, CHANGE difficulty difficulty VARCHAR(255) DEFAULT NULL');
    }
}
