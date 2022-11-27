<?php
    declare(strict_types=1);

    namespace ExamenServidorDespliegue\util;

    use Exception;

    class VideoClubException extends Exception{
        public function __construct(
            $message,
            $code = 0,
            Exception $previous = null
        )
        {
            parent::__construct($message,$code,$previous);
        }

        public function __toString(): string
        {
            return __CLASS__.": [{$this->code}]:{$this->message}\n";
        }
    }
?>