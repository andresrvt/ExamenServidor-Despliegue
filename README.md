# ExamenServidor-Despliegue

Notas a tener en cuenta:

  - Para levantar el servicio de Docker, primero tendremos que dirigirnos a la carpeta donde se encuentre el archivo *docker-compose.yml* y en el terminal escribiremos    *docker-compose build* para crear primero la imagen y luego para levantar el contenedor escribiremos *docker compose up -d*. 
  
  - Para automatizar el proyecto, ha sido necesario crear un archivo Dockerfile en el que se le han pasado las instrucciones de instalación de git y ubicación del repositorio. No se podía hacer por comentarios, debido a que cada vez que iniciaba el servicio, éste se caía automáticamente.
