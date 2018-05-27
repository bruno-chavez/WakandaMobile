# Tarea 3 Bases de Datos 2018-1

Bruno Sebastian Chavez Lazo

201573059-8


Este archivo tiene formato Markdown, 
para visualizarlo correctamente es necesario verlo como tal.

## Suposiciones:

Se asume que el rut es correcto, 
no se verificara nada respecto a 
ruts al momento de crear usuarios.

## Condiciones especificas de mi tarea:

Al momento de registrar usuarios y divisiones,
la contraseña debe tener un minimo de 6 caracteres.

Al momento de registrar una division, 
se pedira elegir un prefijo, 
el cual tiene que ser un numero unico, de tres digitos,
estas condiciones son verificadas por la aplicacion y 
no dejara continuar con el registro si esta 
condicion no se cumple.

No habra una checkmark de "Remember Me" 
al momento de hacer loguin de usuario ni division.

En el caso de que se olvide una contraseña 
de una division o usuario no hay manera de recuperarla.

Al momento de crear un numero este 
tendra que ser de siete digitos, 
requisito verificado por la aplicacion.

Un usuario no podra ingresar una nueva 
portabilidad si ya hay una pendiente.

## Vistas:
Todas las rutas han sido verificadas y se detallan 
a continuacion, si una ruta no esta especificada 
para un tipo de "usuario" (invitado, usuario, division), 
significa que no tienen acceso 
a esta y sera redireccionado 
al dashboard acorde al tipo de usuario.

Ejemplo: una division autenticada no tiene acceso a '/user'
y sera redireccionado a '/division' 
si intenta acceder a esta manualmente.

#### Acceso para invitados, usuarios y divisiones:

'/'

#### Acceso solo para invitados:

'user/login'

'division/login'

'division/register'

#### Acceso solo para usuarios:

'user'

'user/portability'

#### Acceso solo para divisiones:

'division'

'division/userslist'

'division/userslist/{user_id}'

'division/userslist/{user_id}/create'

'division/userslist/{user_id}/{number_id}'

'user/register'
