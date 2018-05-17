# Tarea 3 Bases de Datos 2018-1

Bruno Sebastian Chavez Lazo

201573059-8

## Condiciones especificas de mi tarea:

Al momento de registrar usuarios y divisiones,
la contraseña debe tener un minimo de 6 caracteres.

Al momento de registrar una division, 
se pedira elegir un prefijo, 
el cual tiene que ser un numero unico, 
esta condicion es verificada por la pagina y 
no dejara continuar con el registro si esta 
condicion no se cumple.

No habra una checkmark de "Remember Me" 
al momento de hacer loguin de usuario ni division.

En el caso de que se olvide una contraseña 
de una division o usuario no hay manera de recuperarla.

## Rutas:
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

'/user/login'

'/division/login'

'/division/register'

#### Acceso para usuarios autenticados:

'/user'

#### Acceso para divisiones autenticadas:

'/division'

'/division/userslist'

'/division/userslist/{user_id}'

'/user/register'
