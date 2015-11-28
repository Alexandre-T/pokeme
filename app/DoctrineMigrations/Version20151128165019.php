<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20151128165019 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE te_vote_vot ADD vot_ip_updater VARCHAR(45) NOT NULL COMMENT \'IP du voteur en cas de modification\', CHANGE vot_ip vot_ip_creator VARCHAR(45) NOT NULL COMMENT \'IP du voteur\'');
        $this->addSql('CREATE INDEX i3_vote ON te_vote_vot (vot_ip_creator, vot_creation)');
        $this->addSql('ALTER TABLE te_site_sit ADD sit_created_ip VARCHAR(45) NOT NULL COMMENT \'IP de creation\', ADD sit_updated_ip VARCHAR(45) NOT NULL COMMENT \'IP de modification\'');
        $this->addSql('ALTER TABLE te_annuaire_ann ADD sit_created_ip VARCHAR(45) NOT NULL COMMENT \'IP de creation\', ADD sit_updated_ip VARCHAR(45) NOT NULL COMMENT \'IP de modification\', ADD slug_url VARCHAR(128) NOT NULL, ADD slug_name VARCHAR(128) NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE te_annuaire_ann DROP sit_created_ip, DROP sit_updated_ip, DROP slug_url, DROP slug_name');
        $this->addSql('ALTER TABLE te_site_sit DROP sit_created_ip, DROP sit_updated_ip');
        $this->addSql('DROP INDEX i3_vote ON te_vote_vot');
        $this->addSql('ALTER TABLE te_vote_vot DROP vot_ip_updater, CHANGE vot_ip_creator vot_ip VARCHAR(45) NOT NULL COLLATE utf8_unicode_ci COMMENT \'IP du voteur\'');
    }
}
