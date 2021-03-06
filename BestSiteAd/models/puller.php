<?php
// Jamie Tahirkheli - 006547398
// Zohaib Khan - 007673133
// CS 174

error_reporting(-1);
class data_puller extends connector
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $query
     * Executes a query that yields results
     */
    function out_query($query)
    {
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        if($results = mysqli_query($this->con, $query))
        {
            $res_str = "";

            $num_rows = mysqli_num_rows($results);

            for($i = 0; $i < $num_rows; $i++)
            {
                $row = mysqli_fetch_array($results);
                $res_str = $res_str . $row["POEM"] . "\t" .
                    $row["TITLE"] .$row["AUTHOR"] . "<br/>";
            }
            return $res_str;
        }
        else
        {
            echo "query failed to execute<br/>";
        }
    }


    /**
     * @return array
     * gets advertisement name and clicks
     */
    function click_query()
    {

        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $clicks_query = "SELECT ID, TITLE, CLICKS FROM ADS WHERE ID > 0";
        if($results = mysqli_query($this->con, $clicks_query))
        {
            $num_rows = mysqli_num_rows($results);
            $res = array(array());
            for($i = 0; $i < $num_rows; $i++)
            {
                $row = mysqli_fetch_array($results);
                $res[0][$i] = $row['TITLE'] ."\t". $row['CLICKS'];
                $res[1][$i] = $row['ID'];
            }

            return $res;
        }
        else
        {
            echo "query failed to execute<br/>";
        }
    }

    /**
     * @param $con -> the db connection
     * This function pulls a random ad from the ads DB
     */
    function get_rand_ad()
    {
        global $table_name;
        $total_rows = parent::get_rows($table_name);

        $index = rand(1, $total_rows-1);
        //THIS QUERY SHOULD ONLY RETURN ONE ROW
        $rand_query = "SELECT * FROM $table_name WHERE ID = $index";
        if($results = mysqli_query($this->con, $rand_query))
        {
            $row = mysqli_fetch_array($results);
            $id = $row["ID"];
            $title = $row['TITLE'];
            $url = $row['URL'];
            $desc = $row['DSCR'];
            $clicks = $row['CLICKS'];
            $details = ["id"=>$id, "title" => $title, "url" => $url,
                "desc" => $desc, "clicks" => $clicks];
        }
        else
        {
            $details = ["No ad to show"];
        }

        return $details;
    }

    /**
     * This function pulls a specific ad from the ads DB
     * @param $con -> the db connection
     */
    function get_ad($id)
    {
        global $table_name;
        $rand_query = "SELECT * FROM $table_name WHERE ID = $id";
        if($results = mysqli_query($this->con, $rand_query))
        {
            $row = mysqli_fetch_array($results);
            $id = $row["ID"];
            $title = $row['TITLE'];
            $url = $row['URL'];
            $desc = $row['DSCR'];
            $clicks = $row['CLICKS'];
            $details = ["id"=>$id, "title" => $title, "url" => $url,
                "desc" => $desc, "clicks" => $clicks];
        }
        else
        {
            $details = ["No ad to show"];
        }

        return $details;
    }
    /**
     * Gets # of clicks a specific ad has
     * @param $id
     * @return array
     * gets a specific poem's details
     */
    function get_clicks($id)
    {
        global $table_name;
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $query = "SELECT CLICKS FROM $table_name WHERE ID = \"$id\"";

        if($results = mysqli_query($this->con, $query))
        {
            $row = mysqli_fetch_array($results);
            $clicks = $row['CLICKS'];
        }
        return $clicks;
    }
}

?>
