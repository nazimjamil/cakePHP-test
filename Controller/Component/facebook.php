<?php App::import ('Vendor', 'fb/facebook');

    class FacebookComponent extends Component {
        var $components = array('Cookie');
        public $facebook;

        function initialize(&$controller, $settings = array()) {

            global $signed_request;

            $facebook = new Facebook(array(
                'appId'  => Configure::read('fbconfig.id'),
                'secret' => Configure::read('fbconfig.secret'),
                'cookie' => true,
            ));


            $access_token = $facebook -> getAccessToken();

            if (isset($_REQUEST['signed_request'])) {
                // faster
                $signed_request = $_REQUEST['signed_request'];
            } else {
                // backup via API
                $signed_request = $facebook -> getSignedRequest();
            }

            $this -> facebook = $facebook;

        }

        function getLike() {

            global $signed_request;

            if (!empty($signed_request)) {
                list($sig, $payload) = explode('.', $signed_request, 2);
                $data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);
            }

            if (empty($data['page']['liked'])) {
                $like = false;
            } else {
                $like = true;
            }

            return $like;
        }

        //called after Controller::beforeFilter()
		function startup(&$controller) {
		}

    }