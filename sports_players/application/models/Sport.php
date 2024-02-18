<?php 
    class Sport extends CI_Model {
        /* This method will display all the data from users table
            and return result to be fetch by the controller
        */
        public function display_all() {
            $query = "SELECT users.*, GROUP_CONCAT(sports.sport_name) AS sports FROM users
                        LEFT JOIN user_sports ON users.id = user_sports.user_id
                        LEFT JOIN sports ON user_sports.sport_id = sports.id
                        GROUP BY users.id";

            $result = $this->db->query($query)->result_array();
            return $result;
        }  
        /* This method will apply filtration in query 
            and return result to be fetch by the controller
        */
        public function search($name, $genders, $sports) {
            $genderCondition = '';
            if (!empty($genders)) {
                $genderCondition = "AND users.gender IN ('" . implode("', '", $genders) . "')";
            }
        
            $sportCondition = '';
            if (!empty($sports)) {
                $sportCondition = "AND sports.sport_name IN ('" . implode("', '", $sports) . "')";
            }
        
            $query = "SELECT users.*, GROUP_CONCAT(sports.sport_name) AS sports FROM users
                      LEFT JOIN user_sports ON users.id = user_sports.user_id
                      LEFT JOIN sports ON user_sports.sport_id = sports.id
                      WHERE users.name LIKE '%{$name}%'
                        {$genderCondition}
                        {$sportCondition}
                      GROUP BY users.id";
            $result = $this->db->query($query)->result_array();
            return $result;
        }     
    }
?>