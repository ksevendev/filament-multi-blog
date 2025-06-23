# Filament Multi Blog (por site\_id)

Extensão para o plugin [firefly/filament-blog](https://github.com/thefireflytech/filament-blog), adicionando suporte completo a múltiplos sites com escopo por `site_id`.

---

## 🚀 Instalação

```bash
composer require kseven/filament-multiblog
```

> Requer: Laravel 11 ou 12 + FilamentPHP 3

---

## ⚙️ Configuração

1. **Publicar o arquivo de configuração:**

```bash
php artisan vendor:publish --tag=filament-multiblog-config
```

2. **Verifique `config/multiblog.php`:**

```php
return [
    'enabled' => env('MULTIBLOG_ENABLED', true),
    'site_model' => App\Models\Site::class,
];
```

3. **Adicione o middleware no `Http\Kernel.php` (opcional):**

```php
protected $middlewareGroups = [
    'web' => [
        // ...
        \Kseven\FilamentMultiBlog\Http\Middleware\DetectSite::class,
    ],
];
```

---

## 🧩 Funcionalidades

* 🆔 Suporte a múltiplos blogs separados por `site_id`
* ✅ Compatível com todas as features do `filament-blog`
* 🧐 Middleware de autodetecção do site via domínio
* 🛠️ Models, Resources e Notifications customizados com escopo por site
* 📬 Notificação automática de novo post para inscritos de um site
* 🎛️ Configuração opcional com seleção de `site_id`

---

## 📚 Como Usar

1. Certifique-se de que sua tabela `sites` está criada e povoada.
2. O sistema aplicará automaticamente `site_id` nos posts e recursos.
3. Utilize `HasSiteScope` para escopo automático nas queries:

```php
use Kseven\FilamentMultiBlog\Traits\HasSiteScope;

class Post extends BasePost {
    use HasSiteScope;
}
```

4. Ao criar ou editar registros no painel, o campo `site_id` será tratado automaticamente.

---

## 🧪 Seeders de Exemplo

```bash
php artisan db:seed --class=\\Database\\Seeders\\SiteSeeder
php artisan db:seed --class=\\Database\\Seeders\\CategorySeeder
```

---

## 📌 Importante

* Este pacote **não modifica o plugin original** diretamente.
* Ele apenas estende os Models, Resources e comportamentos via `bind()` no seu próprio `ServiceProvider`.

---

## ✨ Créditos

* [The Firefly Tech](https://github.com/thefireflytech) — criadores do plugin original
* [K'Seven](https://github.com/ksevendev) — manutenção e extensão multi-site

---

## 📄 Licença

MIT
* [Ler licença](https://github.com/ksevendev/filament-multi-blog/blob/master/LICENSE)
