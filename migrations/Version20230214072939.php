<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230214072939 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE banda (id INT AUTO_INCREMENT NOT NULL, maximo DOUBLE PRECISION NOT NULL, minimo DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mensaje ADD fecha DATE NOT NULL');
        $this->addSql('ALTER TABLE participante ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', CHANGE nombre nombre VARCHAR(180) NOT NULL, CHANGE rol password VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_85BDC5C33A909126 ON participante (nombre)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE banda');
        $this->addSql('ALTER TABLE mensaje DROP fecha');
        $this->addSql('DROP INDEX UNIQ_85BDC5C33A909126 ON participante');
        $this->addSql('ALTER TABLE participante DROP roles, CHANGE nombre nombre VARCHAR(255) NOT NULL, CHANGE password rol VARCHAR(255) NOT NULL');
    }
}
