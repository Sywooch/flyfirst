<?php
namespace frontend\controllers\admin;

use app\components\AppConfig;
use yii;
use yii\helpers\Url;

class XmlDataController extends AdminController
{
    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionBlog()
    {
        exit();
        $parametrs = simplexml_load_file ( Yii::$app->params['docRoot'] .'/web/design/file/blog.xml' );
        //print_r($parametrs);

        foreach($parametrs->item as $key => $param)
        {
            //print_r($param->blog_id);
            /*foreach($param->images->image as $key_im => $im)
            {
                print_r($im);
            }*/
            $sql_blog = "INSERT INTO blog_articles (id, description, keywords, title, alias, posted, summary, body)
                VALUES (:id, :description, :keywords, :title, :alias, :posted, :summary, :body)";
            Yii::$app->db->createCommand($sql_blog)
                ->bindValue(':id', $param->blog_id)
                ->bindValue(':description', $param->seo->description)
                ->bindValue(':keywords', $param->seo->keywords)
                ->bindValue(':title', $param->title)
                ->bindValue(':alias', $param->alias)
                ->bindValue(':posted', date("Y-m-d H:i:s", strtotime($param->posted)))
                ->bindValue(':summary', $param->summary)
                ->bindValue(':body', $param->body)
                ->execute();

            $q=0;
            foreach($param->images->image as $key_im => $image)
            {
                $sql = "INSERT INTO image (alias, content_type_id, content_id, content_field_id, queue, title)
                VALUES (:alias, :content_type_id, :content_id, :content_field_id, :queue, :title)";

                $title_im = '';
                if($image->title == 'null'){
                    $title_im = '';
                }
                else {
                    $title_im = $image->title;
                }

                Yii::$app->db->createCommand($sql)
                    ->bindValue(':content_id', $param->blog_id)
                    ->bindValue(':content_type_id', AppConfig::Image_ContentType_BlogArticle)
                    ->bindValue(':content_field_id', AppConfig::Image_ContentField_BlogArticle)
                    ->bindValue(':title', $title_im)
                    ->bindValue(':alias', $image->alias)
                    ->bindValue(':queue', $q)
                    ->execute();

                $q = $q + 1;
            }
        }

        return $this->render('blog');
    }

    public function actionContinent()
    {
        exit();
        $parametrs = simplexml_load_file ( Yii::$app->params['docRoot'] .'/web/design/file/continent.xml' );
        //print_r($parametrs);

        foreach($parametrs->item as $key => $param)
        {
            //print_r($param->blog_id);
            /*foreach($param->images->image as $key_im => $im)
            {
                print_r($im);
            }*/
            $sql__item = "INSERT INTO continent (id, description, keywords, name, title, alias, summary, body, first_class_price, business_class_price)
                VALUES (:id, :description, :keywords, :name, :title, :alias, :summary, :body, :first_class_price, :business_class_price)";
            Yii::$app->db->createCommand($sql__item)
                ->bindValue(':id', $param->continent_id)
                ->bindValue(':description', $param->seo->description)
                ->bindValue(':keywords', $param->seo->keywords)
                ->bindValue(':name', $param->name)
                ->bindValue(':title', $param->title)
                ->bindValue(':alias', $param->alias)
                ->bindValue(':summary', $param->summary)
                ->bindValue(':body', $param->body)
                ->bindValue(':first_class_price', $param->first_class_price)
                ->bindValue(':business_class_price', $param->business_class_price)
                ->execute();

            foreach($param->images->image as $key_im => $image)
            {
                $sql = "INSERT INTO image (alias, content_type_id, content_id, content_field_id, queue, title)
                VALUES (:alias, :content_type_id, :content_id, :content_field_id, :queue, :title)";

                $title_im = '';
                if($image->title == 'null'){
                    $title_im = '';
                }
                else {
                    $title_im = $image->title;
                }

                Yii::$app->db->createCommand($sql)
                    ->bindValue(':content_id', $param->continent_id)
                    ->bindValue(':content_type_id', AppConfig::Image_ContentType_Continent)
                    ->bindValue(':content_field_id', AppConfig::Image_ContentField_Continent)
                    ->bindValue(':title', $title_im)
                    ->bindValue(':alias', $image->alias)
                    ->bindValue(':queue', $image->queue)
                    ->execute();
            }
        }

        return $this->render('continent');
    }

