package tarea07;

/**
 * Clase Utilidades
 * @author Profesor
 */
public class Utilidades {

    private static final String[] arrayEspeciesPlantas = {"ARBUSTO", "GRAMINEA", "PERENNE", "SUCULENTA", "BULBO", "HORTALIZA", "HIERBA_AROMATICA", "FLOR", "ARBOL"};

    /** Devuelve una especie de planta aleatoria.
     * 
     * @return una especie de planta aleatoria
     */
    public static String especiePlantaAleatoria() {
        
        int aleatorio = (int) (Math.random() * arrayEspeciesPlantas.length);
        return arrayEspeciesPlantas[aleatorio];
    }
}
