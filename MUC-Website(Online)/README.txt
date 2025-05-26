To run this PHP-based web application, you need a few components installed and properly configured:

You need PHP installed. 

You can use a full web server like Apache (provided via XAMPP along with MySQL and PHP) or PHP’s built-in development server (using the command php -S localhost:8000). 

If you plan to run these files locally (NOT RECCOMENDED!) make sure PDO-(PHP DATA OBJECT) is enabled.

To enable PDO, in your php.ini file the following line needs to be included in and uncommented:

extension=pdo_mysql

You may run into issues trying to un these files using localhost:8000, due to the php code using sessions to store encrypted passwords.

Happy Coding!