package pruebas;

import mobiliario.Estanteria;
import mobiliario.Almacenaje;
import mobiliario.Asiento;
import mobiliario.Sillon;
import mobiliario.Silla;
import mobiliario.Mueble;
import mobiliario.Armario;
import mobiliario.Mesa;
import mobiliario.Sofa;

/**
 * Herramientas para los programas de prueba
 *
 * @author profe
 */
public final class Utilidades {

    // Constructor privado para que no puedan instanciarse objetos de esta clase
    private Utilidades() {

    }

    /**
     * Prueba los métodos constructores de todas las clases del paquete mobiliario
     * 
     */
    public static void PruebaConstructoresError() {
        // Intentos de creación de objetos con errores
        System.out.println("Intentando ejecutar constructores con valores inválidos");
        System.out.println("-------------------------------------------------------");
        Mueble m;
           
        // Precio mínimo 
        try {
            System.out.printf("Silla. ");
            m = new Silla (Mueble.MIN_PRECIO - 1.0, "Silla de comedor", "polipiel", "azul");
            System.out.printf("INCORRECTO. Esto no debería haber funcionado: %s\n", m);
        } catch (IllegalArgumentException ex) {
            System.out.printf("Prueba de error CORRECTA. %s.\n", ex.getMessage());
        }

        // Precio máximo 
        try {
            System.out.printf("Silla. ");
             m = new Silla (Mueble.MAX_PRECIO + 1.0, "Silla de oficina", "polipiel", "blanca");
            System.out.printf("INCORRECTO. Esto no debería haber funcionado: %s\n", m);
        } catch (IllegalArgumentException ex) {
            System.out.printf("Prueba de error CORRECTA. %s.\n", ex.getMessage());
        }
        
        // Número de plazas mínimo (Sofá)
        try {
            System.out.printf("Sofá. ");
            m = new Sofa(1200.0, "Reversible y con espacio de almacenaje",
                    Asiento.MIN_PLAZAS - 1, "polipiel", "gris", "3+2");
            System.out.printf("INCORRECTO. Esto no debería haber funcionado: %s\n", m);
        } catch (IllegalArgumentException ex) {
            System.out.printf("Prueba de error CORRECTA. %s.\n", ex.getMessage());
        }

        // Número de plazas máximo (Sofá)
        try {
            System.out.printf("Sofá. ");
            m = new Sofa(400.0, "Se puede elegir la combinación de colores",
                    Asiento.MAX_PLAZAS + 1, "piel", "negro", "chaise longue");
            System.out.printf("INCORRECTO. Esto no debería haber funcionado: %s\n", m);
        } catch (IllegalArgumentException ex) {
            System.out.printf("Prueba de error CORRECTA. %s.\n", ex.getMessage());
        }

        // Número de módulos mínimo 
        try {
            System.out.printf("Estantería. ");
            m = new Estanteria(650.0, "Biblioteca en acacia maciza y metal", 88.0,
                    175.0, Almacenaje.MIN_MODULOS - 1, "de suelo");
            System.out.printf("INCORRECTO. Esto no debería haber funcionado: %s\n", m);
        } catch (IllegalArgumentException ex) {
            System.out.printf("Prueba de error CORRECTA. %s.\n", ex.getMessage());
        }

        // Número de módulos máximo 
        try {
            System.out.printf("Estantería. ");
            m = new Estanteria(63.0, "Estantería esquinera en forma de S", 20.0,
                    110.0, Almacenaje.MAX_MODULOS + 1, "de pared");
            System.out.printf("INCORRECTO. Esto no debería haber funcionado: %s\n", m);
        } catch (IllegalArgumentException ex) {
            System.out.printf("Prueba de error CORRECTA. %s.\n", ex.getMessage());
        }

        // Número de puertas mínimo (Armario)
        try {
            System.out.printf("Armario. ");
            m = new Armario(675.0, "Armario atlanta con puertas correderas", 215.0,
                    200.0, Almacenaje.MIN_MODULOS, Armario.MIN_PUERTAS - 1);
            System.out.printf("INCORRECTO. Esto no debería haber funcionado: %s\n", m);
        } catch (IllegalArgumentException ex) {
            System.out.printf("Prueba de error CORRECTA. %s.\n", ex.getMessage());
        }

        // Número de puertas máximo (Armario)
        try {
            System.out.printf("Armario. ");
            m = new Armario(378.0, "Armario esquinero con puerta abatible", 160.0,
                    240.0, Almacenaje.MIN_MODULOS, Armario.MAX_PUERTAS + 1);
            System.out.printf("INCORRECTO. Esto no debería haber funcionado: %s\n", m);
        } catch (IllegalArgumentException ex) {
            System.out.printf("Prueba de error CORRECTA. %s.\n", ex.getMessage());
        }
        
        // Número de comensales mínimo (Mesa)
        try {
            System.out.printf("Mesa. ");
            m = new Mesa(100.0, "Mesa de comedor extensible", "rectangular", Mesa.MIN_COMENSALES-1);
            System.out.printf("INCORRECTO. Esto no debería haber funcionado: %s\n", m);
        } catch (IllegalArgumentException ex) {
            System.out.printf("Prueba de error CORRECTA. %s.\n", ex.getMessage());
        }
        
        // Número de comensales máximo (Mesa)
        try {
            System.out.printf("Mesa. ");
            m = new Mesa(300.0, "Mesa nido", "hoja", Mesa.MAX_COMENSALES+1);
            System.out.printf("INCORRECTO. Esto no debería haber funcionado: %s\n", m);
        } catch (IllegalArgumentException ex) {
            System.out.printf("Prueba de error CORRECTA. %s.\n", ex.getMessage());
        }      
    }

