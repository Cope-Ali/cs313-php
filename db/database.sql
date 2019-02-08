--Create Wards table---
CREATE TABLE wards (
    ward VARCHAR(20) PRIMARY KEY
);


--Create Person table--
CREATE TABLE person (
        person_id           serial          PRIMARY KEY,
        person_ward         varchar(20)     REFERENCES wards(ward) ,
        person_first        varchar(20)     NOT NULL,
        person_last         varchar(20)     NOT NULL,
        person_street_address VARCHAR(80),
        person_city VARCHAR(40),
        person_state VARCHAR(2),
        person_phone varchar(10),
        person_email varchar(40)  
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
    progress_status         VARCHAR(20) NOT NULL
);

--create notes table--
CREATE TABLE notes (
    notes_id                serial      PRIMARY KEY,
    notes_progress          INT         REFERENCES progress(progress_id),
    notes_person            INT         REFERENCES person(person_id),
    notes_leader            INT         REFERENCES leader(leader_id),
    notes_text              VarChar(1000) NOT NULL,
    notes_date              DATE
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

--Create person data
Insert Into person(
        person_ward,
        person_first,
        person_last,
        person_street_address,
        person_city,
        person_state,
        person_phone,
        person_email)
VALUES
('Anderson', 'Bob', 'Smith', '1234 Main', 'Anderson', 'CA', '5301231234', 'email@company.com'),
('Anderson', 'Betty', 'Jones', '48 Market St', 'Anderson', 'CA', '5301231000', 'name@company.com'),
('Antelope', 'Jill', 'Smoot', '124 Hill Dr', 'Red Bluff', 'CA', '5302221234', 'smoot@company.com'),
('Antelope', 'John', 'Smith', '5548 Main', 'Red Bluff', 'CA', '5301233000', 'jsmith@company.com'),
('Cottonwood', 'Mark', 'Hill', '55 Oak Lane', 'Cottonwood', 'CA', '5302258194', 'hillobeans@company.com'),
('Cottonwood', 'Mindy', 'Hale', '12 Main', 'Cottonwood', 'CA', '5305695587', 'minhale@company.com'),
('Corning', 'Bob', 'Hale', '225 River Lane', 'Corning', 'CA', '5303331234', 'bobhale@company.com'),
('Corning', 'Brenda', 'Halter', '55 Sandy Dr', 'Corning', 'CA', '5302223345', 'Bemail@company.com'),
('FallRiver', 'Fred', 'Bread', '12 Bakery', 'Fall River Mills', 'CA', '5305554455', 'FredsBakery@company.com'),
('FallRiver', 'Francine', 'Bass', '22 Fish Court', 'Fall River Mills', 'CA', '5307897878', 'fran@company.com'),
('PaloCedro', 'Peter', 'Parker', '789 Spider Dr', 'Palo Cedro', 'CA', '5307665566', 'spiderman@company.com'),
('PaloCedro', 'Pauline', 'Hale', '7745 Rainbow Dr', 'Palo Cedro', 'CA', '5301259845', 'ph@company.com'),
('RedBluff', 'Steve', 'Adams', '84 Cricket', 'Red Bluff', 'CA', '5305305530', 'adamsFamily@company.com'),
('RedBluff', 'Sarah', 'Little', '2258 Mouse Track Trail', 'Red Bluff', 'CA', '5307565401', 'sarah@company.com')
;