    public function actionCountry()
    {
        exit();
        $parametrs = simplexml_load_file ( Yii::$app->params['docRoot'] .'/web/design/file/country.xml' );
        foreach($parametrs->item as $key => $param)
        {
            $capital_city = '';
            if($param->capital_city == 'null'){
                $capital_city = null;
            }
            else {
                $capital_city = $param->capital_city;
            }
            $continent_id = null;
            if($param->continent_id == 0){
                $continent_id = null;
            }
            else {
                $continent_id = $param->continent_id;
            }

            $sql_item = "INSERT INTO country (id, description, keywords, continent_id, name, title, alias, summary, body, first_class_price, business_class_price ,capital_city)
                VALUES (:id, :description, :keywords, :continent_id, :name, :title, :alias, :summary, :body, :first_class_price, :business_class_price, :capital_city)";
            Yii::$app->db->createCommand($sql_item)
                ->bindValue(':id', $param->country_id)
                ->bindValue(':description', $param->seo->description)
                ->bindValue(':keywords', $param->seo->keywords)
                ->bindValue(':continent_id', $continent_id)
                ->bindValue(':name', $param->name)
                ->bindValue(':title', $param->title)
                ->bindValue(':alias', $param->alias)
                ->bindValue(':summary', $param->summary)
                ->bindValue(':body', $param->body)
                ->bindValue(':first_class_price', $param->first_class_price)
                ->bindValue(':business_class_price', $param->business_class_price)
                ->bindValue(':capital_city', $capital_city)
                ->execute();

            foreach($param->images->image as $key_im => $image)
            {
                $sql = "INSERT INTO image (alias, content_type_id, content_id, content_field_id, queue, title)
                VALUES (:alias, :content_type_id, :content_id, :content_field_id, :queue, :title)";

                $title_im = '';
                if($image->title == 'null'){
                    $title_im = '';
                }
                else {
                    $title_im = $image->title;
                }

                Yii::$app->db->createCommand($sql)
                    ->bindValue(':content_id', $param->country_id)
                    ->bindValue(':content_type_id', AppConfig::Image_ContentType_Country)
                    ->bindValue(':content_field_id', AppConfig::Image_ContentField_Country)
                    ->bindValue(':title', $title_im)
                    ->bindValue(':alias', $image->alias)
                    ->bindValue(':queue', $image->queue)
                    ->execute();
            }
        }
        return $this->render('continent');
    }

    public function actionCity()
    {
        exit();
        $parametrs = simplexml_load_file ( Yii::$app->params['docRoot'] .'/web/design/file/city.xml' );

        foreach($parametrs->item as $key => $param)
        {
            $continent_id = null;
            if($param->continent_id == 0){
                $continent_id = null;
            }
            else {
                $continent_id = $param->continent_id;
            }
            $country_id = null;
            if($param->country_id == 0){
                $country_id = null;
            }
            else {
                $country_id = $param->country_id;
            }

            $sql_item = "INSERT INTO city (id, description, keywords, country_id, continent_id, name, title, alias,
                          summary, body, first_class_price, business_class_price , is_first_class_price_top, is_business_class_price_top)
                VALUES (:id, :description, :keywords, :country_id, :continent_id, :name, :title, :alias,
                        :summary, :body, :first_class_price, :business_class_price, :is_first_class_price_top, :is_business_class_price_top)";
            Yii::$app->db->createCommand($sql_item)
                ->bindValue(':id', $param->city_id)
                ->bindValue(':description', $param->seo->description)
                ->bindValue(':keywords', $param->seo->keywords)
                ->bindValue(':country_id', $country_id)
                ->bindValue(':continent_id', $continent_id)
                ->bindValue(':name', $param->name)
                ->bindValue(':title', $param->title)
                ->bindValue(':alias', $param->alias)
                ->bindValue(':summary', $param->summary)
                ->bindValue(':body', $param->body)
                ->bindValue(':first_class_price', $param->first_class_price)
                ->bindValue(':business_class_price', $param->business_class_price)
                ->bindValue(':is_first_class_price_top', $param->is_first_class_price_top)
                ->bindValue(':is_business_class_price_top', $param->is_business_class_price_top)
                ->execute();

            foreach($param->images->image as $key_im => $image)
            {
                $sql = "INSERT INTO image (alias, content_type_id, content_id, content_field_id, queue, title)
                VALUES (:alias, :content_type_id, :content_id, :content_field_id, :queue, :title)";

                $title_im = '';
                if($image->title == 'null'){
                    $title_im = '';
                }
                else {
                    $title_im = $image->title;
                }

                Yii::$app->db->createCommand($sql)
                    ->bindValue(':content_id', $param->city_id)
                    ->bindValue(':content_type_id', AppConfig::Image_ContentType_City)
                    ->bindValue(':content_field_id', AppConfig::Image_ContentField_City)
                    ->bindValue(':title', $title_im)
                    ->bindValue(':alias', $image->alias)
                    ->bindValue(':queue', $image->queue)
                    ->execute();
            }
        }

