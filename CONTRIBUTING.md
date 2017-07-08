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
./vendor/bin/phing wp:init
```

This command will install WordPress with configuration from .env file. After installation you should be able to see frontend theme and backend administration.

### Setup tests
```
./vendor/bin/phing tests:init
```

Initialize WordPress tests using bin/install-wp-tests.sh script. Note that you must have installed curl and svn.
