<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210318092716 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE educations ADD cv_form_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE educations ADD CONSTRAINT FK_730876AD147FC833 FOREIGN KEY (cv_form_id) REFERENCES cv_form (id)');
        $this->addSql('CREATE INDEX IDX_730876AD147FC833 ON educations (cv_form_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE educations DROP FOREIGN KEY FK_730876AD147FC833');
        $this->addSql('DROP INDEX IDX_730876AD147FC833 ON educations');
        $this->addSql('ALTER TABLE educations DROP cv_form_id');
    }
}
