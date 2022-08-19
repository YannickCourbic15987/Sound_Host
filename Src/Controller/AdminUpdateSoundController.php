<?php

namespace App\Src\Controller;

use App\Src\Model\SoundModel;

class adminUpdateSoundController extends Controller
{
    public function index()
    {

        $sounds = new SoundModel;
        $sound = $sounds->findById($_POST["id"]);

        if (!empty($_POST['title'])) {
            $sounds->setTitle(trim(htmlspecialchars($_POST['title'])));
        }
        if (!empty($_FILES['image'])) {
            $image = $_FILES['image'];
            if ($image['error'] === 0) {
                $infoImage = pathinfo($image['name']);
                // var_dump($infoImage);
                $extensionImage = ['jpg', 'jpeg', 'gif', 'png'];
                $verifExtendImage = in_array($infoImage['extension'], $extensionImage);
                if ($verifExtendImage) {
                    $srcImage = ROOT . '/Image/' . time() . rand() . rand() . '.' . $infoImage['extension'];
                    move_uploaded_file($image['tmp_name'], $srcImage);
                    $sourceImg = substr(strrchr($srcImage, '/'), 1);
                }
                $sounds->setImage($sourceImg);
            }
        }
        if (!empty($_FILES['sound'])) {
            $audio = $_FILES['sound'];
            if ($audio['error'] === 0) {
                $info = pathinfo($audio['name']);
                $extension = ['mp4', 'mp3'];
                $verifExtend = in_array($info['extension'], $extension);
                if ($verifExtend) {
                    $src = ROOT . '/Audio/' . time() . rand() . rand() . '.' . $info['extension'];
                    move_uploaded_file($audio['tmp_name'], $src);
                    $srcAudio = substr(strrchr($src, '/'), 1);
                }
                $sounds->setSound($srcAudio);
            }
        }
        if (!empty($_POST['description'])) {
            $sounds->setDescription($_POST['description']);
        }
        if (!empty($_POST['releaseDate'])) {
            $sounds->setReleaseDate(trim(htmlspecialchars($_POST['releaseDate'])));
        }




        $this->render("Admin/updatesound", ["sound" => $sound]);
    }
}
