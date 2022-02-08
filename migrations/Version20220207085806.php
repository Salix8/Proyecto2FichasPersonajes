<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220207085806 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rasgo ADD rasgo_personaje_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rasgo ADD CONSTRAINT FK_67AC8374ED0D04D6 FOREIGN KEY (rasgo_personaje_id) REFERENCES personaje (id)');
        $this->addSql('CREATE INDEX IDX_67AC8374ED0D04D6 ON rasgo (rasgo_personaje_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE rasgo DROP FOREIGN KEY FK_67AC8374ED0D04D6');
        $this->addSql('DROP INDEX IDX_67AC8374ED0D04D6 ON rasgo');
        $this->addSql('ALTER TABLE rasgo DROP rasgo_personaje_id');
    }
}
