public class Provincia {

	private String nombre;
	private int codigoPostal;

	public String getNombre() {
		return this.nombre;
	}

	/**
	 * 
	 * @param nombre
	 */
	public void setNombre(String nombre) {
		this.nombre = nombre;
	}

	public int getCodigoPostal() {
		return this.codigoPostal;
	}

	/**
	 * 
	 * @param codigoPostal
	 */
	public void setCodigoPostal(int codigoPostal) {
		this.codigoPostal = codigoPostal;
	}

	public Ciudad[] obtenerCiudades() {
		// TODO - implement Provincia.obtenerCiudades
		throw new UnsupportedOperationException();
	}

	/**
	 * 
	 * @param ciudad
	 */
	public Ciudad obtenerCiudad(String ciudad) {
		// TODO - implement Provincia.obtenerCiudad
		throw new UnsupportedOperationException();
	}

}