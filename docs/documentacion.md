# Notas
## ¿Por qué PostgreSQL?
Vamos a montar la App en Heroku, ahí se configura con ese motor.
Al ser SQL, no deberia afectar en nada el desarrollo con MySQL.

## Auth
[Auth tutorial](https://laravelarticle.com/laravel-7-authentication-tutorial)

## WSL ()
1. 
[PHP 7.4](https://computingforgeeks.com/how-to-install-php-on-ubuntu/)
2. 
[Composer](https://www.jeffgeerling.com/blog/2018/installing-php-7-and-composer-on-windows-10-using-ubuntu-wsl)

```
composer global require laravel/installer
```
3. 
[PostgreSQL](https://medium.com/@harshityadav95/postgresql-in-windows-subsystem-for-linux-wsl-6dc751ac1ff3)
```
# To start the service, type 
    sudo service postgresql start.
# To conntect to postgres, type 
    sudo -u postgres psql
```
[Comandos utiles PostgreSQL](https://www.postgresqltutorial.com/psql-commands/)