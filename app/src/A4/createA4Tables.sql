CREATE TABLE `registered_users` (
    `user_id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `title` varchar(5) NOT NULL,
    `firstName` varchar(50) NOT NULL,
    `lastName` varchar(50) NOT NULL,
    `street` varchar(100) NOT NULL,
    `city` varchar(100) NOT NULL,
    `province` varchar(30) NOT NULL,
    `postalCode` varchar(11) NOT NULL,
    `country` varchar(6) NOT NULL,
    `phone` varchar(15) NOT NULL,
    `email` varchar(150) NOT NULL,
    `subscribed` boolean NOT NULL
);

