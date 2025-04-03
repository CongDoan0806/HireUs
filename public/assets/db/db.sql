CREATE DATABASE IF NOT EXISTS HireUs_db;
USE HireUs_db;
drop database HireUs_db;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `image` varchar(100),
  `role` enum('recruiter','applicant', 'admin') NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
);

CREATE TABLE `Job_positions` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(50) NOT NULL,
  PRIMARY KEY (`position_id`),
  UNIQUE KEY `position_name` (`position_name`)
);


CREATE TABLE `job_types` (
  `job_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_type_name` enum('fulltime','parttime','remote','internship','contract') NOT NULL DEFAULT 'fulltime',
  PRIMARY KEY (`job_type_id`)
);

CREATE TABLE `levels` (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`level_id`)
);

CREATE TABLE `companies` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(100) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `company_website` varchar(255) DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `employee_count` int(11) DEFAULT NULL,
  `comp_benefit` text NOT NULL,
  `founded_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`company_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
);

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_type_id` int(11) NOT NULL,
  `status` enum('open','close') NOT NULL,
  `level_id` int(11) NOT NULL,
  `job_description` text NOT NULL,
  `responsibilities` text NOT NULL,
  `requirements` text NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `job_benefit` text NOT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `posted_date` datetime DEFAULT current_timestamp(),
  `deadline` date NOT NULL,
  `required_candidates` int(11) NOT NULL DEFAULT 1,
  `total_applied` int(11) NOT NULL DEFAULT 0,
  `position_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`job_id`),
  KEY `user_id` (`user_id`),
  KEY `level_id` (`level_id`),
  KEY `job_type_id` (`job_type_id`),
  CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  CONSTRAINT `jobs_ibfk_3` FOREIGN KEY (`level_id`) REFERENCES `levels` (`level_id`) ON DELETE CASCADE,
  CONSTRAINT `jobs_ibfk_4` FOREIGN KEY (`job_type_id`) REFERENCES `job_types` (`job_type_id`) ON DELETE CASCADE,
  CONSTRAINT `jobs_ibfk_5` FOREIGN KEY (`position_id`) REFERENCES `Job_position` (`position_id`) ON DELETE CASCADE,
  CONSTRAINT `chk_required_candidates` CHECK (`required_candidates` >= 0),
  CONSTRAINT `chk_total_applied` CHECK (`total_applied` >= 0)
);

CREATE TABLE `applications` (
  `application_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `apply_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('pending','accepted','rejected') DEFAULT 'pending',
  `cv` varchar(100) NOT NULL,
  PRIMARY KEY (`application_id`)
);

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `job_id` int(11),
  `company_id` int(11),
  `comment_content` text NOT NULL,
  `rating` TINYINT(1) NOT NULL CHECK (`rating` BETWEEN 1 AND 5),
  PRIMARY KEY (`comment_id`)
);

-- Đây chỉ là data mẫu của bảng user để chạy databse thôi nha.sau này sẽ sửa lại là các toài khoản mà họ đăng ký á. 
INSERT INTO `users` (`password`, `email`, `full_name`, `phone`, `date_of_birth`, `gender`, `image`, `role`) VALUES
('hashed_password1', 'recruiter1@example.com', 'Nguyễn Văn A', '0987654321', '1985-06-15', 'male', 'avatar1.jpg', 'recruiter'),
('hashed_password2', 'recruiter2@example.com', 'Trần Thị B', '0978543210', '1990-09-22', 'female', 'avatar2.jpg', 'recruiter'),
('hashed_password3', 'recruiter3@example.com', 'Lê Minh C', '0965123784', '1987-02-11', 'male', 'avatar3.jpg', 'recruiter'),
('hashed_password4', 'recruiter4@example.com', 'Phạm Văn D', '0954678231', '1993-11-30', 'male', 'avatar4.jpg', 'recruiter'),
('hashed_password5', 'recruiter5@example.com', 'Hoàng Mỹ E', '0945896712', '1982-07-19', 'female', 'avatar5.jpg', 'recruiter'),
('hashed_password6', 'recruiter6@example.com', 'Đỗ Quang F', '0932145879', '1989-04-25', 'male', 'avatar6.jpg', 'recruiter');


