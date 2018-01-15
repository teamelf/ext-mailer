CREATE TABLE mailer (
  id VARCHAR(50) NOT NULL,
  `default` TINYINT(1) DEFAULT NULL,
  remark VARCHAR(50) DEFAULT NULL,
  driver VARCHAR(10) NOT NULL,
  host VARCHAR(30) NOT NULL,
  port INT NOT NULL,
  encryption VARCHAR(10) NOT NULL,
  username VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL,
  sender VARCHAR(100) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT NULL,
  deleted_at DATETIME DEFAULT NULL,
  PRIMARY KEY(id)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
