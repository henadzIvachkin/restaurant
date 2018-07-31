<?php

namespace app\modules\admin\controllers;

class FileController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new \app\modules\admin\models\FileForm();

        if ($model->load(\Yii::$app->request->post())) {
            if ($model->validate()) {
                // form inputs are valid, do something here
                $inFileName = \Yii::getAlias('@webroot') . $model->file;
                if (file_exists($inFileName)){
                    $strings = file($inFileName);
                    $name = array();
                    $bank = array();
                    $sum = array();

                    foreach ($strings as $string){
                        $substr = substr($string, 0 , 2);
                        switch ($substr){
                            case "09" :
                                array_push($name, iconv('CP866','utf-8',trim(substr($string,2))));
                                break;
                            case "0A" :
                                array_push($bank, trim(substr($string,2)));
                                break;
                            case "0B" :
                                array_push($sum, trim(substr($string,2)));
                                break;
                        }
                    }

                    $arrayLength = count($name);
                    $outString = "";
                    $outFile = fopen(dirname($inFileName)."/outFile.txt",'w+');
                    for ($i = 0; $i<$arrayLength; $i++){
                        $outString .= "102,".$bank[$i]. ',' . $name[$i] . ',' . $sum[$i] . "</br>";
                        fwrite($outFile,iconv('utf-8','CP866',"102,".$bank[$i]. ',' . $name[$i] . ',' . $sum[$i] . "\n"));
                    }
                    fclose($outFile);

                    \Yii::setAlias('@outDirectory',\Yii::getAlias('@web') .DIRECTORY_SEPARATOR. "files" .DIRECTORY_SEPARATOR. "global" .DIRECTORY_SEPARATOR. "text-files");

                    $downloadLink = \Yii::getAlias('@outDirectory')  .DIRECTORY_SEPARATOR. "outFile.txt";

                    return $this->render('index', [
                        'model' => $model,
                        'fileContent' => $outString,
                        'downloadLink' => $downloadLink,
                        ]);

                } else {
                    return $this->render('index', [
                        'model' => $model,
                        'errorMessage' => 'File not exists',
                    ]);
                }

            }
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }


}