INSERT INTO Job_position (position_name)
VALUES ('Full Stack'),
	('Front End'),
    ('Back End'),
    ('Business Analyst'),
    ('Manual Tester'),
    ('Automation Tester'),
    ('DevOps'),
    ('Data Engineer'),
    ('Scrum Master'),
    ('Mobile Developer'),
    ('Game Developer'),
    ('Security Analyst'),
    ('System Administrator'),
    ('Data Scientist'),
    ('Performance Tester'),
    ('UI/UX Designer'),
    ('Cloud Engineer');

INSERT INTO `job_types` (job_type_name)  
VALUES  
    ('fulltime'),  
    ('parttime'),  
    ('remote'),  
    ('internship'),  
    ('contract');

INSERT INTO `levels` (level_name)  
VALUES  
    ('Intern'),  
    ('Fresher'),  
    ('Junior'),  
    ('Mid-Level'),  
    ('Senior'),  
    ('Lead'),  
    ('Principal'),  
    ('Architect'),  
    ('CTO');  


INSERT INTO `companies` (`company_name`, `logo`, `company_website`, `company_address`, `employee_count`, `comp_benefit`, `founded_date`, `description`, `user_id`) VALUES
('TechCorp', 'techcorp_logo.png', 'http://www.techcorp.com', '123 Tech St.', 500, 'Comprehensive health insurance, Stock options, Flexible work hours, Remote work opportunities', '2000-05-01', 'A leading technology company specializing in innovative software solutions, cloud computing, and AI-driven applications.', 1),
('HealthMed', 'healthmed_logo.png', 'http://www.healthmed.com', '456 Health Ave.', 200, 'Private health insurance, Wellness programs, Professional development courses, Flexible hours', '2010-03-15', 'A cutting-edge health technology company focused on digital healthcare solutions, medical data analytics, and AI-powered diagnostics.', 2),
('FinBank', 'finbank_logo.png', 'http://www.finbank.com', '789 Finance Rd.', 1000, 'Retirement plans, Performance-based bonuses, Hybrid work model, Learning stipends', '1995-06-20', 'A global fintech company developing secure banking software, blockchain-based financial solutions, and AI-driven risk management tools.', 3),
('EduLearn', 'edulearn_logo.png', 'http://www.edulearn.com', '101 Education Blvd.', 50, 'Work-from-home policy, Learning and development budget, Stock options, Flexible PTO', '2015-08-30', 'An EdTech platform revolutionizing online learning through AI-powered tutoring, personalized course recommendations, and VR-enhanced training.', 4),
('RetailCo', 'retailco_logo.png', 'http://www.retailco.com', '102 Retail Ln.', 300, 'Employee discounts on tech gadgets, Remote work options, Annual tech conference sponsorship, Performance bonuses', '2018-09-10', 'A technology-driven e-commerce and retail solutions company, specializing in AI-powered inventory management, digital payment systems, and smart logistics.', 5),
('KMS Technology', 'kms_logo.png', 'https://kms-technology.com', 'XLIII Specialty Coffee, 422 Đ. Ng. Thì Sĩ, Bắc Mỹ An, Ngũ Hành Sơn, Đà Nẵng', 2200, 'Full Social and Health Insurance: KMS Technology ensures full participation in social and health insurance for employees, complying with legal requirements to protect their well-being and financial security.', '2019-12-25', 'Since its establishment, KMS Đà Nẵng has achieved remarkable milestones. Within five years, the team has participated in over 40 projects across various sectors, including healthcare, finance and banking, insurance, and enterprise software.', 2 ),
('FPT Software', 'fpt_logo.png', 'https://fptsoftware.com', 'FPT Complex, 16 Ton That Thuyet, My Dinh, Nam Tu Liem, Hanoi', 20000, 'Health insurance, Advanced training programs, International job opportunities', '1999-01-13', 'Vietnam’s leading software company, providing IT services and software solutions.', 1),
('Viettel Solutions', 'viettel_logo.png', 'https://viettel.com.vn', 'Lot D26, Alley 3, Ton That Thuyet, Yen Hoa, Cau Giay, Hanoi', 50000, 'Healthcare benefits, Performance bonuses, Professional training', '2000-10-15', 'A member of Viettel Group, specializing in IT solutions and telecommunications.', 2),
('CMC Corporation', 'cmc_logo.png', 'https://www.cmc.com.vn', 'CMC Tower, Duy Tan Street, Cau Giay, Hanoi', 3000, 'Comprehensive insurance, Flexible leave policy, Creative working environment', '1993-05-26', 'A leading Vietnamese technology corporation operating in IT and telecommunications.', 3),
('VNPT Technology', 'vnpt_logo.png', 'https://vnpt.com.vn', '57 Huynh Thuc Khang, Lang Ha, Dong Da, Hanoi', 40000, 'Retirement benefits, Professional training, Family support programs', '1995-03-26', 'Vietnam Posts and Telecommunications Group, providing telecom and IT services.', 4),
('VNG Corporation', 'vng_logo.png', 'https://www.vng.com.vn', 'Z06, Street 13, Tan Thuan Dong, District 7, Ho Chi Minh City', 3000, 'Health insurance, Flexible working hours, Recreational activities', '2004-09-09', 'Vietnam’s leading technology company, known for products like Zalo and Zing.', 5),
('TMA Solutions', 'tma_logo.png', 'https://www.tma.com.vn', 'Lot 1, Street 2, Quang Trung Software Park, District 12, Ho Chi Minh City', 2500, 'Skill development training, Health insurance, Career advancement opportunities', '1997-07-20', 'A software company with extensive experience in software development and outsourcing.', 6),
('Pasona Tech Đà Nẵng', 'pasona_tech_logo.png', 'https://www.pasonatech.vn/vi', '243 Phan Đăng Lưu, Khuê Trung Ward, Cẩm Lệ District, Da Nang', 190, 'Health insurance, Professional training, International working environment', '2004-02-01', 'A 100% Japanese-owned company specializing in software development and IT services.', 1),
('Devplus', 'devplus_logo.png', 'https://devplus.edu.vn/', 'Address not available', NULL, 'Health insurance, Flexible working hours', 'Founded date not available', 'A technology company specializing in software solutions and web design.', 2),
('Kozocom', 'kozocom_logo.png', 'http://www.kozocom.com', 'Address not available', NULL, 'Health insurance, Career advancement opportunities', 'Founded date not available', 'A company providing technology solutions and software development services.', 3),
('NAB', 'nab_logo.png', 'https://www.nab.com.au', 'Address not available', NULL, 'Health insurance, Retirement plans, Flexible working hours', 'Founded date not available', 'National Australia Bank with a technology branch in Vietnam.', 4);



