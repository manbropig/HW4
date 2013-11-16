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


<body onload="requestAd()">

<div>
    Story number 1
    <p>
    blah blah blah<br/>blah blah blah<br/>
    blah blah blah<br/>blah blah blah<br/>
    blah blah blah<br/>blah blah blah<br/>
    end of story.
    </p>
</div>

<div id="Advertisement" style="background-color:#EDE275">
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


<div>
    Story number 2
    <p>
        blah blah blah<br/>blah blah blah<br/>
        blah blah blah<br/>blah blah blah<br/>
        blah blah blah<br/>blah blah blah<br/>
        end of story.
    </p>
</div>

<div>
    Story number 3
    <p>
        blah blah blah<br/>blah blah blah<br/>
        blah blah blah<br/>blah blah blah<br/>
        blah blah blah<br/>blah blah blah<br/>
        end of story.
    </p>
</div>
</body>


</html>
