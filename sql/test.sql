CREATE TABLE company (
    id INT AUTO_INCREMENT,
    cname VARCHAR(255),
    email VARCHAR(255),
    pass VARCHAR(255),
    registration_number VARCHAR(50),
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

INSERT INTO company (cname, email, pass, registration_number, year_of_founding, number_of_employees) 
VALUES ('OpenAI', 'info@openai.com', 'password123', '123456789', 2015, 1000);

INSERT INTO company (cname, email, pass, registration_number, year_of_founding, number_of_employees) 
VALUES ('Tesla', 'info@tesla.com', 'tesla123', '987654321', 2003, 50000);

INSERT INTO company (cname, email, pass, registration_number, year_of_founding, number_of_employees) 
VALUES ('Microsoft', 'info@microsoft.com', 'microsoft123', '456789123', 1975, 150000);

INSERT INTO company (cname, email, pass, registration_number, year_of_founding, number_of_employees) 
VALUES ('Google', 'info@google.com', 'google123', '789123456', 1998, 150000);

INSERT INTO company (cname, email, pass, registration_number, year_of_founding, number_of_employees) 
VALUES ('Apple', 'info@apple.com', 'apple123', '321654987', 1976, 147000);

INSERT INTO company (cname, email, pass, registration_number, year_of_founding, number_of_employees) 
VALUES ('Amazon', 'info@amazon.com', 'amazon123', '654987321', 1994, 1400000);

INSERT INTO company (cname, email, pass, registration_number, year_of_founding, number_of_employees) 
VALUES ('Facebook', 'info@facebook.com', 'facebook123', '987321654', 2004, 60000);

INSERT INTO company (cname, email, pass, registration_number, year_of_founding, number_of_employees) 
VALUES ('Netflix', 'info@netflix.com', 'netflix123', '321789654', 1997, 10000);

INSERT INTO company (cname, email, pass, registration_number, year_of_founding, number_of_employees) 
VALUES ('Uber', 'info@uber.com', 'uber123', '654321789', 2009, 22000);

INSERT INTO company (cname, email, pass, registration_number, year_of_founding, number_of_employees) 
VALUES ('SpaceX', 'info@spacex.com', 'spacex123', '789654321', 2002, 8000);

INSERT INTO job_listing (company_id, job_title, descp, pay, position) 
VALUES (1, 'Software Engineer', 'We are seeking a talented software engineer to join our team and work on cutting-edge AI technologies.', 80000.00, 'Full-time');

INSERT INTO job_listing (company_id, job_title, descp, pay, position) 
VALUES (1, 'Data Scientist', 'We are looking for a skilled data scientist to analyze and interpret complex data sets.', 90000.00, 'Full-time');

INSERT INTO job_listing (company_id, job_title, descp, pay, position) 
VALUES (2, 'Electrical Engineer', 'We are seeking an experienced electrical engineer to design and develop innovative electrical systems for our electric vehicles.', 95000.00, 'Full-time');

INSERT INTO job_listing (company_id, job_title, descp, pay, position) 
VALUES (2, 'Software Developer', 'We are hiring a software developer to build and maintain high-quality software applications.', 85000.00, 'Full-time');

INSERT INTO job_listing (company_id, job_title, descp, pay, position) 
VALUES (3, 'Product Manager', 'We are looking for a skilled product manager to drive the development and launch of new products.', 100000.00, 'Full-time');

INSERT INTO job_listing (company_id, job_title, descp, pay, position) 
VALUES (3, 'Software Engineer', 'Join our team of talented software engineers to develop innovative solutions for our customers.', 95000.00, 'Full-time');

INSERT INTO job_listing (company_id, job_title, descp, pay, position) 
VALUES (4, 'Machine Learning Engineer', 'We are seeking a machine learning engineer to design and implement advanced machine learning models.', 100000.00, 'Full-time');

INSERT INTO job_listing (company_id, job_title, descp, pay, position) 
VALUES (4, 'Software Developer', 'Join our software development team and contribute to the development of our cutting-edge products.', 90000.00, 'Full-time');

INSERT INTO job_listing (company_id, job_title, descp, pay, position) 
VALUES (5, 'iOS Developer', 'We are hiring an iOS developer to build innovative and user-friendly mobile applications for our customers.', 85000.00, 'Full-time');

INSERT INTO job_listing (company_id, job_title, descp, pay, position) 
VALUES (5, 'Hardware Engineer', 'Join our hardware engineering team and work on designing and testing new hardware components.', 95000.00, 'Full-time');

INSERT INTO job_listing (company_id, job_title, descp, pay, position) 
VALUES (6, 'Supply Chain Manager', 'We are seeking a supply chain manager to oversee and optimize our supply chain operations.', 110000.00, 'Full-time');

INSERT INTO job_listing (company_id, job_title, descp, pay, position) 
VALUES (6, 'Data Analyst', 'Join our data analytics team to analyze and interpret large datasets to drive business insights.', 80000.00, 'Full-time');

INSERT INTO job_listing (company_id, job_title, descp, pay, position) 
VALUES (7, 'Product Designer', 'We are looking for a talented product designer to create visually appealing and user-friendly designs.', 90000.00, 'Full-time');

INSERT INTO job_listing (company_id, job_title, descp, pay, position) 
VALUES (7, 'Software Engineer', 'Join our software engineering team and develop scalable and robust software solutions.', 95000.00, 'Full-time');

INSERT INTO job_listing (company_id, job_title, descp, pay, position) 
VALUES (8, 'UI/UX Designer', 'We are seeking a UI/UX designer to create intuitive and visually appealing user interfaces.', 85000.00, 'Full-time');

INSERT INTO job_listing (company_id, job_title, descp, pay, position) 
VALUES (8, 'Content Writer', 'Join our content writing team and create engaging and informative content for our products.', 70000.00, 'Full-time');

INSERT INTO job_listing (company_id, job_title, descp, pay, position) 
VALUES (9, 'Operations Manager', 'We are looking for an experienced operations manager to oversee and streamline our operational processes.', 100000.00, 'Full-time');

INSERT INTO job_listing (company_id, job_title, descp, pay, position) 
VALUES (9, 'Business Analyst', 'Join our business analysis team to analyze market trends and identify business opportunities.', 80000.00, 'Full-time');

INSERT INTO job_listing (company_id, job_title, descp, pay, position) 
VALUES (10, 'Rocket Engineer', 'We are seeking a talented rocket engineer to design and develop advanced rocket propulsion systems.', 120000.00, 'Full-time');

INSERT INTO job_listing (company_id, job_title, descp, pay, position) 
VALUES (10, 'Embedded Systems Engineer', 'Join our team of embedded systems engineers to develop control systems for our space vehicles.', 100000.00, 'Full-time');

CREATE TABLE applied(
	jid INT(11),
    userid INT(10),
    company_id INT(11),
    resumes TEXT
);