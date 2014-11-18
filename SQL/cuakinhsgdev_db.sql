CREATE TABLE announcements
(
id int NOT NULL AUTO_INCREMENT,
title tinytext NULL,
modeId tinyint(1) DEFAULT 0,
publish tinyint(1) DEFAULT 1,
content tinytext NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE admins
(
id int NOT NULL AUTO_INCREMENT,
username varchar(45) NOT NULL,
password varchar(100) NOT NULL,
authKey varchar(100) NOT NULL,
accessToken varchar(100) NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE pages
(
id int NOT NULL AUTO_INCREMENT,
title tinytext NOT NULL,
url tinytext NOT NULL,
keywords tinytext NOT NULL,
publish tinyint(1) DEFAULT 1,
content blob,
PRIMARY KEY (id)
);

CREATE TABLE settings
(
id int NOT NULL AUTO_INCREMENT,
name varchar(45) NOT NULL,
value text DEFAULT NULL,
PRIMARY KEY (id)
);

-- INSERT DEFAULT DATA

INSERT INTO admins (username, password, authKey, accessToken) VALUES ('admin', '$2y$13$1yxF8LyB4WO4YARE0pKf8eLmpw0cU/pM4Dhw3rvQ5RBTEl6xxOElK', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', '44fd5b3d6f3f5cd03c865f9cd710e2c59d8ac839');

INSERT INTO settings (name, value) VALUES ('general_maintenance_enable', '0');
INSERT INTO settings (name, value) VALUES ('general_maintenance_message', 'Website Underconstruction');
INSERT INTO settings (name, value) VALUES ('general_breadcrumb_enable', '1');
INSERT INTO settings (name, value) VALUES ('general_web_name', 'Tho Tran Coder');
INSERT INTO settings (name, value) VALUES ('general_web_title', 'Tho Tran Coder Demo');
INSERT INTO settings (name, value) VALUES ('general_corp_name', 'Tho Tran Coder');
INSERT INTO settings (name, value) VALUES ('general_corp_address', 'Dak Mil, Dak Nong');
INSERT INTO settings (name, value) VALUES ('general_corp_email', 'phucthotran@gmail.com');
INSERT INTO settings (name, value) VALUES ('general_corp_phone', '01655973646');
INSERT INTO settings (name, value) VALUES ('map_lat', '12.4667181');
INSERT INTO settings (name, value) VALUES ('map_long', '107.6757788');
INSERT INTO settings (name, value) VALUES ('announcement_enable', '1');
INSERT INTO settings (name, value) VALUES ('widget_enable', '1');
INSERT INTO settings (name, value) VALUES ('widget_1_title', 'Tho Tran Coder');
INSERT INTO settings (name, value) VALUES ('widget_1_text', '<p><span class="glyphicon glyphicon-user"></span> <strong>NAME: </strong>Tran Phuc Tho</p><p><span class="glyphicon glyphicon-briefcase"></span> <strong>JOB: </strong>Software/Web Developer</p>');
INSERT INTO settings (name, value) VALUES ('widget_2_title', 'Keep In Touch');
INSERT INTO settings (name, value) VALUES ('widget_2_text', '<p><span class="glyphicon glyphicon-home"></span> <strong>FACEBOOK </strong><a href="http://www.facebook.com/thotran.developer">Tho Tran Coder</a></p><p><span class="glyphicon glyphicon-inbox"></span> <strong>EMAIL </strong><a href="mailto:phucthotran@gmail.com">phucthotran@gmail.com</a></p><p><span class="glyphicon glyphicon-phone"></span> <strong>PHONE </strong>01655973646</p>');
INSERT INTO settings (name) VALUES ('navbar_items');
INSERT INTO settings (name) VALUES ('homepage_id');
