# Magento_Prueba_Tecnica

PRUEBA TÉCNICA - MAGENTO
Crear un nuevo módulo que permita la gestión de calificaciones de los alumnos de un examen. Para ello, se solicita crear el modelo de datos correspondiente, las clases e interfaces necesarias para poder realizar operaciones CRUD, así como controladores que muestren la información almacenada en frontend y admin.
Leer las instrucciones de entrega de la prueba, explicadas al final del documento, antes de comenzar.
1. Crear un nuevo módulo Hiberus_XXXX, donde XXXX se corresponde a tu apellido.
2. Crear el modelo de datos y las interfaces y clases necesarias para gestionar la siguiente estructura de información: Field Type Null Key Default Extra id_exam int(11) NO PRI <null> auto_increment firstname varchar(100) NO <null> lastname varchar(250) NO <null> mark decimal(4, 2) NO <null>
* No se debe permitir la existencia de dos alumnos con el mismo nombre y apellido.
3. Incluir en el módulo un fichero CSV con un listado de 15 alumnos (nombres y apellidos).
4. Crear un DataPatch encargado de leer el fichero CSV anterior y generar una calificación aleatoria para cada alumno (del 0 al 10, con 2 cifras decimales). Esta información debe almacenarse en el modelo de datos creado anteriormente.
5. Crear un nuevo controlador de frontend, accesible desde el navegador a través de una ruta igual a tu apellido (en minúsculas y sin tildes).
6. Asociar un layout, bloque y template a nuestro nuevo controlador, para devolver un listado con los nombres y calificaciones de los alumnos.
7. Incluye un bloque adicional debajo del listado que muestre la calificación media obtenida. Calcular esta media de la forma más eficiente posible.
8. Incluir dos botones al listado anterior, que proporcionen la siguiente funcionalidad mediante Javascript:
a. Al pulsar un botón: Ocultar/mostrar las calificaciones de los alumnos.
b. Al pulsar un botón: Mostrar una alerta informando de la calificación más alta.
9. Maquetar el listado anterior mediante un fichero LESS incluido en el propio módulo:
a. Maquetación libre del listado de calificaciones, botones, etc.
b. En Mobile: Alinear elementos del listado al centro.
c. En Desktop: Alinear elementos del listado a la izquierda.
d. Hacer que los alumnos suspensos aparezcan destacados en rojo.
e. Hacer que los elementos impares del listado, tengan un estilo diferente a los elementos pares.
10. Crear un plugin que altere las calificaciones de los alumnos que hayan suspendido, reemplazando su calificación por un 4.9. Esta funcionalidad debe poder activarse/desactivarse desde el administrador de Magento.
11. Crear un nuevo comando CLI hiberus:XXXX (donde XXXX se corresponde a tu apellido), que permita visualizar por terminal el listado de los alumnos junto a sus calificaciones.
12. Crear los siguientes endpoints accesibles desde el API REST de Magento, para exponer las siguientes funcionalidades:
a. Visualizar listado de alumnos y calificaciones.
b. Visualizar un alumno y sus calificaciones mediante ID.
c. Eliminar un alumno y sus calificaciones mediante ID.
d. Crear/actualizar un alumno y sus calificaciones.
e. Actualizar un alumno y sus calificaciones mediante ID.
13. Crear una sección en el administrador de Magento donde poder visualizar un listado con los alumnos y sus calificaciones, pudiendo realizar búsquedas por nombre y apellido.
Cómo entregar la prueba
Para entregar la prueba, deben subirse los ficheros del módulo desarrollado a un repositorio privado de Github. Para poder acceder al repositorio, se deberá compartir con la cuenta: magento-revisiones@hiberus.com
Cada punto del enunciado debe subirse en un commit separado sobre la rama principal del repositorio.# Magento_Prueba_Tecnica
