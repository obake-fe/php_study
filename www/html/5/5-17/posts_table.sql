CREATE TABLE php_study.posts_table (
    `entry_id` SERIAL PRIMARY KEY,
    `author` VARCHAR(255) NOT NULL,
    `message` VARCHAR(255),
    `post_date` TIMESTAMP NOT NULL,
);