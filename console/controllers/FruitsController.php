<?php
// Console script to fetch fruits from https://fruityvice.com/ API and save them into local DB

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\helpers\Json;
use app\models\Fruit;
use app\models\Nutrition;

use yii\base\InvalidConfigException;
use yii\mail\MailerInterface;
use yii\helpers\Html;
use yii\swiftmailer\Mailer;


class FruitsController extends Controller
{
    public function actionFetch()
    {
        // Fetch fruits from API
        $url = 'https://fruityvice.com/api/fruit/all';
        $response = file_get_contents($url);
        $fruits = Json::decode($response);
        // Save fruits into local DB
        foreach ($fruits as $fruitData) {
            $fruit = new Fruit();
            $fruit->name = $fruitData['name'];
            $fruit->family = $fruitData['family'];
            $fruit->order = $fruitData['order'];
            $fruit->genus = $fruitData['genus'];
            $fruit->fruit_iid = $fruitData['id'];

            if ($fruit->validate()) {
                $fruit->save();
            } else {
                $this->stdout('Failed to save fruit: ' . print_r($fruit->errors, true) . PHP_EOL);
            }

            if(!empty($fruitData['nutritions'])){
                $nutrition = new Nutrition();
                $nutrition->calories = $fruitData['nutritions']['calories'];
                $nutrition->fat = $fruitData['nutritions']['fat'];
                $nutrition->sugar = $fruitData['nutritions']['sugar'];
                $nutrition->carbohydrates = $fruitData['nutritions']['carbohydrates'];
                $nutrition->protein = $fruitData['nutritions']['protein'];
                $nutrition->fruit_id = $fruit->id;

                if ($nutrition->validate()) {
                    $nutrition->save();
                } else {
                    $this->stdout('Failed to save fruit: ' . print_r($nutrition->errors, true) . PHP_EOL);
                }
            }
        }

        $this->sendEmail();
        // Display success message
        $this->stdout('Fruits fetched and saved successfully.' . PHP_EOL);
    }

    public function sendEmail()
    {
        // Retrieve the admin email address from the configuration
        $adminEmail = Yii::$app->params['adminEmail'];
        // Compose the email message
        $subject = 'New Contact Form Submission';
        $body = 'A new contact form submission has been received. Please check your admin dashboard for more details.';
        
        // Send the email
        try {
            echo $adminEmail ." \n";

            Yii::$app->mailer->compose()
                ->setTo($adminEmail)
                ->setSubject($subject)
                ->setHtmlBody($body)
                ->send();

           echo ('success, Email sent successfully to admin.'. " \n");

        } catch (InvalidConfigException $e) {
            echo ('error, Failed to send email to admin. ');
           echo $e->getMessage()." \n";
        }

    }
}
