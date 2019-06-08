CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Technology'),
(2, 'Gaming'),
(3, 'Auto'),
(4, 'Entertainment'),
(5, 'Books');

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

INSERT INTO `posts` (`id`, `category_id`, `title`, `body`, `author`) VALUES
(1, 1, 'Technology Post One', 'Hello world!!!!!','ABC'),
(2, 2, 'Gaming Post One', 'You have to be ODD to be number ONE','DEF'),
(3, 1, 'Technology Post Two', 'success is a series of small wins','XYZ'),
(4, 4, 'Entertainment Post One', 'Never stop dreaming!!!!!','PQR'),
(5, 4, 'Entertainment Post Two', 'Love your haters,they are your biggest fans!!','PPPP'),
(6, 1, 'Technology Post Three', 'Dont let what yoy cannot do interfere with what you can do','AAAA');

CREATE TABLE `credit` (
  `credit_id`varchar(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`credit_id`)
);

INSERT INTO `credit` (`credit_id`, `username`,`email`) VALUES
(1, 'AAA','aaa@gmail.com'),
(2, 'BBB','bbb@gmail.com'),
(3, 'CCC','ccc@gmail.com'),
(4, 'DDD','ddd@gmail.com'),
(5, 'EEE','eee@gmail.com');