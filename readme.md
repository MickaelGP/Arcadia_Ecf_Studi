# Arcadia

Arcadia is a website developed with Laravel, Bootstrap, CSS, and JavaScript.

## Local Installation

To install Arcadia locally on XAMPP or MAMP, follow these steps:

1. Make sure you have [XAMPP](https://www.apachefriends.org/index.html) or [MAMP](https://www.mamp.info/en/) installed on your system.

2. Clone this GitHub repository into the `htdocs` directory (for XAMPP) or `htdocs` directory (for MAMP) of your local server:

    ```bash
    git clone https://github.com/MickaelGP/Arcadia_Ecf_Studi.git
    ```

3. Navigate to the project directory:

    ```bash
    cd arcadia
    ```

4. Install PHP dependencies by running the following command:

    ```bash
    composer install
    ```

5. Copy the `.env.example` file and rename it to `.env`:

    ```bash
    cp .env.example .env
    ```

6. Generate a new Laravel application key:

    ```bash
    php artisan key:generate
    ```

7. Configure the database information in the `.env` file by specifying the database name, user, and password.

8. Import the provided SQL file (`arcadia.sql`) into your database. You can use phpMyAdmin or the MySQL command line:

    ```bash
    mysql -u your_user -p your_database_name < arcadia.sql
    ```

9. Start your local server (Apache and MySQL).

10. Launch the site by accessing `http://localhost/arcadia` in your browser.



## Authors

- MickaelGP - https://github.com/MickaelGP

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.