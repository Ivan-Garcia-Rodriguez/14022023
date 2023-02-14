<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230214075725 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mensaje ADD modo_id INT NOT NULL, ADD banda_id INT NOT NULL');
        $this->addSql('ALTER TABLE mensaje ADD CONSTRAINT FK_9B631D011858652E FOREIGN KEY (modo_id) REFERENCES modo (id)');
        $this->addSql('ALTER TABLE mensaje ADD CONSTRAINT FK_9B631D019EFB0C1D FOREIGN KEY (banda_id) REFERENCES banda (id)');
        $this->addSql('CREATE INDEX IDX_9B631D011858652E ON mensaje (modo_id)');
        $this->addSql('CREATE INDEX IDX_9B631D019EFB0C1D ON mensaje (banda_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mensaje DROP FOREIGN KEY FK_9B631D011858652E');
        $this->addSql('ALTER TABLE mensaje DROP FOREIGN KEY FK_9B631D019EFB0C1D');
        $this->addSql('DROP INDEX IDX_9B631D011858652E ON mensaje');
        $this->addSql('DROP INDEX IDX_9B631D019EFB0C1D ON mensaje');
        $this->addSql('ALTER TABLE mensaje DROP modo_id, DROP banda_id');
    }
}
