package figuras;

/**
 *
 * @author Ana Espina Martínez
 */
public class Rectangulo implements Forma {
    
    private double longitud;
    private double anchura;

    public Rectangulo(double longitud, double anchura) {
        
        this.longitud = longitud;
        this.anchura = anchura;
    }

    public double getLongitud() {
        return longitud;
    }

    public void setLongitud(double longitud) {
        this.longitud = longitud;
    }

    public double getAnchura() {
        return anchura;
    }

    public void setAnchura(double anchura) {
        this.anchura = anchura;
    }
    
    @Override
    public double getArea() {
    
        return this.anchura * this.longitud;
    }
    
    @Override
    public double getPerimetro() {
    
        return 2 * (this.anchura + this.longitud);
    }
}
