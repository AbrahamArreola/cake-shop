<center> <h1>Cupcake mío</h1> </center>

Cupcake mío es una marca no registrada la cual ofrece sus servicios de repostería a través de las redes sociales.
En estas se ofrecen diversos productos como pasteles de diferentes sabores además de servicios de personalización a pedido del cliente
para eventos como fiestas, bodas, etc.

### Redes sociales
- [Facebook](https://www.facebook.com/cupcakemio)
- [Instagram](https://www.instagram.com/cupcakemio/)

## Acerca de este proyecto
Como parte del proyecto para la materia de Programación para internet, mi objetivo es realizar una página completamente funcional a través de una tienda en línea para la gestión de los servicios ofrecidos por esta marca, la cual facilite la visualización de los productos, además de ofrecer un entorno amigable para el contacto entre cliente y proveedor para la realización de pedidos.

## Primera entrega (segundo proyecto)
Para esta primer entrega se elaboró un CRUD con dos entidades de la base de datos las cuales son la de productos y categorías, y con las cuales fue posible la elaboración del módulo de alta de productos con el que un administrador es capaz de registrar productos en la pagina para su visualización en la tienda en línea.
Estas dos entidades cuentan con la siguiente estructura:

### Tabla categories
| Campo      |    Tipo    |  Tamaño | Descripción |
|:-----------|:----------:|:-------:|:------------|
| id         | BIGINT     | 20      | Identificador del producto |
| created_at | TIMESTAMP  |         | Fecha de creación |
| updated_at | TIMESTAMP  |         | Fecha de actualización |
| name       | VARCHAR    | 50      | Nombre de la categoría |

### Tabla products
| Campo      |    Tipo    |  Tamaño | Descripción |
|:-----------|:----------:|:-------:|:------------|
| id         | BIGINT     | 20      | Identificador del producto |
| created_at | TIMESTAMP  |         | Fecha de creación |
| updated_at | TIMESTAMP  |         | Fecha de actualización |
| name       | VARCHAR    | 50      | Nombre del producto |
| price      | DOUBLE     | 8,2     | Precio del producto |
| description| TEXT       | 65535   | Breve descripción del producto |
| image      | VARCHAR    | 255     | Imagen del producto |
| category_id| BIGINT     | 29      | Llave foránea para relacionar el producto con una categoría de la tabla categories |

## Pasos para el uso del proyecto
Para este proyecto se utiliza el framework Laravel, por lo que su instalación forma parte primordial antes de dar seguimiento a los pasos descritos a continuación:

1. Instalar las dependencias del proyecto con el siguiente comando.

```php
composer install
```

2. Configurar el archivo .env.example incluido en el repositorio con sus respectivas credenciales de bases de datos, para después crear el archivo .env.

```php
cp .env.example .env
```

3. Generar la llave que provee seguridad al proyecto.

```php
php artisan key:generate
```

4. Finalmente ejecutar las migraciones para la configuración de la base de datos.

```php
php artisan migrate 
```

## Requisito extra
Para este proyecto se hace uso de almacenamiento de imágenes con ayuda del flySystem de Laravel de forma local, por lo que es necesario crear un enlace simbólico para el correcto funcionamiento de las imágenes con el siguiente comando.

```php
php artisan storage:link
```
