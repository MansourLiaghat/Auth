# 🔐 Auth – سیستم ثبت‌نام و احراز هویت کاربران با PHP

[![Build Status](https://img.shields.io/badge/build-passing-brightgreen)](https://github.com/MansourLiaghat/Auth)  
[![License](https://img.shields.io/badge/license-MIT-blue)](LICENSE)  
[![Version](https://img.shields.io/badge/version-1.0.0-blue)](https://github.com/MansourLiaghat/Auth/releases)

پروژه‌ی **Auth** یک سیستم ساده و امن برای ثبت‌نام و ورود کاربران است که با استفاده از زبان PHP توسعه یافته است. این سیستم از پایگاه داده MySQL برای ذخیره اطلاعات کاربران استفاده می‌کند و شامل ویژگی‌هایی مانند ثبت‌نام، ورود، خروج و مدیریت نشست‌ها می‌باشد.

## 📚 فهرست مطالب

- [ویژگی‌ها](#features)
- [پیش‌نیازها](#prerequisites)
- [نصب و راه‌اندازی](#installation)
- [نحوه استفاده](#usage)
- [ساختار پروژه](#structure)
- [مجوز](#license)
- [اطلاعات تماس](#contact)

## ✨ ویژگی‌ها {#features}

- ثبت‌نام کاربران با ایمیل و رمز عبور  
- ورود و خروج کاربران  
- مدیریت نشست‌های کاربران با استفاده از PHP Sessions  
- اعتبارسنجی ورودی‌ها برای جلوگیری از حملات XSS و SQL Injection  
- طراحی ساده و قابل فهم برای توسعه‌دهندگان مبتدی  

## ⚙️ پیش‌نیازها {#prerequisites}

- PHP نسخه 7.4 یا بالاتر  
- MySQL یا MariaDB  
- وب‌سرور محلی مانند XAMPP یا MAMP  

## 🚀 نصب و راه‌اندازی {#installation}

1. مخزن را کلون کنید:

   ```bash
   git clone https://github.com/MansourLiaghat/Auth.git
   cd Auth
   ```

2. پایگاه داده را ایجاد کرده و فایل `database.sql` را در آن اجرا کنید.

3. فایل `config.php` را باز کرده و اطلاعات اتصال به پایگاه داده را وارد کنید:

   ```php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'نام‌کاربری');
   define('DB_PASSWORD', 'رمزعبور');
   define('DB_NAME', 'نام_پایگاه_داده');
   ```

4. پروژه را در وب‌سرور محلی خود قرار دهید و اجرا کنید:

   ```
   http://localhost/Auth/
   ```

## 🧪 نحوه استفاده {#usage}

1. به `register.php` بروید و یک حساب کاربری بسازید  
2. سپس از طریق `login.php` وارد شوید  
3. بعد از ورود، به `dashboard.php` منتقل می‌شوید  
4. برای خروج، از `logout.php` استفاده کنید

## 📁 ساختار پروژه {#structure}

```
Auth/
├── config.php
├── database.sql
├── register.php
├── login.php
├── logout.php
├── dashboard.php
├── style.css
└── README.md
```

## 📄 مجوز {#license}

این پروژه تحت مجوز MIT منتشر شده است. برای اطلاعات بیشتر، فایل [LICENSE](LICENSE) را مشاهده کنید.

## 📬 اطلاعات تماس {#contact}

- GitHub: [MansourLiaghat](https://github.com/MansourLiaghat)
