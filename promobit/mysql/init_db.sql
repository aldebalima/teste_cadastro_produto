CREATE DATABASE IF NOT EXISTS promobit_products COLLATE 'utf8_general_ci' ;
GRANT ALL ON promobi_products.* TO 'root'@'%' IDENTIFIED BY 'promobit';
FLUSH PRIVILEGES ;