INSERT INTO `jobs` (`user_id`, `job_title`, `job_type_id`, `status`, `level_id`, `job_description`, `responsibilities`, `requirements`, `location`, `job_benefit`, `salary`, `deadline`, `required_candidates`, `total_applied`, `position_id`) 
VALUES
(1, 'Senior Full Stack Developer', 1, 'open', 5, 'Develop and maintain web applications using modern technologies.', 
 'Design architecture, write clean code, conduct code reviews, and optimize performance.', 
 '5+ years of experience in full-stack development, strong knowledge of React, Node.js, and databases.', 
 'Ho Chi Minh City', 'Health insurance, stock options, remote work, learning budget', 3000.00, '2025-06-30', 2, 0, 1),

(2, 'Junior Frontend Developer', 2, 'open', 3, 'Work on user interfaces and frontend development for web applications.', 
 'Develop UI components, optimize performance, and collaborate with backend engineers.', 
 '1+ year experience with React.js/Vue.js, strong understanding of HTML, CSS, JavaScript.', 
 'Hanoi', 'Flexible hours, remote work, learning stipend, annual bonuses', 1200.00, '2025-07-15', 3, 0, 2),

(3, 'DevOps Engineer', 3, 'open', 4, 'Manage cloud infrastructure, CI/CD pipelines, and automation tools.', 
 'Implement CI/CD, ensure high availability, monitor cloud services.', 
 '3+ years experience in AWS/GCP, Terraform, Kubernetes, and CI/CD tools.', 
 'Da Nang', 'Paid certifications, flexible schedule, remote work option', 2500.00, '2025-06-25', 1, 0, 7),

