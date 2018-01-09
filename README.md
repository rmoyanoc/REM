# REM
Sistema de remuneraciones en laravel <br/>

1.- Instalar composer <br/>
2.- Dentro de carpeta REM/App utilizar comando "composer install" <br/>
3.- Hasta este punto , arrojara errores por una función asociada a PDF del package snappy seguir siguientes pasos <br/>
(mas de 1 opción dejo la más comoda para mi):

Usuarios Linux <br/>
Move the binaries to a path that is not in a synced folder, for example:<br/>

cp vendor/h4cc/wkhtmltoimage-amd64/bin/wkhtmltoimage-amd64 /usr/local/bin/<br/>
cp vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64 /usr/local/bin/<br/>

and make it executable:

chmod +x /usr/local/bin/wkhtmltoimage-amd64 <br/>
chmod +x /usr/local/bin/wkhtmltopdf-amd64<br/>

This will prevent the error 126.

Otras opciones https://github.com/barryvdh/laravel-snappy <br/>

<a href="https://www.facebook.com/groups/1728471407462636/">Facebook Proyecto OpenSource Chile</a>
