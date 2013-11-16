    /*
     Using Javascript you should verify the line lengths of
     title, author, and each line of the limerick before sending any
     data to the server. It should also check the number of lines in the poem.
     Accepted poem information should be stored in a database.
     */
    function validateForm()
    {
        var adForm = document.forms["adForm"];
        var title = adForm["title"].value;
        var URL = adForm["URL"].value;
        var desc = adForm["desc"].value;

        var ret = true;

        if (title==null || title=="" || title.length > 30)
        {
            alert("Title must be between 1 and 30 characters");
            ret = false;
        }

        if (URL==null || URL=="" || URL.length > 50)
        {
            {
                alert("URL must be between 1 and 50 characters");
                ret = false;
            }
        }

        if(desc==null || desc=="")
        {
            alert("Description can not be blank");
            ret = false;
        }

        return ret;
    }

