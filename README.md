# Tarea 3 Bases de Datos 2018-1

Bruno Sebastian Chavez Lazo

201573059-8

Este archivo tiene formato Markdown, 
para una correcta visualización, 
abra el archivo como tal.

Por comodidad y conveniencia el proyecto está 
programado en inglés y 
debido a la sintaxis que requiere Laravel.

## Suposiciones:

La aplicación solo verifica que el rut tenga 8 u 9 dígitos 
y que sea un número, no se verifica el dígito verificador,
se asume que el rut es válido en cualquier otro sentido.

## Condiciones específicas de mi tarea:
Estas condiciones no son suposiciones, 
ya que son verificadas por la aplicación, 
sin embargo las menciono para mayor claridad
sobre partes específicas de la tarea.

Al momento de registrar usuarios y divisiones,
la contraseña debe tener un mínimo de 6 caracteres.

Al momento de registrar una división, 
se pedirá elegir un prefijo, 
el cual es un número único y debe tener tres digitos.

No habra una checkmark de "Remember Me" 
al momento de hacer login de usuario ni división.

En el caso de que se olvide una contraseña 
de una división o usuario no hay manera de recuperarla.

Al momento de crear un número este 
tendra que ser de siete dígitos.

Un usuario no podrá registrar una nueva 
portabilidad si ya tiene una pendiente.

No hay manera de cambiar ningun dato sobre una division.

No hay manera de cambiar la contraseña de un usuario o división.

## Vistas:
Todas las rutas han sido verificadas y se detallan 
a continuacion, si una ruta no está especificada 
para un tipo de "usuario" (invitado, usuario, división), 
significa que no tienen acceso 
a esta y será redireccionado 
al dashboard acorde al tipo de usuario.

Ejemplo: una división no tiene acceso a '/user'
y será redireccionado a '/division' 
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
