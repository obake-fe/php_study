CREATE TABLE users_test_data (
                       `id` SERIAL PRIMARY KEY,
                       `name` VARCHAR(255) NOT NULL,
                       `date` DATE,
                       `language` CHAR(3),
                       `math` CHAR(3),
                       `science` CHAR(3),
                       `society` CHAR(3)
);