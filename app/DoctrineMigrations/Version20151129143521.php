<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20151129143521 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE te_vote_vot DROP FOREIGN KEY FK_1FE60BA4A513A63E');
        $this->addSql('DROP INDEX IDX_1FE60BA4A513A63E ON te_vote_vot');
        $this->addSql('DROP INDEX i1_vote ON te_vote_vot');
        $this->addSql('ALTER TABLE te_vote_vot CHANGE classement_id annuaire_id INT UNSIGNED DEFAULT NULL COMMENT \'Identifiant de l annuaire\'');
        $this->addSql('ALTER TABLE te_vote_vot ADD CONSTRAINT FK_1FE60BA45132B86A FOREIGN KEY (annuaire_id) REFERENCES te_annuaire_ann (ann_id)');
        $this->addSql('CREATE INDEX IDX_1FE60BA45132B86A ON te_vote_vot (annuaire_id)');
        $this->addSql('CREATE INDEX i1_vote ON te_vote_vot (vot_creation, annuaire_id, site_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE te_vote_vot DROP FOREIGN KEY FK_1FE60BA45132B86A');
        $this->addSql('DROP INDEX IDX_1FE60BA45132B86A ON te_vote_vot');
        $this->addSql('DROP INDEX i1_vote ON te_vote_vot');
        $this->addSql('ALTER TABLE te_vote_vot CHANGE annuaire_id classement_id INT UNSIGNED DEFAULT NULL COMMENT \'Identifiant de l annuaire\'');
        $this->addSql('ALTER TABLE te_vote_vot ADD CONSTRAINT FK_1FE60BA4A513A63E FOREIGN KEY (classement_id) REFERENCES te_annuaire_ann (ann_id)');
        $this->addSql('CREATE INDEX IDX_1FE60BA4A513A63E ON te_vote_vot (classement_id)');
        $this->addSql('CREATE INDEX i1_vote ON te_vote_vot (vot_creation, classement_id, site_id)');
    }
}
