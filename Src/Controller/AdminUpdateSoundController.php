<?php

namespace App\Src\Controller;

use App\Src\Model\SoundModel;

class AdminUpdateSoundController extends Controller
{
    public function display($id)
    {

        $sounds = new SoundModel();
        $sound = $sounds->findById($id);
        $sounds->setId($id);
        if (isset($_POST['title']) && !empty($_POST['title'] && isset($_POST['description']) && !empty($_POST['description']) && isset($_POST['releaseDate']) && !empty($_POST['releaseDate']))) {
            //**traitement des données post */
            $title = trim(htmlspecialchars($_POST['title']));
            $description = trim(htmlspecialchars($_POST['description']));
            $date = trim(htmlspecialchars($_POST['releaseDate']));
            $sounds->setTitle($title);
            $sounds->setDescription($description);
            $sounds->setReleaseDate($date);
            //**traitement des données sonore */
            // var_dump($_FILES['image']);
            if (isset($_FILES['image']) && isset($_FILES['sound']) && !empty($_FILES['image']) && !empty($_FILES['sound'])) {


                $audio = $_FILES['sound'];
                $image = $_FILES['image'];
                if ($audio['error'] === 0) {
                    $info = pathinfo($audio['name']);
                    $extension = ['mp4', 'mp3'];
                    $verifExtend = in_array($info['extension'], $extension);
                    if ($verifExtend) {
                        $src = ROOT . '/Audio/' . time() . rand() . rand() . '.' . $info['extension'];
                        move_uploaded_file($audio['tmp_name'], $src);
                        $srcAudio = substr(strrchr($src, '/'), 1);
                        $sounds->setSound($srcAudio);
                    }
                }
                if ($image['error'] === 0) {
                    $infoImage = pathinfo($image['name']);
                    // var_dump($infoImage);
                    $extensionImage = ['jpg', 'jpeg', 'gif', 'png'];
                    $verifExtendImage = in_array($infoImage['extension'], $extensionImage);
                    if ($verifExtendImage) {
                        $srcImage = ROOT . '/Image/' . time() . rand() . rand() . '.' . $infoImage['extension'];
                        move_uploaded_file($image['tmp_name'], $srcImage);
                        $sourceImg = substr(strrchr($srcImage, '/'), 1);
                        $sounds->setImage($sourceImg);
                    }
                }
            }
        };
        $sounds->update($id, "adminSound");




        $this->render("Admin/updateSound", ['sound' => $sound]);
    }
}
