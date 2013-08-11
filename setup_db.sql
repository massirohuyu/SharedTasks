#DROP DATABASE shared_tasks;
#CREATE DATABASE shared_tasks;

USE shared_tasks;

DROP TABLE tasklist;

CREATE TABLE tasklist
(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name LONGTEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  person VARCHAR(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  checked TINYINT NOT NULL
);
CREATE UNIQUE INDEX unique_id ON tasklist ( id );
