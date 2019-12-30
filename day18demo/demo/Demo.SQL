CREATE DATABASE IF NOT EXISTS demo_db;
CREATE DATABASE IF NOT EXISTS nhanvien CHARACTER SET utf8 COLLATE utf8_general_ci;
#nhân viên
USE nhanvien;
#tạo bẳng tên là student có name, address, birthday,
CREATE TABLE students(
id INT (11) PRIMARY KEY AUTO_INCREMENT,
name VARCHAR (255) NOT NULL,
birthday DATETIME DEFAULT NULL ,
class VARCHAR (255) NOT NULL,
create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
update_at DATETIME DEFAULT NULL
 );
CREATE TABLE categories(
id INT (11) PRIMARY KEY AUTO_INCREMENT,
name VARCHAR (255) NOT NULL,
status TINYINT(2) DEFAULT 0,
create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
#xóa bảng
DROP TABLE categories;
#thêm dử liệu vào bảng
INSERT INTO categories(`name`, `status`)
VALUE ('manh',1);
#lấy tất cả danh sách categories đang có trên hệ thống
SELECT * FROM categories;
#lấy 1 số trường categories;
SELECT id,name FROM  categories;
SELECT * FROM categories WHERE id <0;
SELECT  * FROM categories WHERE name = 'manh';
-- chỉ lấy 2 danh mục đàu tiên
SELECT * FROM categories LIMIT 2;
SELECT * FROM categories LIMIT 2 OFSET 2;
SELECT * FROM categories WHERE id >1;
SELECT * FROM categories WHERE id >0 AND status >=0;
#update
UPDATE categories SET name = 'New name', status = 5
WHERE  id = 3;
DELETE FROM categories WHERE id = 5;
SELECT * FROM categories ORDER BY status ASC ;
SELECT * FROM categories ORDER BY create_at DESC ;
#LIKE
#lấy ra tất cả các danh mục mà có tên chứa kí tự a
#bac, a,abe,da,...,...v.v;
SELECT * FROM `categories` WHERE name LIKE '%a%';
#Tọa 1 bảng tên product với các trường id, name,categories_id,
CREATE TABLE product(
id INT (11) PRIMARY KEY AUTO_INCREMENT,
categories_id INT(11) NOT NULL,
name VARCHAR (255) NOT NULL,
price INT(11) DEFAULT NULL
 );
SELECT * FROM product
INNER JOIN  categories on product.categories_id = categories_id;
SELECT product. *,
categories.name AS categories_name,
categories.status AS categories_status
 FROM product INNER JOIN categories on product.categories_id = categories_id;
SELECT * FROM `categories` WHERE id IN (1,2) ;
#Lấy ra tấn cả các danh mục mà có id nằm trong khoảng id =1 đến 8
SELECT * FROM `categories` WHERE id BETWEEN 1 AND 8 ;\
#count đếm số bản ghi
SELECT COUNT (id) FROM categories;
SELECT MAX (status) AS max_status FROM  categories;
SELECT min (status) AS min_status FROM  categories;
SELECT SUM(status) FROM categories;
-- GROUP BY tìm sô lần xuất hiện ở trường status trog bangwrdanh mục
SELECT  status, COUNT(id) AS count_status FROM categories GROUP BY status;