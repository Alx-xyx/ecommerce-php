<?php
    /**
     * Clase Secciones
     * 
     * Esta encargada de manejar mis secciones a lo largo de todo el sitio.
     * Utiliza variables privadas las cuales obtiene de un JSON que tiene las
     * secciones validas para utilizar. En caso de querer entrar en alguna que
     * no exista o el usuario no tenga autorizacion, no podra.
     * 
     * Permite que el usuario tenga sus secciones, que hayan secciones validas en
     * general y secciones validas para el menu
     */
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

        /**
         * Setea que secciones son validas para el usuario
         * 
         * @return array ya que son varias secciones
         */
        public static function sectionsUser():array{
            //! Array vacio para inicializar
            $secciones = [];
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

        /**
         * Setea las secciones validas en general del sitio sin distincion de usuarios
         * 
         * @return array ya que son varias
         */
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
        /**
         * Setea las secciones validas que pueden aparecer visualmente
         * 
         * @return array ya que son varias
         */
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