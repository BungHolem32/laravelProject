<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 23/06/16
 * Time: 22:59
 */

namespace App\Http\Models\DataMapper;

use App\Http\Models\BaseModel;


/**
 * @property mixed email
 */
class ForgotPasswordModel extends BaseModel
{
    /**
     * @param $email
     * @return bool|null
     */
    public function CheckIfThere($email)
    {
        $this->email = $email;

        $isEmailExist = null;
        $isEmailExist = $this->param->isParamExist('laravelCrmUser', 'email', $email);
        return $isEmailExist;
    }

    /**
     * @return null|string
     */
    public function createResetToken()
    {
        $isTokenCreated = CreateRandomToken();
        return $isTokenCreated;
    }

    /**
     * @param $email
     * @param $token
     * @return \Doctrine\DBAL\Driver\Statement|int|null
     */
    public function updateRandomPassword($email, $token)
    {
        $isUpdated = null;
        $isUpdated = $this->DBservice->connect->createQueryBuilder()
            ->update('laravelCrmUser', 'users')
            ->set('tokenPass', '?')
            ->where('email= ?')
            ->setParameters(
                array(
                    0 => $token,
                    1 => $email
                )
            )->execute();

        if ($isUpdated) {

            $this->sendResetPasswordEmailToUser();
        }

        return $isUpdated;
    }

    private function sendResetPasswordEmailToUser()
    {

        /*TRANSPORT CONFIGURATIONS*/
        $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
            ->setUsername('ilanvac@gmail.com')
            ->setPassword('ilanvac271282');

        /*MAILER CLASS*/
        $mailer = \Swift_Mailer::newInstance($transport);

        /*CREATE MESSAGE*/
        $message = $this->createMessage();


        /*MASSAGE CLASS*/
        $message = \Swift_Message::newInstance('wonderful subject')
            ->setSubject('Password Reset - Do Not Replay')
            ->setFrom('test@gmail.com', 'Test Message')
            ->setTo('ilanvac@gmail.com', 'Ilan Vachtel')
            ->setBody($message, 'text/html');


        /*SEND THE MAIL */
        $isSent = $mailer->send($message);
        
        if($isSent){
            
        }
        
    }


    /**
     * @return string
     */
    private function MessageCreation()
    {
        $user = $this->param->getTableBy('laravelCrmUser', 'email', $this->email);

        /*MESSAGE BUILD*/
        $message = '';
        $message .= '<h2> hi ' . $user[0]['fName'] . ' ' . $user[0]['lName'] . ' whats up </h2>';
        $message .= '<p>please click on the link to reset your password</p>';
        $message .= '<a href="http://localhost:8000/cms/resetPassword/' . $user[0]['tokenPass'] . '">Reset Password</a>';

        return $message;
    }
}
