<p align="center"><a href="https://hw9k1iteij.execute-api.ap-south-1.amazonaws.com/" target="_blank"><img src="https://lnk.ng/home/logo.png" width="400"></a></p>

## About Shortener

Shortener is a simple yet powerful URL Shortening tool, which can be used to hash long urls for tracking/campaigns.

<p align="center"><a href="https://hw9k1iteij.execute-api.ap-south-1.amazonaws.com/" target="_blank">Demo</a></p>

- [Clone the Repository](https://github.com/gauravgitgithub/url-shortener.git).
- Copy .env.example file - cp .env.example .env
- Install dependencies] - composer install
- Install NPM Modules for frontend - npm i && npm run dev
- Generate Key - php artisan key:generate
- Run migrations - php artisan migrate
- Serve - php artisan serve

## Stack Used

- Laravel (Backend)
- Livewire and Laravel Mix for templating and handling assets.
- MySQL for relational database.

## Deployment

AWS Lamda Serverless architecture has been use for deployment in production. Static files are being hosted on S3 Bucket and AWS RDS has been used for Database.

## Todo

- Implement Redis to reduce load on DB.
- Add expiration date for links to expire.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
