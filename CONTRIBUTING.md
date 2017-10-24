# Contributing
--------------
ACF Helper plugin provide helper functions to add acf fields programmatically.

## Getting started

### Clone project
```
git clone git@gitlab.dev.motivast.com:motivast/acf-helper.git
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
./vendor/bin/phing tests:db:create tests:config
```

This commaind will create WordPress database for tests and create config file in wordpress-dev directory.


### Local CI builds
ACF Helper plugins use gitalb-ci as continous integration. Gitlab-ci gives possibility to run jobs localy using gitlab-runner. To run jobs localy install gitlab-runner and docker and extecute:
```
gitlab-runner exec docker --pre-build-script "
    export ACF_PRO_KEY=xxxxxxxxx; \
    export WP_PATH=xxxxxxxxx; \
    export WP_CONFIG_DB_NAME=xxxxxxxxx; \
    export WP_CONFIG_DB_USER=xxxxxxxxx; \
    export WP_CONFIG_DB_PASS=xxxxxxxxx; \
    export WP_CONFIG_DB_HOST=mysql; \
    export WP_TESTS_LIB_PATH=xxxxxxxxx; \
    export WP_TESTS_CONFIG_DB_NAME=xxxxxxxxx; \
    export WP_TESTS_CONFIG_DB_USER=xxxxxxxxx; \
    export WP_TESTS_CONFIG_DB_PASS=xxxxxxxxx; \
    export WP_TESTS_CONFIG_DB_HOST=mysql;" \
    insepct
```
