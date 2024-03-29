
package tarea05;

/**
 * Programa de pruebas de los <b>ejercicios 04, 05 y 06</b>  de la clase <code>ComputadorVuelo</code>
 * @author profesorado
 */
public class TestEj0405 {
     /**
     * Se crea un constructor privado para evitar que la clase pueda instanciarse
     */
    private TestEj0405 ()
    {
        
    }    
    
    /**
     * Método main del programa de pruebas
     */
    public static void main (String[] args)
    {
        // Cabecera de salida de las pruebas
        System.out.println("CASO DE PRUEBAS 04-05: DESPEGUE Y ATERRIZAJE");
        System.out.println("------------------------------------------------------------\n");
        
        // Se crea una aeronave aeronave de prueba
        ComputadorVuelo aeronave = TestUtilidades.crearAeronave("EC-FA3", "Eurostar Evektor EV-97", "Pepito Pérez");
        
        // Se realizan pruebas correctas (probando la operativa de despegue, la navegación y el aterrizaje)
        System.out.println("\n------------------------------------------------------------");
        System.out.println(" - PRUEBA 01 - Uso correcto de los métodos de acción        ");
        System.out.println("------------------------------------------------------------");
        
        // La aeronave 0 despega para realizar un vuelo de tipo privado
        aeronave.despegar(ComputadorVuelo.VUELO_PRIVADO, 150, 2500);
        System.out.println(" -> La aeronave " + aeronave.getMatricula() + " ha despegado con éxito\n");
        
        // Se registra el proceso de aterrizaje indicando los aeropuertos y el tiempo de vuelo
        aeronave.aterrizar("LEBA", "LEDE", 30);
        
        // Se realizan dos vuelos adicionales
        aeronave.despegar(ComputadorVuelo.VUELO_ESCUELA, 200, 3000);
        aeronave.aterrizar("LEDE", "LEDE", 45);
        
        // Se consultan los atributos de clase durante los vuelos
        System.out.println("--------------------------------------------------------------");
        System.out.println(" - PRUEBA 02 - ATRIBUTOS PÚBLICOS (durante los vuelos)");
        System.out.println("--------------------------------------------------------------");
        System.out.println(TestUtilidades.consultaAtributosEstaticos());
        
        aeronave.despegar(ComputadorVuelo.VUELO_ESCUELA, 170, 2000);
        aeronave.aterrizar("LEDE", "LEBA",115);
        
        System.out.println("--------------------------------------------------------------");
        System.out.println(" - PRUEBA 02 - ATRIBUTOS DE LAS AERONAVES (durante los vuelos)" );
        System.out.println("--------------------------------------------------------------");
        
        // Se consultan los datos registrados en la aeronave para comprobar si son correctos
        System.out.println(TestUtilidades.consultarAtributosComputadorVuelo(aeronave));
        
        // Se consultan los atributos de clase
        System.out.println("--------------------------------------------------------------");
        System.out.println(" - PRUEBA 03 - ATRIBUTOS PÚBLICOS (después de realizar vuelos)");
        System.out.println("--------------------------------------------------------------");
        System.out.println(TestUtilidades.consultaAtributosEstaticos());
        
        // Se realizan pruebas que generan excepciones (operaciones no permitidas o llenado de registros)
        System.out.println("-------------------------------------------------------------------");
        System.out.println(" - PRUEBA 04 - PRUEBAS CON EXCEPCIONES (operaciones no permitidas) ");
        System.out.println("-------------------------------------------------------------------");
        
        // Prueba 04.1 Si no despega la aeronave, no puede aterrizar
        TestUtilidades.pruebaMetodoAterrizar(aeronave);              // - Excepcion IllegalStateException
        
        // Ahora, se hace que despegue la aeronave para hacer el resto de pruebas.
        aeronave.despegar(ComputadorVuelo.VUELO_PRIVADO, 150, 1600);
        
        // Prueba 04.2 Si ya está volando, no puede volver a despegar
        TestUtilidades.pruebaMetodoDespegue(aeronave, ComputadorVuelo.VUELO_PRIVADO, 140, 1500); // - Excepcion IllegalStateException
        
        // Prueba 04.3 La altitud de vuelo es incorrecta
        TestUtilidades.pruebaMetodoDespegue(aeronave, ComputadorVuelo.VUELO_PRIVADO, 180, 5000); // - Excepcion IllegalArgumentException
        
        // Se finalizan las pruebas con errores haciendo que la aeronave aterrice correctamente
        aeronave.aterrizar("LEDE", "LEDE", 40);
        
        System.out.println("\n-----------------------------------------------------------------------");
        System.out.println(" - PRUEBA 05 - ATRIBUTOS DE LAS AERONAVES (después de todas las pruebas" );
        System.out.println("-----------------------------------------------------------------------");
        
        // Se consultan los datos registrados en la aeronave para comprobar si son correctos
        System.out.println(TestUtilidades.consultarAtributosComputadorVuelo(aeronave));
        
        // Se consultan los atributos de clase
        System.out.println("---------------------------------------------------------------");
        System.out.println(" - PRUEBA 06 - ATRIBUTOS PÚBLICOS (después de todas las pruebas");
        System.out.println("---------------------------------------------------------------");
        System.out.println(TestUtilidades.consultaAtributosEstaticos());
    }
}
