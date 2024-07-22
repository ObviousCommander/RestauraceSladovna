<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240719083225 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admini (id INT AUTO_INCREMENT NOT NULL, jmeno VARCHAR(100) NOT NULL, heslo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jidla (id INT AUTO_INCREMENT NOT NULL, nazev VARCHAR(50) NOT NULL, cena INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menicka (id INT AUTO_INCREMENT NOT NULL, datum DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE polozka_menicka (id INT AUTO_INCREMENT NOT NULL, menicka_id INT DEFAULT NULL, jidla_id INT DEFAULT NULL, INDEX IDX_1384A78770302F0E (menicka_id), INDEX IDX_1384A787EF1A3168 (jidla_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rezervace (id INT AUTO_INCREMENT NOT NULL, jmeno VARCHAR(50) NOT NULL, datum DATETIME NOT NULL, mail VARCHAR(100) NOT NULL, tel INT NOT NULL, pocet_lidi INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Rezervace_PolozkaMenicka (rezervace_id INT NOT NULL, polozka_menicka_id INT NOT NULL, INDEX IDX_5487E4B78CB78B49 (rezervace_id), INDEX IDX_5487E4B789A8A531 (polozka_menicka_id), PRIMARY KEY(rezervace_id, polozka_menicka_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Rezervace_Stoly (rezervace_id INT NOT NULL, stoly_id INT NOT NULL, INDEX IDX_9D2FA0768CB78B49 (rezervace_id), INDEX IDX_9D2FA076758D69D5 (stoly_id), PRIMARY KEY(rezervace_id, stoly_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stoly (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE polozka_menicka ADD CONSTRAINT FK_1384A78770302F0E FOREIGN KEY (menicka_id) REFERENCES menicka (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE polozka_menicka ADD CONSTRAINT FK_1384A787EF1A3168 FOREIGN KEY (jidla_id) REFERENCES jidla (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE Rezervace_PolozkaMenicka ADD CONSTRAINT FK_5487E4B78CB78B49 FOREIGN KEY (rezervace_id) REFERENCES rezervace (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Rezervace_PolozkaMenicka ADD CONSTRAINT FK_5487E4B789A8A531 FOREIGN KEY (polozka_menicka_id) REFERENCES polozka_menicka (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Rezervace_Stoly ADD CONSTRAINT FK_9D2FA0768CB78B49 FOREIGN KEY (rezervace_id) REFERENCES rezervace (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Rezervace_Stoly ADD CONSTRAINT FK_9D2FA076758D69D5 FOREIGN KEY (stoly_id) REFERENCES stoly (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE polozka_menicka DROP FOREIGN KEY FK_1384A78770302F0E');
        $this->addSql('ALTER TABLE polozka_menicka DROP FOREIGN KEY FK_1384A787EF1A3168');
        $this->addSql('ALTER TABLE Rezervace_PolozkaMenicka DROP FOREIGN KEY FK_5487E4B78CB78B49');
        $this->addSql('ALTER TABLE Rezervace_PolozkaMenicka DROP FOREIGN KEY FK_5487E4B789A8A531');
        $this->addSql('ALTER TABLE Rezervace_Stoly DROP FOREIGN KEY FK_9D2FA0768CB78B49');
        $this->addSql('ALTER TABLE Rezervace_Stoly DROP FOREIGN KEY FK_9D2FA076758D69D5');
        $this->addSql('DROP TABLE admini');
        $this->addSql('DROP TABLE jidla');
        $this->addSql('DROP TABLE menicka');
        $this->addSql('DROP TABLE polozka_menicka');
        $this->addSql('DROP TABLE rezervace');
        $this->addSql('DROP TABLE Rezervace_PolozkaMenicka');
        $this->addSql('DROP TABLE Rezervace_Stoly');
        $this->addSql('DROP TABLE stoly');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
