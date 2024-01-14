Die Anmeldedaten für die Datenbank:

CREATE USER 'Thomas'@'localhost';
ALTER USER 'Thomas'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON `hoteluser`.* TO 'Thomas'@'localhost';
FLUSH PRIVILEGES;

//Dieser user hat zugriff auf die Datenbank Hoteluser

username: Thomas
password: 1234
dbname: hoteluser
servername: localhost



