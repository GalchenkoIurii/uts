<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200609075629 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B5DA37D00 FOREIGN KEY (measure_id) REFERENCES measure (id)');
        $this->addSql('ALTER TABLE lot ADD CONSTRAINT FK_B81291B38248176 FOREIGN KEY (currency_id) REFERENCES currency (id)');
        $this->addSql('CREATE INDEX IDX_B81291B5DA37D00 ON lot (measure_id)');
        $this->addSql('CREATE INDEX IDX_B81291B38248176 ON lot (currency_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291B5DA37D00');
        $this->addSql('ALTER TABLE lot DROP FOREIGN KEY FK_B81291B38248176');
        $this->addSql('DROP INDEX IDX_B81291B5DA37D00 ON lot');
        $this->addSql('DROP INDEX IDX_B81291B38248176 ON lot');
    }
}
