CREATE TABLE idpassHash (
    `id` SERIAL PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `mail` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL
);