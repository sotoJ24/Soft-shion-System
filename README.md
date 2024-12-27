# Soft-Shion System

The **Soft-Shion System** is a Laravel-based application designed to manage your fashion business efficiently. This system simplifies inventory, sales, and customer management processes, enabling seamless operations for small to medium-sized businesses.

## Features

- **Inventory Management**: Keep track of stock levels and manage product details effortlessly.  
- **Sales Management**: Monitor sales and generate insights to improve business performance.  
- **Customer Management**: Maintain a database of your customers for better engagement.  

## Requirements

Before running the application, ensure you have the following installed:

- **PHP**: Version 8.1 or higher  
- **Composer**: Dependency manager for PHP  
- **XAMPP** (or equivalent stack): To run the local server (optional)  
- **Node.js and npm**: For handling frontend assets  

## Installation Steps

Follow these steps to set up the system on your local machine:

1. **Clone the Repository**  
   ```bash
   git clone https://github.com/sotoJ24/Soft-shion-System.git
   cd Soft-shion-System
   ```

2. **Install Dependencies**  
   Run the following command to install the required PHP dependencies:  
   ```bash
   composer install
   ```

3. **Environment Setup**  
   Copy the `.env.example` file to create a new `.env` file:  
   ```bash
   cp .env.example .env
   ```  
   Update the `.env` file with your database configuration:  
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=soft_shion
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Generate Application Key**  
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations**  
   Set up the database tables by running:  
   ```bash
   php artisan migrate
   ```

6. **Install Frontend Dependencies**  
   To build CSS and JavaScript assets, install Node.js dependencies and compile them:  
   ```bash
   npm install
   npm run dev
   ```

7. **Run the Application**  
   Start the local development server:  
   ```bash
   php artisan serve
   ```  
   Visit the application at [http://127.0.0.1:8000](http://127.0.0.1:8000).

## Laravel Documentation

For detailed Laravel framework documentation, visit: [Laravel Documentation](https://laravel.com/docs).

## XAMPP Documentation

If you're using XAMPP, you can find installation and setup instructions at [XAMPP Documentation](https://www.apachefriends.org/index.html).

## Contributing

Contributions are welcome! If you encounter any issues or have feature requests, feel free to open an issue or submit a pull request🚀.
