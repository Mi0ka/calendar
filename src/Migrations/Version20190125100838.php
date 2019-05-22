<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190125100838 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE matiere ADD specialisation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT FK_9014574A5627D44C FOREIGN KEY (specialisation_id) REFERENCES specialisation (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9014574A5627D44C ON matiere (specialisation_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE matiere DROP FOREIGN KEY FK_9014574A5627D44C');
        $this->addSql('DROP INDEX UNIQ_9014574A5627D44C ON matiere');
        $this->addSql('ALTER TABLE matiere DROP specialisation_id');
    }
}
