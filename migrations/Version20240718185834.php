<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240718185834 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admini (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jidla (id INT AUTO_INCREMENT NOT NULL, nazev VARCHAR(50) NOT NULL, cena INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menicka (id INT AUTO_INCREMENT NOT NULL, datum DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE polozka_menicka (id INT AUTO_INCREMENT NOT NULL, menicka_id INT NOT NULL, jidla_id INT NOT NULL, INDEX IDX_1384A78770302F0E (menicka_id), INDEX IDX_1384A787EF1A3168 (jidla_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rezervace (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stoly (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE polozka_menicka ADD CONSTRAINT FK_1384A78770302F0E FOREIGN KEY (menicka_id) REFERENCES menicka (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE polozka_menicka ADD CONSTRAINT FK_1384A787EF1A3168 FOREIGN KEY (jidla_id) REFERENCES jidla (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE polozka_menicka DROP FOREIGN KEY FK_1384A78770302F0E');
        $this->addSql('ALTER TABLE polozka_menicka DROP FOREIGN KEY FK_1384A787EF1A3168');
        $this->addSql('DROP TABLE admini');
        $this->addSql('DROP TABLE jidla');
        $this->addSql('DROP TABLE menicka');
        $this->addSql('DROP TABLE polozka_menicka');
        $this->addSql('DROP TABLE rezervace');
        $this->addSql('DROP TABLE stoly');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
