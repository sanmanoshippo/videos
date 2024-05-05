-- .env, .env.example, .env.testing など、DB_DATABASEの値に合わせること
CREATE DATABASE IF NOT EXISTS laravel_app;
CREATE DATABASE IF NOT EXISTS laravel_app_test;
GRANT ALL ON laravel_app.* TO 'dev'@'%';
GRANT ALL ON laravel_app_test.* TO 'dev'@'%';

