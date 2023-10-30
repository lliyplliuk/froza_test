<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231030135513 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            "INSERT INTO makes (make_logo,make_name,is_orig,link_catalog,link_catalog_file,link_site,publish,bitmap_state,`type`,ebrp_status,accept_manager,make_match_logo,image,make_match_client_supplier_id,make_add_client_supplier_id,updated_at,emex_detail_example,emex_logo,deleted) VALUES
    ('ГЬ','3F',0,'','','',1,0,0,1,1,'','',0,1,'2019-06-13 13:12:15',NULL,'ГЬ',0)"
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql("DELETE FROM makes where make_logo = 'ГЬ'");
    }
}
