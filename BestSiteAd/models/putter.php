<?php
// Jamie Tahirkheli - 006547398
// Zohaib Khan - 007673133
// CS 174

class data_putter extends connector
{
    function __construct()
    {
        parent::__construct();

    }

    function in_query($query)
    {
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        mysqli_query($this->con, $query);

    }


    function add_click($id)
    {
        global $table_name;
        $puller = new data_puller();
        $inc = $puller->get_clicks($id);
        $inc++;
        $query = "UPDATE $table_name SET CLICKS=$inc WHERE ID=$id";
        $this->in_query($query);
    }

    function upload_ad($data)
    {
        global $table_name;
        $title = $data["title"];
        $URL = $data["URL"];
        $desc = $data["desc"];
        $query = "INSERT INTO $table_name (TITLE, URL, DSCR, CLICKS) VALUES('$title', '$URL', '$desc', 0)";
        $this->in_query($query);
    }

    function add_vulnerable($query, $id)
    {
        $puller = new data_puller();
        $inc = $puller->get_clicks($id);
        $inc++;
        //$query will come in as "UPDATE $table_name SET CLICKS="
        $query .= "$inc WHERE ID=$id";
        echo $query;
        $this->in_query($query);

    }

}

?>
