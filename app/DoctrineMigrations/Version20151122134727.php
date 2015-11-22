<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20151122134727 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tj_usergroup_usg (user_id INT UNSIGNED NOT NULL, group_id INT NOT NULL, INDEX IDX_8B5651A9A76ED395 (user_id), INDEX IDX_8B5651A9FE54D947 (group_id), PRIMARY KEY(user_id, group_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tj_usergroup_usg ADD CONSTRAINT FK_8B5651A9A76ED395 FOREIGN KEY (user_id) REFERENCES te_user_usr (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tj_usergroup_usg ADD CONSTRAINT FK_8B5651A9FE54D947 FOREIGN KEY (group_id) REFERENCES te_group_grp (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE fos_user_user_group');
        $this->addSql('ALTER TABLE te_user_usr CHANGE biography biography VARCHAR(1000) DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE fos_user_user_group (user_id INT UNSIGNED NOT NULL, group_id INT NOT NULL, INDEX IDX_B3C77447A76ED395 (user_id), INDEX IDX_B3C77447FE54D947 (group_id), PRIMARY KEY(user_id, group_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fos_user_user_group ADD CONSTRAINT FK_B3C77447FE54D947 FOREIGN KEY (group_id) REFERENCES te_group_grp (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE fos_user_user_group ADD CONSTRAINT FK_B3C77447A76ED395 FOREIGN KEY (user_id) REFERENCES te_user_usr (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE tj_usergroup_usg');
        $this->addSql('ALTER TABLE te_user_usr CHANGE biography biography VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
    }
}
