<?php

class HomeController extends AppController {

    public $name = 'Home';
    public $components = array('Session', 'Cookie', 'RequestHandler', 'Facebook');
    public $helpers = array('Html', 'Form', 'Js');

    /**
     * Displays the registration form
     *
     * @param string $progress (progress 1 means the user has successfully registered)
     */
    public function index($progress = null) {

        // The form has been submitted so validate and save the data
        if ($this->request->data)
        {
            $this->_saveData();
        }

        $this->_displayForm($progress);
    }

    public function tab() {
        $this->layout = 'default';
    }

    /**
     * Displays the registration form
     *
     * @param string $progress (progress 1 means the user has successfully registered)
     */
    protected function _displayForm($progress = null) {
        $this->layout = 'default';

        $this->set('title_for_layout', 'Johnny 5, is ALIVE.');

        // Display the like box only if the user did not like the page yet
        $like = $this->Facebook->getLike();

        $buttonColour = ($progress === '1') ? 'grey' : 'blue';
        $buttonCopy = ($progress === '1') ? 'Thank you for your input' : 'Need input';

        if (isset($_COOKIE['c4lReg']) && $progress === '1')
        {
            $user = $_COOKIE['c4lReg'];
            $user = explode(',', $user);
            $this->Set('oldName', $user[0]);
            $this->Set('oldEmail', $user[1]);
            $this->Set('btnStatus', "disabled='disabled'");
        }

        $this->Set(array(
            'buttonColour' => $buttonColour,
            'buttonCopy' => $buttonCopy,
            'like' => $like,
            'header1' => 'Do you want to be a pepper too?',
            'copyDeck' => 'Number 5 of a group of experimental robots in a lab is electrocuted, suddenly becomes intelligent, and escapes.'
        ));
    }

    /**
     * Validates and save the data submitted by the user
     */
    protected function _saveData() {

        // Get the submitted values
        $userName = $this->request->data('name');
        $userEmail = $this->request->data('email');
        $tnc = $this->request->data('tnc');

        $this->Home->set(array(
            'name' => $userName,
            'email' => $userEmail,
            'tnc' => $tnc
        ));

        // Validation fails, set and display the error messages
        if (!$this->Home->Save())
        {
            $errors = $this->Home->validationErrors;
            $nameError = empty($errors['name'][0]) ? '' : $errors['name'][0];
            $emailError = empty($errors['email'][0]) ? '' : $errors['email'][0];
            $tncError = empty($errors['tnc'][0]) ? '' : $errors['tnc'][0];

            $this->Set(array(
                'nameError' => $nameError,
                'emailError' => $emailError,
                'tncError' => $tncError,
                'displayErrorMessages' => true,
                'oldName' => $userName,
                'oldEmail' => $userEmail
            ));
        }
        // Validation successful, data is saved
        else
        {
            setcookie('c4lReg', $userName . ',' . $userEmail, time() + Configure::read('cookie.time'), Configure::read('cookie.path'), Configure::read('cookie.domain'));

            $this->redirect(array('controller' => 'home', 'action' => 'index', 1));
        }
    }

}