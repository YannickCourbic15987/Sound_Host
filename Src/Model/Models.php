<?php

namespace App\Src\Model;

use App\Src\Core\Data;

class Models extends Data
{
    //**Avant de faire mon crud , je vais déterminer si j'ai besoin de faire un prepare ou non */


    //****READ ******/

    public function findAll(string $table)
    {
        $request = $this->getData()->prepare("SELECT * FROM $table");
        $request->execute();

        return $request->fetchAll();
    }

    public function findByEmail(string $table, string $email)
    {
        $request = $this->getData()->prepare("SELECT * FROM $table where email = ?");
        $request->execute(array($email));

        return $request->fetch();
    }

    public function findByUsername(string $table, string $username)
    {
        $request = $this->getData()->prepare("SELECT * FROM $table where username = ?");
        $request->execute(array($username));

        return $request->fetch();
    }

    //***CREATE ******* */

    public function create(array $post, string $table)
    {
        //** insert into from $table (colonne1,colonne2) values ?,? */
        if (isset($post) && !empty($post)) {
            $colonne = [];
            $values = [];
            foreach ($post as $champs => $value) {
                $colonne[] = $champs;
                $values[] = $value;
            }
            $colonnes = join(",", $colonne);
            $donnees = [];
            for ($i = 0; $i < count($colonne); $i++) {
                $donnees[$i] = "'?'";
            }
            $donneesString = join(',', $donnees);
            $request = $this->getData()->prepare("INSERT INTO FROM $table ($colonnes) VALUES ($donneesString)");
            $request->execute($values);
        }
    }
}
