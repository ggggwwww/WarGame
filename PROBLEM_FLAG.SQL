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
INSERT INTO problems (id, title, flag, isSolved) VALUES
(6, 'problem 6', 'FLAG{T4mp3r!ng_1$_v3ry_34sy_4_m3!}', 0);

INSERT INTO problems (id, title, flag, isSolved) VALUES
(7, 'problem 7', 'FLAG{C4n_y0u_gu3ss_s3cr3t_0f_0ur_n3tw0rk}', 0);
