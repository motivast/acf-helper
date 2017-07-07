# Contributing
--------------
ACF Helper plugin provide helper functions to add acf fields programmatically.

## Getting started

### Clone project
```
git clone git@gitlab.dev.viewone.pl:viewone/acf-helper.git
cd acf-helper
```

### Copy dotenv and fill with your properties
```
cp .env.example .env
```

### Install dependencies
```
composer install
```
During installation WordPress is downloaded to wordpress directory and current directory is self symlinked to wordpress/wp-content/plugins. Pointing your webserver vhost to wordpress directory give you fully working WordPress instance with acf-hepler plugin installed.

### Setup WordPress
```
./vendor/bin/phing wpinit
```
