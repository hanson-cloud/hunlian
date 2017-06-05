<?php
namespace frontend\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * UploadForm is the model behind the upload form.
 */
class UploadForm extends Model
{
    /**
     * @var UploadedFile file attribute
     */
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file'], 'file','extensions' => 'png, jpg','skipOnEmpty' => false,'maxFiles' => 4],
        ];
    }


    public function upload()
    {
        $path = 'uploads/';
        if(!file_exists($path))
        {
            mkdir($path);
        }
        if ($this->validate()) 
        { 
            $a = [];
            foreach($this->file as $file) 
            {
                $new_path = $path . $file->baseName . '.' . $file->extension;
                $file->saveAs($new_path);
                $a[] = $new_path;   
            }
             // var_dump($a);die;
            return $a;
        } 
        else 
        {
            // echo 0;
            return false;
        }
    }

}