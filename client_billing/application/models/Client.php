<?php 
    class Client extends CI_Model {
        /* Fetching data from database and returning the result to be fetch by the controller */
        public function display() {
            $query = "SELECT DATE_FORMAT(billing.charged_datetime, '%M') AS month,
                            DATE_FORMAT(billing.charged_datetime, '%Y') AS year,
                            SUM(billing.amount) as total_cost
                            FROM billing
                            WHERE DATE_FORMAT(billing.charged_datetime, '%Y') = '2011'
                            GROUP BY MONTH(billing.charged_datetime)";
            $result = $this->db->query($query)->result_array();
            return $result;
        }
    }
?>