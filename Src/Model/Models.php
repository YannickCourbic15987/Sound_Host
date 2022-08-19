<?php

namespace App\Src\Model;

use App\Src\Core\Data;

abstract class Models extends Data
{
    //**Avant de faire mon crud , je vais déterminer si j'ai besoin de faire un prepare ou non */
    protected $table;

    //****READ ******/

    public function findAll()
    {
        $request = $this->getData()->prepare("SELECT * FROM $this->table");
        $request->execute();

        return $request->fetchAll();
    }

    public function findById($id)
    {
        $request = $this->getData()->prepare("SELECT * FROM $this->table WHERE id = ?");
        $request->execute(array($id));

        return $request->fetch();
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

    public function create()
    {
        //** insert into from $table (colonne1,colonne2) values ?,? */
        $champs = [];
        $values = [];
        $inter = [];
        // var_dump($this);

        foreach ($this as $champ => $value) {
            if ($value !== null && $champ != 'table') {
                $champs[] = $champ;
                $inter[] = "?";
                $values[] = $value;
            }
        }
        $liste_champs = join(' , ', $champs);
        $liste_inter = join(' , ', $inter);



        $request = $this->getData()->prepare('INSERT INTO ' . $this->table . ' (' . $liste_champs . ') VALUES ( ' . $liste_inter . ' ) ');
        $request->execute($values);
    }

    //***UPDATE****/

}
