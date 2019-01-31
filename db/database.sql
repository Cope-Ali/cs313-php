--Create Wards table---
CREATE TABLE wards (
    ward VARCHAR(20) PRIMARY KEY
);

--create Contact Info table --
CREATE TABLE contact (
    contact_id serial PRIMARY KEY,
    contact_street_address VARCHAR(80),
    contact_city VARCHAR(40),
    contact_state VARCHAR(2),
    contact_phone INT,
    contact_email varchar(40)
);

--Create Person table--
CREATE TABLE person (
        person_id           serial          PRIMARY KEY,
        person_ward         varchar(20)     REFERENCES wards(ward) ,
        person_contact_id   INT             references contact(contact_id),
        person_first        varchar(20)     NOT NULL,
        person_last         varchar(20)     NOT NULL  
);

--Create Callings table--
CREATE TABLE callings(
    calling VARCHAR(20)     PRIMARY KEY
);

--create leader table--
CREATE TABLE leader(
    leader_id               serial      PRIMARY KEY,
    leader_person           INT         REFERENCES person(person_id),
    leader_ward             varchar(20) REFERENCES wards(ward),
    leader_calling          varchar(20) REFERENCES callings(calling)
);

--create opportunity table--
CREATE TABLE opportunity (
    opportunity_id          serial      PRIMARY KEY,
    opportunity_name        VARCHAR(40) NOT NULL,
    opportunity_mentor      INT         REFERENCES person(person_id)
);

--create progress table--
CREATE TABLE progress (
    progress_id             serial      PRIMARY KEY,
    progress_person         INT         REFERENCES person(person_id),
    progress_opportunity    INT         REFERENCES opportunity(opportunity_id),
    progress_status         VARCHAR(20) NOT NULL,
    progress_notes          varchar(500)
);

--inset ward names --
INSERT INTO wards(ward)
VALUES
('Anderson'),
('Antelope'),
('Cottonwood'),
('Corning'),
('FallRiver'),
('PaloCedro'),
('RedBluff');


--insert calling names--
INSERT InTO callings(calling)
VALUES
('Bishop'),
('B_frst'),
('B_second'),
('RS_pres'),
('RS_first'),
('RS_second'),
('EQ_pres'),
('EQ_first'),
('EQ_second'),
('OppCntr');

