#DROP DATABASE shared_tasks;
#CREATE DATABASE shared_tasks;

USE shared_tasks;

DROP TABLE task;

CREATE TABLE task
(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name LONGTEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  person INT NOT NULL,
  checked TINYINT NOT NULL
);
CREATE UNIQUE INDEX unique_id ON task ( id );

DROP TABLE user;

CREATE TABLE user
(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  username TINYTEXT NOT NULL
);
CREATE UNIQUE INDEX unique_id ON user ( id );
