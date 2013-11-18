Hello Grader,

Please run HW4/BestSiteAd/Config/create.php before attempting to run the apps.

Please place the unzipped HW4 file in your htdocs directory inside XAMPP.
If you are using XAMPP I don't think you'd need to change anything. Just run the XAMPP manager and start all. 

Then navigate to localhost/HW4/.

Please use either Firefox or Safari so that the web service will function properly.

If you are not using XAMPP please change the path for $longURL to the directory you put the folder (HW4) in.

Then navigate to localhost/HW4/siteTest and localhost/HW4/bestSitead in your browser.

TO CHANGE BETWEEN XML/JSON:
open HW4/SiteTest/config/config.php
comment out the format that you don’t want and uncomment the format you do want.
Then run the app.

TO SEE INCREMENT-VULNERABLE IN ACTION:
paste
http://localhost/hw4/sitetest/controllers/proxy.php?method=increment-vulnerable&id=2&q=UPDATE+ADS+SET+DSCR+%3D+%22THIS+IS+A+HORRIBLE+PRODUCT%22%2C+CLICKS+%3D+
into the address bar
Then refresh sitetest's landing page
You will see that the advertisement is not always present.
You can change all of the ID's to super high numbers and not have
to see any advertisements

This is basically passing a query through a url that a normal user would never actually
see because it is called between redirects, but if an attacker just pastes this into
his/her address bar, they could change the id’s to high numbers that our code
won’t account for.

Thanks,
Jamie and Zohaib

Jamie Tahirkheli - 006547398
Zohaib Khan - 007673133
CS 174