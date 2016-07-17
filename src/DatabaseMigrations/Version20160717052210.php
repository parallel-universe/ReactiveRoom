<?php
namespace ReactiveRooms\DatabaseMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20160717052210 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $sql = <<<SQL
CREATE TABLE `terminal_to_software_map` (
  `id` varchar(15) NOT NULL,
  `created` DATETIME NULL,
  `updated` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `terminalId` varchar(15) DEFAULT NULL,
  `softwareId` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPRESSED KEY_BLOCK_SIZE=8
SQL;
        $this->addSql($sql);

        $sql = <<<SQL
CREATE TABLE `terminal_to_hardware_map` (
  `id` varchar(15) NOT NULL,
  `created` DATETIME NULL,
  `updated` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `terminalId` varchar(15) DEFAULT NULL,
  `hardwareId` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPRESSED KEY_BLOCK_SIZE=8
SQL;
        $this->addSql($sql);

        $sql = 'ALTER TABLE `terminal` DROP COLUMN `hardwareId`, DROP COLUMN `softwareId`;';
        $this->addSql($sql);
    }

    public function down(Schema $schema)
    {
        $sql = 'DROP TABLE `terminal_to_software_map`;';
        $this->addSql($sql);

        $sql = 'DROP TABLE `terminal_to_hardware_map`;';
        $this->addSql($sql);

        $sql = 'ALTER TABLE `terminal` '
             . 'ADD COLUMN `hardwareId` varchar(15) DEFAULT NULL, '
             . 'ADD COLUMN `softwareId` varchar(15) DEFAULT NULL;';
        $this->addSql($sql);
    }
}
