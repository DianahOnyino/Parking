## Running the application
1. Git clone the repository from the following GitHub link: 
https://github.com/DianahOnyino/Parking/commits/master

2. Install application dependencies by running the command: composer install

3. Run the command: composer update

4. Set up an Nginx site to host the project or run the command: php artisan serve from the project directory

5. Create a .env file and copy the contents in the .env.example. Modify the database parameters to be under the 
following block:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=parking
    DB_USERNAME=homestead
    DB_PASSWORD=secret

6. Access the functionality from the browser and test other APIS manually.
