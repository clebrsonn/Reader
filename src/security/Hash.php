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
     * Gera um 'salt' ъnico de 22 chars para encriptar password
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
     * O hash й gerado com o algortitmo blowfish com um
     * custo 10.
     *
     * @return String - A blowfish, cost-10, hashed password.
     */
    public static function hashPassword($pass)
    {
        // if ( ! self::$hasBlowfish ) {
        //     die( 'O servidor nгo suporta encriptaзгo blowfish...' );
        // }
        return crypt($pass, '$2a$10$' . self::uniqueSalt());
    }

    /**
     * Verifica se um plain password й igual ao password
     * jб hasheado. O password jб hasheado vem do DB, por exemplo.
     *
     * @return Boolean TRUE if the passwords are the same, FALSE otherwise.
     */
    public static function checkPasswords($DbHashedPassword, $plainPassword)
    {
        // Na verdade, nem precisa explicitamente pegar os primeiros 29 chars,
        // jб que crypt() automaticamente descarta caracteres excedentes.
        $salt = substr($DbHashedPassword, 0, 29);
        $newHash = crypt($plainPassword, $salt);
        return ($DbHashedPassword == $newHash);
    }
}