<?php
    class Messages{
        private $message_id;
        private $issuer_id;
        private $receiver_id;
        private $message;

        public function __get($atributo) {
            return $this->$atributo;
        }

        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

    }
?>