        return $this->render('continent');
    }

    public function actionAirline()
    {
        exit();
        $parametrs = simplexml_load_file ( Yii::$app->params['docRoot'] .'/web/design/file/airline.xml' );

        foreach($parametrs->item as $key => $param)
        {
            $sql_item = "INSERT INTO airline (id, description, keywords, name, title, alias,
                          summary, body)
                VALUES (:id, :description, :keywords, :name, :title, :alias,
                        :summary, :body)";
            Yii::$app->db->createCommand($sql_item)
                ->bindValue(':id', $param->airline_id)
                ->bindValue(':description', $param->seo->description)
                ->bindValue(':keywords', $param->seo->keywords)
                ->bindValue(':name', $param->name)
                ->bindValue(':title', $param->title)
                ->bindValue(':alias', $param->alias)
                ->bindValue(':summary', $param->summary)
                ->bindValue(':body', $param->body)
                ->execute();

            foreach($param->images->image as $key_im => $image)
            {
                $sql = "INSERT INTO image (alias, content_type_id, content_id, content_field_id, queue, title)
                VALUES (:alias, :content_type_id, :content_id, :content_field_id, :queue, :title)";

                $title_im = '';
                if($image->title == 'null'){
                    $title_im = '';
                }
                else {
                    $title_im = $image->title;
                }

                Yii::$app->db->createCommand($sql)
                    ->bindValue(':content_id', $param->airline_id)
                    ->bindValue(':content_type_id', AppConfig::Image_ContentType_Airline)
                    ->bindValue(':content_field_id', AppConfig::Image_ContentField_Airline)
                    ->bindValue(':title', $title_im)
                    ->bindValue(':alias', $image->alias)
                    ->bindValue(':queue', $image->queue)
                    ->execute();
            }
        }

        return $this->render('continent');
    }

    public function actionImage()
    {
        exit();
        ini_set('max_execution_time', 1000);
        ini_set('memory_limit', '-1');
        $thumb_directory =  Yii::$app->params['docRoot']."/web/public/images/thumbs/";    	//Папка для миниатюр
        $orig_directory = Yii::$app->params['docRoot']."/web/public/images/";    	//Папка для полноразмерных изображений
        /*print_r($thumb_directory);
        exit();*/
        $dir_handle = @opendir($orig_directory); 	//Открываем папку с полноразмерными изображениями
        //print_r($dir_handle);
        if ($dir_handle > 1) {                //Проверяем, что папка открыта и в ней есть файлы

            $allowed_types = array('jpg', 'jpeg', 'gif', 'png'); // Список обрабатываемых расширений
            $file_parts = array();
            $ext = '';
            $title = '';
            $i = 0;

            while ($file = @readdir($dir_handle)) {
                /* Пропускаем системные файлы: */
                if ($file == '.' || $file == '..') continue;
                print_r($file);
                //exit();

                $file_parts = explode('.', $file);        //Разделяем имя файла на части
                $ext = strtolower(array_pop($file_parts));

                /* Используем имя файла (без расширения) как заголовок изображения: */
                $title = implode('.', $file_parts);
                $title = htmlspecialchars($title);

                /* Если расширение входит в список обрабатываемых: */
                if (in_array($ext, $allowed_types)) {

                    /* Если вы планируете хранить изображения в базе данных, вставьте код для запроса здесь */

                    /* Далее следует код, который разбирался в уроке */
                    /* Выводим каждое изображение: */

                    /*$nw = 150;
                    $nh = 200;*/
                    $source = $orig_directory . $file;
                    $stype = explode(".", $source);
                    $stype = $stype[count($stype) - 1];
                    $dest = $thumb_directory . $file;

                    $size = getimagesize($source);

                    /*$nw = $size[0] / 2;
                    $nh = $size[1] / 2;*/


                    //print_r($size);
                    $w = $size[0];
                    $h = $size[1];

                    if ($h <= $w) {
                        if ($w >= 3000 && $h >= 3000) {
                            $nw = $size[0] / 10;
                            $nh = $size[1] / 10;
                        }
                        elseif ($w >= 3000 && $h >= 2000) {
                            $nw = $size[0] / 9;
                            $nh = $size[1] / 9;
                        }
                        elseif ($w >= 1400 && $h >= 1000) {
                            $nw = $size[0] / 3;
                            $nh = $size[1] / 3;
                        }
                        elseif ($w > 2000 && $h > 1500) {
                            $nw = $size[0] / 4;
                            $nh = $size[1] / 4;
                        }
                        else {
                            $nw = $size[0] / 2;
                            $nh = $size[1] / 2;
                        }

                    }
                    elseif ($h > $w) {
                        if ($w >= 3000 && $h >= 3000) {
                            $nw = $size[0] / 10;
                            $nh = $size[1] / 10;
                        }
                        elseif ($w >= 2000 && $h >= 3000) {
                            $nw = $size[0] / 9;
                            $nh = $size[1] / 9;
                        }
                        elseif ($w >= 1400 && $h >= 1000) {
                            $nw = $size[0] / 3;
                            $nh = $size[1] / 3;
                        }
                        elseif ($w > 2000 && $h > 1500) {
                            $nw = $size[0] / 4;
                            $nh = $size[1] / 4;
                        }
                        else {
                            $nw = $size[0] / 2;
                            $nh = $size[1] / 2;
                        }
                    }
                    elseif ($w <= 300) {
                        $nw = $size[0];
                        $nh = $size[1];
                    } else {
                        $nw = 150;
                        $nh = 200;
                    }


                    switch ($stype) {
                        case 'jpe':
                        case 'jpeg':
                        case 'JPG':
                        case 'jpg':
                            $simg = imagecreatefromjpeg($source);
                            break;
                        case 'gif':
                            $simg = imagecreatefromgif($source);
                            break;
                        case 'PNG':
                        case 'png':
                            $simg = imagecreatefrompng($source);
                            break;
                    }


                    $dimg = imagecreatetruecolor($nw, $nh);
                    $black = imagecolorallocate($dimg, 0, 0, 0);

                    if ($stype == "gif" or $stype == "png" or $stype == 'PNG') {
                        imagecolortransparent($dimg, imagecolorallocatealpha($dimg, 0, 0, 0, 127));
                        imagealphablending($dimg, false);
                        imagesavealpha($dimg, true);
                    }

                    $wm = $w / $nw;
                    $hm = $h / $nh;
                    $h_height = $nh / 2;
                    $w_height = $nw / 2;

                    if ($w > $h) {
                        $adjusted_width = $w / $hm;
                        $half_width = $adjusted_width / 2;
                        $int_width = $half_width - $w_height;
                        imagecopyresampled($dimg, $simg, -$int_width, 0, 0, 0, $adjusted_width, $nh, $w, $h);
                    } elseif (($w < $h) || ($w == $h)) {
                        $adjusted_height = $h / $wm;
                        $half_height = $adjusted_height / 2;
                        $int_height = $half_height - $h_height;

                        imagecopyresampled($dimg, $simg, 0, -$int_height, 0, 0, $nw, $adjusted_height, $w, $h);
                    } else {
                        imagecopyresampled($dimg, $simg, 0, 0, 0, 0, $nw, $nh, $w, $h);
                    }
                    switch ($stype) {
                        case 'jpe':
                        case 'jpeg':
                        case 'JPG':
                        case 'jpg':
                            imagejpeg($dimg, $dest, 100);
                            break;
                        case 'gif':
                            imagegif($dimg, $dest);
                            break;
                        case 'PNG':
                        case 'png':
                            imagepng($dimg, $dest);
                            break;
                    }
                    //imagejpeg($dimg,$dest,100);
                }

                /*$i = $i + 1;
                if ($i == 4) {
                    break;
                }*/
            }

            /* Закрываем папку */
            @closedir($dir_handle);

            return $this->render('continent');
        }
    }
}