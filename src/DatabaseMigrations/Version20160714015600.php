<?php
namespace ReactiveRooms\DatabaseMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20160714015600 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $sql = <<<SQL
CREATE TABLE `user` (
  `id` varchar(15) NOT NULL,
  `created` DATETIME NULL,
  `updated` DATETIME NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPRESSED KEY_BLOCK_SIZE=8
SQL;
        $this->addSql($sql);

        $sql = <<<SQL
CREATE TABLE `network` (
  `id` varchar(15) NOT NULL,
  `created` DATETIME NULL,
  `updated` DATETIME NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPRESSED KEY_BLOCK_SIZE=8
SQL;
        $this->addSql($sql);

        $sql = <<<SQL
CREATE TABLE `software` (
  `id` varchar(15) NOT NULL,
  `created` DATETIME NULL,
  `updated` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPRESSED KEY_BLOCK_SIZE=8
SQL;
        $this->addSql($sql);

        $sql = <<<SQL
CREATE TABLE `hardware` (
  `id` varchar(15) NOT NULL,
  `created` DATETIME NULL,
  `updated` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPRESSED KEY_BLOCK_SIZE=8
SQL;
        $this->addSql($sql);

        $sql = <<<SQL
CREATE TABLE `terminal` (
  `id` varchar(15) NOT NULL,
  `created` DATETIME NULL,
  `updated` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(255) DEFAULT NULL,
  `ipAddress` varchar(255) DEFAULT NULL,
  `hardwareId` varchar(15) DEFAULT NULL,
  `softwareId` varchar(15) DEFAULT NULL,
  `networkId` varchar(15) DEFAULT NULL,
  `userId` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPRESSED KEY_BLOCK_SIZE=8
SQL;
        $this->addSql($sql);

        $sql = 'INSERT INTO user (`id`, `username`, `email`) VALUES ("6hKWplv05zVGyCp", "cunt", "matt@basekit.com");';
        $this->addSql($sql);
    }

    public function down(Schema $schema)
    {
    }
}
