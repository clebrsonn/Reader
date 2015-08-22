<?php

/**
 * Created by PhpStorm.
 * User: cleberson
 * Date: 21/08/2015
 * Time: 21:42
 */

class Hash
{
    public static $hasBlowfish;

    public function __construct()
    {
        self::$hasBlowfish = (CRYPT_BLOWFISH === 1) ? TRUE : FALSE;
    }

    /**
     * Gera um 'salt' �nico de 22 chars para encriptar password
     * com o algoritmo blowfish.
     *
     * @return String - A unique salt string.
     */
    public static function uniqueSalt()
    {
        return substr(sha1(mt_rand()), 0, 22);
    }

    /**
     * Cria um hash a partir de uma string/password.
     *
     * O hash � gerado com o algortitmo blowfish com um
     * custo 10.
     *
     * @return String - A blowfish, cost-10, hashed password.
     */
    public static function hashPassword($pass)
    {
        // if ( ! self::$hasBlowfish ) {
        //     die( 'O servidor n�o suporta encripta��o blowfish...' );
        // }
        return crypt($pass, '$2a$10$' . self::uniqueSalt());
    }

    /**
     * Verifica se um plain password � igual ao password
     * j� hasheado. O password j� hasheado vem do DB, por exemplo.
     *
     * @return Boolean TRUE if the passwords are the same, FALSE otherwise.
     */
    public static function checkPasswords($DbHashedPassword, $plainPassword)
    {
        // Na verdade, nem precisa explicitamente pegar os primeiros 29 chars,
        // j� que crypt() automaticamente descarta caracteres excedentes.
        $salt = substr($DbHashedPassword, 0, 29);
        $newHash = crypt($plainPassword, $salt);
        return ($DbHashedPassword == $newHash);
    }
}