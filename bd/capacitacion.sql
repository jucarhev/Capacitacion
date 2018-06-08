CREATE TABLE IF NOT EXISTS usuario (
	id int(10) NOT NULL AUTO_INCREMENT,
	email varchar(100) DEFAULT NULL,
	user varchar(50) NOT NULL,
	password varchar(50) NOT NULL,
	type varchar(50) NOT NULL,
	meta_id int(10) DEFAULT NULL,
	PRIMARY KEY(id)
) ENGINE=InnoDB;

INSERT INTO usuario (id, email, user, password, type, meta_id) VALUES
(1, "admin@css.com", 'adm', '123', 'Admin', 0);