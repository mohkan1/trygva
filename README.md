# trygva
Login and Signin System with CodeIgniter 4

To access the home page:

http://localhost/CodeIgniter/public/Form

To access list of all users:

http://localhost/CodeIgniter/public/users

PHP-version: 7.4.27

![image](https://user-images.githubusercontent.com/43953894/147985281-27018e62-fef6-4842-a6b5-bedfe82a0a78.png)
![image](https://user-images.githubusercontent.com/43953894/147985366-73b642b2-926e-4d57-9719-ca4a35087bbb.png)
![image](https://user-images.githubusercontent.com/43953894/147985386-5b4ea5ac-0352-476e-94c9-92bbcf2a9e15.png)


Create the table:

CREATE TABLE users (
    id int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
    name varchar(100) NOT NULL COMMENT 'Name',
    phone_number varchar(255) NOT NULL COMMENT 'Phone_number',
    email varchar(255) NOT NULL COMMENT 'Email',
    password varchar(255) NOT NULL COMMENT 'Password',
    
    PRIMARY KEY (id)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='datatable demo table' AUTO_INCREMENT=1;
  
INSERT INTO `employees` (`id`, `name`, `phone_number`, `email`, `password`) VALUES
(1, 'John Doe', 'pass1234', 'john@gmail.com', '12341234'),
(2, 'Vanya Hargreeves', 'pass1234', 'vanya@gmail.com', '12341234'),
(3, 'Luther Hargreeves', 'pass1234', 'luther@gmail.com', '12341234'),
(4, 'Diego Hargreeves', 'pass1234', 'diego@gmail.com', '12341234'),
(5, 'Klaus Hargreeves', 'pass1234', 'klaus@gmail.com', '12341234'),
(6, 'Ben Hargreeves', 'pass1234', 'ben@gmail.com', '12341234'),
(7, 'The Handler', 'pass1234', 'handler@gmail.com', '12341234');