    /**
     * Crea un array de muebles de prueba
     *
     * @return array de muebles de prueba
     */
    public static Mueble[] generarArrayMuebles() {
        // Reservamos espacio para el array de muebles de prueba
        Mueble[] listaMuebles = new Mueble[8];

        // Intentos de creación de objetos sin errores
        System.out.println("Intentando ejecutar constructores con valores válidos");
        System.out.println("-----------------------------------------------------");

        // Instanciamos productos
        try {
            listaMuebles[0] = new Silla(75.0, "Silla de comedor y cocina", "poliéster", "beige");
            listaMuebles[1] = new Sillon(239.0, "Sillón tapizado orejero", "poliéster", "amarillo");
            listaMuebles[2] = new Silla(30.0, "Silla de escritorio infantil", "polipropileno", "rosa");
            listaMuebles[3] = new Sillon(349.0, "Sillón tapizado con respaldo alto", "poliuretano", "azul");
            listaMuebles[4] = new Sofa(705.0, "Sofá nórdico tejido natural", 5, "piel", "beige", "chaise longue");
            listaMuebles[5] = new Estanteria(109.0, "Estantería para cocina", 182.0, 160, 3, "de suelo");
            listaMuebles[6] = new Armario(159.0, "Armario con puertas correderas", 117.0, 176.0, 4, 2);
            listaMuebles[7] = new Mesa(100.0, "Mesa de comedor extensible", "rectangular", 4);
            System.out.println("CORRECTO. Todos los muebles creados correctamente.");
        } catch (IllegalArgumentException ex) {
            System.out.printf("INCORRECTO. Error. %s\n", ex.getMessage());
        }
        return listaMuebles;
    }

    /**
     * Prueba los getters de la clase Mueble
     * @param m objeto de tipo Mueble
     */
    public static void probarGettersMueble(Mueble m) {
        System.out.printf("Tipo: %s\n", m.getClass().getSimpleName());
        System.out.printf("Id: %d\n", m.getId());
        System.out.printf("Precio: %.2f euros\n", m.getPrecio());
        System.out.printf("Descripción: %s\n", m.getDescripcion());
    }

    /**
     * Prueba los getters de la clase Asiento
     * @param a objeto de tipo Asiento
     */
    public static void probarGettersAsiento(Asiento a) {
        System.out.printf("Número de plazas: %d\n", a.getNumPlazas());
        System.out.printf("Tapicería: %s\n", a.getTapiceria());
        System.out.printf("Color: %s\n", a.getColor());
    }

    /**
     * Prueba los getters de la clase Almacenaje
     * @param al objeto de tipo Almacenaje
     */
    public static void probarGettersAlmacenaje(Almacenaje al) {
        System.out.printf("Anchura: %.2f\n", al.getAnchura());
        System.out.printf("Altura: %.2f\n", al.getAltura());
        System.out.printf("Número máximo de módulos que se le pueden añadir: %d\n", al.getNumModulos());
        System.out.printf("Módulos añadidos: %s\n", al.obtenerModulos());
    }

    /**
     * Prueba los getters de la clase Silla
     * @param sa objeto de tipo Silla
     */
    public static void probarGettersSilla(Silla sa) {
        System.out.printf("Posición del respaldo: %d\n", sa.obtenerPosicion());
    }

    /**
     * Prueba los getters de la clase Sillon
     * @param sn objeto de tipo Sillon
     */
    public static void probarGettersSillon(Sillon sn) {
        System.out.printf("Posición de los pies: %d\n", sn.obtenerPosicion());
    }

    /**
     * Prueba los getters de la clase Sofa
     * @param sf objeto de tipo Sofa
     */
    public static void probarGettersSofa(Sofa sf) {
        System.out.printf("Composición: %s\n", sf.getComposicion());
    }

    /**
     * Prueba los getters de la clase Estanteria
     * @param e objeto de tipo Estanteria
     */
    public static void probarGettersEstanteria(Estanteria e) {
        System.out.printf("Tipo: %s\n", e.getTipo());
    }

    /**
     * Prueba los getters de la clase Armario
     * @param a objeto de tipo Armario
     */
    public static void probarGettersArmario(Armario a) {
        System.out.printf("Número de puertas: %d\n", a.getNumPuertas());
    }
    
    /**
     * Prueba los getters de la clase Mesa
     * @param m objeto de tipo Mesa
     */
    public static void probarGettersMesa(Mesa m) {
        System.out.printf("Forma: %s\n", m.getForma());
        System.out.printf("Número de comensales: %s\n", m.getComensales());
    }

    /**
     * Muestra por pantalla el contenido de un array de muebles usando el método
     * toString. Genera una línea por mueble
     *
     * @param listaMuebles array con los muebles
     */
    public static void mostrarContenidoArrayMuebles(Mueble[] listaMuebles) {
        for (int i = 0; i < listaMuebles.length; i++) {
            Mueble mueble = listaMuebles[i];
            System.out.printf("Mueble %d: %s\n", i, mueble);
        }
        System.out.println();
    }
}
