SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE MibcsSystem;

USE MibcsSystem;

CREATE TABLE Students (
    student_id INT PRIMARY KEY,
    sur_name VARCHAR(50) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    middle_name VARCHAR(50),
    dob DATE NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    profile_photo VARCHAR(255),
    village VARCHAR(100),
    city VARCHAR(50),
    phone_number VARCHAR(15),
    email VARCHAR(100),
    session_study ENUM('Day', 'Evening', 'Weekend'),
    parent_name VARCHAR(100) NOT NULL,
    relationship_id INT NOT NULL, -- Changed to reference Relationships
    parent_phone VARCHAR(15) NOT NULL,
    parent_email VARCHAR(100),
    secondary_contact_name VARCHAR(100),
    secondary_contact_phone VARCHAR(15),
    secondary_contact_email VARCHAR(100),
    admission_number VARCHAR(20) UNIQUE NOT NULL,
    enrollment_date DATE NOT NULL,
    classroom_id INT,
    program_id INT NOT NULL, -- Reference Programs table
    course_id INT, -- Updated for Foreign Key
    password_hash VARCHAR(255) NOT NULL,
    School VARCHAR(9) NOT NULL,
    status_ VARCHAR(9) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

  /*   FOREIGN KEY (classroom_id) REFERENCES Classrooms(classroom_id),
    FOREIGN KEY (course_id) REFERENCES Courses(course_id),
    FOREIGN KEY (relationship_id) REFERENCES Relationships(relationship_id),
    FOREIGN KEY (program_id) REFERENCES Programs(program_id) */
);

