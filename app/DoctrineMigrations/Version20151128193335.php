<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20151128193335 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE te_validation_val CHANGE cla_statut val_status SMALLINT DEFAULT 2 NOT NULL COMMENT \'Statut de l entité validée (refusé, en attente, accepté)\', CHANGE new_creation val_creation DATETIME NOT NULL COMMENT \'Creation date\', CHANGE new_update val_update DATETIME DEFAULT NULL COMMENT \'Update date\'');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE te_validation_val CHANGE val_status cla_statut SMALLINT DEFAULT 2 NOT NULL COMMENT \'Statut de l entité validée (refusé, en attente, accepté)\', CHANGE val_creation new_creation DATETIME NOT NULL COMMENT \'Creation date\', CHANGE val_update new_update DATETIME DEFAULT NULL COMMENT \'Update date\'');
    }
}
