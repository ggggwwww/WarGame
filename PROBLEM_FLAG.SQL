CREATE DATABASE problem_flag;
USE problem_flag;

CREATE USER 'flag_master'@'%' IDENTIFIED BY '$F1@9M@$73R';
GRANT ALL PRIVILEGES ON problem_flag.* TO 'flag_master'@'%';

CREATE TABLE problems (
    id INT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    flag VARCHAR(255) NOT NULL,
    isSolved BOOLEAN DEFAULT FALSE
);


-- 예시 INSERT 구문 --
INSERT INTO problems (id, title, flag) VALUES
(6, 'problem 6', 'test');