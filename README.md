## Maffin Authentication
### Simple Auth with MVC pattern in core PHP
-------------------------------------------------------------
#### All important config and HTTP files are located inside app directory
##### 1. controller.php - for using controllers as in MVC/Laravel logic
##### 2. model.php - for using models as in MVC/Laravel logic
##### 3. controllers/AuthController.php - inherits controller.php (extend) 
##### 4. models/User.php - User model
##### 5. models/Log.php - logs model in case of logging purposes
-------------------------------------------------------------
#### Database config file is located inside config directory
##### 1. database.php - for establishing DB connection as in MVC/Laravel logic (.env)
-------------------------------------------------------------
#### All frontside asset files are located inside public directory
##### 1. assets/css/main.css - for storing css files and codes as in MVC/Laravel logic (public folder logic)
##### 2. .htaccess - in case of deployment to domain as in MVC/Laravel logic (.htaccess)
##### 3. index.php - for routing as in MVC/Laravel logic (Routes/web.php)
-------------------------------------------------------------
#### All frontside view files are located inside views directory
##### 1. auth/login.php - login view as in MVC/Laravel logic (login.blade.php)
##### 2. auth/register.php - register view as in MVC/Laravel logic (register.blade.php)
##### 3. home/welcome.php - welcome view after Auth as in MVC/Laravel logic (welcome.blade.php)
