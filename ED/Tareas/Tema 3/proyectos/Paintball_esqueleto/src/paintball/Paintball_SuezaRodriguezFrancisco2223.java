package paintball;
/**
 *
 * @author profesora
 */

public class Paintball_SuezaRodriguezFrancisco2223 {
     int municionMaxima;
     int municionCargada;
 
    
    /* Constructor sin argumentos */
    public Paintball_SuezaRodriguezFrancisco2223 (  ) {}
    
// Constructor con parámetro para iniciar todas las propiedades de la clase Paintball
    public Paintball_SuezaRodriguezFrancisco2223(int munMax, int munCarg){
        this.municionMaxima=munMax;
        this.municionCargada=munCarg;
      }
   
    // Método que devuelve la cantidad de munición que queda cargada en cada momento
     public int consultar_municion_cargada () {
        return municionCargada;
    }
     
     // Método que devuelve la capacidad disponible para recargar en cada momento
     public int consultar_capacidad_disponible () {
        return municionMaxima-municionCargada;
    }
     
    /* Método para cargar cargar la pistola con la cantidad de munición indicada. Modifica la capacidad ocupada.*/
    public void cargar(int cantidad) throws Exception {
        if (cantidad<=0)
            throw new Exception("No se puede cargar con una cantidad negativa");
        if (cantidad> consultar_capacidad_disponible())
            throw new Exception("No se puede cargar más munición que la capacidad disponible");
        municionCargada= municionCargada + cantidad;
    }
    
    /* Método para descargar la pistola con la cantidad indicada. Modifica la capacidad ocupada.*/
    public void descargar (int cantidad) throws Exception {
       if (cantidad <= 0)
            throw new Exception ("No se puede descargar 0 o una cantidad negativa de municiones");
        if (cantidad>=municionCargada)
            throw new Exception ("No se pueden descargar más municiones de las que hay cargadas");
        municionCargada = municionCargada - cantidad;
    }
 }