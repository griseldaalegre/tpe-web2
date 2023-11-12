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
                                "id_categoria": (Id de la categoria),
                                "categoria": "(Nombre_Categoria)"
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
                                "id_libro": "(Id del libro)",
                                "titulo_libro": "(Nombre del libro)",
                                "autor_libro": "(Autor del libro)",
                                "id_categoria": (Id de la categoria),
                                "anio": (Año del libro)
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
                        "categorie": "(Nombre_Categoria)" (VARCHAR)
                    }

Respuesta positiva:

                    {
                        "msg": "La categoría fue agregada con éxito.",
                        "Categoria": "(Nombre_Categoria)" 
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
                        "categorie": "(Nombre_Categoria)" (VARCHAR)
                    }

Respuesta positiva: 

                    {
                        "msg": "La categoría fue modificada con éxito.",
                        "Categoria": {
                            "id_categoria": (Id de la categoria),
                            "categoria": "(Nombre_Categoria)"
                            }
                    }

                    Status 201.

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

ORDENA las categorías.
Método: GET
URL: /api/categoriesOrder/:order
Descripción: Permite ordenar las categorías existente de manera asendente o desendente.
Ejemplo de uso: GET /api/categoriesOrder/order(ASC/DESC)

Respuesta positiva: 

                    {
                        "msg": "Datos de las categorías obtenidos ordenadas con éxito",
                        "Categoria": {
                            "id_categoria": (Id de la categoria),
                            "categoria": "(Nombre_Categoria)"
                            }...
                    }

                    Status 200.

Respuestas negativas:

                    {
                        "msg": "Error en el parámetro de orden"
                    }

                    Status 404.
                    
ORDENA las categorías.
Método: GET
URL: /api/categorieOrderById/:ID/:order
Descripción: Permite ordenar los libros de manera asendente o desendente segun un id de categorías especifica.
Ejemplo de uso: GET /api/categorieOrderById/1(id_categoria)/order(ASC/DESC)

Respuesta positiva:

                    {
                        "msg": "Datos de las categorías obtenidos ordenadas con éxito",
                        "Categorias": [
                            {
                                "id_libro": "(Id del libro)",
                                "titulo_libro": "(Nombre del libro)",
                                "autor_libro": "(Autor del libro)",
                                "id_categoria": (Id de la categoria),
                                "anio": (Año del libro)
                            }...]
                    }
                    
                    Status 200.        

Respuestas negativas:

                    {
                        "msg": "La categoría (:ID) especificada no existe"
                    }

                    Status 404.

                    {
                        "msg": "Error en el parámetro de orden"
                    }

                    Status 400.

FLITRADO de las categorías.
Método: GET
URL: /api/categoriesFilter/:letter
Descripción: Permite filtrar todas las categorias que empiecen segun una letra especificada en la URL.
Ejemplo de uso: GET /tpe-web2/api/categoriesFilter/letter(letra por la cual se quiere filtrar)
                    
Respuesta positiva:

                    {
                        "msg": "Datos de las categorías filtradas obtenidas con éxito",
                        "Categorias": [
                            {
                                "id_categoria": (Id de la categoria),
                                "categoria": "(Nombre_Categoria)"
                            }...]
                    }

                    Status 200.        

Respuestas negativas:

                    {
                        "msg": "No se encontro resultado."
                    }

                    Status 404.

PAGINADO de las categorías.
Método: GET
URL: /api/categorie/:page
Descripción: Permite paginar por 3 categorias por pagina.
Ejemplo de uso: GET /tpe-web2/api/categorie/page(Numero de la pagina, 1-2-3-...)
                    
Respuesta positiva:

                    {
                        "msg": "Datos de las categorías obtenidos con éxito",
                        "categories": [
                            {
                                "id_categoria": (Id de la categoria),
                                "categoria": "(Nombre_Categoria)"
                            },
                            {
                                "id_categoria": (Id de la categoria),
                                "categoria": "(Nombre_Categoria)"
                            },
                            {
                                "id_categoria": (Id de la categoria),
                                "categoria": "(Nombre_Categoria)"
                            }
                        ]
                    } 
                    
                    Status 200.

Respuestas negativas:

                    {
                        "msg": "Error al obtener las categorías o la página solicitada no tiene resultados"
                    }

                    Status 404.                   
