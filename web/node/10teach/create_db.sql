CREATE DATABASE familyhistory;
\c familyhistory;

CREATE TABLE person
(
id SERIAL PRIMARY KEY NOT NULL,
first VARCHAR(100) NOT NULL,
last VARCHAR(100),
birthdate date
);

INSERT INTO person(first, last, birthdate) VALUES
('Spencer', 'Browning', '1992-09-21'),
('Katherine', 'Browning', '1994-07-15'),
('Charlotte', 'Browning', '2017-01-05');

CREATE USER ta_user WITH PASSWORD 'ta_pass';
GRANT SELECT, INSERT, UPDATE ON person TO ta_user;
GRANT USAGE, SELECT ON SEQUENCE person_id_seq TO ta_user;