<?php

namespace app\models;

use yii\base\Model;

/**
 * This is the model class for upload images
 */
class UploadImage extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $fullPath = 'uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs($fullPath);

            $image = new Images();
            $image->path = $fullPath;
            if($image->save()){
                return $image->id;
            }
            return false;
        } else {
            return false;
        }
    }
}
