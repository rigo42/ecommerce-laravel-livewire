# CRM - Laravel

Hola!, CRM - Laravel es un proyecto open source creado con livewire, laravel, alpine js, el cual
te ayudar谩 a tener un control de tus clientes.

## Funcionalidades 馃搵
* Dashboard general
* Google Analytics
* Gesti贸n de prospectos
* Convertir prospecto a cliente
* Gesti贸n de clientes
* Env铆o de correo de bienvenida al cliente
* Gesti贸n de proveedores
* Gesti贸n de tipos de servicios
* Gesti贸n de servicios 
* Gesti贸n de proyectos
* Gesti贸n de cotizaciones
* Gesti贸n de facturas (Adjuntar factura)
* Gesti贸n de pagos
* Gesti贸n de gastos
* Gesti贸n de usuarios
* Configuraciones
* Logs

## Comenzando 馃殌

_Estas instrucciones te permitir谩n obtener una copia del proyecto en funcionamiento en tu m谩quina local para prop贸sitos de desarrollo y pruebas._


### Pre-requisitos 馃搵

_Que cosas necesitas para instalar el software y como instalarlas_

```
1.- PHP v7.4+
2.- Servidor XAMMP, WAMPP o Laragon
```

### Instalaci贸n 馃敡

_1.- Deber谩s de instalar las dependencias de laravel con el siguiente comando_


```
git clone git@github.com:rigo42/Crm-Laravel-Livewire.git
composer install
```

_2.- Una vez que se terminen de descargar el proyecto y las dependencias_

```
php artisan key:generate
```

_3.- Deber谩s de rellenar las variables del archivo .env.example, una vez finalizado le podr谩s cambiar el nombre a .env_

__

### Configuraci贸n 鈿欙笍

**Correo:**

_1.- Deber谩s de configurar las variables de entorno MAIL con tus datos de acceso de tu dominio o datos de prueba con mailtrap o el que prefieras. Esto para el funcionamiento de envios de correo._

**Google Analytics:**

_1.- Habilitar la API de google analytics en [Console Cloud Google](https://console.cloud.google.com/)_

_2.- Deber谩s de obtener tu credencial de cuenta de servicio de Google en formato json y colocarlo el archivo en ./storage/google/  <- La carpeta "google" deber谩s crearla_

_3.- Deber谩s de obtener tu VIEW ID de tu p谩gina de Google Analytics y colocarlo en la variable de entorno de .env ANALYTICS_VIEW_ID=""_

_4.- Configura la variable "service_account_credentials_json" del archivo ./config/analytics.php con el nombre de tu archivo que anteriormente descargaste en el paso 2_

## Ejecutando las migraciones 鈿欙笍

```
php artisan migrate
```

## Construido con 馃洜锔?

**_Dependencias de laravel que ayudaron a la construcci贸n del proyecto_**

* "aprendible/storage-link-route": "^1.0",
* "asantibanez/livewire-charts": "^2.3",
* "fedeisas/laravel-mail-css-inliner": "^4.0",
* "intervention/image": "^2.5",
* "jantinnerezo/livewire-alert": "^2.1",
* "laravel-lang/lang": "~7.0",
* "laravel/ui": "^3.3",
* "livewire/livewire": "^2.4",
* "orangehill/iseed": "^3.0",
* "spatie/laravel-activitylog": "^3.17",
* "spatie/laravel-analytics": "^3.11",
* "spatie/laravel-backup": "^6.16",
* "spatie/laravel-permission": "^4.0"

## Autor 鉁掞笍

* **Rigoberto Villa Rodr铆guez** - *Programador Full Stack* - [Rigoberto Villa](https://github.com/rigo42)



---
鈱笍 con 鉂わ笍 por [Rigoberto Villa Rodr铆guez](https://github.com/rigo42) 馃槉