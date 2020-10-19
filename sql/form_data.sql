CREATE TABLE `form_data` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `file_names` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'File names in a comma-separated string',
 `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
 `contact` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
 `password` varchar (50) COLLATE utf8_unicode_ci NOT NULL,
 `confirmpassword` varchar (50) COLLATE utf8_unicode_ci NOT NULL,
 `description` varchar (255) COLLATE utf8_unicode_ci NOT NULL,
 
 `submitted_on` datetime NOT NULL DEFAULT current_timestamp(),
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;