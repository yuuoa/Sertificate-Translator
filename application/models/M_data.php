<?php
    class M_data extends CI_Model
    {
        function jurGelar($jurusan)
        {
            switch($jurusan)
            {
                case "TEKNIK INFORMATIKA":
                case "TEKNIK ELEKTRO":
                case "AGROTEKNOLOGI": return "ST";
                case "MATEMATIKA":
                case "FISIKA":
                case "KIMIA":
                case "BIOLOGI": return "S.Si";
            }
        }
    }