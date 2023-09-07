# Descripción

## Instalación
- Se puede utilizar el siguiente repositorio para instalar con docker: `https://github.com/neosmic/docker-laravel-builder`. Seguir la guía de instalación del repositorio.
- Configurar variables: para base de datos y envío de correo así como el nombre de la APP en el archivo .env de la aplicación
```
APP_NAME="clientes"

DB_CONNECTION=mysql
DB_HOST=dbserver
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

QUEUE_CONNECTION=database

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=tsl
MAIL_FROM_ADDRESS="servidor-clientes"
MAIL_FROM_NAME=
```


## Uso