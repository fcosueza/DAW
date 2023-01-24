package paintball;

/**
 *
 * @author profesora
 */
public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        Paintball_SuezaRodriguezFrancisco2223 miPaintball;
        int capacidadCargaDisponible;
        int x;
        
        miPaintball = new Paintball_SuezaRodriguezFrancisco2223(40,20);
        System.out.println("Munición incial: "+miPaintball.consultar_municion_cargada());
        System.out.println("Capacidad de carga máxima: "+miPaintball.municionMaxima);
        try 
        {
            x=10;
            System.out.println("Descarga de "+x+" municiones");
            miPaintball.descargar(x);
        } catch (Exception e)
        {
            System.out.print("Fallo al descargar");
        }
        
        try
        {
            x=5;
            System.out.println("Carga de "+x+" municiones");
            miPaintball.cargar(x);
        } catch (Exception e)
        {
            System.out.print("Fallo al cargar");
        }
        System.out.println("Munición cargada actualmente: "+ miPaintball.consultar_municion_cargada() );
        capacidadCargaDisponible = miPaintball.consultar_capacidad_disponible();
        System.out.println("Munición máxima que se puede cargar actualmente: "+ capacidadCargaDisponible );
        
    }

}
