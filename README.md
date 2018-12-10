# Backend con tecnologías de libre distribución - Práctica 2
> En este proyecto se realiza una primera aproximación a la programación con PHP
> #### [Máster en Ingeniería Web por la Universidad Politécnica de Madrid (miw-upm)](http://miw.etsisi.upm.es)
> #### Asignatura: *PHP*

## Tecnologías necesarias
### Backend
* PHP
* Doctrine (ORM)
* Composer
* XAMPP
* MySQL

### Cliente web
* HTML5
* CSS3 + Bootstrap
* Javascript + jQuery

### IDE
* WebStorm
* Github

## Objetivo.

El objetivo de esta práctica es progresar en el conocimiento del lenguaje de scripting PHP y el ORM Doctrine y 
familiarizarse con el desarrollo de aplicaciones web completas integrando tecnologías del lado del cliente con el 
procesamiento en el lado del servidor.

## Enunciado.

Esta práctica pretende servir de ejemplo de integración de diferentes técnicas aprendidas en la asignatura “Back-end con 
tecnologías de libre distribución (PHP)”. En la misma se profundizará en el conocimiento del lenguaje de scripting PHP, 
se emplearán datos almacenados en un gestor de bases de datos y adicionalmente, se utilizarán componentes desarrollados 
por terceros que permitirán simplificar las labores a desarrollar.

## Fases

### 1-  Configuración del proyecto - Descarga de dependencias con Comporser

La versión mínima necesaria del intérprete de PHP es la 5.5.0, si bien es recomendable actualizar a la última versión 
estable disponible (PHP 7.2.* actualmente). Para conocer la versión disponible en el sistema:

[![Instalación 1](https://github.com/tomas-teston/PHP-MiW-PR1/blob/master/instalacion1.png)](https://github.com/tomas-teston/PHP-MiW-PR1/blob/master/instalacion1.png)

Una vez comprobada la versión del intérprete de PHP se procederá a la generación de la base de datos (miw_results) y de 
un usuario y sus correspondientes permisos de acceso en el gestor de bases de datos. Desde cualquier cliente 
MySQL/MariaDB (por ejemplo phpMyAdmin o MySQL Workbench) es posible realizar este paso (desde la opción de gestión de 
usuarios). En relación a este aspecto, el proyecto emplea el componente PHP dotenvi, por lo que los parámetros deberán 
ser establecidos en el fichero de configuración de variables de entorno (/.env). Por ejemplo:

[![Instalación 2](https://github.com/tomas-teston/PHP-MiW-PR1/blob/master/instalacion2.png)](https://github.com/tomas-teston/PHP-MiW-PR1/blob/master/instalacion2.png)

A continuación empleando el gestor de dependencias composer se procederá a instalar y configurar los componentes 
requeridos por la aplicación. Este comando se ejecutará desde el directorio raíz del proyecto:

[![Instalación 3](https://github.com/tomas-teston/PHP-MiW-PR1/blob/master/instalacion3.png)](https://github.com/tomas-teston/PHP-MiW-PR1/blob/master/instalacion3.png)

Con la ejecución del comando anterior se generará en el proyecto la carpeta vendor, que es donde residen los componentes 
desarrollados por terceros. Una vez hecho esto ya estaría la aplicación preparada.

### 2- CRUD vía CLI

Se implementan los scripts PHP necesarios que nos permitirán (vía terminal) realizar las operaciones de creación,
lectura, actualización y borrado (CRUD) sobre usuarios y sus resultados:

NOTA: Estos scripts están en la dirección `/src/Script` del proyecto.

#### Usuarios:

* Crear (admin): `php src/Script/create_user_admin.php`
* Crear (general): `php src/Script/create_user_general.php -Username -Email -Password`
* Leer (uno): `php src/Script/list_one_user.php -Userid [--json]`
* Leer (todos): `php src/Script/list_users.php [--json]`
* Modificar (uno): `php src/Script/update_user.php -Userid [Username] [Email] [Password] [isEnabled]`
* Eliminar (uno): `php src/Script/delete_one_user.php -Userid`
* Eliminar (todos): `php src/Script/delete_users.php`

#### resultados:

* Crear (uno): `php src/Script/create_result.php -Result -Userid`
* Leer (uno): `php src/Script/list_one_result.php -Result [--json]`
* Leer (todos): `php src/Script/list_results.php [--json]`
* Modificar (uno): `php src/Script/update_result.php -ResultId -Userid -Result`
* Eliminar (uno): `php src/Script/delete_one_result.php -ResultId`
* Eliminar (todos): `php src/Script/delete_results.php`

### 3- Pruebas con PhpUni

Para ejecutar las pruebas que se han implementado, nos posicionamos en la raiz del proyecto y ejecutamos `./bin/phpunit`

### 4- CRUD vía Web

Además de la ejecución por terminal, también se dispone de una interfaz gráfica con la que podemos probar los scripts
descritos anteriormente. 

Esta interfaz se encuentra en la ruta `/src/WebClient` del proyecto. Para acceder a la página principal, lanzamos la 
URL `/src/WebClient/index.php`

