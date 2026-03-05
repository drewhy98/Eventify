-- Create database
CREATE DATABASE IF NOT EXISTS eventify_db;

-- Select database
USE eventify_db;

-- Create events table
CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_type VARCHAR(50) NOT NULL,
    title VARCHAR(255) NOT NULL,
    place VARCHAR(255) NOT NULL,
    event_date DATE NOT NULL,
    image_url VARCHAR(500) DEFAULT NULL,
    price DECIMAL(10,2) NOT NULL DEFAULT 0.00,
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Insert initial data
INSERT INTO events (event_type, title, place, event_date, image_url) VALUES
('Music Concert', 'The 1975', 'Cardiff', '2026-03-10', 'https://readdork.com/wp-content/uploads/2023/04/2022_10_20_The_1975_X_Dork0498-Edit-scaled-2-1536x1024.jpg','30.00'),
('Comedy', 'Alan Carr', 'Bridgend', '2026-03-15', 'https://ents24.imgix.net/image/000/535/222/8ff84459c2691db8f339f005baeadc8590e0b8c4.jpg?auto=format&crop=faces&w=1200&h=630','25.00'),
('Sport', 'Tennis Local Cup', 'Newport', '2026-03-20', 'https://www.merryparking.co.uk/blogs/wp-content/uploads/2017/06/murray-wimbledon-2016-final-set-2.jpg','14.00');

('Sport', 'Swansea City FC', 'Swansea', '2026-05-01', 'https://www.swanstrust.co.uk/newsite/wp-content/uploads/2022/01/athn_140924_swansea_city_v_norwich_city_kt_5136-1024x576.jpg','10.00');
('Festival', 'Boardmasters', 'Cornwall', '2026-07-01', 'https://boardmasters.com/wp-content/uploads/2024/12/20230812_BOARDMASTERS_WILL_BAILEY_SATURDAY_150-scaled.jpg','60.00');
('Festival', 'Reading Festival', 'Reading', '2026-87-01', 'https://assets.simpleviewinc.com/simpleview/image/fetch/c_fill,f_jpg,h_729,q_75,w_1250/https://tsedmsmedia.newmindmedia.com/wsimgs/rsp-reading-primary-logo_720-update_308415565.png','80.00');
('Music Concert', 'Catfish and the Bottleman', 'Cardiff', '2026-05-10', 'https://upload.wikimedia.org/wikipedia/commons/e/e3/Catfish_and_the_Bottlemen_at_Brooklyn_Steel.jpg','30.00'),
