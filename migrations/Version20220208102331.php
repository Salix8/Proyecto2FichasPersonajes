<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220208102331 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, contraseña VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE personaje ADD autor_id INT DEFAULT NULL, ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE personaje ADD CONSTRAINT FK_53A4108814D45BBE FOREIGN KEY (autor_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE personaje ADD CONSTRAINT FK_53A41088A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_53A4108814D45BBE ON personaje (autor_id)');
        $this->addSql('CREATE INDEX IDX_53A41088A76ED395 ON personaje (user_id)');
        $this->addSql('ALTER TABLE rasgo ADD rasgo_personaje_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rasgo ADD CONSTRAINT FK_67AC8374ED0D04D6 FOREIGN KEY (rasgo_personaje_id) REFERENCES personaje (id)');
        $this->addSql('CREATE INDEX IDX_67AC8374ED0D04D6 ON rasgo (rasgo_personaje_id)');
        $this->addSql('ALTER TABLE user ADD name VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personaje DROP FOREIGN KEY FK_53A4108814D45BBE');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('ALTER TABLE personaje DROP FOREIGN KEY FK_53A41088A76ED395');
        $this->addSql('DROP INDEX IDX_53A4108814D45BBE ON personaje');
        $this->addSql('DROP INDEX IDX_53A41088A76ED395 ON personaje');
        $this->addSql('ALTER TABLE personaje DROP autor_id, DROP user_id');
        $this->addSql('ALTER TABLE rasgo DROP FOREIGN KEY FK_67AC8374ED0D04D6');
        $this->addSql('DROP INDEX IDX_67AC8374ED0D04D6 ON rasgo');
        $this->addSql('ALTER TABLE rasgo DROP rasgo_personaje_id');
        $this->addSql('ALTER TABLE user DROP name');
    }
}
