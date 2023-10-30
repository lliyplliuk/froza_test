<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231030131014 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE price_MSC (id INT AUTO_INCREMENT NOT NULL, direction CHAR(10) NOT NULL, supplier_logo VARCHAR(5) NOT NULL, make_logo VARCHAR(4) NOT NULL, detail_num VARCHAR(50) NOT NULL, detail_num_supplier VARCHAR(50) NOT NULL, quantity INT NOT NULL, quantity_lot INT NOT NULL, price NUMERIC(20, 4) DEFAULT NULL, price_prev NUMERIC(20, 4) DEFAULT NULL, price_next NUMERIC(20, 4) DEFAULT NULL, need_chek TINYINT(1) DEFAULT NULL, price_hand NUMERIC(20, 4) DEFAULT \'0.0000\' NOT NULL, comment VARCHAR(80) NOT NULL, comment_manager VARCHAR(80) NOT NULL, date DATE NOT NULL, date_quant DATE NOT NULL, delivery_time INT NOT NULL, make_name_supplier VARCHAR(50) NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX make_logo_2 (make_logo, detail_num), INDEX detail_num_supplier (detail_num_supplier), INDEX logo_date (supplier_logo, date), INDEX price_list_to_ftp (direction, supplier_logo, make_logo), INDEX date (date), INDEX price_list_to_ftp_2 (direction, supplier_logo), INDEX detail_num (detail_num), INDEX need_check_idx (need_chek), INDEX price_next_idx (price_next), UNIQUE INDEX unq_price (direction, supplier_logo, make_logo, detail_num), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE price_MSC');
    }
}
