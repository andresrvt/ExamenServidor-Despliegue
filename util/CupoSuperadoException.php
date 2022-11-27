<?php
        declare(strict_types=1);

        namespace ExamenServidorDespliegue\util;
        include_once("./autoload.php");
        include_once("VideoClubException.php");
    
        class CupoSuperadoException extends VideoClubException{
            public function __construct(
                $message = "<br>Se ha cubierto el cupo de alquileres.<br>",
                $code = 2,
            )
            {
                parent::__construct($message,$code);
            }
    
            public function __toString(): string
            {
                return __CLASS__.": [{$this->code}]:{$this->message}\n";
            }
        }
?>