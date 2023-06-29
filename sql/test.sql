CREATE TABLE company (
    id INT,
    cname VARCHAR(255),
    registration_number VARCHAR(50),
    company_id VARCHAR(50),
    email VARCHAR(255),
    pass VARCHAR(255),
    year_of_founding YEAR,
    number_of_employees INT
);

CREATE TABLE job_listing (
    jid INT AUTO_INCREMENT,
    company_id INT,
    job_title VARCHAR(255),
    descp TEXT,
    pay DECIMAL(10, 2),
    position VARCHAR(255)
)

CREATE TABLE user_table(
    userid INT(10) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(25) ,
    pass VARCHAR(50),
    tokenid INT(7),
    email VARCHAR(50),
);

CREATE TABLE resumes(
userid INT(10) UNIQUE,
    resumes TEXT
);