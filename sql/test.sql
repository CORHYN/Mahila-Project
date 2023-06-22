CREATE TABLE company (
    id INT,
    name VARCHAR(255),
    registration_number VARCHAR(50),
    company_id VARCHAR(50),
    email VARCHAR(255),
    password VARCHAR(255),
    year_of_founding YEAR,
    number_of_employees INT
);

CREATE TABLE job_listing (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company_id INT,
    job_title VARCHAR(255),
    description TEXT,
    pay DECIMAL(10, 2),
    position VARCHAR(255),
    open BOOLEAN,
    userid VARCHAR(10),
    FOREIGN KEY (company_id) REFERENCES company(id),
    FOREIGN KEY (userid) REFERENCES user_table(userid)
);

CREATE TABLE user_table(
    userid VARCHAR(10),
    username VARCHAR(25) ,
    pass VARCHAR(50),
    tokenid INT(7),
    email VARCHAR(50),
    addr VARCHAR(35),
    education VARCHAR(150),
    yearsofexperiance INT(2),
    workhistory VARCHAR(200),
    socialmediaaccounts VARCHAR(200),
    PRIMARY KEY (userid),
    UNIQUE (username)
);