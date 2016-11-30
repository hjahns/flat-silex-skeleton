# flat-silex-skeleton

This is a basic silex app without database (flat) to help you kickstart simple sites, which just need some action controllers and templates.

### Installation

Installation requires [composer](https://getcomposer.org//) and [bower](https://bower.io/).

```sh
$ git clone https://github.com/hjahns/flat-silex-skeleton.git
$ cd flat-silex-skeleton
$ composer install
$ cd web
$ bower install
```

### Apache conf (xampp)

```sh
<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/flat-silex-skeleton/web"
    ServerName www.jshero.local
	DirectoryIndex index.php
	<Directory "C:/xampp/htdocs/flat-silex-skeleton/web">
			Options Indexes FollowSymLinks MultiViews
			AllowOverride ALL
			Order allow,deny
			allow from all
	</Directory>
</VirtualHost>
```

### How-To

define new routes in Src\Core\Application->initializeRoutes()

```php
// adds get route to path / which calls indexAction() from ActionController
$this->addRoute('get', '/', 'index');
```