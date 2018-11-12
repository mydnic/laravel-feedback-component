<p align="center"><img src="http://files.mydnic.be/laravel-kustomer/logo.png" alt="Laravel Kustomer"></p>

[TL;DR. Installation](#install)

## Introduction

Laravel Kustomer allows you to easily implement a Customer Feedback component on your website. It is build with VueJS but can be implemented in any kind of Laravel Project. You just need to drop a few lines in your layout.

You probably know a lot of website that use intercom's chatting system, or crisp, chat.io and many more customer chat allowing you to get feedbacks from your website visitors.

Laravel Kustomer is an open-source and customizable alternative that adopts the same layout. Once installed, you will see on your website a floating bubbble.

### Chatting System

I'll work on implementing a chatting system in Laravel Kustomer, that will probably work with Laravel Nova. This is planned for V2. For now, you can only gather feedbacks from your visitors.

## Demo

<img src="http://files.mydnic.be/laravel-kustomer/demo.gif" alt="Laravel Kustomer">

<a name="install"></a>
## Installation & Configuration

You may use Composer to Install Laravel Kustomer:

```bash
composer require mydnic/laravel-kustomer
```

After installing Laravel Kustomer, publish its assets using the `kustomer:install` Artisan command. After installing Kustomer, you should also run the migrate command:

```bash
php artisan kustomer:install

php artisan migrate
```

### Configuration

You can update the configuration of the component as you wish by editing `config/kustomer.php`

### Display the component

In your `public/` directory you'll find compiled css and js files that needs to be included into your html layout.

Include these on the pages you want the components to appear :

```html
<head>
    <script src="{{ asset('vendor/kustomer/js/kustomer.js') }}" defer></script>
    <link href="{{ asset('vendor/kustomer/css/kustomer.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="kustomer">
        <kustomer :params="{{ json_encode(config('kustomer')) }}"></kustomer>
    </div>
</body>
```

> **Attention** If you run a VueJS application, you must add the #kustomer container outside your #app container. This is because kustomer runs on its own vue instance by default. If you want to change that, see [TL;DR. Include Kustomer assets with your own assets](#include-assets)

### Updating Kustomer

When updating Kustomer, you should re-publish the assets:

```bash
php artisan vendor:publish --tag=kustomer-assets --force
```

<a name="include-assets"></a>
### Include Kustomer assets with your own assets

## License

Laravel Kustomer is an open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

In this project you will find some [svg icons](https://github.com/mydnic/laravel-kustomer/tree/master/public/assets) that come from [FlatIcon](https://www.flaticon.com). You're free to change them in your own project.

