To run this PHP-based web application, you need a few components installed and properly configured:

You need PHP installed. You need PDO (PHP DATA OBJECT) activated.

To enable PDO, in your php.ini file, the following line needs to be included and uncommented:

extension=pdo_mysql

You may run into issues trying to un these files using localhost:8000, due to the PHP code using sessions to store encrypted passwords.

Happy Coding!
