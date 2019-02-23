<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190222003751 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP SEQUENCE greeting_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE product_categories_product_id_seq CASCADE');
        $this->addSql('DROP INDEX "primary"');
        $this->addSql('CREATE SEQUENCE product_categories_id_seq');
        $this->addSql('SELECT setval(\'product_categories_id_seq\', (SELECT MAX(id) FROM product_categories))');
        $this->addSql('ALTER TABLE product_categories ALTER id SET DEFAULT nextval(\'product_categories_id_seq\')');
        $this->addSql('ALTER TABLE product_categories ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE greeting_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE product_categories_product_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('DROP INDEX product_categories_pkey');
        $this->addSql('ALTER TABLE product_categories ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE product_categories ADD PRIMARY KEY (category_id_id, product_id_id)');
    }
}
