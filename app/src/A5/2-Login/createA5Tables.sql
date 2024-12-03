CREATE TABLE `users` (
    `user_id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `username` varchar(32) NOT NULL,
    `password` varchar(32) NOT NULL
);

CREATE TABLE `login_sessions` (
    `login_id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `user_id` int NOT NULL,
    `session_id` varchar(64) NOT NULL,
    `last_access_time` int NOT NULL
);