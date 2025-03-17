Challenges Faced:
Docker networking is not yet my strong suite so PHP/MariaDB in Docker presented a challenge (I always forget how to run them on the same Docker image)
I switched to Virtualbox because its so much esier to run PHP/MariaDB on the same VM
As detailed here:
	https://forum.yiiframework.com/t/install-composer-error-for-php-8-0-1/134310/5
		This is not a bug in yii or composer, but simple version mismatch. Current version of PHP (8.0.1 in your case, 8.2.4 in my case 3) is way newer than the one expected in composer.json file (8.0.0 or less).

		You have got three options here:
			Use --ignore-platform-reqs as @evstevemd greatly suggests
I specifically did not save the assignment.pdf to the git repo as I assume that shouldn't be publicly accessible

DB State:
SHOW FULL TABLES;
+-------------------------+------------+
| Tables_in_php_hope_macy | Table_type |
+-------------------------+------------+
| application             | BASE TABLE |
| migration               | BASE TABLE |
+-------------------------+------------+

SHOW CREATE TABLE application;
CREATE TABLE `application` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `description` longtext DEFAULT NULL,
  `income` float DEFAULT NULL,
  `number_of_dependants` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci