CREATE DATABASE IF NOT EXISTS assurance;
USE assurance;

CREATE TABLE article (
  id varchar(100) NOT NULL,
  title varchar(50) NOT NULL,
  description varchar(50) NOT NULL,  
  client_id varchar(50),
  insurer_id varchar(50),
  FOREIGN KEY (client_id) REFERENCES client(id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (insurer_id) REFERENCES insurer(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE claim (
  id varchar(100) NOT NULL,
  description varchar(255) NOT NULL,
  article_id varchar(100) NOT NULL,
  FOREIGN KEY (article_id) REFERENCES article(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE client (
  id varchar(100) NOT NULL,
  fullName varchar(50) DEFAULT NULL,
  CIN varchar(20) DEFAULT NULL,
  address varchar(255) DEFAULT NULL,  
  phone varchar(15) DEFAULT NULL,
  email varchar(50) DEFAULT NULL
);

CREATE TABLE insuranceofclient (
  client_id varchar(100) DEFAULT NULL,
  insurer_id varchar(100) DEFAULT NULL,
  FOREIGN KEY (client_id) REFERENCES client(id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (insurer_id) REFERENCES insurer(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE insurer (
  id varchar(100) NOT NULL,
  nom varchar(100) DEFAULT NULL,
  address varchar(255) DEFAULT NULL,  
  email varchar(50) DEFAULT NULL,
  phone varchar(50) DEFAULT NULL
);

CREATE TABLE premium (
  id varchar(100) NOT NULL,
  amount float DEFAULT NULL,
  claim_id varchar(100) DEFAULT NULL,
  FOREIGN KEY (claim_id) REFERENCES claim(id) ON DELETE CASCADE ON UPDATE CASCADE
);
