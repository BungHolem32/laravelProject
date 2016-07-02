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

        $userAndEmail = createUserDateIdentification($this->email);

        /*prepare the variable for the */
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $key = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");

        if (!empty($userAndEmail)) {


            mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $userAndEmail, MCRYPT_MODE_CBC, $iv);

            $isTokenEncrypted = EncryptBase64($userAndEmail);
            $isTokenDycrpted = DecryptBase64($isTokenEncrypted);

            dd($isTokenEncrypted);
        }
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

        /**/
        if ($isUpdated) {

            if (!empty($isUpdated)) {
                $this->sendResetPasswordEmailToUser();
            }

            return $isUpdated;
        }
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
        $message = $this->messageCreation();


        /*MASSAGE CLASS*/
        $message = \Swift_Message::newInstance('wonderful subject')
            ->setSubject('Password Reset - Do Not Replay')
            ->setFrom('test@gmail.com', 'Test Message')
            ->setTo('ilanvac@gmail.com', 'Ilan Vachtel')
            ->setBody($message, 'text/html');


        /*SEND THE MAIL */
        $isSent = $mailer->send($message);

        if ($isSent) {

        }
    }


    /**
     * @return string
     */
    private function messageCreation()
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