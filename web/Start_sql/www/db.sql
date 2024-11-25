CREATE DATABASE tyctf;

USE tyctf;

CREATE TABLE user (
                      id INT,
                      username TEXT,
                      password TEXT
);

INSERT INTO user (id,username, password) VALUES (1,'admin1', '123456');
INSERT INTO user (id,username, password) VALUES (2,'饭桶yu', 'TYCTF{this_is_fake_flag}');
INSERT INTO user (id,username, password) VALUES (3,'admin2', '1234567');
INSERT INTO user (id,username, password) VALUES (4,'Alice', '1234567');
INSERT INTO user (id,username, password) VALUES (5,'Bob', '1234567');
INSERT INTO user (id,username, password) VALUES (6,'Charlie', '1234567');
INSERT INTO user (id,username, password) VALUES (7,'David', '1234567');
INSERT INTO user (id,username, password) VALUES (8,'Eva', '1234567');
INSERT INTO user (id,username, password) VALUES (9,'Frank', '1234567');
INSERT INTO user (id,username, password) VALUES (10,'sql_select', 'TYCTF{test_flag}');
INSERT INTO user (id,username, password) VALUES (11,'Hannah', '1234567');
INSERT INTO user (id,username, password) VALUES (12,'Nathan', '1234567');
INSERT INTO user (id,username, password) VALUES (13,'Ian', '1234567');
INSERT INTO user (id,username, password) VALUES (14,'Tina', '1234567');
INSERT INTO user (id,username, password) VALUES (15,'Jack', '1234567');
INSERT INTO user (id,username, password) VALUES (16,'Paul', '1234567');