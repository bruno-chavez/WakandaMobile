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
para un tipo de "usuario", significa que no tienen acceso 
a esta, 
ejemplo: una division autenticada no tiene acceso a '/user'
#### Acceso de invitados, usuarios y divisiones:

'/'

'/user/login'

'/division/login'

'/division/register'

#### Acceso a usuarios autenticados:

'/user'

#### Acceso a divisiones autenticadas:

'/division'

'/user/register'
