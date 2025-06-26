<?php
    class Secciones{
        private $vinculo;
        private $texto;
        private $title;
        private $showUser;

        public function getVinculo():string{
            return $this -> vinculo;
        }

        public function getTexto():string{
            return $this -> texto;
        }

        public function getTitle():string{
            return $this -> title;
        }

        public function getShowUser():bool{
            return $this -> showUser;
        }

        //! Funcion para devolver las secciones que deberia de ver el usuario

        public static function sectionsUser():array{
            //! Array vacio para inicializar
            $sections = [];
            $JSON = file_get_contents('data/sections.json');
            $JSONdata = json_decode($JSON);

            foreach ($JSONdata as $value) {
                $sec = new self();
                $sec -> vinculo = $value -> vinculo;
                $sec -> texto = $value -> texto;
                $sec -> title = $value -> title;
                $sec -> showUser = $value -> showUser;
                $secciones[] = $sec;
            }
            return $secciones;
        }

        //! Funcion estatica para devolver todas las secciones validas

        public static function validSections():array{
            $valid_sections = [];
            $JSON = file_get_contents('data/sections.json');
            $JSONdata = json_decode($JSON, true);

            foreach ($JSONdata as $value){
                $valid_sections[] = $value["vinculo"];
            }
            return $valid_sections;
        }

        //! Funcion estatica para devolver todas las secciones que aparecen visualmente en el menu
        public static function menu_sections():array{
            $valid_sections = [];
            $JSON = file_get_contents('data/sections.json');
            $JSONdata = json_decode($JSON, true);

            foreach ($JSONdata as $value){
                if ($value["showUser"]) {
                    $valid_sections[] = $value["vinculo"];
                }
            }
            return $valid_sections;
        }
    }
?>