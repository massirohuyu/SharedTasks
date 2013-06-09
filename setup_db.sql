#DROP DATABASE shared_tasks;
#CREATE DATABASE shared_tasks;

DROP TABLE tasklist;

CREATE TABLE tasklist
(
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name LONGTEXT NOT NULL,
  person VARCHAR(8) NOT NULL,
  checked TINYINT NOT NULL
);
CREATE UNIQUE INDEX unique_id ON tasklist ( id );
