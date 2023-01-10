### Cupcake mío (eCommerce website)

Este proyecto tiene por objetivo el crear un eCommerce website para la gestión y la compra de productos pertenecientes a la marca Cupcake mío. El sitio cuenta con diversos módulos para que cualquier persona que visite la página le sea posible visualizar el catálogo de productos así como tener contacto con el negocio por medio de correo electrónico y redes sociales, en caso de cualquier duda o aclaración en la compra de algún producto. También se cuenta con un control de sesiones que administra la estancia en la página para dos tipos de usuario:

- **administrador**: empleados del negocio con una cuenta con la cual se encargan de mantener actualizada la página a través de diversos módulos que les permiten crear, editar y eliminar productos, así como gestionar los pedidos de múltiples clientes.
- **cliente**: cualquier usuario con una cuenta con la cual disponen de un carrito de compras para hacer pedidos de los productos deseados a través de la página.

Estos usuarios pueden administrar sus cuentas de manera que siempre puedan mantener actualizada su información personal como nombre, foto de perfil o contraseñas.

<hr>

## Integrantes del equipo
- Jorge Abraham Arreola
- Juan Manuel Balderrama

<hr>

## Instrucciones de instalación

Es necesaria una instalación limpia de un proyecto de laravel, además de la creación de un link simbólico para trabajar con imagenes:
```shell
php artisan storage:link
```

Finalmente, también es importante realizar las migraciones con los seeders ya que estos últimos se encargan de crear los roles necesarios para el funcionamiento del sitio web:
```shell
php artisan migrate --seed
```

*Deployed on Heroku*
