# tpe-web2

Trabajo realizado en grupo para la cursada de WEB2 (Carrera TUDAI). Integrantes: Garcia Alejo, Alegre Griselda Alegre.

Email: alegregriselda5@gmail.com - agarcia@alumnos.exa.unicen.edu.ar Temática del TPE Biblioteca

Breve descripción de la temática Biblioteca donde se almacenan libros y se registran usuarios para el prestamo de los mismos.

Usuarios para loguearse:

Administrador.
Usuario: webadmin
Password: admin

Usuario Normal.
Usuario: webuser
Pasword: user


# Endpoints
# Aclaracion: Los siguientes endpoints fueron probados desde Postman.

OBTENER todas las categorías.
Método: GET
URL: /api/categories
Descripción: Este endpoint devuelve todas las categorías de libros disponibles en la biblioteca.
Ejemplo de uso: GET /api/categories

Respuesta positiva: 
                    {
                        "msg": "Datos de las categorias obtenidos con éxito",
                        "categories": [
                            {
                                "id_categoria": 1,
                                "categoria": "carlota"
                            } ...]
                    }

                    Status 200.

OBTENER libros por categoría.
Método: GET
URL: /api/categories/:ID
Descripción: Devuelve la lista de libros que pertenecen a una categoría específica, donde {ID} es el ID de la categoría.
Ejemplo de uso: GET /api/categories/:ID

Respuesta positiva:
                    {
                        "msg": "Datos del los libros por categoria obtenidos con éxito",
                        "book": [
                            {
                                "id_libro": 171,
                                "titulo_libro": "Pig And My Journey",
                                "autor_libro": "Ge Orwell",
                                "id_categoria": 8,
                                "anio": 1968
                            } ...]
                    }

                    Status 200.        

Respuesta Negativa:
                    {
                        "msg": "El ID (:ID): no existe"
                    }

                    Status 404.

ELIMINAR una categoría por ID.
Método: DELETE //ver de largar advertencia cuando la categoria no esta vacia
URL: /api/categories/:ID
Descripción: Elimina una categoría específica según su ID.
Ejemplo de uso: DELETE /api/categories/:ID

Respuesta positiva: 
                    {
                        "msg": "Se elimino correctamente (:ID)"
                    }

                    Status 200.

Respuesta negativa: 
                    {
                        "msg": "La categoría (:ID) especificada no existe"
                    }

                    Status 404.



INSERTAR una nueva categoría.
Método: POST
URL: /api/categories
Descripción: Permite agregar una nueva categoría a la biblioteca.
Ejemplo de uso: POST /api/categories

 JSON para poder 
agregar categoria:  
                    {
                        "categorie": "Nombre_Categoria" (VARCHAR)
                    }

Respuesta positiva: 
                    {
                        "msg": "La categoría fue agregada con éxito.",
                        "Categoria": "Nombre_Categoria" 
                    }

                    Status 201.

respuesta negativa: 
                    {
                        "msg": "Campo incompleto"
                    } 

                    Status 400.


EDITAR una categoría por ID.
Método: PUT
URL: /api/categories/:ID
Descripción: Permite modificar una categoría existente según su ID.
Ejemplo de uso: PUT /api/categories/:ID(id_categoria)

JSON para poder 
editar categoria:  
                    {
                        "categorie": "Nombre_Categoria" (VARCHAR)
                    }

Respuesta positiva: 
                    {
                        "msg": "La categoría fue modificada con éxito.",
                        "Categoria": {
                            "id_categoria": 1,
                            "categoria": "carlota"
                            }
                    }

                    Status 200.

Respuestas negativas: 
                    {
                        "msg": "La categoría (:ID) especificada no existe"
                    }

                    Status 404.

                    {
                        "msg": "El ID (:ID): no existe"
                    }

                    Status 404.

                    {
                        "msg": "Campo vacio"
                    }

                    Status 400.
