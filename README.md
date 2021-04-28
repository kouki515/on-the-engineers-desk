# Commands

**Docker up**

```
$ docker-compose up -d --build
```

<br>

**Enter inside app container**

```
$ docker-compose exec app bash
```

<br>

**Install the laravel**

```
[app] $ composer create-project --prefer-dist "laravel/laravel=6.*" .
```

<br>

**copy the .env file**

```
$ cp .env.example backend/.env
```

<br>

**Composer install**

```
$ composer install
```

<br>

**Npm install and run**

```
$ npm install && npm run dev
```

<br>

**Create application key**

```
$ php artisan key:generate
```

<br>

**Edit the config file**

```
'timezone' => 'Asia/Tokyo',
'locale' => 'ja',
```

<br>
