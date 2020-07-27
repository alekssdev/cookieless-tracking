<html>
    <head>
        <title>Cookieless - POC</title>
        <!-- File used to set clientID Javascript var to a generated UUID -->
        <script type="text/javascript" src="getclientID.php"></script>
    </head>
    <body>
        <div>Hello, your generated visitor ID is : <script>document.write(clientID)</script></div><br/>
        <div>This ID has been generated regarding RFC 4122, a specification which defines a Uniform Resource Name namespace for UUIDs (Universally Unique IDentifier), particularly used by Google Analytics with its client ID.</div>
        <div>The only way to reset it is to remove cache from your navigator (at least for this website), removing cookies will do nothing.</div>
        <div>"Javascript file" header directives cannot be handled on client side, it needs network configuration to work.</div>
        <div>File may be served on website side or as a cloud file provided by tier (ekino, partner).</div>

        <!-- Google Analytics -->
        <script>
        //Base snippet of Google Analytics (analytics.js)
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        //Create GA tracker, specifying no storage (cookie) and the generated UUID
        ga('create', {
            trackingId: 'UA-1234567-8',
            clientId: clientID,
            storage: 'none'
        });

        //Send a pageview to control hit sending with unique and persistent client ID (cid parameter)
        ga('send', 'pageview');
        
        //To have more control on session creation on returning visitors, new "server session" may be specified with the sessionControl field
        //ga('send', 'pageview', { 'sessionControl': 'start' });//'end' value is not required (automatically deducted by Google Analytics)

        </script>
        <!-- End Google Analytics -->
    </body>
</html>