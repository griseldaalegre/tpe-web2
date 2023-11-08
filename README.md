# tpe-web2

Trabajo realizado en grupo para la cursada de WEB2 (Carrera TUDAI). Integrantes: Garcia Alejo, Alegre Griselda Alegre.

Email: alegregriselda5@gmail.com - agarcia@alumnos.exa.unicen.edu.ar Temática del TPE Biblioteca

Breve descripción de la temática Biblioteca donde se almacenan libros y se registran usuarios para el prestamo de los mismos.

Usuarios para loguearse:
Administrador
Usuario: webadmin
Password: admin

Usuario Normal
Usuario: webuser
Pasword: user



api/categories: Muestro todas las categorias - GET
api/categories/ID: Muestro libros por categorias - GET 
api/categories/ID: Elimino categorias por id -  DELETE *Consultar*
api/categoria: Inserto categoria - POST
api/categoria/:iD : edito una categoria según e ID

# Endpoints
# Aclaracion: Los siguientes endpoints fueron probados desde Postman.

Obtener todas las categorías
Método: GET
URL: /api/categories
Descripción: Este endpoint devuelve todas las categorías de libros disponibles en la biblioteca.
Ejemplo de uso: GET /api/categories


Obtener libros por categoría
Método: GET
URL: /api/categories/:ID
Descripción: Devuelve la lista de libros que pertenecen a una categoría específica, donde {ID} es el ID de la categoría.
Ejemplo de uso: GET /api/categories/1

Eliminar una categoría por ID
Método: DELETE //ver de largar advertencia cuando la categoria no esta vacia
URL: /api/categories/:ID
Descripción: Elimina una categoría específica según su ID.
Ejemplo de uso: DELETE /api/categories/1

Insertar una nueva categoría
Método: POST
URL: /api/categories
Descripción: Permite agregar una nueva categoría a la biblioteca.
Ejemplo de uso: POST /api/categories

Editar una categoría por ID
Método: PUT
URL: /api/categories/:ID
Descripción: Permite modificar una categoría existente según su ID.
Ejemplo de uso: PUT /api/categories/:ID