<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20151126195022 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tj_site_tag_sta (site_id INT UNSIGNED NOT NULL COMMENT \'Identifiant du site\', tag_id INT NOT NULL, INDEX IDX_725C575FF6BD1646 (site_id), INDEX IDX_725C575FBAD26311 (tag_id), PRIMARY KEY(site_id, tag_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tj_annuaire_tag_ata (site_id INT UNSIGNED NOT NULL COMMENT \'Identifiant de l annuaire\', tag_id INT NOT NULL, INDEX IDX_41ACDB3DF6BD1646 (site_id), INDEX IDX_41ACDB3DBAD26311 (tag_id), PRIMARY KEY(site_id, tag_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tj_site_tag_sta ADD CONSTRAINT FK_725C575FF6BD1646 FOREIGN KEY (site_id) REFERENCES te_site_sit (sit_id)');
        $this->addSql('ALTER TABLE tj_site_tag_sta ADD CONSTRAINT FK_725C575FBAD26311 FOREIGN KEY (tag_id) REFERENCES te_classification_tag_cta (id)');
        $this->addSql('ALTER TABLE tj_annuaire_tag_ata ADD CONSTRAINT FK_41ACDB3DF6BD1646 FOREIGN KEY (site_id) REFERENCES te_annuaire_ann (ann_id)');
        $this->addSql('ALTER TABLE tj_annuaire_tag_ata ADD CONSTRAINT FK_41ACDB3DBAD26311 FOREIGN KEY (tag_id) REFERENCES te_classification_tag_cta (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE tj_site_tag_sta');
        $this->addSql('DROP TABLE tj_annuaire_tag_ata');
    }
}
