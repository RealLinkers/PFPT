# Setup guide

### Create Mysql database

    create database pwn;
    use pwn;
    CREATE TABLE users (                                                                                                                                                                                                        
    	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,     
    	uname VARCHAR(30) NOT NULL,                                                                                   
    	upass VARCHAR(30) NOT NULL,                                                                                   
    	reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ); 
    create user 'pwnuser'@'localhost' IDENTIFIED BY 'password1';
    GRANT ALL PRIVILEGES ON pwn.* TO 'pwnuser'@'localhost';
    FLUSH PRIVILEGES;
    INSERT INTO users (uname, upass) VALUES ('user', 'hardpassword1337!');

### Web directory setup

 * Transfer all files to your web directory
 * Make the uploads folder writable by the web user - chmod 777 uploads/

# Vulnerabilities present

### SQL Injection in login
 * `name=user' AND 1=0 UNION ALL SELECT "user","pass";-- &password=pass`

### FILE Upload
 * Randomizes last 2 characters before extension