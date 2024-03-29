package pruebas;

import java.util.Random;
import mobiliario.Armario;
import mobiliario.Estanteria;
import mobiliario.Modulo;
import mobiliario.Mueble;
import mobiliario.Personalizable;

/**
 * Programa de pruebas de la jearquía de clases <code>Mueble</code>.
 */
public class Prueba05 {

    /**
    * Método principal (main).
    * @param args argumentos de consola
    */
    public static void main(String[] args) {

        //----------------------------------------------
        //           PRUEBA DE MUEBLES
        //----------------------------------------------
        System.out.println("---------------------------------------");
        System.out.println("5. PRUEBA DE LA INTERFAZ PERSONALIZABLE");
        System.out.println("---------------------------------------");

        // Generamos muebles de prueba
        System.out.println("Creando muebles...");
        Mueble[] listaMuebles = Utilidades.generarArrayMuebles();
        System.out.println();

        // A todos aquellos muebles que sean personalizables les añadimos el máximo número de módulos que admiten
        System.out.println("------------------------------------------------------------------------------------");
        System.out.println("AÑADIMOS A TODOS LOS MUEBLES PERSONALIZABLES EL MÁXIMO NÚMERO DE MÓDULOS QUE ADMITEN");
        System.out.println("------------------------------------------------------------------------------------");
        for (Mueble mueble : listaMuebles) {
            if (mueble instanceof Personalizable) {
                System.out.printf("\nAñadiendo al mueble %d (tipo %s) nuevos módulos.\n",
                        mueble.getId(), mueble.getClass().getSimpleName());

                if (mueble instanceof Estanteria) {
                    Estanteria estanteria = (Estanteria) mueble;
                    System.out.println("\nIntentamos añadir a la estantería un módulo nulo");
                    System.out.println("----------------------------------------------------------------");
                    try{
                        System.out.println("Intentando añadir un módulo nulo");
                        estanteria.anyadirModulo(null);
                    }catch (NullPointerException ex){
                        System.out.println(ex.getMessage());
                    }                    
                    System.out.println("\nIntentamos añadir a la estantería módulos que no son una BALDA");
                    System.out.println("----------------------------------------------------------------");
                    try{
                        System.out.println("Intentando añadir un CESTO");
                        estanteria.anyadirModulo(Modulo.CESTO);
                    }catch (IllegalArgumentException ex){
                        System.out.println(ex.getMessage());
                    }
                    try{
                        System.out.println("Intentando añadir una BANDEJA");
                        estanteria.anyadirModulo(Modulo.BANDEJA);
                    }catch (IllegalArgumentException ex){
                        System.out.println(ex.getMessage());
                    }      
                    
                    System.out.println("\nAñadiendo a la estantería 20 baldas:");
                    System.out.println("------------------------------------");
                    try {
                        System.out.printf("Número de baldas:%d\n",estanteria.getModulosAnyadidos());
                        for (int i = 0; i < 20; i++) {
                            System.out.println("\tIntentamos añadir una nueva balda...");
                            estanteria.anyadirModulo(Modulo.BALDA);
                            System.out.printf("\tNúmero de baldas: %d\n", estanteria.getModulosAnyadidos());
                        }
                    } catch (IllegalStateException ex) {
                        System.out.println(ex.getMessage());
                    }

                } else if (mueble instanceof Armario) {
                    Armario armario = (Armario) mueble;
                    System.out.println("\nIntentamos añadir a la estantería un módulo nulo");
                    System.out.println("----------------------------------------------------------------");
                    try{
                        System.out.println("Intentando añadir un módulo nulo");
                        armario.anyadirModulo(null);
                    }catch ( NullPointerException ex){
                        System.out.println(ex.getMessage());
                    }                                       
                    System.out.println("\nAñadiendo al armario 20 módulos:");
                    System.out.println("--------------------------------");
                    Modulo[] mod = Modulo.values();
                    Random random = new Random();
                    try {
                        System.out.printf("Número de módulos:%d %s\n", 
                                armario.getModulosAnyadidos(),armario.obtenerModulos());
                        for (int i = 0; i < 20; i++) {
                            System.out.println("\tIntentamos añadir un nuevo módulo...");
                            armario.anyadirModulo(mod[random.nextInt(mod.length)]);
                            System.out.printf("\tMódulos actuales: %s\n", armario.obtenerModulos());
                        }
                    } catch (IllegalStateException ex) {
                        System.out.println(ex.getMessage());
                    }
                }
            }
        }

        // A todos aquellos muebles que sean personalizables les vamos a extraer los módulos que tienen
        System.out.println("\n\n-----------------------------------------------------------------------");
        System.out.println("EXTRAEMOS DE TODOS LOS MUEBLES PERSONALIZABLES LOS MÓDULOS QUE TIENEN");
        System.out.println("-----------------------------------------------------------------------");
        for (Mueble mueble : listaMuebles) {
            if (mueble instanceof Personalizable) {
                System.out.printf("\nExtrayendo del mueble %d (tipo %s) los módulos.\n",
                        mueble.getId(), mueble.getClass().getSimpleName());
                System.out.println("------------------------------------------------------");
                
                if (mueble instanceof Estanteria) {
                    Estanteria estanteria = (Estanteria) mueble;
                    try {
                        System.out.printf("Número de baldas:%d\n",estanteria.getModulosAnyadidos());
                        for (int i = 0; i < 20; i++) {
                            System.out.println("\tIntentamos extraer una nueva balda...");
                            estanteria.extraerModulo();
                            System.out.printf("\tNúmero de baldas: %d\n", estanteria.getModulosAnyadidos());
                        }
                    } catch (IllegalStateException ex) {
                        System.out.println(ex.getMessage());
                    }

                } else if (mueble instanceof Armario) {
                    Armario armario = (Armario) mueble;
                    try {
                        System.out.printf("Número de módulos:%d %s\n", 
                                armario.getModulosAnyadidos(),armario.obtenerModulos());
                        for (int i = 0; i < 20; i++) {
                            System.out.println("\tIntentamos extraer un nuevo módulo...");
                            System.out.printf("\tMódulo extraído:%s", armario.extraerModulo());
                            System.out.printf("\t\tMódulos actuales:%s\n", armario.obtenerModulos());
                        }
                    } catch (IllegalStateException ex) {
                        System.out.println(ex.getMessage());
                    }
                }
            }
        }
    }

}
