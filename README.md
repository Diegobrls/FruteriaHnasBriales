
# Cestas Frutería Hnas. Briales
¡Bienvenido al repositorio de la aplicación "Cestas Frutería Hnas. Briales"! Esta es una aplicación web desarrollada con Laravel que te permite comprar cestas de regalo personalizadas que contienen frutas y productos varios como chocolate o vino.

## Contenido
* [Introducción](#Introducción)
* [Laravel](#Laravel)
* [Uso de la aplicación](#Uso-de-la-Aplicación)
* [Base de Datos](#Base-de-Datos)

## Introducción
"Cestas Frutería Hnas. Briales" es una aplicación web que te permite comprar cestas de regalo personalizadas con una amplia variedad de productos frescos y deliciosos. Puedes crear, editar y borrar tus propias cestas, así como encargarlas para otras personas o para ti mismo. La aplicación también cuenta con un catálogo de cestas disponibles para su compra, un sistema de autenticación y registro desarrollado con Laravel Breeze, y una interfaz amigable para gestionar tus pedidos y cestas.

## Laravel
Laravel es un framework de desarrollo web PHP que sigue el patrón de arquitectura MVC (Modelo-Vista-Controlador). Ofrece una estructura robusta y flexible para construir aplicaciones web de manera eficiente y escalable. Algunas de las características principales de Laravel incluyen:

| Componente  | Descripción |
| ------------- | ------------- |
| Routing  | Sistema de enrutamiento flexible que permite definir rutas para manejar solicitudes HTTP.  |
| Blade  | Motor de plantillas que simplifica la creación de vistas mediante directivas y sintaxis sencilla.  |
| Eloquent ORM | Capa de abstracción de la base de datos que facilita la interacción con la base de datos a través de modelos PHP. |
| Middleware | Funciones que se ejecutan antes y después de las solicitudes HTTP, útiles para la autenticación, autorización, y otras tareas de manejo de solicitudes. |
| Artisan | Interfaz de línea de comandos (CLI) que proporciona herramientas para realizar tareas comunes de desarrollo, como migraciones de base de datos, generación de código, y más. |
	
En el proyecto "Cestas Frutería Hnas. Briales", hemos utilizado Laravel como el framework principal para el desarrollo de la aplicación web. Hemos aprovechado las funcionalidades proporcionadas por Laravel, como el sistema de enrutamiento para definir las rutas de la aplicación, el motor de plantillas Blade para crear vistas dinámicas, y Eloquent ORM para interactuar con la base de datos de manera intuitiva y eficiente.

## Uso de la Aplicación

Para utilizar la aplicación "Cestas Frutería Hnas. Briales", sigue estos pasos:

1. **Registro/Login**: Si eres un nuevo usuario, regístrate en la plataforma proporcionando tu nombre, correo electrónico y contraseña. Si ya tienes una cuenta, inicia sesión con tus credenciales.
2. **Explora el Catálogo**: Una vez iniciada la sesión, navega por el catálogo de cestas disponibles para comprar. Puedes ver detalles como el nombre, precio, descripción y cantidad de elementos de cada cesta.
3. **Compra una Cesta**: Selecciona la cesta que deseas comprar y sigue los pasos para realizar el pedido. Completa el formulario con la dirección de entrega, destinatario, nota adicional, fecha y horario de entrega.
4. **Gestiona tus Pedidos**: Una vez realizado el pedido, puedes verlo en la sección "Mis Pedidos" para hacer un seguimiento del estado de tu pedido.
5. **Crea tus Propias Cestas**: Si lo deseas, puedes crear, editar y borrar tus propias cestas personalizadas en la sección "Mis Cestas". Personaliza el nombre, descripción, precio y elementos de tu cesta.
6. **Actualiza tu Perfil**: En la sección de usuario, puedes actualizar tu información de perfil, como el correo electrónico y la contraseña.

## Base de Datos
La base de datos se compone de varias tablas que almacenan información sobre usuarios, cestas, pedidos, elementos y las relaciones entre ellos. A continuación se detallan las tablas principales y sus columnas, así como las relaciones entre ellas:

### users
- id: Identificador único del usuario.
- name: Nombre del usuario.
- email: Correo electrónico único del usuario.
- telefono: Número de teléfono único del usuario.
- password: Contraseña del usuario.
- email_verified_at: Fecha y hora de verificación del correo electrónico del usuario.
- remember_token: Token para recordar la sesión del usuario.

### cestas
- id: Identificador único de la cesta.
- nombre: Nombre de la cesta.
- foto: Ruta de la foto de la cesta.
- descripcion: Descripción de la cesta.
- precio: Precio de la cesta.
- cantidad_elementos: Cantidad de elementos en la cesta.
- user_id: Identificador del usuario que creó la cesta.

#### Relaciones:
La tabla de cestas tiene una relación muchos a uno con la tabla de usuarios a través de la columna user_id.

### cestas_personal
- id: Identificador único de la cesta personalizada.
- nombre: Nombre de la cesta personalizada.
- descripcion: Descripción de la cesta personalizada.
- precio: Precio de la cesta personalizada.
- cantidad_elementos: Cantidad de elementos en la cesta personalizada.
- user_id: Identificador del usuario que creó la cesta personalizada.

#### Relaciones:
La tabla de cestas personalizadas tiene una relación muchos a uno con la tabla de usuarios a través de la columna user_id.

### pedidos
- id: Identificador único del pedido.
- fecha_realizacion: Fecha y hora de realización del pedido.
- nota: Nota asociada al pedido.
- direccion: Dirección de entrega del pedido.
- nombre_destinatario: Nombre del destinatario del pedido.
- horario_entrega: Horario de entrega del pedido.
- fecha_entrega: Fecha y hora de entrega del pedido.
- usuario_id: Identificador del usuario que realizó el pedido.
- cesta_id: Identificador de la cesta asociada al pedido.
- cesta_personal_id: Identificador de la cesta personalizada asociada al pedido.

#### Relaciones:
La tabla de pedidos tiene relaciones muchos a uno con la tabla de usuarios a través de la columna usuario_id, y relaciones muchos a uno con las tablas de cestas y cestas personalizadas a través de las columnas cesta_id y cesta_personal_id, respectivamente.

### elementos
- id: Identificador único del elemento.
- nombre: Nombre del elemento.
- descripcion: Descripción del elemento.
- elementos_cesta y elementos_cesta_personal
- id: Identificador único de la relación.
- cesta_id: Identificador de la cesta asociada a la relación.
- elemento_id: Identificador del elemento asociado a la relación.

#### Relaciones:
Las tablas de relaciones elementos_cesta y elementos_cesta_personal tienen relaciones muchos a uno con las tablas de cestas y elementos a través de las columnas cesta_id y elemento_id, respectivamente.


