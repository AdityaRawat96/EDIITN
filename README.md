# Global TravelWide - CRM

This is the Admin Dashboard and CRM for the EDII-TN web application. It is built using PHP Laravel 8.

[<img alt="Deployed with FTP Deploy Action" src="https://img.shields.io/badge/Deployed With-FTP DEPLOY ACTION-%3CCOLOR%3E?style=for-the-badge&color=0077b6">](https://github.com/SamKirkland/FTP-Deploy-Action)

## Setup

Follow these steps to set up the application:

1. Update the `.env` file with your database and other environment-specific configurations.

```shell
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

2. Visit the `/clear-cache` route to clear the cache of the application.

```shell
http://yourdomain.com/clear-cache
```

3. Visit the `/initialize` route in your web browser to seed the database for the admin user.

```shell
http://yourdomain.com/initialize
```

Please note that you should replace `yourdomain.com` with your actual domain or localhost.

## Features

The Admin Dashboard and CRM includes features such as user management, customer relationship management, reporting, and more.

## Support

If you encounter any issues or require further assistance, please raise an issue on this repository.

## License

This project is licensed under the MIT License.
