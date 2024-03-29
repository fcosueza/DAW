package pruebas;

import mobiliario.Ajustable;
import mobiliario.Sillon;
import mobiliario.Mueble;
import mobiliario.Silla;

/**
 * Programa de pruebas de la jearquía de clases <code>Mueble</code>.
 */
public class Prueba04 {

    /**
    * Método principal (main).
    * @param args argumentos de consola
    */
    public static void main(String[] args) {

        //----------------------------------------------
        //           PRUEBA DE MUEBLES
        //----------------------------------------------
        System.out.println("------------------------------------");
        System.out.println("4. PRUEBA DE LA INTERFAZ AJUSTABLE  ");
        System.out.println("------------------------------------");

        // Generamos muebles de prueba
        System.out.println("Creando muebles...");
        Mueble[] listaMuebles = Utilidades.generarArrayMuebles();
        System.out.println();

        // Subimos todos aquellos muebles que sean ajustables hasta su posición máxima
        System.out.println("-------------------------------------------------------------");
        System.out.println("SUBIMOS TODOS LOS MUEBLES AJUSTABLES HASTA SU POSICIÓN MÁXIMA");
        System.out.println("-------------------------------------------------------------");
        for (Mueble mueble : listaMuebles) {
            if (mueble instanceof Ajustable) {
                System.out.printf("\nAjustando el mueble %d (tipo %s) hasta su posición máxima.\n",
                        mueble.getId(), mueble.getClass().getSimpleName());

                if (mueble instanceof Silla) {
                    Silla silla = (Silla) mueble;
                    System.out.println("Subiendo la silla 5 posiciones:");
                    System.out.println("-------------------------------");
                    try {
                        System.out.printf("Posición actual:%d\n", silla.obtenerPosicion());
                        for (int i = 0; i < 4; i++) {
                            System.out.println("\tIntentamos subir el respaldo de la silla una posición...");
                            System.out.printf("\tPosición actual:%d\n", silla.subirPosicion());
                        }
                    } catch (IllegalStateException ex) {
                        System.out.println(ex.getMessage());
                    }

                } else if (mueble instanceof Sillon) {
                    Sillon sillon = (Sillon) mueble;
                    System.out.println("Subiendo el sillón 2 posiciones:");
                    System.out.println("--------------------------------");
                    try {
                        System.out.printf("Posición actual:%d\n", sillon.obtenerPosicion());
                        for (int i = 0; i < 2; i++) {
                            System.out.println("\tIntentamos subir los pies del sillón...");
                            System.out.printf("\tPosición actual:%d\n", sillon.subirPosicion());
                        }
                    } catch (IllegalStateException ex) {
                        System.out.println(ex.getMessage());
                    }
                }
            }
        }

        // Bajamos todos aquellos muebles que sean ajustables hasta su posición mínima
        System.out.println("\n\n-------------------------------------------------------------");
        System.out.println("BAJAMOS TODOS LOS MUEBLES AJUSTABLES HASTA SU POSICIÓN MÍNIMA");
        System.out.println("-----------------------------------------------------------------");
        for (Mueble mueble : listaMuebles) {
            if (mueble instanceof Ajustable) {
                System.out.printf("\nAjustando el mueble %d (tipo %s) hasta su posición mínima.\n",
                        mueble.getId(), mueble.getClass().getSimpleName());

                if (mueble instanceof Silla) {
                    Silla silla = (Silla) mueble;
                    System.out.println("Bajando la silla 5 posiciones:");
                    System.out.println("-------------------------------");
                    try {
                        System.out.printf("Posición actual:%d\n", silla.obtenerPosicion());
                        for (int i = 0; i < 4; i++) {
                            System.out.println("\tIntentamos bajar el respaldo de la silla una posición...");
                            System.out.printf("\tPosición actual:%d\n", silla.bajarPosicion());
                        }
                    } catch (IllegalStateException ex) {
                        System.out.println(ex.getMessage());
                    }

                } else if (mueble instanceof Sillon) {
                    Sillon sillon = (Sillon) mueble;
                    System.out.println("Bajando el sillón 2 posiciones:");
                    System.out.println("--------------------------------");
                    try {
                        System.out.printf("Posición actual:%d\n", sillon.obtenerPosicion());
                        for (int i = 0; i < 2; i++) {
                            System.out.println("\tIntentamos bajar los pies del sillón...");
                            System.out.printf("\tPosición actual:%d\n", sillon.bajarPosicion());
                        }
                    } catch (IllegalStateException ex) {
                        System.out.println(ex.getMessage());
                    }
                }
            }
        }
    }
}