CREATE TABLE Relationships (
    relationship_id INT PRIMARY KEY,
    relationship_name VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE Programs (
    program_id INT PRIMARY KEY,
    program_name VARCHAR(50) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE Courses (
    course_id INT PRIMARY KEY,
    course_name VARCHAR(100) NOT NULL,
    course_description TEXT,
    program_id INT NOT NULL,
    number_of_courseunits INT NOT NULL,
    amount_to_be paid  int Not NULL,
    credits INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (program_id) REFERENCES Programs(program_id)
);

CREATE TABLE Courseunits (
    courseunit_id INT PRIMARY KEY,
    courseunit_name VARCHAR(100) NOT NULL,
    courseunit_code VARCHAR(20) UNIQUE NOT NULL,
    course_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES Courses(course_id)
);

create table funds (
 funds_id int PRIMARY key,
 student_id int ,
 course_id int,
 amount_paid int,
 balance int,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
     FOREIGN KEY (course_id) REFERENCES Courses(course_id)
     FOREIGN KEY (student_id) REFERENCES students(student_id)
);


CREATE TABLE Enrollments (
    enrollment_id INT PRIMARY KEY,
    student_id INT NOT NULL,
    course_id INT NOT NULL,
    enrollment_date DATE NOT NULL,
    completion_status ENUM('Enrolled', 'Completed', 'Dropped') DEFAULT 'Enrolled',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES Students(student_id),
    FOREIGN KEY (course_id) REFERENCES Courses(course_id)
);

CREATE TABLE Roles (
    role_id INT PRIMARY KEY,
    role_name VARCHAR(50) UNIQUE NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE Staff (
    staff_id INT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    dob DATE NOT NULL,
    phone_number VARCHAR(15),
    email VARCHAR(100),
    address VARCHAR(255),
    hire_date DATE NOT NULL,
    role_id INT NOT NULL, -- Changed to reference Roles
    salary DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    /* FOREIGN KEY (role_id) REFERENCES Roles(role_id) */
);


CREATE TABLE Classrooms (
    classroom_id INT PRIMARY KEY,
    classroom_name VARCHAR(50) NOT NULL,
    capacity INT NOT NULL CHECK (capacity > 0),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE Payments (
    payment_id INT PRIMARY KEY,
    student_id INT NOT NULL,
    amount DECIMAL(10, 2) NOT NULL CHECK (amount > 0),
    payment_date DATE NOT NULL,
    payment_method ENUM('Cash', 'Card', 'Bank Transfer') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES Students(student_id)
);

CREATE TABLE Results (
    result_id INT PRIMARY KEY,
    student_id INT NOT NULL,
    course_id INT NOT NULL,
    score DECIMAL(5, 2) NOT NULL CHECK (score >= 0 AND score <= 100),
    grade VARCHAR(2) NOT NULL,
    result_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES Students(student_id),
    FOREIGN KEY (course_id) REFERENCES Courses(course_id)
);

CREATE TABLE Complaints (
    complaint_id INT PRIMARY KEY,
    student_id INT NOT NULL,
    complaint_text TEXT NOT NULL,
    complaint_date DATE NOT NULL,
    status ENUM('Pending', 'Resolved', 'Dismissed') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES Students(student_id)
);

CREATE TABLE Highlights (
    highlight_id INT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    highlight_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE Timetable (
    timetable_id INT PRIMARY KEY,
    classroom_id INT NOT NULL,
    courseunit_id INT NOT NULL,
    day_of_week ENUM('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday') NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL CHECK (start_time < end_time),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (classroom_id) REFERENCES Classrooms(classroom_id),
    FOREIGN KEY (courseunit_id) REFERENCES Courseunits(courseunit_id)
);

CREATE TABLE Attendance (
    attendance_id INT PRIMARY KEY,
    student_id INT NOT NULL,
    staff_id INT NOT NULL,
    date DATE NOT NULL,
    status ENUM('Present', 'Absent', 'Late', 'Excused') NOT NULL,
    remarks TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES Students(student_id),
    FOREIGN KEY (staff_id) REFERENCES Staff(staff_id)
);

-- Insert data into tables
INSERT INTO Students (
    student_id, sur_name, first_name, middle_name, dob, gender, profile_photo, village, city, phone_number, email,
    session_study, parent_name, relationship_id, parent_phone, parent_email, secondary_contact_name, 
    secondary_contact_phone, secondary_contact_email, admission_number, enrollment_date, classroom_id, program_id, 
    course_id, password_hash,school, status_
) VALUES (
    1, 'Smith', 'John', 'A.', '2005-01-15', 'Male', 'john_profile.jpg', 'Downtown', 'Cityville', '1234567890', 'project@example.com',
    'Day', 'Michael Smith', 1, '9876543210', 'michael.smith@example.com', 'Anna Smith', '5678901234', 'anna.smith@example.com',
    'ADM001', '2023-09-01', 1, 1, 1, '123456789','school', 'Active'
);

INSERT INTO Relationships (relationship_id, relationship_name) VALUES
(1, 'Father'),
(2, 'Mother'),
(3, 'Guardian');

INSERT INTO Programs (program_id, program_name, description) VALUES
(1, 'Computer Science', 'Bachelor program in Computer Science'),
(2, 'Business Administration', 'Bachelor program in Business Administration');

INSERT INTO Courses (course_id, course_name, course_description, program_id, number_of_courseunits, credits) VALUES
(1, 'Introduction to Programming', 'Learn programming basics', 1, 5, 3),
(2, 'Business Management', 'Introduction to business management', 2, 4, 3);

INSERT INTO Courseunits (courseunit_id, courseunit_name, courseunit_code, course_id) VALUES
(1, 'Variables and Data Types', 'CS101', 1),
(2, 'Organizational Behavior', 'BM201', 2);

INSERT INTO Enrollments (enrollment_id, student_id, course_id, enrollment_date, completion_status) VALUES
(1, 1, 1, '2023-09-01', 'Enrolled');

INSERT INTO Staff (staff_id, first_name, last_name, gender, dob, phone_number, email, address, hire_date, role_id, salary) VALUES
(1, 'Jane', 'Doe', 'Female', '1985-06-20', '1231231234', 'jane.doe@example.com', '123 Elm Street', '2015-08-01', 1, 50000.00);

INSERT INTO Roles (role_id, role_name, description) VALUES
(1, 'Lecturer', 'Teaches courses'),
(2, 'Administrator', 'Manages school operations');

INSERT INTO Classrooms (classroom_id, classroom_name, capacity) VALUES
(1, 'Room A1', 30),
(2, 'Room B2', 25);

INSERT INTO Payments (payment_id, student_id, amount, payment_date, payment_method) VALUES
(1, 1, 1000.00, '2023-09-05', 'Cash');