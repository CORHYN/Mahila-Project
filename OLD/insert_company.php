<?php
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"mahila");

mysqli_query($con,"CREATE TABLE company (
    id INT PRIMARY KEY,
    cname VARCHAR(255),
    registration_number VARCHAR(50),
    company_id VARCHAR(50),
    email VARCHAR(255),
    pass VARCHAR(255),
    year_of_founding YEAR,
    number_of_employees INT
);");

$bsl = "CREATE TABLE job_listing (
    company_id INT,
    job_title VARCHAR(255),
    descp TEXT,
    pay DECIMAL(10, 2),
    position VARCHAR(255),
    jopen BOOLEAN,
    userid VARCHAR(10),
    FOREIGN KEY (company_id) REFERENCES company(id)
);";

mysqli_query($con,$bsl);


$sql = "INSERT INTO company (id, cname, registration_number, company_id, email, pass, year_of_founding, number_of_employees)
VALUES
    (1, 'ABC Corporation', 'RN12345', 'C001', 'abc@example.com', 'password123', '2000', 100),
    (2, 'XYZ Industries', 'RN67890', 'C002', 'xyz@example.com', 'pass456', '1995', 250),
    (3, '123 Corporation', 'RN98765', 'C003', '123@example.com', 'qwerty', '2010', 50),
    (4, 'Tech Solutions Ltd', 'RN54321', 'C004', 'tech@example.com', 'pass321', '2005', 150),
    (5, 'Global Enterprises', 'RN45678', 'C005', 'global@example.com', 'abcd1234', '1990', 500),
    (6, 'Acme Inc.', 'RN98765', 'C006', 'acme@example.com', 'p@w0rd', '2015', 75),
    (7, 'Innovative Technologies', 'RN87654', 'C007', 'innovative@example.com', 'password', '2008', 200),
    (8, 'Mega Corp', 'RN23456', 'C008', 'mega@example.com', 'pass123', '1998', 300),
    (9, 'Eco Solutions', 'RN76543', 'C009', 'eco@example.com', 'green123', '2012', 50),
    (10, 'Software Solutions Ltd', 'RN65432', 'C010', 'software@example.com', 'devpass', '2003', 100);
";
mysqli_query($con,$sql);
$sql1 = "INSERT INTO job_listing (company_id, job_title, descp, pay, position, jopen)
VALUES
    (1, 'Software Engineer', 'We are seeking a skilled software engineer with experience in Java and Python.', 75000.00, 'Full-time', false),
    (1, 'Data Analyst', 'We are looking for a data analyst to analyze and interpret complex data sets.', 60000.00, 'Full-time', false),
    (2, 'Marketing Manager', 'Join our team as a marketing manager and lead strategic marketing campaigns.', 80000.00, 'Full-time', false),
    (2, 'Sales Representative', 'We need a sales representative to promote and sell our products to clients.', 50000.00, 'Full-time', false),
    (3, 'Graphic Designer', 'We are hiring a creative graphic designer to design visually appealing marketing materials.', 55000.00, 'Full-time', false),
    (3, 'Accountant', 'We have an opening for an experienced accountant to manage financial records.', 70000.00, 'Full-time', false),
    (4, 'Web Developer', 'Join our web development team and build responsive websites using HTML, CSS, and JavaScript.', 65000.00, 'Full-time', false),
    (4, 'Quality Assurance Analyst', 'We are looking for a QA analyst to ensure the quality of our software products.', 60000.00, 'Full-time', false),
    (5, 'Project Manager', 'Manage and oversee large-scale projects from initiation to completion.', 90000.00, 'Full-time', false),
    (5, 'Human Resources Specialist', 'We are hiring an HR specialist to handle employee relations and recruitment.', 55000.00, 'Full-time', false)
";
mysqli_query($con,$sql1);
mysqli_close($con);
?>