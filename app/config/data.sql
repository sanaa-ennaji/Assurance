CREATE DATABASE IF NOT EXISTS assurance;
USE assurance;


CREATE TABLE client (
  id varchar(100) PRIMARY KEY,
  fullName varchar(50) NOT NULL,
  CIN varchar(20) NOT NULL,
  address varchar(255) NOT NULL,  
  phone varchar(15) NOT NULL,
  email varchar(50) NOT NULL
);

CREATE TABLE insurer (
  id varchar(100) PRIMARY KEY,
  nom varchar(100) NOT NULL,
  address varchar(255) NOT NULL, 
  email varchar(50) NOT NULL,
  phone varchar(50) NOT NULL
);


CREATE TABLE insuranceofclient (
  client_id varchar(100) NOT NULL,
  insurer_id varchar(100) NOT NULL,
  FOREIGN KEY (client_id) REFERENCES client(id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (insurer_id) REFERENCES insurer(id) ON DELETE CASCADE ON UPDATE CASCADE

);

CREATE TABLE article (
  id varchar(100) PRIMARY KEY,
  title varchar(50) NOT NULL,
  description varchar(50) NOT NULL,  
  client_id varchar(100),
  insurer_id varchar(100),
  FOREIGN KEY (client_id) REFERENCES client(id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (insurer_id) REFERENCES insurer(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE claim (
  id varchar(100) PRIMARY KEY,
  description varchar(255) NOT NULL,
  article_id varchar(100) NOT NULL,
  FOREIGN KEY (article_id) REFERENCES article(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE premium (
  id varchar(100) PRIMARY KEY,
  amount float NOT NULL,
  claim_id varchar(100) NOT NULL,
  FOREIGN KEY (claim_id) REFERENCES claim(id) ON DELETE CASCADE ON UPDATE CASCADE
);
