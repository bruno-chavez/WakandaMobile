# Tarea 3 Bases de Datos 2018-1

Bruno Sebastian Chavez Lazo

201573059-8

Este archivo tiene formato Markdown, 
para una correcta visualizacion, 
abra el archivo como tal.

Por comodidad y conveniencia el proyecto esta 
programado en ingles por preferencia propia y 
debido a la syntaxis que requiere Laravel,
ademas para que no parezca spanglish 
la pagina web tambien estara en ingles en su totalidad.

## Suposiciones:

La aplicacion solo verifica que el rut tenga 8 u 9 digitos 
y que sea un numero, no se verifica el digito verificador,
se asume que el rut es valido en cualquier otro sentido

## Condiciones especificas de mi tarea:
Estas condiciones no son suposiciones, 
ya que son verificadas por la aplicacion, 
sin embargo las menciono para mayor claridad
sobre partes especificas de la tarea.

Al momento de registrar usuarios y divisiones,
la contraseña debe tener un minimo de 6 caracteres.

Al momento de registrar una division, 
se pedira elegir un prefijo, 
el cual es un numero unico y debe tener tres digitos.

No habra una checkmark de "Remember Me" 
al momento de hacer loguin de usuario ni division.

En el caso de que se olvide una contraseña 
de una division o usuario no hay manera de recuperarla.

Al momento de crear un numero este 
tendra que ser de siete digitos.

Un usuario no podra registrar una nueva 
portabilidad si ya tiene una pendiente.

No hay manera de cambiar ningun dato sobre una division.

No hay manera de cambiar la contraseña de un usuario.

## Vistas:
Todas las rutas han sido verificadas y se detallan 
a continuacion, si una ruta no esta especificada 
para un tipo de "usuario" (invitado, usuario, division), 
significa que no tienen acceso 
a esta y sera redireccionado 
al dashboard acorde al tipo de usuario.

Ejemplo: una division no tiene acceso a '/user'
y sera redireccionado a '/division' 
si intenta acceder a esta manualmente.

#### Acceso para invitados, usuarios y divisiones:

'/'

#### Acceso solo para usuarios:

'user'

'user/portability'

#### Acceso solo para divisiones:

'division'

'division/userslist'

'division/userslist/{user_id}'

'division/userslist/{user_id}/{number_id}'
