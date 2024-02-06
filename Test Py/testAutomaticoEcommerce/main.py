from pruebas.inicioSesion import InicioSesion

sesion = InicioSesion()

sesion.prueba_inicio_sesion("eliasalegre96@gmail.com","12345")
sesion.prueba_inicio_sesion("eliasalegre96@gmail.com","pepe")
sesion.prueba_inicio_sesion("hugo@hugo.com.ar","12345")
sesion.prueba_cierre()


