package tarea05;

/**
 * Programa de pruebas del <b>ejercicio 03</b>  de la clase <code>ComputadorVuelo</code>
 * @author profesorado
 */
public class TestEj03 {

    /**
     * Se crea un constructor privado para evitar que la clase pueda instanciarse
     */
    private TestEj03() {

    }

    /**
     * Método main del programa de pruebas
     */
    public static void main(String[] args) {
        // Cabecera de salida de las pruebas
        System.out.println("CASO DE PRUEBAS 03: GETTERS Y MÉTODOS ESTÁTICOS");
        System.out.println("------------------------------------------------\n");

        // Se prueban los atributos públicos de la clase antes de crear las aeronaves
        System.out.println("------------------------------------------------------------");
        System.out.println(" - PRUEBA 01 - ATRIBUTOS PÚBLICOS (antes de crear objetos)  ");
        System.out.println("------------------------------------------------------------");
        System.out.println(TestUtilidades.consultaAtributosEstaticos());

        // Se crean varios objetos de tipo ComputadorVuelo almacenados en un array
        // utilizando un método de pruebas de la clase TestUtilidades (por defecto, crea 5 aeronaves de ejemplo).
        System.out.println("------------------------------------------------------------");
        System.out.println(" - PRUEBA 02 - Creación de objetos y uso de getters()       ");
        System.out.println("------------------------------------------------------------");
        ComputadorVuelo[] arrayAeronaves = TestUtilidades.crearArrayAeronavesDatosPrueba();
        System.out.println("Array de dispositivos creado con éxito\n");

        // Se leen los atributos de cada aeronave usando los getter() pertinentes
        TestUtilidades.consultarAtributosArrayAeronaves(arrayAeronaves);

        // Se prueban los atributos públicos de la clase después de crear las aeronaves
        System.out.println("------------------------------------------------------------");
        System.out.println(" - PRUEBA 03 - ATRIBUTOS PÚBLICOS (después de crear objetos)");
        System.out.println("------------------------------------------------------------");
        System.out.println(TestUtilidades.consultaAtributosEstaticos());
    }
}