(4, 'Data Scientist', 1, 'open', 5, 'Analyze data and build predictive models for business insights.', 
 'Work with big data, create machine learning models, present findings.', 
 '4+ years experience in Python, SQL, TensorFlow, and data visualization.', 
 'Ho Chi Minh City', 'Annual bonuses, research funding, work-from-home support', 3500.00, '2025-08-10', 2, 0, 14),

(5, 'Security Analyst', 5, 'open', 4, 'Ensure security best practices and monitor threats for IT systems.', 
 'Monitor security threats, perform penetration testing, and implement security policies.', 
 '3+ years in cybersecurity, knowledge of SIEM, firewalls, and ethical hacking.', 
 'Hanoi', 'Cybersecurity training, flexible work environment, team-building trips', 2800.00, '2025-07-30', 1, 0, 12), 
 
(6, 'Mobile Developer (React Native)', 1, 'open', 4, 'Develop mobile applications using React Native for both iOS and Android.', 
 'Design UI components, integrate APIs, and optimize app performance.', 
 '2+ years experience with React Native, JavaScript/TypeScript, and mobile app deployment.', 
 'Ho Chi Minh City', 'Flexible hours, remote work options, stock options', 2200.00, '2025-07-10', 2, 0, 10),

(2, 'Automation QA Engineer', 4, 'open', 3, 'Design and implement automated test cases for web and mobile applications.', 
 'Develop test scripts, report bugs, and collaborate with developers to ensure software quality.', 
 '1-3 years experience with Selenium, Appium, Java/Python.', 
 'Hanoi', 'Performance-based bonuses, career development programs', 2000.00, '2025-06-30', 2, 0, 6),

(3, 'Backend Developer (Node.js)', 1, 'open', 4, 'Build and maintain scalable backend systems for web applications.', 
 'Develop RESTful APIs, optimize database queries, and implement security best practices.', 
 '3+ years experience with Node.js, Express, PostgreSQL/MongoDB.', 
 'Da Nang', 'Annual bonuses, work-from-home options, technical workshops', 2800.00, '2025-07-20', 3, 0, 3),

(5, 'Scrum Master', 3, 'open', 5, 'Facilitate Agile ceremonies and help teams deliver high-quality software.', 
 'Lead daily standups, remove blockers, and coach teams on Agile methodologies.', 
 '3+ years experience as a Scrum Master, knowledge of Jira and Agile frameworks.', 
 'Hanoi', 'Leadership training, remote-friendly work, wellness programs', 3200.00, '2025-08-05', 1, 0, 9),

(4, 'UI/UX Designer', 2, 'open', 3, 'Create user-friendly designs and improve customer experience.', 
 'Work with product managers to design wireframes, prototypes, and final UI.', 
 '2+ years experience in Figma, Adobe XD, Sketch.', 
 'Ho Chi Minh City', 'Creative work environment, flexible working hours, free gym membership', 2500.00, '2025-07-15', 1, 0, 16),

(1, 'Cloud Engineer (AWS/GCP)', 1, 'open', 5, 'Design and maintain cloud infrastructure for high-performance applications.', 
 'Implement and manage cloud resources, security policies, and automation scripts.', 
 '4+ years experience with AWS/GCP, Terraform, Kubernetes, and cloud security.', 
 'Da Nang', 'Certification sponsorship, flexible PTO, international career opportunities', 3500.00, '2025-06-28', 2, 0, 17),

