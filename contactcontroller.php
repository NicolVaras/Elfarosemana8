<?php
require_once 'models/Noticia.php';
require_once 'models/Usuario.php';
require_once 'models/Registro.php';
require_once 'models/Contacto.php';

class NoticiasController {
    private $noticias = [];

    class NoticiasController {
        private $noticias = [];

        public function __construct() {
            // Cargar las noticias desde el contenido proporcionado.
            $this->noticias[] = new Noticia("Gobierno transfirió más de $ 1 millón para deportistas olímpicos ecuatorianos", "Deporte", "Ministerio de Economía anunció la entrega de los premios económicos por las medallas recibidas en las Olimpiadas París 2024.");
            $this->noticias[] = new Noticia("Alegrías y penas del deporte", "Deporte", "Es menester que los ministerios, autoridades y demás gente involucrada en el ámbito deportivo hagan acopio y valoren estos triunfos...");
            $this->noticias[] = new Noticia("Imane Khelif, la cuestionada campeona olímpica en París 2024 por sus altos niveles de testosterona, muestra su lado femenino", "Deporte", "La pugilista argelina fue acusada falsamente de ser transgénero, tras su combate en cuartos de final contra la italiana Angela Carini.");
            $this->noticias[] = new Noticia("Irlanda dona EUR 200.000 para reforzar los proyectos del STDF relacionados con la inocuidad alimentaria y el comercio en todo el mundo", "Negocios", "Irlanda aportará EUR 200.000 al Fondo para la Aplicación de Normas y el Fomento del Comercio (STDF)...");
            $this->noticias[] = new Noticia("Se abre el plazo para la inscripción en el curso de la OMC sobre los aspectos del comercio electrónico relacionados con los servicios", "Negocios", "Se invita a los funcionarios gubernamentales de los Miembros de la OMC...");
        }

        public function mostrarNoticias() {
            include 'views/noticias.php'; // Cargar la vista con las noticias
        }

        public function mostrarRegistro() {
            include 'views/registro.php'; // Cargar la vista del registro
        }

        public function getNoticias() {
            return $this->noticias;
        }
    }
    }

    public function mostrarContacto() {
        include 'views/contacto.php'; // Cargar la vista de contacto
    }

    public function guardarContacto($nombre, $email, $mensaje) {
        // Crear un nuevo objeto Contacto y procesar el mensaje (por ejemplo, enviarlo por correo)
        $contacto = new Contacto($nombre, $email, $mensaje);

        // Aquí podrías implementar la lógica para enviar el mensaje o guardarlo en la base de datos.

        echo "Mensaje enviado.";
    }
}
?>