<!--
Jamie Tahirkheli
006547398
CS 174
-->


<!DOCTYPE html  PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Site Test</title>
</head>

<script type="text/javascript">

    function requestAd()
    {
        //alert("page loaded");
        request = new XMLHttpRequest();
        //request.setRequestHeader("adName","value");

        var self = this;

        request.onreadystatechange = function()//handler function that should be run
        {
            if (request.readyState==4 )//will change based on response
            {
                document.getElementById("Advertisement").innerHTML = request.responseText;
            }
        }
        //need to include "controllers/" because actually being called from index.php
        request.open("GET","controllers/proxy.php?ad=random", false);
        request.send(null);
    }
</script>
<body onload="requestAd()">


<div id="Advertisement">
    <?php
    /*
     * 10 news articles appearing in different order each time it loads.
     *
     * In the body tag there is an onload event (onload="requestAd()")
     * After 1st news article there is a blank div tag which will be filled in with an ad
     *
     *      this onload event calls a js function which makes a request to
     *      a proxy php script on SiteTest
     *
     *          This proxy php site calls webservice on BestSiteAd
     *          and gets an ad back
     *          return this ad to proxy that called it
     *
     *      proxy returns it to the js function that called it
     *
     * js function then receives the ad and puts it in the empty div tag
     */

    ?>
</div>
</body>


</html>
