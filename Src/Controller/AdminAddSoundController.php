<?php

namespace App\Src\Controller;

use App\Src\Model\SoundModel;

class AdminAddSoundController extends Controller
{
    public function index()
    {

        if (isset($_POST) && !empty($_POST) && isset($_FILES) && !empty($_FILES)) {
            //**traitement des données post */
            $title = trim(htmlspecialchars($_POST['title']));
            $description = trim(htmlspecialchars($_POST['description']));
            $date = trim(htmlspecialchars($_POST['releaseDate']));
            //**traitement des données sonore */
            // var_dump($_FILES['image']);
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
                }
            }

            $sound = new SoundModel();
            $sounds = $sound->setTitle($title)
                ->setImage($sourceImg)
                ->setSound($srcAudio)
                ->setDescription($description)
                ->setReleaseDate($date);


            $sounds->create();
            header('Location:adminSound');
        }

        $this->render('Admin/addsound', []);
    }
}
