DROP TABLE IF EXISTS blogs;
CREATE TABLE blogs (
    blog_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    author INTEGER NOT NULL
);

DROP TABLE IF EXISTS users;
CREATE TABLE users(
    user_id Integer Primary key AUTO_INCREMENT,
    fullname Varchar(30) not null,
    username Varchar(30) not null unique,
    email Varchar(100) not null unique,
    password varchar(255) not null
);


