# SmartShop: Multi-Vendor eCommerce Ecosystem 🛒📱

![Flutter](https://img.shields.io/badge/Flutter-%2302569B.svg?style=for-the-badge&logo=Flutter&logoColor=white)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![CodeIgniter](https://img.shields.io/badge/CodeIgniter-%23EF4223.svg?style=for-the-badge&logo=codeIgniter&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white)

> **Bachelor's Degree Final Year Project (FYP)** 🎓
> A comprehensive, full-stack multi-vendor eCommerce ecosystem featuring a robust PHP backend, a web-based Admin Panel, and three distinct cross-platform mobile applications built with Flutter.

## 🌟 Overview
SmartShop is a complete end-to-end marketplace solution designed to connect customers, independent sellers, and delivery personnel on a single unified platform. It handles the entire lifecycle of an eCommerce transaction, from vendor inventory management to customer checkout and real-time delivery tracking.

## 🏗️ Architecture (Monorepo)
This repository is structured as a monolithic workspace containing all four core components of the ecosystem:

1. **pplication/ (Backend API & Admin Panel)**
   - Built with PHP (CodeIgniter) and MySQL.
   - Provides RESTful APIs for the mobile apps.
   - Features a comprehensive Admin Dashboard for global system management, commission tracking, and user moderation.

2. **customer_app/ (Flutter)**
   - The primary shopping interface for end-users.
   - Features dynamic product catalogs, cart management, secure checkout, and order history.

3. **seller_app/ (Flutter)**
   - A dedicated portal for vendors.
   - Enables independent sellers to upload products, manage inventory, process incoming orders, and track their revenue/commissions.

4. **delivery_app/ (Flutter)**
   - A logistical tool for delivery personnel.
   - Provides active order assignments, customer routing, and delivery status updates.

## 🔒 Security Note
*For security and privacy purposes, the local database schemas, .env configuration files, and Firebase credentials (google-services.json) have been intentionally omitted from this public repository via .gitignore.*