(6, 'Blockchain Developer', 5, 'open', 5, 'Develop blockchain-based applications and smart contracts.', 
 'Write and deploy smart contracts, ensure blockchain security, and optimize performance.', 
 '3+ years experience with Solidity, Ethereum, Hyperledger.', 
 'Ho Chi Minh City', 'Remote work, startup culture, equity options', 4000.00, '2025-08-15', 2, 0, 3),

(3, 'System Administrator', 3, 'open', 4, 'Manage IT systems, monitor server performance, and troubleshoot issues.', 
 'Maintain security, configure network infrastructure, and handle cloud backups.', 
 '3+ years experience in Linux/Windows administration, networking, and virtualization.', 
 'Hanoi', 'Paid certifications, work-from-home support, yearly tech allowance', 2700.00, '2025-07-05', 1, 0, 13),

(2, 'Game Developer (Unity)', 1, 'open', 4, 'Develop engaging mobile and PC games using Unity.', 
 'Write game mechanics, implement UI/UX, and optimize performance.', 
 '2+ years experience with Unity, C#, and 3D game development.', 
 'Da Nang', 'Game development workshops, project-based bonuses, free gaming sessions', 2600.00, '2025-07-12', 2, 0, 11),

(5, 'AI Engineer', 1, 'open', 6, 'Design and deploy AI models for predictive analytics and automation.', 
 'Develop deep learning models, work with big data, and fine-tune algorithms.', 
 '5+ years experience in AI, Python, TensorFlow/PyTorch, and NLP.', 
 'Ho Chi Minh City', 'Research funding, flexible work schedule, AI conferences sponsorship', 5000.00, '2025-08-30', 1, 0, 12),
 
 (4, 'Full Stack Developer', 1, 'open', 4, 'Develop and maintain web applications using modern frameworks.', 
 'Build both frontend and backend systems, ensure application security, and optimize performance.', 
 '3+ years experience with JavaScript, React, Node.js, and databases (PostgreSQL/MySQL).', 
 'Hanoi', 'Flexible working hours, remote work options, stock options', 3200.00, '2025-07-25', 2, 0, 1),

(2, 'Cybersecurity Analyst', 1, 'open', 5, 'Analyze and improve system security, monitor potential threats.', 
 'Develop security policies, conduct penetration testing, and ensure data protection.', 
 '4+ years experience in cybersecurity, ethical hacking, and SIEM tools.', 
 'Ho Chi Minh City', 'Cybersecurity training, international conferences, flexible hours', 4500.00, '2025-08-10', 1, 0, 12),

(3, 'Data Scientist', 1, 'open', 5, 'Work on big data analytics, predictive modeling, and AI-driven insights.', 
 'Process large datasets, develop machine learning models, and visualize trends.', 
 '4+ years experience in Python, SQL, TensorFlow, and data visualization tools.', 
 'Da Nang', 'AI research funding, free courses, remote work', 4800.00, '2025-08-20', 1, 0, 14),

(5, 'DevOps Engineer', 1, 'open', 4, 'Develop CI/CD pipelines, monitor infrastructure, and automate deployments.', 
 'Work with developers to improve system reliability and deployment efficiency.', 
 '3+ years experience with Docker, Kubernetes, AWS/GCP, and Terraform.', 
 'Hanoi', 'Work-from-home options, certification sponsorship, annual bonuses', 3800.00, '2025-07-30', 1, 0, 7),

(6, 'Software Architect', 1, 'open', 7, 'Design high-level software architecture for scalable applications.', 
 'Define system architecture, review code, and guide development teams.', 
 '7+ years experience in system design, microservices, and cloud computing.', 
 'Ho Chi Minh City', 'Leadership training, stock options, international travel opportunities', 6500.00, '2025-08-25', 1, 0, 1);


