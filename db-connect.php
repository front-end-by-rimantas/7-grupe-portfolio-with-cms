<?php

include 'config.php';

// Main class for connecting with database

if(!class_exists('MMdb')){
	class MMdb {
        public function connect() {
            global $LOCALHOST;
            if ( $LOCALHOST ) {
                $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET;
                $opt = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ];
                $pdo = new PDO($dsn, DB_USER, DB_PASS, $opt);
            } else {
                $dsn = "mysql:host=".DB_HOST_LIVE.";dbname=".DB_NAME_LIVE.";charset=".DB_CHARSET;
                $opt = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ];
                $pdo = new PDO($dsn, DB_USER_LIVE, DB_PASS_LIVE, $opt);
            }
            return $pdo;
        }


        public function clean( $value ) {
            return $value;
        }


        public function getSectionInfo( $section_name ) {
            // $data = [
            //     'section_name' => $section_name
            // ];
            $sql = "SELECT * FROM ".$section_name;

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(  );
            $results = $stmt->fetchAll();

            return $results;
        }

        /*
        TOLIAU SKAITYTI NEREIKIA - pavyzdinis kodas ONLY
        */


        /**
		 * Create a secure hash
		 *
		 * Creates a secure copy of the user password for storage
		 * in the database.
		 *
		 * @param string $password The user's created password
		 * @param string $nonce A user-specific NONCE
		 * @return string $secureHash The hashed password
		 */
		public function hash_password( $password, $nonce ) {
            global $ERRORS;
            checkFormData( 'hash_password', [$password, $nonce] );
            if ( sizeof($ERRORS) > 0 ) {
                return ERRORS();
            }
            $secureHash = hash_hmac('sha512', $password . $nonce, SITE_KEY);
            if ( sizeof($ERRORS) > 0 ) {
                return ERRORS();
            }
            return $secureHash;
        }

        

        public function addSchool( $post_data ) {
            global $ERRORS;
            checkFormData( 'addSchool', [$post_data] );
            if ( sizeof($ERRORS) > 0 ) {
                return ERRORS();
            }
            $generated_school_url = generate_URL_section( $post_data['school-name'] );
            if ( $generated_school_url === false ) {
                return (object)[
                    'success' => 'FAIL',
                    'msg' => 'Please enter correct school name'
                ];
            }
            $school_url = $this->uniqueURLbyTable( 'schools', 'url', $generated_school_url );
            $school_status = 'draft';
            if ( $post_data['school-active'] === '1' ) {
                $school_status = 'active';
            }
            $data = [
                'name' => $post_data['school-name'],
                'url' => $school_url,
                'registration_code' => $post_data['school-registration-code'],
                'contact_email' => emailAddressEncode($post_data['school-contact-email']),
                'contact_phone' => $post_data['school-contact-phone'],
                'website' => $post_data['school-website'],
                'country' => $post_data['school-country'],
                'address' => $post_data['school-address'],
                'status' => $school_status
            ];

            $sql = "INSERT INTO schools (name, url, registration_code, contact_email, contact_phone, website, country, address, status)
                    VALUES (:name, :url, :registration_code, :contact_email, :contact_phone, :website, :country, :address, :status)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute($data);

            if ( $post_data['director-user-id'] !== '' ) {
                $school_id = $this->getSchool( $data['url'] )['id'];
                $this->updateSchoolDirectorIfNeeded( $school_id, (int)$post_data['director-user-id'] );
            }

            if ( sizeof($ERRORS) > 0 ) {
                return ERRORS();
            }
            return (object)[
                'success' => 'SUCCESS',
                'take_action' => 'redirect',
                'url' => URL( 'schools' )
            ];
        }

        public function updateSchool( $post_data, $post_target ) {
            global $ERRORS;
            checkFormData( 'updateSchool', [$post_data, $post_target] );
            if ( sizeof($ERRORS) > 0 ) {
                return ERRORS();
            }
            $generated_school_url = generate_URL_section( $post_data['school-name'] );
            if ( $generated_school_url === false ) {
                return (object)[
                    'success' => 'FAIL',
                    'msg' => 'Please enter correct data about the school'
                ];
            }
            $school_url = $this->uniqueURLbyTable( 'schools', 'url', $generated_school_url );
            $school_status = 'draft';
            if ( $post_data['school-active'] === '1' ) {
                $school_status = 'active';
            }
            $data = [
                'url_target' => $post_target,
                'name' => $post_data['school-name'],
                'url' => $school_url,
                'registration_code' => $post_data['school-registration-code'],
                'contact_email' => emailAddressEncode($post_data['school-contact-email']),
                'contact_phone' => $post_data['school-contact-phone'],
                'website' => $post_data['school-website'],
                'country' => $post_data['school-country'],
                'address' => $post_data['school-address'],
                'status' => $school_status
            ];
            $sql = "UPDATE schools SET name=:name, url=:url, registration_code=:registration_code,
                    contact_email=:contact_email, contact_phone=:contact_phone, website=:website,
                    country=:country, address=:address, status=:status WHERE url=:url_target";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute($data);

            $school_id = $this->getSchool( $data['url'] )['id'];
            $this->updateSchoolDirectorIfNeeded( $school_id, (int)$post_data['director-user-id'] );

            if ( sizeof($ERRORS) > 0 ) {
                return ERRORS();
            }

            return (object)[
                'success' => 'SUCCESS',
                'take_action' => 'redirect',
                'url' => URL( 'schools' )
            ];
        }
	}
}

//Instantiate our database class
$DB = new MMdb;

?>