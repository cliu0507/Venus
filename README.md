WebTestApplication + Backend Server
==================
Backend Infrastructure:  Apache2 + PHP(Kohana) + MySQL (Gallery3)
WebTestApplication : Jquery Mobile + Apache Cordova Framework

For faster development, WebTestApplication is the Web Browser Test Version for Venus/My Fashion.
It doesn't need emulate mobilement emulator, and just show pages in Chrome/Safari/Firework
(Some Jquery Mobile functions are enabled because it is not the real mobile environment)
Real Mobileclient is in the gallery3 directory

Note: Chrome Browser may not Allow Google Chrome to use XMLHttpRequest to load a URL from a local file

Solution:
cd chrome directory firstly
startup chrome with --disable-web-security
On Windows:
chrome.exe --disable-web-security
On Mac:
open /Applications/Google\ Chrome.app/ --args --disable-web-security


If need to transfer back to MobileClient Version, 
Change code:

Index.html
<script type="text/javascript">           
           app.initialize();      
 </script>

Disable some part of code in index.js

$(document).ready(function()
{       console.log(document);
        $.mobile.changePage("#albumPage");
        console.log("DeviceReady and Change to albumPage");
        $("#gotologin").on("click" , function()
        {               
          $.mobile.changePage("#loginPage");
          console.log("bind button to loginPage");
         });
         
         $("#logout").on("click",function()
        {
            clearhtmlDom();
            $.mobile.changePage("#loginPage");
        });
        $("#quit").on("click",function(){
            navigator.app.exitApp();
        });
        $("#loginForm").on("submit", handleLogin);

});


