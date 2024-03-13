<?php

namespace App;

class Propiedad
{

    // Base de Datos
    protected static $db;
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_id'];

    // Capturar errores (Validación del Formulario)
    protected static $errores = [];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;

    // Definir la conexion a la BD
    public static function setDB($database)
    {
        self::$db = $database;
    }

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id'] ?? 1;
    }

    public function guardar()
    {

        $atributos  = $this->sanitizarAtributos();

        $query = "INSERT INTO propiedades ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query($query);

        return $resultado;
    }


    // Identificar y Unir los Atributos de la BD
    public function atributos()
    {
        $atributos = [];
        foreach (self::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = strip_tags(self::$db->escape_string($value));
        }
        return $sanitizado;
    }

    public static function getErrores()
    {
        return self::$errores;
    }

    // Subida de Archivos
    public function  setImagen($imagen)
    {
        // Asignar al atributo imagen el nombre de la imagen
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    // Validacion del Form
    public function validarForm()
    {
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un titulo.";
        }
        if (!$this->precio) {
            self::$errores[] = "El precio es obligatorio.";
        }
        if (strlen($this->descripcion) < 50) {
            self::$errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres.";
        }
        if (!$this->habitaciones) {
            self::$errores[] = "Debes añadir el número de habitaciones.";
        }
        if (!$this->wc) {
            self::$errores[] = "El número de baños es obligatorio.";
        }
        if (!$this->estacionamiento) {
            self::$errores[] = "Debes añadir la cantidad de estacionamientos de la propiedad.";
        }
        if (!$this->vendedores_id) {
            self::$errores[] = "Debes elegir un vendedor.";
        }

        if (!$this->imagen) {
            self::$errores[] = "La imagen es obligatoria.";
        }
        return self::$errores;
    }

    // Listar todas las propiedades
    public static function all()
    {
        $query = "SELECT * FROM propiedades ORDER BY creado DESC";

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    // Buscar propiedades por un id

    public static function find($id){
        $query = "SELECT * FROM propiedades WHERE id = {$id}";

        $resultado = self::consultarSQL($query); 

        return array_shift($resultado);
    }

    public static function consultarSQL($query)
    {
        // Realizar la consulta
        $resultado = self::$db->query($query);

        // Iterar resultados
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = self::crearObjeto($registro);
        }

        // Liberar la memoria
        $resultado->free();

        // Retornar resultadps
        return $array;
    }

    protected static function crearObjeto($registro)
    {
        $objeto = new self;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    public function sincronizar($args = []) {
        foreach ($args as $key => $value) {
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }            
        }
    }
}
