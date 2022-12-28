<?php

declare(strict_types=1);

namespace Asdoria\SyliusRetailerPlugin\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220622141349 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        if (!$schema->getTable('asdoria_retailer_group')->hasColumn('rating')) return;
        $this->addSql('ALTER TABLE asdoria_retailer_group DROP rating');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE asdoria_retailer_group ADD rating INT NOT NULL');
    }
}
