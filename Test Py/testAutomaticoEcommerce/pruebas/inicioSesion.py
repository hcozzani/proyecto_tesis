import time
from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.common.by import By


class InicioSesion():

    def __init__(self):
        self.driver = webdriver.Firefox()

         # URL de inicio de sesión
        self.login_url = "http://localhost/ecommerce/Vistas/V_login.php"  # Ajusta la URL según tu configuración

     # Función para realizar una prueba de inicio de sesión
    def prueba_inicio_sesion(self, username, password):
        self.driver.get(self.login_url)
        
         # Llenar el formulario de inicio de sesión
        self.driver.find_element(By.NAME, "email").send_keys(username)
        self.driver.find_element(By.NAME, "password").send_keys(password)
        self.driver.find_element(By.XPATH, "//input[@value='Ingresar']").click()


         # Esperar un tiempo para que se procese la solicitud (puedes ajustar este tiempo)
        time.sleep(4)

         # Comprobar si se ha iniciado sesión correctamente
        try:
            if "Página de inicio" in self.driver.page_source:
                print("Prueba Fallida: Inicio de sesión fallido para el usuario", username)
                
            else:
                print("Prueba Exitosa: Inicio de sesión exitoso para el usuario", username)
        except Exception as e:
            print("Excepción inesperada:", str(e))

    def prueba_cierre(self):
         # Cierra el navegador después de que se completen las pruebas
        self.driver.quit()
        time.sleep(5)  # Pausa para que puedas ver el resultado
