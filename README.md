
# Cestas Frutería Hnas. Briales
¡Bienvenido al repositorio de la aplicación "Cestas Frutería Hnas. Briales"! Esta es una aplicación web desarrollada con Laravel que te permite comprar cestas de regalo personalizadas que contienen frutas y productos varios como chocolate o vino.

##Contenido
* [Introducción](#Introducción)
* [Laravel](#Laravel)
* [Breeze](#Laravel)
* [Blade](#Laravel)
* [Base de Datos](#Laravel)

## Contenido
* [Dropwizard](http://www.dropwizard.io/1.0.2/docs/) - El framework web usado
* [Maven](https://maven.apache.org/) - Manejador de dependencias
* [ROME](https://rometools.github.io/rome/) - Usado para generar RSS

Introducción
"Cestas Frutería Hnas. Briales" es una aplicación web que te permite comprar cestas de regalo personalizadas con una amplia variedad de productos frescos y deliciosos. Puedes crear, editar y borrar tus propias cestas, así como encargarlas para otras personas o para ti mismo. La aplicación también cuenta con un catálogo de cestas disponibles para su compra, un sistema de autenticación y registro desarrollado con Laravel Breeze, y una interfaz amigable para gestionar tus pedidos y cestas.

Laravel
Laravel es un framework de código abierto para el desarrollo de aplicaciones web con PHP. Ofrece una sintaxis elegante y expresiva que te permite escribir código de forma rápida y sencilla. Laravel incluye una amplia gama de características poderosas, como el enrutamiento flexible, el sistema de plantillas Blade, la gestión de bases de datos con Eloquent ORM, la autenticación integrada y mucho más.

Breeze
Breeze es un paquete de inicio oficial de Laravel que proporciona una configuración de autenticación mínima y funcional para tu aplicación. Con Breeze, puedes añadir fácilmente un sistema de registro, inicio de sesión, restablecimiento de contraseña y verificación de correo electrónico a tu aplicación Laravel de forma rápida y sencilla.

Blade
Blade es el motor de plantillas incluido en Laravel que te permite escribir código HTML de forma sencilla y expresiva. Blade ofrece una sintaxis intuitiva y potente que te permite trabajar con datos dinámicos, incluir subvistas, definir estructuras de control y mucho más.

Base de Datos
La base de datos se compone de varias tablas que almacenan información sobre usuarios, cestas, pedidos, elementos y las relaciones entre ellos. A continuación se detallan las tablas principales y sus columnas, así como las relaciones entre ellas:

users
id: Identificador único del usuario.
name: Nombre del usuario.
email: Correo electrónico único del usuario.
telefono: Número de teléfono único del usuario.
password: Contraseña del usuario.
email_verified_at: Fecha y hora de verificación del correo electrónico del usuario.
remember_token: Token para recordar la sesión del usuario.

cestas
id: Identificador único de la cesta.
nombre: Nombre de la cesta.
foto: Ruta de la foto de la cesta.
descripcion: Descripción de la cesta.
precio: Precio de la cesta.
cantidad_elementos: Cantidad de elementos en la cesta.
user_id: Identificador del usuario que creó la cesta.

Relaciones:
La tabla de cestas tiene una relación muchos a uno con la tabla de usuarios a través de la columna user_id.
cestas_personal
id: Identificador único de la cesta personalizada.
nombre: Nombre de la cesta personalizada.
descripcion: Descripción de la cesta personalizada.
precio: Precio de la cesta personalizada.
cantidad_elementos: Cantidad de elementos en la cesta personalizada.
user_id: Identificador del usuario que creó la cesta personalizada.

Relaciones:
La tabla de cestas personalizadas tiene una relación muchos a uno con la tabla de usuarios a través de la columna user_id.

pedidos
id: Identificador único del pedido.
fecha_realizacion: Fecha y hora de realización del pedido.
nota: Nota asociada al pedido.
direccion: Dirección de entrega del pedido.
nombre_destinatario: Nombre del destinatario del pedido.
horario_entrega: Horario de entrega del pedido.
fecha_entrega: Fecha y hora de entrega del pedido.
usuario_id: Identificador del usuario que realizó el pedido.
cesta_id: Identificador de la cesta asociada al pedido.
cesta_personal_id: Identificador de la cesta personalizada asociada al pedido.
Relaciones:

La tabla de pedidos tiene relaciones muchos a uno con la tabla de usuarios a través de la columna usuario_id, y relaciones muchos a uno con las tablas de cestas y cestas personalizadas a través de las columnas cesta_id y cesta_personal_id, respectivamente.

elementos
id: Identificador único del elemento.
nombre: Nombre del elemento.
descripcion: Descripción del elemento.
elementos_cesta y elementos_cesta_personal
id: Identificador único de la relación.
cesta_id: Identificador de la cesta asociada a la relación.
elemento_id: Identificador del elemento asociado a la relación.

Relaciones:
Las tablas de relaciones elementos_cesta y elementos_cesta_personal tienen relaciones muchos a uno con las tablas de cestas y elementos a través de las columnas cesta_id y elemento_id, respectivamente.


