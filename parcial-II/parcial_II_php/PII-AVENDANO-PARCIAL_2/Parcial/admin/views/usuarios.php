<?php
    //! Cambia mi variable 123 por un hash basado en el metodo "Password default".
    $encrypted_pswd = password_hash("123", PASSWORD_DEFAULT);

    //! Con pswd verify, verifica el metodo de hasheo que tiene. Si es de PHP devolvera true haciendo que se pueda desencriptar.

    password_verify("456",$encrypted_pswd) ?
    "<p> La clave es correcta </p>": "<p> La clave es incorrecta </p>";
?>