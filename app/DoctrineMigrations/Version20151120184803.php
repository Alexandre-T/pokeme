<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20151120184803 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE te_classification_collection_cco (id INT AUTO_INCREMENT NOT NULL, context VARCHAR(255) DEFAULT NULL, media_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_CA82B5A1E25D857E (context), INDEX IDX_CA82B5A1EA9FDD75 (media_id), UNIQUE INDEX tag_collection (slug, context), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE te_classification_category_cca (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, context VARCHAR(255) DEFAULT NULL, media_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, position INT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_56940E58727ACA70 (parent_id), INDEX IDX_56940E58E25D857E (context), INDEX IDX_56940E58EA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE te_classification_tag_cta (id INT AUTO_INCREMENT NOT NULL, context VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, slug VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_9D65EF9BE25D857E (context), UNIQUE INDEX tag_context (slug, context), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE te_classification_context_ccn (id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE te_gallery_gal (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, context VARCHAR(64) NOT NULL, default_format VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE te_media_med (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, enabled TINYINT(1) NOT NULL, provider_name VARCHAR(255) NOT NULL, provider_status INT NOT NULL, provider_reference VARCHAR(255) NOT NULL, provider_metadata LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', width INT DEFAULT NULL, height INT DEFAULT NULL, length NUMERIC(10, 0) DEFAULT NULL, content_type VARCHAR(255) DEFAULT NULL, content_size INT DEFAULT NULL, copyright VARCHAR(255) DEFAULT NULL, author_name VARCHAR(255) DEFAULT NULL, context VARCHAR(64) DEFAULT NULL, cdn_is_flushable TINYINT(1) DEFAULT NULL, cdn_flush_identifier VARCHAR(64) DEFAULT NULL, cdn_flush_at DATETIME DEFAULT NULL, cdn_status INT DEFAULT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_754646CA12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE te_galleryhasmedia_ghm (id INT AUTO_INCREMENT NOT NULL, gallery_id INT DEFAULT NULL, media_id INT DEFAULT NULL, position INT NOT NULL, enabled TINYINT(1) NOT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_6DB54ABA4E7AF8F (gallery_id), INDEX IDX_6DB54ABAEA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE te_classification_collection_cco ADD CONSTRAINT FK_CA82B5A1E25D857E FOREIGN KEY (context) REFERENCES te_classification_context_ccn (id)');
        $this->addSql('ALTER TABLE te_classification_collection_cco ADD CONSTRAINT FK_CA82B5A1EA9FDD75 FOREIGN KEY (media_id) REFERENCES te_media_med (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE te_classification_category_cca ADD CONSTRAINT FK_56940E58727ACA70 FOREIGN KEY (parent_id) REFERENCES te_classification_category_cca (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE te_classification_category_cca ADD CONSTRAINT FK_56940E58E25D857E FOREIGN KEY (context) REFERENCES te_classification_context_ccn (id)');
        $this->addSql('ALTER TABLE te_classification_category_cca ADD CONSTRAINT FK_56940E58EA9FDD75 FOREIGN KEY (media_id) REFERENCES te_media_med (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE te_classification_tag_cta ADD CONSTRAINT FK_9D65EF9BE25D857E FOREIGN KEY (context) REFERENCES te_classification_context_ccn (id)');
        $this->addSql('ALTER TABLE te_media_med ADD CONSTRAINT FK_754646CA12469DE2 FOREIGN KEY (category_id) REFERENCES te_classification_category_cca (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE te_galleryhasmedia_ghm ADD CONSTRAINT FK_6DB54ABA4E7AF8F FOREIGN KEY (gallery_id) REFERENCES te_gallery_gal (id)');
        $this->addSql('ALTER TABLE te_galleryhasmedia_ghm ADD CONSTRAINT FK_6DB54ABAEA9FDD75 FOREIGN KEY (media_id) REFERENCES te_media_med (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE te_classification_category_cca DROP FOREIGN KEY FK_56940E58727ACA70');
        $this->addSql('ALTER TABLE te_media_med DROP FOREIGN KEY FK_754646CA12469DE2');
        $this->addSql('ALTER TABLE te_classification_collection_cco DROP FOREIGN KEY FK_CA82B5A1E25D857E');
        $this->addSql('ALTER TABLE te_classification_category_cca DROP FOREIGN KEY FK_56940E58E25D857E');
        $this->addSql('ALTER TABLE te_classification_tag_cta DROP FOREIGN KEY FK_9D65EF9BE25D857E');
        $this->addSql('ALTER TABLE te_galleryhasmedia_ghm DROP FOREIGN KEY FK_6DB54ABA4E7AF8F');
        $this->addSql('ALTER TABLE te_classification_collection_cco DROP FOREIGN KEY FK_CA82B5A1EA9FDD75');
        $this->addSql('ALTER TABLE te_classification_category_cca DROP FOREIGN KEY FK_56940E58EA9FDD75');
        $this->addSql('ALTER TABLE te_galleryhasmedia_ghm DROP FOREIGN KEY FK_6DB54ABAEA9FDD75');
        $this->addSql('DROP TABLE te_classification_collection_cco');
        $this->addSql('DROP TABLE te_classification_category_cca');
        $this->addSql('DROP TABLE te_classification_tag_cta');
        $this->addSql('DROP TABLE te_classification_context_ccn');
        $this->addSql('DROP TABLE te_gallery_gal');
        $this->addSql('DROP TABLE te_media_med');
        $this->addSql('DROP TABLE te_galleryhasmedia_ghm');
    }
}
