<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231030134624 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE makes (make_logo CHAR(4) NOT NULL, make_name VARCHAR(60) DEFAULT NULL, is_orig TINYINT(1) DEFAULT NULL, link_catalog VARCHAR(255) DEFAULT NULL, link_catalog_file VARCHAR(255) NOT NULL, link_site VARCHAR(255) NOT NULL, publish TINYINT(1) DEFAULT NULL, bitmap_state INT DEFAULT NULL, type TINYINT(1) NOT NULL, ebrp_status TINYINT(1) NOT NULL, accept_manager TINYINT(1) NOT NULL, make_match_logo CHAR(4) NOT NULL, image VARCHAR(90) NOT NULL, make_match_client_supplier_id INT NOT NULL, make_add_client_supplier_id INT NOT NULL, updated_at DATETIME DEFAULT NULL, emex_detail_example VARCHAR(255) DEFAULT NULL, emex_logo VARCHAR(10) NOT NULL, deleted INT NOT NULL, INDEX accept_manager (accept_manager), INDEX image (image), INDEX make_add_client_supplier_id (make_add_client_supplier_id), INDEX publish (publish), INDEX type (type), INDEX make_match_logo (make_match_logo), INDEX publish_2 (publish, ebrp_status, accept_manager, make_match_logo), INDEX make_match_client_supplier_id (make_match_client_supplier_id), INDEX is_orig (is_orig), INDEX bitmap_state (bitmap_state), INDEX make_logo (make_logo, publish, ebrp_status, accept_manager), INDEX ebrp_status (ebrp_status), UNIQUE INDEX make_logo_2 (make_logo), UNIQUE INDEX uniq_make_name (make_name), PRIMARY KEY(make_logo)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE makes');
    }
}
