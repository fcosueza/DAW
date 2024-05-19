package ejemplo;

// jdbc:h2:./proyectobase.h2db
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.PreparedStatement;
import org.h2.tools.Server;
import static java.lang.System.*;
import java.lang.reflect.InvocationTargetException;
import java.sql.ResultSet;
import java.util.Date;
import java.util.logging.Level;
import java.util.stream.Collectors;
import utilidades.ES;

/**
 * Clase principal de inicio del programa.
 */
public class Aplicacion {

    /**
     * Nombre del archivo de base de datos local.
     */
    private static final String DB_NOMBRE = "proyectobase.h2db";
    /**
     * URL para la conexión a la base de datos.
     */
    private static final String URL_CONEXION = "jdbc:h2:./" + DB_NOMBRE;
    /**
     * Driver a utilizar para conectarse a la base de datos.
     */
    private static final String DRIVER = "org.h2.Driver";
    /**
     * Opciones de conexión.
     */
    private static final String PARAMS = ";MODE=MySQL;AUTO_RECONNECT=TRUE";

    /**
     * Path al archivo que contiene la estructura de la base de datos.
     */
    public final static String ESTRUCTURA_DB = "/resources/creaBD.sql";

    /**
     * Path al archivo que contiene la estructura de la base de datos.
     */
    public final static String INSERTA_DB = "/resources/cargaBD.sql";

    /**
     * Método principal de la aplicación. En él se realiza la preparación del
     * entorno antes de empezar. A destacar:
     *
     * - Se carga el driver (Class.forName). - Se establece una conexión con la
     * base de datos (DriverManager.getConnection) - Se crean las tablas, si no
     * están creadas, invocando el método createTables. - Se ejecuta una
     * consulta de prueba
     *
     * @param args
     */
    public static void main(String[] args) {
        boolean driverCargado = false;

        //Carga del driver de la base de datos.
        try {
            Class.forName(DRIVER).getDeclaredConstructor().newInstance();
            driverCargado = true;
        } catch (ClassNotFoundException e) {
            err.printf("No se encuentra el driver de la base de datos (%s)\n", DRIVER);
        } catch (InstantiationException | IllegalAccessException ex) {
            err.printf("No se ha podido iniciar el driver de la base de datos (%s)\n", DRIVER);
        } catch (IllegalArgumentException | InvocationTargetException | NoSuchMethodException | SecurityException ex) {
            java.util.logging.Logger.getLogger(Aplicacion.class.getName()).log(Level.SEVERE, null, ex);
        }

        //Si el driver está cargado, aseguramos que podremos conectar.
        if (driverCargado) {
            //Conectamos con la base de datos.
            //El try-with-resources asegura que se cerrará la conexión al salir.
            String[] wsArgs = {"-baseDir", System.getProperty("user.dir"), "-browser"};
            try (Connection con = DriverManager.getConnection(URL_CONEXION + PARAMS, "", "")) {

                // Iniciamos el servidor web interno (consola H2 para depuraciones)
                Server sr = Server.createWebServer(wsArgs);
                sr.start();

                // Presentamos información inicial por consola
                out.println("¡¡Atención!!");
                out.println();
                out.println("Mientras tu aplicación se esté ejecutando \n"
                        + "puedes acceder a la consola de la base de datos \n"
                        + "a través del navegador web.");
                out.println();
                out.println("Página local: " + sr.getURL());
                out.println();
                out.println("Datos de acceso");
                out.println("---------------");
                out.println("Controlador: " + DRIVER);
                out.println("URL JDBC: " + URL_CONEXION);
                out.println("Usuario: (no indicar nada)");
                out.println("Password: (no indicar nada)");

                // Creamos las tablas y algunos datos de prueba si no existen
                // y continuamos
                if (crearTablas(con)) {

                    // Insertar los datos en las tablas de la BD
                    insertarDatosTablas(con);

                    boolean continuar = true;

                    do {
                        System.out.println("\n\n");
                        System.out.println("\n --------------------------------------------------------------------------------");
                        System.out.println("| MENU DE LA APLICACIÓN                                                          |");
                        System.out.println(" --------------------------------------------------------------------------------");
                        System.out.println("  1 - Mostrar Peliculas");
                        System.out.println("  2 - Borrar Plataforma");
                        System.out.println("  3 - Modificar Plataforma");
                        System.out.println("  4 - Mostrar Peliculas por plataformas");
                        System.out.println("  0 - Salir");
                        System.out.println(" --------------------------------------------------------------------------------\n\n");

                        // Leer la opción correspondiente a ejecutar.
                        int opcion = ES.leeEntero("Escriba opción: ", 0, 4);
                        switch (opcion) {
                            case 0:
                                continuar = false;
                                break;
                            case 1:
                                mostrarPeliculas(con);
                                break;
                            case 2:
                                borrarPlataforma(con);
                                break;
                            case 3:
                                modificarPlataforma(con);
                                break;
                            case 4:
                                mostrarPeliculasPorPlataformas(con);
                                break;
                        }
                    } while (continuar);

                    // Esperar tecla
                    ES.leeCadena("Antes de terminar, puedes acceder a la "
                            + "consola de H2 para ver y modificar la base de "
                            + "datos. Pulsa cualquier tecla para salir.");

                } else {
                    System.out.printf("Problema creando las tablas: ");
                }

                sr.stop();
                sr.shutdown();

            } catch (SQLException ex) {
                System.out.printf("No se pudo conectar a la base de datos (%s): %s\n", DB_NOMBRE, ex.getMessage());
            }
        }

    }

