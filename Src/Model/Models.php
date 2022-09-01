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

    public function findById()
    {
        $request = $this->getData()->prepare("SELECT * FROM $this->table WHERE id = ?");
        $request->execute(array($this->id));

        return $request->fetch();
    }

    public function findByEmail()
    {
        $request = $this->getData()->prepare("SELECT * FROM $this->table where email = ?");
        $request->execute(array($this->email));
        return $request->fetch();
    }

    public function findByUsername()
    {
        $request = $this->getData()->prepare("SELECT * FROM $this->table where id_user = ?");
        $request->execute(array($this->id_user));

        return $request->fetch();
    }

    public function findByCategory()
    {
        $request = $this->getData()->prepare("SELECT * FROM $this->table where title = ?");
        $request->execute(array($this->title));

        return $request->fetch();
    }

    public function findByCategory2()
    {
        $request = $this->getData()->prepare("SELECT * FROM $this->table where id = ?");
        $request->execute(array($this->id));

        return $request->fetch();
    }

    public function findByEditeur()
    {
        $request = $this->getData()->prepare("SELECT * FROM $this->table where id = ?");
        $request->execute(array($this->id));

        return $request->fetch();
    }

    public function findByProfil()
    {
        $request = $this->getData()->prepare("SELECT * FROM $this->table where pseudo = ?");
        $request->execute(array($this->pseudo));

        return $request->fetch();
    }
    public function findBySubject()
    {
        $request = $this->getData()->prepare("SELECT * FROM $this->table where title = ?");
        $request->execute(array($this->title));

        return $request->fetch();
    }
    public function findByIdSubjectDetails()
    {
        $request = $this->getData()->prepare("SELECT * FROM $this->table where id_subjectDetails = ?");
        $request->execute(array($this->id_subjectDetails));
        return $request->fetchAll();
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
    public function updateMessage()
    {

        $request = $this->getData()->prepare('UPDATE ' . $this->table . ' SET text = ' . "'$this->text'" . ' WHERE publication = ?');
        // var_dump($request);
        // var_dump($values);
        $request->execute(array($this->publication));
    }

    public function update()
    {
        $champs = [];
        $values = [];

        foreach ($this as $champ => $value) {
            if ($value != null && $champ != 'table' && $champ != 'id') {
                $champs[] = $champ . "= ?";
                $values[] = $value;
            }
        }
        $liste_champs = join(' , ', $champs);
        $request = $this->getData()->prepare('UPDATE ' . $this->table . ' SET ' . $liste_champs . ' WHERE id = ' . $this->id);
        $request->execute($values);
        // var_dump($request);
    }


    //**DELETE *****/

    public function delete()
    {
        $request = $this->getData()->prepare("DELETE FROM `" . $this->table  . "` WHERE `id` = $this->id");
        $request->execute();
    }



    //**SELECT */
    public function selectMessage()
    {
        $request = $this->getData()->prepare("SELECT * FROM $this->table  WHERE " .  "publication = '" . $this->publication . "'");
        $request->execute();
        return $request->fetch();
    }
}
