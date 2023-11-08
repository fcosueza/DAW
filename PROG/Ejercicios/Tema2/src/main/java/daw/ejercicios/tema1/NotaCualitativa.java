package daw.ejercicios.tema1;

import java.util.Scanner;

/**
 * Clase que calcula la nota final de un examen dadas el número de preguntas
 * acertadas o falladas.
 *
 * @author Francisco Sueza Rodríguez
 */

public class NotaCualitativa {
    public static void main(String[] args){
    //----------------------------------------------
    //    Declaración de variables y constantes
    //----------------------------------------------

        // Constantes 
        
        final float VALOR_ACIERTO = 0.5f;
        final float VALOR_FALLO = VALOR_ACIERTO / 2;
        final int NUMERO_PREGUNTAS = 20;
        
        // Variables de entrada 
        
        int acertadas, falladas;
 
        // Variables de salida 
        
        String mensajeSalida = "La calificación obtenida es: ";
        
        // Variables auxiliares
        
        float notaAcumulada;
        int preguntasRespuestas;
        
        // Clase Scanner para petición de datos al usuario a través del teclado
        
        Scanner teclado = new Scanner (System.in);
        
    //----------------------------------------------
    //               Entrada de datos 
    //----------------------------------------------
    
        System.out.println("Introduzca el número de preguntas acertadas y falladas. La suma de ellas no debe ser superior a " + NUMERO_PREGUNTAS);   
        System.out.println("Numero de preguntas acertadas: ");
        acertadas = teclado.nextInt(); 
    
        System.out.println("Numero de preguntas falladas: ");
        falladas = teclado.nextInt();
        
    //----------------------------------------------
    //                 Procesamiento 
    //----------------------------------------------
    
        preguntasRespuestas = falladas + acertadas;
    
        if (preguntasRespuestas > NUMERO_PREGUNTAS || preguntasRespuestas < 0) {
            mensajeSalida = "Datos Erroneos.";
        } else {

            // Las preguntas sin contestar se consideran falladas
            
            falladas += (NUMERO_PREGUNTAS - preguntasRespuestas);

            // Calculamos la nota númerica acumulada
            
            notaAcumulada = (acertadas * VALOR_ACIERTO) - (falladas * VALOR_FALLO);
            
            // No existen notas negativas, por lo que si el resultado es negativo se pone a 0
            
            notaAcumulada = notaAcumulada < 0 ? 0 : notaAcumulada;

            // Añadimos la nota acumulada al mensaje final y un espacio
            
            mensajeSalida += notaAcumulada + " ";
            
            // Calculamos la nota cualitativa
            
            if (notaAcumulada < 5.0) {
                mensajeSalida += "(INSUFICIENTE)";
            } else if (notaAcumulada < 6) {
                mensajeSalida += "(SUFICIENTE)";
            } else if (notaAcumulada < 7) {
                mensajeSalida += "(BIEN)";
            } else if (notaAcumulada < 9) {
                mensajeSalida += "(NOTABLE)";
            } else if (notaAcumulada <= 10) {
                mensajeSalida += "(SOBRESALIENTE)";
            }
        }
        
        
    //----------------------------------------------
    //              Salida de resultados 
    //----------------------------------------------    
    
        System.out.println(mensajeSalida);
    }
    
}
