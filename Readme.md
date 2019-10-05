# Backend Blog

## Composer setup

### Install composer

The first step is to download Composer, which will effectively create a Phar (PHP Archive) file called composer.phar. From your terminal, run the following command:

```bash
curl -sS https://getcomposer.org/installer | php
```

### Running Composer

```bash
sudo mv composer.phar /usr/local/bin/
vim ~/.bash_profile
```

Add this to your .bash_profile. It may be empty or non-existent, so go ahead and create it:

```bash
alias composer="php /usr/local/bin/composer.phar"
```

### Install required packages

```bash
composer install
```

### Run mysql through MAMP

install MAMP using the below url

<https://www.mamp.info/en/downloads/>

and start the servers and make sure that the mysql port is `3306`

### Run all migrations

```bash
php artisan migrate
```

### Setup app config

- copy the env config file using the below command

```bash
cp .env.example .env
```

- generate a new app key

```bash
php artisan key:generate
```

### Run the project

```bash
php artisan serve
```
