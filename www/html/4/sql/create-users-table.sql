CREATE TABLE users (
    `id` SERIAL PRIMARY KEY,
    `status` INTEGER NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `grade` INTEGER NOT NULL,
    `class` CHAR(1) NOT NULL
);