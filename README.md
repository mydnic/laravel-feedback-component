**Due to a [stupid copyright infringement](https://twitter.com/mydnic/status/1219908154919702528) I had to rename this package.**

Note that nothing in the code changed (still same namespace). Only the package name has changed. Namespace might changed later in a major release.

# Customizable Feedback Component for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mydnic/laravel-kustomer.svg)](https://packagist.org/packages/mydnic/laravel-kustomer)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)
[![Build Status](https://img.shields.io/travis/com/mydnic/laravel-kustomer.svg)](https://travis-ci.com/mydnic/laravel-kustomer)
[![Code Quality](https://img.shields.io/scrutinizer/g/mydnic/laravel-kustomer.svg)](https://scrutinizer-ci.com/g/mydnic/laravel-kustomer/)

- [Introduction](#introduction)
	- [Chatting System](#chatting-system)
- [Demo](#demo)
- [Installation & Configuration](#installation--configuration)
	- [Configuration](#configuration)
    - [Translations](#translations)
    - [Display the component](#display-the-component)
    - [Updating](#updating)
    - [Include assets with your own assets](#include-kustomer-assets-with-your-own-assets)
        - [Pre requisite](#pre-requisite)
        - [Install](#install)
- [Retrieve Feedbacks](#retrieve-feedbacks)
    - [Nova Tool](#use-with-laravel-nova)
- [Event, Job, Notification, etc](#event-job-notification-etc)
- [License](#license)

## Introduction

Laravel Feedback Component allows you to easily implement a Customer Feedback component on your website. It is build with VueJS but can be implemented in any kind of Laravel Project. You just need to drop a few lines in your layout.

You probably know a lot of website that use intercom's chatting system, or crisp, chat.io and many more customer chat allowing you to get feedbacks from your website visitors.

Laravel Feedback Component is an open-source and customizable alternative that adopts the same layout. Once installed, you will see the component on your website.

We also have a [Nova Tool](https://github.com/mydnic/nova-kustomer) for it!

### Chatting System

I'll work on implementing a chatting system in Laravel Feedback Component, that will probably work with Laravel Nova. This is planned for V2. For now, you can only gather feedbacks from your visitors.

## Demo

<img src="https://github.com/mydnic/laravel-feedback-component/blob/master/demo.gif?raw=true" alt="Laravel Feedback Component">

## Installation & Configuration

You may use Composer to Install Laravel Feedback Component:

```bash
composer require mydnic/laravel-kustomer
```

After installing Laravel Feedback Component, publish its assets using the `kustomer:publish` Artisan command. After installing the package, you should also run the migrate command:

```bash
php artisan kustomer:publish

php artisan migrate
```

This will create a new **feedbacks** table.

### Configuration

You can update the configuration of the component as you wish by editing `config/kustomer.php`.

I encourrage you to carefully read this config file.

### Translations

All the texts that you can see in the components are translatable. After publishing the assets, you will find the texts in *resources/lang/vendor/en/kustomer.php*

The feedbacks labels are stored in this file as well, and the `feedbacks` array must match the one from you config file.

### Display the component

In your `public/` directory you'll find compiled css and js files that needs to be included into your html layout.

Include these on the pages you want the components to appear :

```blade
<head>
    <script src="{{ asset('vendor/kustomer/js/kustomer.js') }}" defer></script>
</head>
<body>
    @include('kustomer::kustomer')
</body>
```

> **Attention** If you run a VueJS application, you must add the `#kustomer` container outside your `#app` container. This is because kustomer runs on its own vue instance by default. If you want to change that, see [Include assets with your own assets](#include-assets)

### Updating

When updating this package, you should re-publish the assets:

```bash
php artisan vendor:publish --tag=kustomer-assets --force
```

This will re-publish the compiled JS and CSS files, but also the svg files located in `public/vendor/kustomer/assets`. If you want to use your own images, please update the configuration file.

<a name="include-assets"></a>
### Include assets with your own assets

Optionally, you can import the `.vue` and `.css` files into your own `resources/js` and `resources/css` folders, allowing you to heavily customize the Feedback Component components and layout.

This will also allow you to end up with only one compiled `.js` and `.css` in your app.

However, you should be careful if you're trying to update the latest version, because your changes might be lost.

#### Pre requisite

Two npm packages are required:

- axios
- html2canvas

You can add them via npm or yarn.

We are using axios to make the HTTP request to send the feedback, so make sure axios is installed an configured in your vue app.

As in the Laravel scaffolding javascript, axios should be configured like so:

```javascript
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
```

#### Install

Publish the VueJS component:
```bash
php artisan vendor:publish --tag=kustomer-vue-component
```

Publish the SASS style file:
```bash
php artisan vendor:publish --tag=kustomer-css-component
```

Then in your vue app:

```javascript
// app.js
Vue.component('kustomer', require('./components/Kustomer/Kustomer.vue'));
```

```scss
// app.css
@import 'kustomer';
```

## Retrieve Feedbacks
A Feedback essentially has 4 attributes:

- Type : Represents the "category" of the feedback (bug, like, suggestion, etc)
- Message : the typed message from your visitors
- User Infos : a JSON column containing all sorts of informations about the user's request
- Reviewed : a boolean column allowing to mark a feedback as "reviewed"

Once a Feedback is stored in your database, you can use your own backoffice to display and manipulate the datas.

The Feedback model works like any other Eloquent model so it's very easy to use in your Laravel Application.

Using Laravel Nova ? No problem !

### Use With Laravel Nova

If you're using Laravel Nova you will certainly want a tool to visualize all feedbacks that you have received.

You can install the official [Laravel Nova Tool here](https://github.com/mydnic/nova-kustomer).

## Event, Job, Notification, etc

When a new feedback is correctly stored, we will dispatch a Laravel Event.

You can listen to this event and trigger any kind of listeners. It's up to you to decide what happens next! You can send an email to the administrator, log some data, or whatever you can think about.

In your `EventServiceProvider` you can update the `$listen` property to add the Event.

```php
protected $listen = [
    'Mydnic\Kustomer\Events\NewFeedback' => [
        'App\Listeners\YourOwnListener', // change this
    ],

    // ...
];
```

## License

Laravel Kustomer is an open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

In this project you will find some [svg icons](https://github.com/mydnic/laravel-kustomer/tree/master/public/assets) that come from [FlatIcon](https://www.flaticon.com). You're free to change them in your own project.