    /**
     * Dada una conexión válida, lleva a cabo la creación de la estructura de la
     * base de datos, usando como SQL para la creación el contenido en la
     * constante ESTRUCTURA_DB
     *
     * @param con conexión a la base de datos.
     * @see ESTRUCTURA_DB
     * @return true si se creo la estructura y false en caso contrario.
     */
    public static boolean crearTablas(Connection con) {
        boolean todoBien = false;

        try (Statement st = con.createStatement()) {

            String sqlScript = loadResourceAsString(ESTRUCTURA_DB);
            if (sqlScript != null) {
                st.execute(sqlScript);
                todoBien = true;
            } else {
                System.out.printf("Problema cargando el archivo: %s \n", ESTRUCTURA_DB);
                System.out.printf("Para ejecutar este proyecto no puede usarse 'Run File'\n");
            }

        } catch (SQLException ex) {
            System.out.printf("Problema creando la estructura de la base de datos: %s\n", ex.getMessage());
        }
        return todoBien;
    }

    /**
     * Dada una conexión válida, lleva a cabo la inserción de datos de la base
     * de datos, usando como SQL para la creación el contenido en la constante
     * INSERTA_DB
     *
     * @param con conexión a la base de datos.
     * @see INSERTA_DB
     * @return true si se creo la estructura y false en caso contrario.
     */
    private static boolean insertarDatosTablas(Connection con) {
        boolean todoBien = false;

        try (Statement st = con.createStatement()) {

            String sqlScript = loadResourceAsString(INSERTA_DB);
            if (sqlScript != null) {
                st.execute(sqlScript);
                todoBien = true;
            } else {
                System.out.printf("Problema cargando el archivo: %s \n", INSERTA_DB);
                System.out.printf("Para ejecutar este proyecto no puede usarse 'Run File'\n");
            }

        } catch (SQLException ex) {
            System.out.printf("Problema insertando datos en la base de datos: %s\n", ex.getMessage());
        }
        return todoBien;
    }

    /**
     * Carga un recurso que estará dentro del JAR como cadena de texto.
     *
     * @param resourceName Nombre del recurso dentro del JAR.
     * @return Cadena que contiene el contenido del archivo.
     */
    public static String loadResourceAsString(String resourceName) {
        String resource = null;
        InputStream is = Aplicacion.class.getResourceAsStream(resourceName);
        if (is != null) {
            try (InputStreamReader isr = new InputStreamReader(is); BufferedReader br = new BufferedReader(isr);) {
                resource = br.lines().collect(Collectors.joining("\n"));
            } catch (IOException ex) {
                System.out.printf("Problema leyendo el recurso como cadena: %S\n ", resourceName);
            }
        }
        return resource;
    }

