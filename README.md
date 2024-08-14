<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a>
<img src="public/name.png">

</p>

<h4 align="center">📱 Contact & 👨 Social</h4>
<p align="center">
<!-- <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a> -->
<a href=""><img src="https://img.shields.io/badge/Gmail-D14836?style=for-the-badge&logo=gmail&logoColor=white"></a>
<a href=""><img src="https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white"></a>
<a href=""><img src="https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white"></a>
</p>

<h4 align="center">🚀 Skills</h4>
<p align="center">
<a href=""><img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white"></a>
<a href=""><img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white"></a>
<a href=""><img src="https://img.shields.io/badge/Sass-CC6699?style=for-the-badge&logo=sass&logoColor=white"></a>
<a href=""><img src="https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white"></a>
<a href=""><img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white"></a>
<a href=""><img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white"></a>
<a href=""><img src="https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white"></a>
</p>

<h4 align="center">💻 OS</h4>
<p align="center">
<a href=""><img src="https://img.shields.io/badge/Fedora-294172?style=for-the-badge&logo=fedora&logoColor=white"></a>
<a href=""><img src="https://img.shields.io/badge/Kali_Linux-557C94?style=for-the-badge&logo=kali-linux&logoColor=white"></a>
</p>

# E-commerce Website

This project is a feature-rich e-commerce website built using the Laravel framework. It offers a robust platform for managing products, orders, and customers, with a focus on user experience and scalability.

## Features

- **User Authentication and Authorization**
  - Secure registration and login functionality
  - Role-based access control for users (Admin, Customer, etc.)

- **Product Management**
  - Admin interface to add, update, and delete products
  - Categorization and tagging of products for easy navigation
  - Inventory management to track stock levels

- **Shopping Cart**
  - Persistent shopping cart using sessions or database
  - AJAX-based add to cart for a seamless user experience
  - Cart management features including item quantity update and removal

- **Checkout and Payment**
  - Multi-step checkout process (billing, shipping, payment)
  - Integration with popular payment gateways (Stripe, PayPal, etc.)
  - Order summary and confirmation emails

- **Order Management**
  - Admin dashboard to view and manage orders
  - Order status tracking for customers
  - Email notifications for order updates

- **Customer Profile**
  - User profile management including personal details and order history
  - Option to save multiple shipping addresses

- **Product Search and Filtering**
  - Full-text search functionality
  - Advanced filtering by categories, price range, and ratings

- **Responsive Design**
  - Mobile-friendly design ensuring a smooth shopping experience across devices
  - Built using responsive CSS frameworks like Bootstrap

## Installation

To set up the project locally, follow these steps:

1. **Clone the repository**:
   ```bash
   git clone https://github.com/obahchimaobi/ecommerce-website.git
   cd ecommerce-website
   ```

2. **Install dependencies**:
   ```bash
   composer install
   npm install
   npm run dev
   ```

3. **Environment Configuration**:
   - Copy the `.env.example` file to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Update the `.env` file with your database and other configuration details.

4. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations and Seeders**:
   ```bash
   php artisan migrate --seed
   ```

6. **Start the development server**:
   ```bash
   php artisan serve
   ```

## Contribution

Feel free to contribute to this project by submitting a pull request. For major changes, please open an issue first to discuss what you would like to change.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact

For any inquiries or support, please contact [anthonyobah37@gmail.com].