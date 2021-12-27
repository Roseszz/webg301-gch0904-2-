<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211227091622 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE course (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) DEFAULT NULL, class VARCHAR(255) DEFAULT NULL, duration INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE course_student_class (course_id INT NOT NULL, student_class_id INT NOT NULL, INDEX IDX_A6F124DB591CC992 (course_id), INDEX IDX_A6F124DB598B478B (student_class_id), PRIMARY KEY(course_id, student_class_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, studentclasses_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, duration INT NOT NULL, INDEX IDX_3BAE0AA7B4D03BB9 (studentclasses_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, student_class_id INT DEFAULT NULL, avatar VARCHAR(255) DEFAULT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, age INT DEFAULT NULL, gender VARCHAR(255) NOT NULL, INDEX IDX_B723AF33598B478B (student_class_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student_class (id INT AUTO_INCREMENT NOT NULL, course VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teacher (id INT AUTO_INCREMENT NOT NULL, avatar VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, age INT NOT NULL, gender VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teacher_student_class (teacher_id INT NOT NULL, student_class_id INT NOT NULL, INDEX IDX_AD3DEE7641807E1D (teacher_id), INDEX IDX_AD3DEE76598B478B (student_class_id), PRIMARY KEY(teacher_id, student_class_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tuition_fee (id INT AUTO_INCREMENT NOT NULL, students_id INT DEFAULT NULL, amount DOUBLE PRECISION NOT NULL, duration INT NOT NULL, UNIQUE INDEX UNIQ_D62EA9121AD8D010 (students_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE course_student_class ADD CONSTRAINT FK_A6F124DB591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE course_student_class ADD CONSTRAINT FK_A6F124DB598B478B FOREIGN KEY (student_class_id) REFERENCES student_class (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7B4D03BB9 FOREIGN KEY (studentclasses_id) REFERENCES student_class (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33598B478B FOREIGN KEY (student_class_id) REFERENCES student_class (id)');
        $this->addSql('ALTER TABLE teacher_student_class ADD CONSTRAINT FK_AD3DEE7641807E1D FOREIGN KEY (teacher_id) REFERENCES teacher (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE teacher_student_class ADD CONSTRAINT FK_AD3DEE76598B478B FOREIGN KEY (student_class_id) REFERENCES student_class (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tuition_fee ADD CONSTRAINT FK_D62EA9121AD8D010 FOREIGN KEY (students_id) REFERENCES student (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course_student_class DROP FOREIGN KEY FK_A6F124DB591CC992');
        $this->addSql('ALTER TABLE tuition_fee DROP FOREIGN KEY FK_D62EA9121AD8D010');
        $this->addSql('ALTER TABLE course_student_class DROP FOREIGN KEY FK_A6F124DB598B478B');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7B4D03BB9');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF33598B478B');
        $this->addSql('ALTER TABLE teacher_student_class DROP FOREIGN KEY FK_AD3DEE76598B478B');
        $this->addSql('ALTER TABLE teacher_student_class DROP FOREIGN KEY FK_AD3DEE7641807E1D');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE course_student_class');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE student_class');
        $this->addSql('DROP TABLE teacher');
        $this->addSql('DROP TABLE teacher_student_class');
        $this->addSql('DROP TABLE tuition_fee');
    }
}
