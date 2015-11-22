<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20151123184306 extends AbstractMigration
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
        $this->addSql('CREATE TABLE te_group_grp (id INT UNSIGNED AUTO_INCREMENT NOT NULL COMMENT \'Identifiant du groupe\', name VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_AF4B09735E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE te_user_usr (id INT UNSIGNED AUTO_INCREMENT NOT NULL COMMENT \'Identifiant de l utilisateur\', username VARCHAR(255) NOT NULL, username_canonical VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, email_canonical VARCHAR(255) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, locked TINYINT(1) NOT NULL, expired TINYINT(1) NOT NULL, expires_at DATETIME DEFAULT NULL, confirmation_token VARCHAR(255) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', credentials_expired TINYINT(1) NOT NULL, credentials_expire_at DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, date_of_birth DATETIME DEFAULT NULL, firstname VARCHAR(64) DEFAULT NULL, lastname VARCHAR(64) DEFAULT NULL, website VARCHAR(64) DEFAULT NULL, biography VARCHAR(1000) DEFAULT NULL, gender VARCHAR(1) DEFAULT NULL, locale VARCHAR(8) DEFAULT NULL, timezone VARCHAR(64) DEFAULT NULL, phone VARCHAR(64) DEFAULT NULL, facebook_uid VARCHAR(255) DEFAULT NULL, facebook_name VARCHAR(255) DEFAULT NULL, facebook_data LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', twitter_uid VARCHAR(255) DEFAULT NULL, twitter_name VARCHAR(255) DEFAULT NULL, twitter_data LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', gplus_uid VARCHAR(255) DEFAULT NULL, gplus_name VARCHAR(255) DEFAULT NULL, gplus_data LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', token VARCHAR(255) DEFAULT NULL, two_step_code VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_260F266092FC23A8 (username_canonical), UNIQUE INDEX UNIQ_260F2660A0D96FBF (email_canonical), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tj_usergroup_usg (user_id INT UNSIGNED NOT NULL COMMENT \'Identifiant de l utilisateur\', group_id INT UNSIGNED NOT NULL COMMENT \'Identifiant du groupe\', INDEX IDX_8B5651A9A76ED395 (user_id), INDEX IDX_8B5651A9FE54D947 (group_id), PRIMARY KEY(user_id, group_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE te_vote_vot (vot_id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL COMMENT \'Identifiant du classement\', user_id INT UNSIGNED DEFAULT NULL COMMENT \'Identifiant de l utilisateur\', site_id INT UNSIGNED DEFAULT NULL COMMENT \'Identifiant du site\', classement_id INT UNSIGNED DEFAULT NULL COMMENT \'Identifiant du classement\', vot_creation DATETIME NOT NULL COMMENT \'Creation date\', vot_ip BIGINT NOT NULL COMMENT \'IP du voteur\', vot_tracker CHAR(36) NOT NULL COMMENT \'Tracker GGUID du voteur(DC2Type:guid)\', INDEX IDX_1FE60BA4A76ED395 (user_id), INDEX IDX_1FE60BA4F6BD1646 (site_id), INDEX IDX_1FE60BA4A513A63E (classement_id), INDEX i1_vote (vot_creation, classement_id, site_id), INDEX i2_vote (user_id, site_id, vot_creation), PRIMARY KEY(vot_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE te_site_sit (sit_id INT UNSIGNED AUTO_INCREMENT NOT NULL COMMENT \'Identifiant du site\', owner_id INT UNSIGNED DEFAULT NULL COMMENT \'Identifiant de l utilisateur\', sit_libelle VARCHAR(64) DEFAULT NULL COMMENT \'Titre du site\', sit_description MEDIUMTEXT DEFAULT NULL COMMENT \'Description du site\', sit_statut SMALLINT DEFAULT 2 NOT NULL COMMENT \'Statut du site (refusé, en attente, accepté, tricheur)\', sit_raison TEXT DEFAULT NULL COMMENT \'Explication de la décision\', sit_url VARCHAR(255) DEFAULT NULL COMMENT \'Url officiel du site\', new_creation DATETIME NOT NULL COMMENT \'Creation date\', new_update DATETIME DEFAULT NULL COMMENT \'Update date\', new_validation DATETIME DEFAULT NULL COMMENT \'Date de décision du site\', UNIQUE INDEX UNIQ_64475597FB1C8E1D (sit_url), INDEX IDX_644755977E3C61F9 (owner_id), INDEX i1_site (sit_libelle, sit_statut), PRIMARY KEY(sit_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tj_classement_site_cls (site_id INT UNSIGNED NOT NULL COMMENT \'Identifiant du site\', classement_id INT UNSIGNED NOT NULL COMMENT \'Identifiant du classement\', INDEX IDX_B7A45421F6BD1646 (site_id), INDEX IDX_B7A45421A513A63E (classement_id), PRIMARY KEY(site_id, classement_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE te_classement_te (cla_id INT UNSIGNED AUTO_INCREMENT NOT NULL COMMENT \'Identifiant du classement\', owner_id INT UNSIGNED DEFAULT NULL COMMENT \'Identifiant de l utilisateur\', validator_id INT UNSIGNED DEFAULT NULL COMMENT \'Identifiant de l utilisateur\', cla_libelle VARCHAR(64) NOT NULL COMMENT \'Classement du site\', cla_description MEDIUMTEXT DEFAULT NULL COMMENT \'Description du classement\', cla_statut SMALLINT DEFAULT 2 NOT NULL COMMENT \'Statut du classement (refusé, en attente, accepté)\', cla_url VARCHAR(255) DEFAULT NULL COMMENT \'Url officiel du site diffusant le classement\', cla_creation DATETIME NOT NULL COMMENT \'Creation date\', cla_update DATETIME DEFAULT NULL COMMENT \'Update date\', cla_validation DATETIME DEFAULT NULL COMMENT \'Date de validation du topsite\', INDEX IDX_C5C68CFE7E3C61F9 (owner_id), INDEX IDX_C5C68CFEB0644AEC (validator_id), INDEX i1_classement (cla_statut, cla_creation), INDEX i2_classement (owner_id, cla_creation), INDEX i3_classement (validator_id, cla_creation), PRIMARY KEY(cla_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE acl_classes (id INT UNSIGNED AUTO_INCREMENT NOT NULL, class_type VARCHAR(200) NOT NULL, UNIQUE INDEX UNIQ_69DD750638A36066 (class_type), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE acl_security_identities (id INT UNSIGNED AUTO_INCREMENT NOT NULL, identifier VARCHAR(200) NOT NULL, username TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8835EE78772E836AF85E0677 (identifier, username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE acl_object_identities (id INT UNSIGNED AUTO_INCREMENT NOT NULL, parent_object_identity_id INT UNSIGNED DEFAULT NULL, class_id INT UNSIGNED NOT NULL, object_identifier VARCHAR(100) NOT NULL, entries_inheriting TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_9407E5494B12AD6EA000B10 (object_identifier, class_id), INDEX IDX_9407E54977FA751A (parent_object_identity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE acl_object_identity_ancestors (object_identity_id INT UNSIGNED NOT NULL, ancestor_id INT UNSIGNED NOT NULL, INDEX IDX_825DE2993D9AB4A6 (object_identity_id), INDEX IDX_825DE299C671CEA1 (ancestor_id), PRIMARY KEY(object_identity_id, ancestor_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE acl_entries (id INT UNSIGNED AUTO_INCREMENT NOT NULL, class_id INT UNSIGNED NOT NULL, object_identity_id INT UNSIGNED DEFAULT NULL, security_identity_id INT UNSIGNED NOT NULL, field_name VARCHAR(50) DEFAULT NULL, ace_order SMALLINT UNSIGNED NOT NULL, mask INT NOT NULL, granting TINYINT(1) NOT NULL, granting_strategy VARCHAR(30) NOT NULL, audit_success TINYINT(1) NOT NULL, audit_failure TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_46C8B806EA000B103D9AB4A64DEF17BCE4289BF4 (class_id, object_identity_id, field_name, ace_order), INDEX IDX_46C8B806EA000B103D9AB4A6DF9183C9 (class_id, object_identity_id, security_identity_id), INDEX IDX_46C8B806EA000B10 (class_id), INDEX IDX_46C8B8063D9AB4A6 (object_identity_id), INDEX IDX_46C8B806DF9183C9 (security_identity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE te_classification_collection_cco ADD CONSTRAINT FK_CA82B5A1E25D857E FOREIGN KEY (context) REFERENCES te_classification_context_ccn (id)');
        $this->addSql('ALTER TABLE te_classification_collection_cco ADD CONSTRAINT FK_CA82B5A1EA9FDD75 FOREIGN KEY (media_id) REFERENCES te_media_med (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE te_classification_category_cca ADD CONSTRAINT FK_56940E58727ACA70 FOREIGN KEY (parent_id) REFERENCES te_classification_category_cca (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE te_classification_category_cca ADD CONSTRAINT FK_56940E58E25D857E FOREIGN KEY (context) REFERENCES te_classification_context_ccn (id)');
        $this->addSql('ALTER TABLE te_classification_category_cca ADD CONSTRAINT FK_56940E58EA9FDD75 FOREIGN KEY (media_id) REFERENCES te_media_med (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE te_classification_tag_cta ADD CONSTRAINT FK_9D65EF9BE25D857E FOREIGN KEY (context) REFERENCES te_classification_context_ccn (id)');
        $this->addSql('ALTER TABLE te_media_med ADD CONSTRAINT FK_754646CA12469DE2 FOREIGN KEY (category_id) REFERENCES te_classification_category_cca (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE te_galleryhasmedia_ghm ADD CONSTRAINT FK_6DB54ABA4E7AF8F FOREIGN KEY (gallery_id) REFERENCES te_gallery_gal (id)');
        $this->addSql('ALTER TABLE te_galleryhasmedia_ghm ADD CONSTRAINT FK_6DB54ABAEA9FDD75 FOREIGN KEY (media_id) REFERENCES te_media_med (id)');
        $this->addSql('ALTER TABLE tj_usergroup_usg ADD CONSTRAINT FK_8B5651A9A76ED395 FOREIGN KEY (user_id) REFERENCES te_user_usr (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tj_usergroup_usg ADD CONSTRAINT FK_8B5651A9FE54D947 FOREIGN KEY (group_id) REFERENCES te_group_grp (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE te_vote_vot ADD CONSTRAINT FK_1FE60BA4A76ED395 FOREIGN KEY (user_id) REFERENCES te_user_usr (id)');
        $this->addSql('ALTER TABLE te_vote_vot ADD CONSTRAINT FK_1FE60BA4F6BD1646 FOREIGN KEY (site_id) REFERENCES te_site_sit (sit_id)');
        $this->addSql('ALTER TABLE te_vote_vot ADD CONSTRAINT FK_1FE60BA4A513A63E FOREIGN KEY (classement_id) REFERENCES te_classement_te (cla_id)');
        $this->addSql('ALTER TABLE te_site_sit ADD CONSTRAINT FK_644755977E3C61F9 FOREIGN KEY (owner_id) REFERENCES te_user_usr (id)');
        $this->addSql('ALTER TABLE tj_classement_site_cls ADD CONSTRAINT FK_B7A45421F6BD1646 FOREIGN KEY (site_id) REFERENCES te_site_sit (sit_id)');
        $this->addSql('ALTER TABLE tj_classement_site_cls ADD CONSTRAINT FK_B7A45421A513A63E FOREIGN KEY (classement_id) REFERENCES te_classement_te (cla_id)');
        $this->addSql('ALTER TABLE te_classement_te ADD CONSTRAINT FK_C5C68CFE7E3C61F9 FOREIGN KEY (owner_id) REFERENCES te_user_usr (id)');
        $this->addSql('ALTER TABLE te_classement_te ADD CONSTRAINT FK_C5C68CFEB0644AEC FOREIGN KEY (validator_id) REFERENCES te_user_usr (id)');
        $this->addSql('ALTER TABLE acl_object_identities ADD CONSTRAINT FK_9407E54977FA751A FOREIGN KEY (parent_object_identity_id) REFERENCES acl_object_identities (id)');
        $this->addSql('ALTER TABLE acl_object_identity_ancestors ADD CONSTRAINT FK_825DE2993D9AB4A6 FOREIGN KEY (object_identity_id) REFERENCES acl_object_identities (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE acl_object_identity_ancestors ADD CONSTRAINT FK_825DE299C671CEA1 FOREIGN KEY (ancestor_id) REFERENCES acl_object_identities (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE acl_entries ADD CONSTRAINT FK_46C8B806EA000B10 FOREIGN KEY (class_id) REFERENCES acl_classes (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE acl_entries ADD CONSTRAINT FK_46C8B8063D9AB4A6 FOREIGN KEY (object_identity_id) REFERENCES acl_object_identities (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE acl_entries ADD CONSTRAINT FK_46C8B806DF9183C9 FOREIGN KEY (security_identity_id) REFERENCES acl_security_identities (id) ON UPDATE CASCADE ON DELETE CASCADE');
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
        $this->addSql('ALTER TABLE tj_usergroup_usg DROP FOREIGN KEY FK_8B5651A9FE54D947');
        $this->addSql('ALTER TABLE tj_usergroup_usg DROP FOREIGN KEY FK_8B5651A9A76ED395');
        $this->addSql('ALTER TABLE te_vote_vot DROP FOREIGN KEY FK_1FE60BA4A76ED395');
        $this->addSql('ALTER TABLE te_site_sit DROP FOREIGN KEY FK_644755977E3C61F9');
        $this->addSql('ALTER TABLE te_classement_te DROP FOREIGN KEY FK_C5C68CFE7E3C61F9');
        $this->addSql('ALTER TABLE te_classement_te DROP FOREIGN KEY FK_C5C68CFEB0644AEC');
        $this->addSql('ALTER TABLE te_vote_vot DROP FOREIGN KEY FK_1FE60BA4F6BD1646');
        $this->addSql('ALTER TABLE tj_classement_site_cls DROP FOREIGN KEY FK_B7A45421F6BD1646');
        $this->addSql('ALTER TABLE te_vote_vot DROP FOREIGN KEY FK_1FE60BA4A513A63E');
        $this->addSql('ALTER TABLE tj_classement_site_cls DROP FOREIGN KEY FK_B7A45421A513A63E');
        $this->addSql('ALTER TABLE acl_entries DROP FOREIGN KEY FK_46C8B806EA000B10');
        $this->addSql('ALTER TABLE acl_entries DROP FOREIGN KEY FK_46C8B806DF9183C9');
        $this->addSql('ALTER TABLE acl_object_identities DROP FOREIGN KEY FK_9407E54977FA751A');
        $this->addSql('ALTER TABLE acl_object_identity_ancestors DROP FOREIGN KEY FK_825DE2993D9AB4A6');
        $this->addSql('ALTER TABLE acl_object_identity_ancestors DROP FOREIGN KEY FK_825DE299C671CEA1');
        $this->addSql('ALTER TABLE acl_entries DROP FOREIGN KEY FK_46C8B8063D9AB4A6');
        $this->addSql('DROP TABLE te_classification_collection_cco');
        $this->addSql('DROP TABLE te_classification_category_cca');
        $this->addSql('DROP TABLE te_classification_tag_cta');
        $this->addSql('DROP TABLE te_classification_context_ccn');
        $this->addSql('DROP TABLE te_gallery_gal');
        $this->addSql('DROP TABLE te_media_med');
        $this->addSql('DROP TABLE te_galleryhasmedia_ghm');
        $this->addSql('DROP TABLE te_group_grp');
        $this->addSql('DROP TABLE te_user_usr');
        $this->addSql('DROP TABLE tj_usergroup_usg');
        $this->addSql('DROP TABLE te_vote_vot');
        $this->addSql('DROP TABLE te_site_sit');
        $this->addSql('DROP TABLE tj_classement_site_cls');
        $this->addSql('DROP TABLE te_classement_te');
        $this->addSql('DROP TABLE acl_classes');
        $this->addSql('DROP TABLE acl_security_identities');
        $this->addSql('DROP TABLE acl_object_identities');
        $this->addSql('DROP TABLE acl_object_identity_ancestors');
        $this->addSql('DROP TABLE acl_entries');
    }
}
