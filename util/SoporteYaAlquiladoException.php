<?php
        declare(strict_types=1);

        namespace ExamenServidorDespliegue\util;
        include_once("./autoload.php");
        include_once("VideoClubException.php");
    
        class SoporteYaAlquiladoException extends VideoClubException{
            public function __construct(
                $message = "<br>Ya se encuentra alquilado<br>",
                $code = 4,
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