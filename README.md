# Filament Multi Blog (by site\_id)

Extension for the [firefly/filament-blog](https://github.com/thefireflytech/filament-blog) plugin, adding full support for multiple sites scoped by `site_id`.

---

## 🚀 Installation

```bash
composer require kseven/filament-multiblog
```

> Requires: Laravel 11 or 12 + FilamentPHP 3

---

## ⚙️ Configuration

1. **Publish the config file:**

```bash
php artisan vendor:publish --tag=filament-multiblog-config
```

2. **Check the `config/multiblog.php` file:**

```php
return [
    'enabled' => env('MULTIBLOG_ENABLED', true),
    'site_model' => App\Models\Site::class,
];
```

3. **(Optional) Add the middleware to `Http\Kernel.php`:**

```php
protected $middlewareGroups = [
    'web' => [
        // ...
        \Kseven\FilamentMultiBlog\Http\Middleware\DetectSite::class,
    ],
];
```

---

## 🧩 Features

* 🆔 Support for multiple blogs scoped by `site_id`
* ✅ Fully compatible with all `filament-blog` features
* 🧐 Auto-detection middleware via domain
* 🛠️ Custom Models, Resources, and Notifications scoped per site
* 📬 Automatic new post notification to subscribers per site
* 🎛️ Optional configuration for selecting `site_id`

---

## 📚 Usage

1. Make sure your `sites` table exists and is populated.
2. The system will automatically apply `site_id` to posts and resources.
3. Use `HasSiteScope` for automatic query scoping:

```php
use Kseven\FilamentMultiBlog\Traits\HasSiteScope;

class Post extends BasePost {
    use HasSiteScope;
}
```

4. When creating or editing records in the panel, the `site_id` field will be automatically handled.

---

## 🧪 Example Seeders

```bash
php artisan db:seed --class=\\Database\\Seeders\\SiteSeeder
php artisan db:seed --class=\\Database\\Seeders\\CategorySeeder
```

---

## 📌 Important

* This package **does not modify the original plugin** directly.
* It only extends Models, Resources, and behaviors using `bind()` in its own `ServiceProvider`.

---

## ✨ Credits

* [The Firefly Tech](https://github.com/thefireflytech) — creators of the original plugin
* [K'Seven](https://github.com/ksevendev) — maintainer and multi-site extension author

---

## 📄 License

MIT

* [Read License](https://github.com/ksevendev/filament-multi-blog/blob/master/LICENSE)

