<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220427101606 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE indisponibilite ADD rdv_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE indisponibilite ADD CONSTRAINT FK_8717036F4CCE3F86 FOREIGN KEY (rdv_id) REFERENCES rdv (id)');
        $this->addSql('CREATE INDEX IDX_8717036F4CCE3F86 ON indisponibilite (rdv_id)');
        $this->addSql('ALTER TABLE utilisateur ADD un_medecin_id INT DEFAULT NULL, ADD un_assistant_id INT DEFAULT NULL, ADD un_patient_id INT DEFAULT NULL, CHANGE username email VARCHAR(180) NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B365F36D13 FOREIGN KEY (un_medecin_id) REFERENCES medecin (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B310321EAD FOREIGN KEY (un_assistant_id) REFERENCES assistant (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3A89E5EE FOREIGN KEY (un_patient_id) REFERENCES patient (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B3E7927C74 ON utilisateur (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B365F36D13 ON utilisateur (un_medecin_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B310321EAD ON utilisateur (un_assistant_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B3A89E5EE ON utilisateur (un_patient_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE indisponibilite DROP FOREIGN KEY FK_8717036F4CCE3F86');
        $this->addSql('DROP INDEX IDX_8717036F4CCE3F86 ON indisponibilite');
        $this->addSql('ALTER TABLE indisponibilite DROP rdv_id');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B365F36D13');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B310321EAD');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3A89E5EE');
        $this->addSql('DROP INDEX UNIQ_1D1C63B3E7927C74 ON utilisateur');
        $this->addSql('DROP INDEX UNIQ_1D1C63B365F36D13 ON utilisateur');
        $this->addSql('DROP INDEX UNIQ_1D1C63B310321EAD ON utilisateur');
        $this->addSql('DROP INDEX UNIQ_1D1C63B3A89E5EE ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP un_medecin_id, DROP un_assistant_id, DROP un_patient_id, CHANGE email username VARCHAR(180) NOT NULL');
    }
}
