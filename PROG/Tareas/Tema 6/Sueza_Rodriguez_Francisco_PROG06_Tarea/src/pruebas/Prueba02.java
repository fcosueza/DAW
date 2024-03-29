package pruebas;

import mobiliario.Estanteria;
import mobiliario.Almacenaje;
import mobiliario.Armario;
import mobiliario.Asiento;
import mobiliario.Mesa;
import mobiliario.Sillon;
import mobiliario.Silla;
import mobiliario.Mueble;
import mobiliario.Sofa;

/**
 * Programa de pruebas de la jearquía de clases <code>Mueble</code>.
 */
public class Prueba02 {

    /**
     * Método principal (main).
     *
     * @param args argumentos de consola
     */
    public static void main(String[] args) {

        //----------------------------------------------
        //           PRUEBA DE MUEBLES
        //----------------------------------------------
        System.out.println("--------------------");
        System.out.println("2. PRUEBA DE GETTERS");
        System.out.println("--------------------");
        System.out.println();

        // Generamos muebles de prueba
        System.out.println("Creando muebles...");
        Mueble[] listaMuebles = Utilidades.generarArrayMuebles();
        System.out.println();

        // Mostramos los muebles creados usando los métodos apropiados
        System.out.println("Probando getters de los muebles creados");
        System.out.println("----------------------------------------");
        for (Mueble m : listaMuebles) {
            Utilidades.probarGettersMueble(m);
            if (m instanceof Asiento) {
                Utilidades.probarGettersAsiento((Asiento) m);
                if (m instanceof Sillon) {
                    Utilidades.probarGettersSillon((Sillon) m);
                } else if (m instanceof Silla) {
                    Utilidades.probarGettersSilla((Silla) m);
                } else if (m instanceof Sofa) {
                    Utilidades.probarGettersSofa((Sofa) m);
                }
            } else if (m instanceof Almacenaje) {
                Utilidades.probarGettersAlmacenaje((Almacenaje) m);
                if (m instanceof Estanteria) {
                    Utilidades.probarGettersEstanteria((Estanteria) m);
                } else if (m instanceof Armario) {
                    Utilidades.probarGettersArmario((Armario) m);
                }
            } else if (m instanceof Mesa) {
                Utilidades.probarGettersMesa((Mesa) m);
            }

            System.out.println("-----------------------------------------");
            System.out.println();
        }
    }
}
