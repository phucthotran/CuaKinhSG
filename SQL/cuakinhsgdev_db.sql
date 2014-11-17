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
password varchar(45) NOT NULL,
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

INSERT INTO settings (name, value) VALUES ('general_maintenance_enable', '0');
INSERT INTO settings (name) VALUES ('general_maintenance_message');
INSERT INTO settings (name, value) VALUES ('general_breadcrumb_enable', '1');
INSERT INTO settings (name) VALUES ('general_web_name');
INSERT INTO settings (name) VALUES ('general_web_title');
INSERT INTO settings (name) VALUES ('general_corp_name');
INSERT INTO settings (name) VALUES ('general_corp_address');
INSERT INTO settings (name) VALUES ('general_corp_email');
INSERT INTO settings (name) VALUES ('general_corp_phone');
INSERT INTO settings (name) VALUES ('map_lat');
INSERT INTO settings (name) VALUES ('map_long');
INSERT INTO settings (name, value) VALUES ('announcement_enable', '1');
INSERT INTO settings (name, value) VALUES ('widget_enable', '1');
INSERT INTO settings (name) VALUES ('widget_1_title');
INSERT INTO settings (name) VALUES ('widget_1_text');
INSERT INTO settings (name) VALUES ('widget_2_title');
INSERT INTO settings (name) VALUES ('widget_2_text');
INSERT INTO settings (name) VALUES ('navbar_items');
INSERT INTO settings (name) VALUES ('homepage_id');
