This branch is secondary; primary site is HTML on main.

# Karkia Tarabar Asia — WordPress Host Package

بسته وردپرس لندینگ کارکیا ترابر آسیا برای نصب روی هاست.

WordPress host package for the Karkia Tarabar Asia landing page.

This branch is secondary. The primary site is the static HTML landing on `main`.

این شاخه ثانویه است. سایت اصلی، لندینگ HTML روی شاخه `main` است.

## What to upload / چه چیزی را آپلود کنید

Zip the **contents** of `wordpress/` (not the `wordpress` folder itself unless the host asks for it) and extract them into `public_html`.

محتویات داخل پوشه `wordpress/` را زیپ کنید و داخل `public_html` از حالت فشرده خارج کنید.

Upload these items into the document root:

- `wp-admin/`
- `wp-content/`
- `wp-includes/`
- `index.php`
- and the other WordPress root files (`wp-config-sample.php`, `wp-load.php`, …)

Do **not** upload `wp-config.php` from this repository. Create it on the host during install.

`wp-config.php` را از این مخزن آپلود نکنید. هنگام نصب روی هاست ساخته می‌شود.

## Install steps / مراحل نصب

1. On the host, create a MySQL / MariaDB database and note the name, user, password, and host (usually `localhost`).
2. Zip the contents of `wordpress/` and upload/extract them into `public_html`.
3. Open the site in a browser. WordPress installer should start at `/wp-admin/install.php`.
4. Choose Persian (or your language), then enter the database details.
5. Set the site title, admin username, password, and email.
6. Sign in at `/wp-admin`.

Theme **Karkia Tarabar Asia** activates automatically after install. The front page is the landing page.

تم **Karkia Tarabar Asia** بعد از نصب فعال می‌شود و صفحه اصلی همان لندینگ است.

### If the theme does not activate

Appearance → Themes → **Karkia Tarabar Asia** → Activate  
نمایش → پوسته‌ها → Karkia Tarabar Asia → فعال‌سازی

## Requirements

- PHP 7.4 or newer
- MySQL / MariaDB

WordPress will not run without a database.

## Contact settings in wp-admin

Appearance → Customize → تماس کارکیا

- Office phone
- Mobile
- WhatsApp number (international digits only, e.g. `989152444149`)
- Email
- Mashhad and Bandar Abbas addresses

Logo: Appearance → Customize → Site Identity

## Forms

Quote and contact forms still open WhatsApp and email. The same request is also sent with `wp_mail` to the site email. Some hosts need a separate SMTP plugin for reliable delivery.

## Language

The FA / EN / RU switch from the landing page works on this theme and is stored in the browser.