    /**
     * Muestra por consola las películas de la BD.
     *
     * @param con Conexión a la BD
     */
    private static void mostrarPeliculas(Connection con) {

        // Comprobamos que la conexión no sea null
        if (con != null) {

            // Creamos un try-resource-catch con la consulta y mostramos los resultados
            try (Statement consulta = con.createStatement()) {
                ResultSet resultado = consulta.executeQuery("SELECT * FROM peliculas");

                System.out.printf("\n\n------------ Películas Disponibles --------------\n");
                System.out.printf("| Código - Título - Sinopsis - Fecha de estreno |\n");
                System.out.printf("-------------------------------------------------\n\n");

                while (resultado.next()) {
                    int codigo = resultado.getInt("codigo");
                    String titulo = resultado.getString("titulo");
                    String sinopsis = resultado.getString("sinopsis");
                    Date fecha = resultado.getDate("fEstreno");

                    System.out.printf("%d - %s - %s - %s \n", codigo, titulo, sinopsis, fecha);
                }

            } catch (SQLException e) {
                System.err.printf("Se ha producido un error al ejecutar la consulta SQL.");
            }
        } else {
            System.err.printf("La conexión a la base de datos no puede tener el valor null.");

        }
    }

    /**
     * Modificar el nombre de una plataforma de la BD
     *
     * @param con Conexión a la BD
     */
    private static void modificarPlataforma(Connection con) {
        int codigoPlataforma;
        String nuevoNombre;

        // Comprobamos que la conexión no sea null
        if (con != null) {

            // Creamos un try-resource-catch con la consulta para mostrar todas las plataformas
            try (Statement consulta = con.createStatement()) {
                ResultSet resultado = consulta.executeQuery("SELECT * FROM plataformas");

                System.out.printf("\n\n------------ Plataformas Disponibles -----------\n");
                System.out.printf("| Código - Nombre                              |\n");
                System.out.printf("------------------------------------------------\n\n");

                while (resultado.next()) {
                    int codigo = resultado.getInt("codigo");
                    String nombre = resultado.getString("nombre");

                    System.out.printf("%d - %s\n", codigo, nombre);
                }

            } catch (SQLException e) {
                System.err.printf("Se ha producido un error al ejecutar la consulta SQL.");
            }

            // Pedímos el codigo de la plataforma a modificar y su nuevo nombre
            System.out.printf("\n\nIntroduzca el código de la plataforma a modificar: ");
            codigoPlataforma = ES.leeEntero();

            System.out.printf("\n\nIntroduzca el nuevo nombre de la plataforma: ");
            nuevoNombre = ES.leeCadena();

            // Creamos la consulta SQL con paramétros
            String consulta = "UPDATE plataformas SET nombre=? WHERE codigo=?";

            // Creamos otro try-resource-catch para realizar la actualización del nombre de la plataforma
            try (PreparedStatement consultaPreparada = con.prepareStatement(consulta)) {
                // Enlazamos los paramétros con la consulta
                consultaPreparada.setString(1, nuevoNombre);
                consultaPreparada.setInt(2, codigoPlataforma);

                // Ejecutamos la consulta y almacenamos el número de registros afectados
                int registrosActualizados = consultaPreparada.executeUpdate();

                // Mostramos información sobre la ejecuciónd de la consulta
                if (registrosActualizados > 0) {
                    System.out.printf("La actualización se ha realizado correctamente.");
                } else {
                    System.out.printf("No se ha encontrado ninguna plataforma con ese código (Actualización fallida)");
                }

            } catch (SQLException e) {
                System.err.printf("Se ha producido un error al ejecutar la consulta SQL.");

            }
        } else {
            System.err.printf("La conexión a la base de datos no puede tener el valor null.");
        }
    }

