<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<p>
    1. Clonar el repositorio del proyecto en Laravel<br/>
    Abrir una terminal o consola de comandos y escribe lo siguiente:<br/>
    <code> git clone url https://github.com/AFONSECAM/PruebaAndresFonseca_Finanzauto.git</code>
    <hr/>
    2. Instalar dependencias del proyecto<br/>   
    Ingresa desde la terminal a la carpeta de tu proyecto y escribe:<br/>
    <code>composer install</code>
    <hr/>
    3. Generar archivo .env <br/>
    Escribe en tu terminal:<br/>
    <code>cp .env.example .env</code>
    <hr/>
    4. Generar Key<br/>
    En tu terminal corre el siguiente comando:<br/>    
    <code>php artisan key:generate</code>
    <hr/>
    5. Crear una base de datos en MySQL<br/>
    Para ello nos dirigimos al administrador de base de datos y la creamos.
    <hr/>
    6. Modificar el archivo .env y colocar los datos de BD y acceso a la misma<br/>
    <img src="https://i0.wp.com/diarioprogramador.com/wp-content/uploads/2020/09/Screenshot_198.png?w=381&ssl=1"/>
    <small>Cambiar los datos para realizar la conexion a la BD creada en el punto 5</small>
    <hr/>
    7. Correr las migraciones<br/>
    Una vez más desde nuestra terminal escribimos el comando:<br/>
    <code>php artisan migrate</code>
    <hr/>    
    <h5>Una vez finalizado clonado el proyecto desde la consola escribimos lo siguiente</h5>
    <code>php artisan serve</code> y visitamos la dirección que nos muestra la consola.
    <hr/>
    Al ingresar se crea un usuario y con ello se logra acceder al proyecto.
</p>
