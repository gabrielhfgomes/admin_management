# admin-management

### How to use
Clone the git repository with the command:
````
cd /var/www
git clone 
````
Put the project in apache server /var/www/

Create database:
````
# MySQL without password
mysql -u < /var/www/admin_management/database_schema/database.sql 
# MySQL with password
mysql -u root -p < /var/www/admin_management/database_schema/database.sql  or 
````
Create a MySQL user and password
````
# Access MySQL without password
mysql -u root
# Access MySQL with password
mysql -u root -p

CREATE USER 'root'@'localhost';
GRANT ALL ON *.* TO 'root'@'localhost' IDENTIFIED BY 'My-N7w_And.5ecure-P@s5w0rd' WITH GRANT OPTION;
````
Restart apache
````
systemctl restart apache2
````

Usuário default para login:
user: gabrielhfgomes@hotmail.com
password: adminnewpassword