    /**
     * Borrar plataforma de la BD
     *
     * @param con Conexión a la BD
     */
    private static void borrarPlataforma(Connection con) {
        int codigoPlataforma;

        // Comprobamos que la conexión no sea null
        if (con != null) {

            // Creamos un try-resource-catch con la consulta para mostrar todas las plataformas
            try (Statement consulta = con.createStatement()) {
                ResultSet resultado = consulta.executeQuery("SELECT * FROM plataformas");

                System.out.printf("\n\n------------ Plataformas Disponibles -----------\n");
                System.out.printf("| Código - Nombre                              |\n");
                System.out.printf("------------------------------------------------\n\n");

                while (resultado.next()) {
                    int codigo = resultado.getInt("codigo");
                    String nombre = resultado.getString("nombre");

                    System.out.printf("%d - %s\n", codigo, nombre);
                }

            } catch (SQLException e) {
                System.err.printf("Se ha producido un error al ejecutar la consulta SQL.");
            }

            // Pedímos el codigo de la plataforma a borrar
            System.out.printf("\n\nIntroduzca el código de la plataforma que desea borrar: ");
            codigoPlataforma = ES.leeEntero();

            // Creamos la consulta SQL con paramétros
            String consulta = "DELETE FROM plataformas WHERE codigo=?";

            // Creamos otro try-resource-catch para realizar la actualización del nombre de la plataforma
            try (PreparedStatement consultaPreparada = con.prepareStatement(consulta)) {
                // Enlazamos los paramétros con la consulta
                consultaPreparada.setInt(1, codigoPlataforma);

                // Ejecutamos la consulta y almacenamos el número de registros afectados
                int registrosActualizados = consultaPreparada.executeUpdate();

                // Mostramos información sobre la ejecuciónd de la consulta
                if (registrosActualizados > 0) {
                    System.out.printf("La plataforma se ha borrado con éxito.");
                } else {
                    System.out.printf("No se ha encontrado ninguna plataforma con ese código (Eliminación fallida)");
                }

            } catch (SQLException e) {
                System.err.printf("Se ha producido un error al ejecutar la consulta SQL.");

            }
        } else {
            System.err.printf("La conexión a la base de datos no puede tener el valor null.");
        }
    }

    /**
     * Muestra el nombre de todas las películas existentes en cada plataforma de la BD
     *
     * @param con Conexión a la BD
     */
    private static void mostrarPeliculasPorPlataformas(Connection con) {
        /*
         * Para llevar a cabo esta consulta, primero vamos a realizar una consulta que muestre
         * todas las plataformas, iterando por el resultado con el método .next() para a continuación
         * realizar un INNER JOIN entre la tabla Películas y Disponible_en, mostrando todas las películas
         * pertenecientes a esa plataforma.
         */

        if (con != null) {

            // Mostramos la cabecera del resultado
            System.out.printf("\n\n--------------------------------------------\n");
            System.out.printf("|            Películas por Plataforma          |\n");
            System.out.printf("------------------------------------------------\n\n");

            // Usamos un try-resources para realizar la consulta sobre las plataformas
            try (Statement consultaPlataformas = con.createStatement()) {
                ResultSet resultadoPlataformas = consultaPlataformas.executeQuery("SELECT codigo, nombre FROM Plataformas");

                // Iteramos por las plataformas
                while (resultadoPlataformas.next()) {
                    int codPlataforma = resultadoPlataformas.getInt("codigo");
                    String nombrePlataforma = resultadoPlataformas.getString("nombre");

                    // Mostramos el nombre de la plataforma
                    System.out.printf("\n\nPlataforma: %s\n", nombrePlataforma);
                    System.out.println("-----------------------------------------------");

                    // Creamos la consulta para las películas, empleando un INNER JOIN
                    String peliculasQuery = "SELECT peliculas.titulo "
                            + "FROM peliculas INNER JOIN disponible_en "
                            + "ON (peliculas.codigo = disponible_en.codpelicula) AND (disponible_en.codPlataforma=?)";

                    // Creamos el try-resource para realizar la consulta sobre lás películas
                    try (PreparedStatement consultaPeliculas = con.prepareStatement(peliculasQuery)) {
                        // Enlazamos el parametro
                        consultaPeliculas.setInt(1, codPlataforma);

                        if (consultaPeliculas.execute()) {
                            ResultSet resultadoPeliculas = consultaPeliculas.getResultSet();

                            // Iteramos el resultado y mostramos las peliculas
                            while (resultadoPeliculas.next()) {
                                String nombrePelicula = resultadoPeliculas.getString("titulo");

                                System.out.printf("%s\n", nombrePelicula);
                            }

                            System.out.println("-----------------------------------------------");
                        }
                    } catch (SQLException e) {
                        System.err.printf("Se ha producido un error al ejecutar la consulta SQL.");
                    }
                }
            } catch (SQLException e) {
                System.err.printf("Se ha producido un error al ejecutar la consulta SQL.");
            }
        }

    }
}
