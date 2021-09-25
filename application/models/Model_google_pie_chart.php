<?php

class Model_google_pie_chart extends CI_Model
{
    public function get_data_pmks()
    {
        $query = "SELECT COUNT(*) AS total, pmks_categories.name AS hasil_pmks  FROM pengenalan_tempat JOIN pmks_categories ON pengenalan_tempat.hasil_pmks = pmks_categories.id
                    GROUP BY hasil_pmks ORDER BY hasil_pmks DESC";

        $result = $this->db->query($query)->result_array();
        return $result;
    }
}
