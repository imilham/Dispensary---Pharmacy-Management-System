# Hospital Management System

Hospital Management System is a web application built using PHP, MySQL, JavaScript, jQuery, Ajax, HTML5, and CSS. It provides functionalities for managing different aspects of a hospital, including admin approval, doctor and patient management, prescription handling, and pharmacy management.

## Features

### Admin
- Approve or reject new dispensary or pharmacy registrations
- Delete existing dispensaries or pharmacies
- Manage system settings and configurations

### Dispensary
- Add new doctors to the system
- Add new patients to the system
- Remove doctors associated with the dispensary
- Issue prescriptions for patients
- View patient status and medical history
- Update patient status and medical records

### Pharmacy
- Issue medicine prescriptions
- Mark issued prescriptions as "issued", preventing further modification
- Manage pharmacy inventory

## Project Structure

The project is organized into the following folders:

- sql: Contains SQL files for database schema and sample data.
- hospital: Contains the PHP, JavaScript, jQuery, Ajax, HTML5, and CSS files for the main project.

## Installation

1. Clone the repository: git clone https://github.com/imilham/Dispensary---Pharmacy-Management-System.git
2. Import the SQL files from the sql folder into your MySQL database.
3. Configure the database connection in the PHP files located in the hospital folder.
4. Upload the entire project to your web server.

## Usage

1. Access the project through your web browser.
2. Log in using one of the following credentials:
   - *Admin*: Username - admin, Password - admin_password
   - *Dispensary*: Username - dispensary, Password - dispensary_password
   - *Pharmacy*: Username - pharmacy, Password - pharmacy_password

    for the login credentials go through the databse tbl_userlogins

3. Navigate through the dashboard and use the respective functionalities based on your role.

## Contributing

Contributions are welcome! If you'd like to contribute to the project, please follow these steps:

1. Fork the repository.
2. Create your feature branch: git checkout -b feature/your-feature.
3. Commit your changes: git commit -am 'Add some feature'.
4. Push to the branch: git push origin feature/your-feature.
5. Submit a pull request.
<!-- 
## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details. -->

## Acknowledgments

- [jQuery](https://jquery.com/)
- [Bootstrap](https://getbootstrap.com/)
- [Font Awesome](https://fontawesome.com/)
- [PHP](https://www.php.net/)
- [MySQL](https://www.mysql.com/)

Happy coding! 🤩 🚀

