Integrantes:
Jeremias Neftaly Fuentes Méndez
Jhoan Mauricio Ortega Ventura


Análisis del Laboratorio
1. ¿De qué forma manejaste el login de usuarios?
El login se manejó mediante el método POST para enviar las credenciales de forma privada desde el formulario hacia el servidor. En el archivo index.php, el código recibe el usuario y la contraseña, y realiza una consulta SQL comparándolos directamente con los registros de la tabla usuarios.
¿Por qué funciona así?
Funciona de esta manera porque es la forma más directa de validar identidad en una aplicación web: el servidor verifica que el par de datos coincida exactamente con lo almacenado. Si hay coincidencia, se crea una sesión para que el servidor "recuerde" al usuario mientras navega, de lo contrario, se deniega el acceso.
2. ¿Por qué es necesario utilizar bases de datos en lugar de variables?
Las variables en PHP tienen un ciclo de vida limitado: existen únicamente mientras la página se está procesando. Una vez que el usuario cierra el navegador o cambia de página, el valor de la variable se destruye.
Las bases de datos son necesarias porque ofrecen persistencia. Permiten que la información (como los usuarios registrados o los datos ingresados en la tabla) se guarde de forma permanente en el disco duro del servidor, estando disponible incluso después de apagar la computadora o reiniciar el servidor web.

3. ¿Cuándo usar Bases de Datos y cuándo datos temporales (Cookies/Sesiones)?
•	Bases de Datos: Se deben usar para información crítica, permanente y masiva. Por ejemplo: perfiles de usuario, inventarios, registros históricos y cualquier dato que deba consultarse días o meses después.
•	Cookies y Sesiones: Se utilizan para estado y personalización temporal.
o	Las sesiones son ideales para saber quién está logueado en el momento (seguridad).
o	Las cookies sirven para recordar preferencias pequeñas del usuario en su propio navegador (como el idioma o si aceptó términos y condiciones) sin saturar el servidor

4. Descripción de tablas y tipos de datos
Para este laboratorio se utilizaron dos tablas principales:
Tabla Usuarios:

| Campo    | Tipo de Dato       | Justificación                                                                                                    |
| -------- | ------------------ | ---------------------------------------------------------------------------------------------------------------- |
| id       | INT AUTO_INCREMENT | Número entero único que se genera automáticamente para identificar a cada usuario sin errores.                   |
| username | VARCHAR(50)        | Cadena de texto de longitud variable; ideal para nombres de usuario porque ahorra espacio si el nombre es corto. |
| password | VARCHAR(255)       | Texto largo para almacenar la clave. Se usa esta longitud por si en el futuro se decide encriptar la contraseña. |

Tabla Registros:
| Campo       | Tipo de Dato       | Justificación                                                                                                       |
| ----------- | ------------------ | ------------------------------------------------------------------------------------------------------------------- |
| id          | INT AUTO_INCREMENT | Llave primaria para llevar el orden correlativo de los datos ingresados.                                            |
| nombre_item | VARCHAR(100)       | Almacena el nombre del objeto o dato; 100 caracteres es suficiente para la mayoría de nombres.                      |
| descripcion | TEXT               | Se eligió TEXT en lugar de VARCHAR porque permite descripciones más largas y detalladas sin un límite tan estricto. |

