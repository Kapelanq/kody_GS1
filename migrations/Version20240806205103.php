<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240806205103 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE kody_kreskowe (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, brand_name VARCHAR(255) DEFAULT NULL, common_name VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, description_language VARCHAR(255) DEFAULT NULL, gpc_code BIGINT DEFAULT NULL, internal_symbol VARCHAR(255) DEFAULT NULL, last_modification_date VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, net_content VARCHAR(255) DEFAULT NULL, net_content_unit VARCHAR(255) DEFAULT NULL, packaging VARCHAR(255) DEFAULT NULL, product_image VARCHAR(255) DEFAULT NULL, product_website VARCHAR(255) DEFAULT NULL, quality_details VARCHAR(255) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, sub_brand_name VARCHAR(255) DEFAULT NULL, target_market VARCHAR(255) DEFAULT NULL, variant VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE kody_kreskowe');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
