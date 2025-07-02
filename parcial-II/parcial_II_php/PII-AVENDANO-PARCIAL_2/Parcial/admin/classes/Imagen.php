<?php

    class Imagen{
        public static function uploadImage($directorio, $dataArchive):string{
            $oldName = (explode(".", $dataArchive['name']));
            $extention = end($oldName);
            $newName = time() . '.' . $extention;

            $uploadArchive = move_uploaded_file($dataArchive['tmp_name'], "$directorio/$newName");
            if (!$uploadArchive) {
                throw new Exception("No se pudo subir la foto");
            } else {
                return $newName;
            }
            
        }

        public static function deleteImage($archive):bool{
            if (file_exists($archive)) {
                $fileDelete = unlink($archive);
                if (!$fileDelete) {
                    throw new Exception("No se pudo eliminar la imagen");
                } else {
                    return true;
                }
            } else{
                return false;
            }
            

        }
    }

?>