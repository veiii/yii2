<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png,jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $path = 'uploads/' .time().Yii::$app->security->generateRandomString(7).'.' . $this->imageFile->extension;
            $this->imageFile->saveAs($path);
            $userId =Yii::$app->user->id;
                if(UserPhoto::isPhoto($userId)){
                    $model = new UserPhoto();
                    $model->findPhotoByUserId($userId);
                    /**
                     * Permission denied for unlink???
                     */
                    //unlink(Yii::$app->basePath.'/web/'. $model->path);
                    $model->path = $path;
                    $model->update();

                } else {
                    $model = new UserPhoto();
                    $model->path = $path;
                    $model->user_id = Yii::$app->user->id;
                    $model->save(false);
                }

            return true;
        } else {
            return false;
        }
    }
}