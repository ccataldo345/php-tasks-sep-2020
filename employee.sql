SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

-- Table structure for table `employee`

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `birthdate` date NOT NULL,
  `id_code` varchar(255) NOT NULL DEFAULT '',
  `is_employee` tinyint(1) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(255) NOT NULL DEFAULT '',
  `address` text NOT NULL,
  `introduction_en` longtext NOT NULL,
  `introduction_es` longtext NOT NULL,
  `introduction_fr` longtext NOT NULL,
  `work_exprience_en` longtext NOT NULL,
  `work_exprience_es` longtext NOT NULL,
  `work_exprience_fr` longtext NOT NULL,
  `education_en` longtext NOT NULL,
  `education_es` longtext NOT NULL,
  `education_fr` longtext NOT NULL,
  `created_by` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL,
  `updated_by` varchar(255) NOT NULL DEFAULT '',
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Insert data for table `employee`

INSERT INTO `employees` (`id`, `name`, `birthdate`, `id_code`, `is_employee`, `email`, `phone`, `address`, `introduction_en`, `introduction_es`, `introduction_fr`, `work_exprience_en`, `work_exprience_es`, `work_exprience_fr`, `education_en`, `education_es`, `education_fr`, `created_by`, `created_at`, `updated_by`, `updated_at`)
VALUES
	(1,'John Doe','2000-12-25','46704050033',1,'john.doe@gmail.com','58645798','Narva mnt 7, 10100, Tallinn, EE','Intoduction example 1', 'Ejemplo de introducción 1', 'Exemple d''introduction 1', 'Work experience example 1','Ejemplo de experiencia laboral 1', 'Exemple d''expérience de travail 1', 'Education example 1', 'Ejemplo de educación 1', 'Exemple d''éducation 1', 'Creator 1', NOW(), 'Updater 1', NOW());

-- Select data for employee 1 in all languages

SELECT * FROM `employees` WHERE id = 1;

-- Create view for employee 1 in english

CREATE VIEW employees_en AS
SELECT `id`, `name`, `birthdate`, `id_code`, `is_employee`, `email`, `phone`, `address`, `introduction_en`, `work_exprience_en`, `education_en`, `created_by`, `created_at`, `updated_by`, `updated_at`
FROM employees;

SELECT * FROM employees_en WHERE id = 1;
