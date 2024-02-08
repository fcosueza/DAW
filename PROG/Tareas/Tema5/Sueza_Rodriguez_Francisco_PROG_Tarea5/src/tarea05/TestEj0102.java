package tarea05;

/**
 * Programa de pruebas de los <b>ejercicios 01</b> y <b>02</b> para la clase <code>DispositivoPFD</code>
 * @author profesorado
 */
public class TestEj0102 {
    /**
     * Se crea un constructor privado para evitar que la clase pueda instanciarse
     */
    private TestEj0102() {

    }

    /**
     * Método main del programa de pruebas
     */
    public static void main(String[] args) {
        // Cabecera de salida de las pruebas
        System.out.println("CASO DE PRUEBAS 01-02: CONSTRUCTORES Y ATRIBUTOS");
        System.out.println("------------------------------------------------\n");

        // Se prueban los atributos públicos de la clase
        System.out.println(TestUtilidades.consultaAtributosPublicos());

        // Se prueban los constructores y el método fábrica
        // Pruebas correctas (se crean varios objetos usando los distintos constructores y el método de fábrica)
        System.out.println("------------------------------------------------------------");
        System.out.println(" - PRUEBA 02 - CONSTRUCTORES Y FÁBRICA (con datos correctos)");
        System.out.println("------------------------------------------------------------");

        ComputadorVuelo aeronave1 = TestUtilidades.crearAeronave("EC-FEC", "Cessna 172", "Raúl López");
        ComputadorVuelo aeronave2 = TestUtilidades.crearAeronave("EC-FA3", "Eurostar Evektor EV-97", "Eva Lozano");
        ComputadorVuelo aeronave3 = TestUtilidades.crearAeronave("EC-IOF", "Tecnam P92", "Santiago Vázquez");
        ComputadorVuelo[] arrayAeronaves1 = TestUtilidades.crearArrayAeronaves(5);
        ComputadorVuelo[] arrayAeronaves2 = TestUtilidades.crearArrayAeronaves(1);  // Se prueban también los valores límite
        ComputadorVuelo[] arrayAeronaves3 = TestUtilidades.crearArrayAeronaves(10); // Se prueba también los valores límite
        System.out.println();

        // Pruebas que deben lanzar excepciones
        // Pruebas incorrectas (se crean varios objetos usando los distintos constructores y el método de fábrica)
        System.out.println("--------------------------------------------------------");
        System.out.println(" - PRUEBA 03 - CONSTRUCTORES Y FÁBRICA (con excepciones)");
        System.out.println("--------------------------------------------------------");

        // Se instancian varias aeronaves utilizando un formato incorrecto de matrícula, valores nulos en el constructor o la cadena vacía
        ComputadorVuelo aeronave4 = TestUtilidades.crearAeronave("EC-FEC1", "Dassault Falcon 900", "Pedro Sánchez");
        ComputadorVuelo aeronave5 = TestUtilidades.crearAeronave("ECCQB1", "HU-26", "Luis de la Torre");
        ComputadorVuelo aeronave6 = TestUtilidades.crearAeronave("N-I1OF", "Citation Cessna 500", "Pepe González");
        ComputadorVuelo aeronave7 = TestUtilidades.crearAeronave(null, "Citation Cessna 500", "Pepe González");
        ComputadorVuelo aeronave8 = TestUtilidades.crearAeronave("EC-IOF", null, "Pepe González");
        ComputadorVuelo aeronave9 = TestUtilidades.crearAeronave("EC-IOF", "Citation Cessna 500", null);
        ComputadorVuelo aeronave10 = TestUtilidades.crearAeronave("", "Citation Cessna 500", "Pepe González");
        
        // Se utilia el método fábrica especificando cantidades incorrectas (negativas, y valores límite)
        ComputadorVuelo[] arrayAeronaves4 = TestUtilidades.crearArrayAeronaves(-1);
        ComputadorVuelo[] arrayAeronaves5 = TestUtilidades.crearArrayAeronaves(0);  // Se prueban también los valores límite
        ComputadorVuelo[] arrayAeronaves6 = TestUtilidades.crearArrayAeronaves(12); // Se prueban también los valores límite
        System.out.println();
    }
}
