
package vehiculo;

/**
 *  Clase main de la aplicación.
 * 
 * @author IES Aguadulce
 * @author Francisco Sueza Rodríguez
 */
public class Main {
    
    /**
     * Método principal de la clase main.
     * 
     * @param args Lista de argumentos del metódo main
     */
    
      public static void main(String[] args) {
        VehiculoSuezaRguezFco2223 miVehiculoSuezaRguezFco2223;
        int stockActual;
        
        miVehiculoSuezaRguezFco2223 = new VehiculoSuezaRguezFco2223("Seat",18000,100);
        operativaVehiculoSuezaRguezFco2223(miVehiculoSuezaRguezFco2223, 50); 
    }
      
    /**
     * 
     * @param miVehiculoSuezaRguezFco2223 objeto de tipo VehiculoSuezaRguez2223 sobre el que se opera
     * @param cantidad cantidad de vehículos 
     * @throws Exception si no se puede vender la cantidad determinada de vehículos
     * @throws Exception si no se puede comprar la cantidad determinada de vehículos
     */

    public static void operativaVehiculoSuezaRguezFco2223(VehiculoSuezaRguezFco2223 miVehiculoSuezaRguezFco2223, int cantidad) {
        int stockActual;
        try
        {
            System.out.println("Venta de Vehiculos");
            miVehiculoSuezaRguezFco2223.vender(20);
        } catch (Exception e)
        {
            System.out.print("Fallo al vender");
        }
        try
        {
            System.out.println("Compra de Vehiculos");
            miVehiculoSuezaRguezFco2223.comprar(100);
        } catch (Exception e)
        {
            System.out.print("Fallo al comprar");
        }
        
        stockActual = miVehiculoSuezaRguezFco2223.obtenerStock();
        System.out.println("El stock actual es"+ stockActual );
    }

}
    
