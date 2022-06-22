<?php

declare(strict_types=1);

namespace Asdoria\SyliusRetailerPlugin\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220523144222 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE asdoria_retailer (id INT AUTO_INCREMENT NOT NULL, retailer_group_id INT NOT NULL, name VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, postcode VARCHAR(255) NOT NULL, country_code VARCHAR(255) NOT NULL, street VARCHAR(255) NOT NULL, latitude DOUBLE PRECISION DEFAULT NULL, longitude DOUBLE PRECISION DEFAULT NULL, code VARCHAR(255) NOT NULL, INDEX IDX_21F5F4AE6113861 (retailer_group_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE asdoria_retailer_group (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, rating INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE asdoria_retailer ADD CONSTRAINT FK_21F5F4AE6113861 FOREIGN KEY (retailer_group_id) REFERENCES asdoria_retailer_group (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE asdoria_retailer DROP FOREIGN KEY FK_21F5F4AE6113861');
        $this->addSql('DROP TABLE asdoria_retailer');
        $this->addSql('DROP TABLE asdoria_retailer_group');
    }
}
