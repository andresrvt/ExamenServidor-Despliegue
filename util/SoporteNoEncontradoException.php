<?php
        declare(strict_types=1);

        namespace ExamenServidorDespliegue\util;
        include_once("./autoload.php");
        include_once("VideoClubException.php");
        class SoporteNoEncontradoException extends VideoClubException{
            public function __construct(
                $message = "<br>No se encuentra este soporte.<br>",
                $code = 3,
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