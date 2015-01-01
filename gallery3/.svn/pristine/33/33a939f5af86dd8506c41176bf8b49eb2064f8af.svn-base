/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */
/*
$(document).ready(function()
{
       console.log(document);
        //$( "#launcherPage" ).replaceWith(""); // We need to remove "#launcherpage" and let albumPage to be the first data- role = "page"            
        $.mobile.changePage("#albumPage");//We can also remove this operation, because albumPage is the first page in DOM
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
        
        //$(".logout").on("click", clearhtmlDom);
        //When clicking Log out button, clear the img/popup in cache
});
*/

function formRemoteURL(argArray) {
    console.log("in formRemoteURL function");
    var urlPrefix = "http://192.168.56.101/gallery3/index.php/rest";
    var returnURL;
    
    switch(argArray) {
        case "item": //photos
            returnURL = urlPrefix + "/item/";
            break;
        case "tags": //tags
            returnURL = urlPrefix + "/tags";
            break;
        case "comments": //comments
            returnURL = urlPrefix + "/comments";
            break;
        case "login" : //login
            returnURL = urlPrefix;
            break;
        default:
            returnURL = null; 
    } 
    console.log("returnURL = " + returnURL); 
    return returnURL;
}

function checkPreAuth() {
    console.log("in checkPreAuth function");
    
    if(window.localStorage["mf_username"] !== undefined && window.localStorage["mf_password"] !== undefined) {
        var loginURL = formRemoteURL("login"); 
        var finalURL = loginURL;
        $.ajax({
        type:"post",    
        url: finalURL,
        crossDomain: true,
        dataType: 'Json',
        timeout:3000 ,
        //Set the longest wait time
        data: { "user" : u, "password" : p},
        //contentType: "application/json; charset=utf-8",
        success: function(res)
        {
        console.log(encodeURIComponent({ "user" : window.localStorage["mf_username"], 
            "password" : window.localStorage["mf_password"]}));
 
          alert('Sucessful Login!');                  
          console.log("status is " + res.status);
          console.log("API Key is " +res);
          console.log("success login!");
          $("#showuser").html(u);
          $("#showpassword").html(p);
          // Show username and password at MyAccount Panels         
         loadParentItem(res);
         //load item resource with id
          $("#loginSubmitButton", form).removeAttr("disabled", "disabled");

        },
         error: function(){
          alert("Error! Please Check the Connection With Servers");
        $("#loginSubmitButton",form).removeAttr("disabled" ,"disabled");
        }
      });
    } 
    else 
    {
        
        //navigator.notification.alert("You must enter a username and password", function() {});
        alert("Username and Password can't be empty!");
        console.log("dfw: login failed empty user or pass!");
        $("#loginSubmitButton",form).removeAttr("disabled" ,"disabled");
    }
    
    return false;

}

function clearhtmlDom()
{
    
    $(".albumInfo").empty(); 
    $(".album_photo").remove();
    /*
    $( ".image" ).remove();
    $("#searchpage").empty(); 
    //$("#searchfooter").remove();
    //$("#body").append("<div id= searchpage data-role= page >");
    $("#searchpage").append("<div data-role= header><h1>Search Page</h1><a href=#welcomeback class= ui-btn ui-icon-back ui-btn-icon-left>Back</a><a  href=#loginPage class=ui-btn ui-mini ui-icon-back ui-btn-icon-left>Log Out</a> </div>");
    //$("#searchpage").append("<h1>Search Page</h1><a href=#welcomeback class= ui-btn ui-icon-back ui-btn-icon-left>Back</a><a  href=#loginPage class=ui-btn ui-mini ui-icon-back ui-btn-icon-left>Log Out</a>");
    //$("#searchpage").append("</div>");
    $("#searchpage").append("<div id = searchpagepopup data-role= main class= ui-content><form class= ui-filterable> <input id= myFilter data-type= search placeholder = Search for names></form><ul id = searchlist data-role=listview data-filter=true data-input=#myFilter data-autodividers=false data-inset=true> </ul></div>");
    //$("#searchpage").append("<form class= ui-filterable>");
    //$("#searchpage").append("<input id= myFilter data-type= search placeholder = Search for names>");
    //$("#searchpage").append("</form>");
    //$("#searchpage").append("<ul id = searchlist data-role=listview data-filter=true data-input=#myFilter data-autodividers=false data-inset=true> </ul>");
    //$("#searchpage").append("</div>");
    $("#searchpage").append("<div id = searchfooter data-role = footer><h1>Welcome to MyFashion</h1></div>");
    //$("#searchpage").append("<h1>Welcome to MyFashion</h1>");
    //$("#searchpage").append("</div>");
    //$("#body").append("</div>");
    //$(".searchpopup").remove();
    //$(".ui-screen_hidden").remove();
    //$(".ui-popup-container").remove();
    */
}

function handleLogin() {
    console.log('cliu: in handleLogin function');
    $.mobile.allowCrossDomainPages = true;
    $.support.cors = true;
    var form = $("#loginForm");
    //disable the button so we can't resubmit while we wait
    $("#loginSubmitButton", form).attr("disabled", "disabled");
    var u = $("#username", form).val();
    var p = $("#password", form).val();
    console.log(u);
    console.log(p);
    if(u !== '' && p!== '') {
   
    var loginURL = formRemoteURL("login");
    //var finalURL = encodeURIComponent(loginURL); // we don't need to encode url
    var finalURL = loginURL;
    $.ajax({
    type:"post",    
    url: finalURL,
    crossDomain: true,
    dataType: 'Json',
    timeout:3000 ,
    //Set the longest wait time
    data: { "user" : u, "password" : p},
    //contentType: "application/json; charset=utf-8",
    success: function(res)
    {
        console.log(encodeURIComponent({ "user" : u, "password" : p}));
 
          alert('Sucessful Login!');         
          window.localStorage["mf_authToken"] = res;
          window.localStorage["mf_username"] = u;
          window.localStorage["mf_password"] = p;
          console.log("status is " + res.status);
          console.log("API Key is " +res);
          console.log("success login!");
          $("#showuser").html(u);
          $("#showpassword").html(p);
          // Show username and password at MyAccount Panels         
         loadParentItem(res);
         //load item resource with id
          $("#loginSubmitButton", form).removeAttr("disabled", "disabled");

    },
    error: function(){
        alert("Error! Please Check the Connection With Servers");
        $("#loginSubmitButton",form).removeAttr("disabled" ,"disabled");
    }
 });
    } 
    else 
    {
        
        //navigator.notification.alert("You must enter a username and password", function() {});
        alert("Username and Password can't be empty!");
        console.log("dfw: login failed empty user or pass!");
        $("#loginSubmitButton",form).removeAttr("disabled" ,"disabled");
    }
    
    return false;
}

function handleLogin_javascript() {
    console.log('cliu: in handleLogin function');
    $.mobile.allowCrossDomainPages = true;
    $.support.cors = true;
    var form = $("#loginForm");
    //disable the button so we can't resubmit while we wait
    $("#loginSubmitButton", form).attr("disabled", "disabled");
    var u = $("#username", form).val();
    var p = $("#password", form).val();
    console.log(u);
    console.log(p);
    if(u !== '' && p!== '') {
   
    var loginURL = formRemoteURL("login");
    //var finalURL = encodeURIComponent(loginURL); // we don't need to encode url
    var finalURL = loginURL;
    console.log(finalURL);
    var xml = new XMLHttpRequest();
    xml.onreadystatechange=function()
    {
        if (xml.readyState===4)
              {
                  alert("readyState is " + xml.readyState);
                  if(xml.status===200)
                  { 
                      alert('Sucessful Login!');
                      var response = xml.responseText;   
                      console.log(response);  
                      //var jsonresponse = JSON.parse(response);                   
                      //console.log(jsonresponse);                                    
                      window.localStorage["mf_username"] = u;
                      window.localStorage["mf_password"] = p;
                      //console.log("status is " + response.status);
                      console.log("API Key is " +response);
                      console.log("success login!");
                      $("#showuser").html(u);
                      $("#showpassword").html(p);
                       var id = "3";
                      loadItem(response,id);
                 
                      //$.mobile.changePage("#welcomeback");
                      //Change to WelcomePage
                  }
                  else
                  {
                      alert("status is " + xml.status);
                      console.log(xml.responseText);
                      alert("There is a problem in the request!");
                      
                      var form = $("#loginForm");         
                      $("#loginSubmitButton", form).removeAttr("disabled" ,"disabled");
                  }
              }  
   
    };
          xml.open("post",finalURL,false);
          
        //We are stuck because it is difficult to encode
          
          
          //xml.setRequestHeader("X-Gallery-Request-Method", "post");
          //xml.setRequestHeader("X-Gallery-Request-Key", res);
          //console.log("Set RequestHeader!");
          xml.send(JSON.stringify({"user":u,"password":p}));
          console.log("Send Request! ");
    
}
    else 
    {
        
        //navigator.notification.alert("You must enter a username and password", function() {});
        alert("Username and Password can't be empty!");
        console.log("dfw: login failed empty user or pass!");
        $("#loginSubmitButton",form).removeAttr("disabled" ,"disabled");
    }
    
    return false;
}

function loadParentItem(res){
          var xmlhttp = new XMLHttpRequest();
          var url = "http://192.168.56.101/gallery3/index.php/rest/item/1";               
          xmlhttp.onreadystatechange=function()
          {
              if (xmlhttp.readyState===4)
              {
                  if(xmlhttp.status===200)
                  { 
                      var response = xmlhttp.responseText;
                     //console.log(response);                
                      var jsonresponse = JSON.parse(response);         
                      //Change to JSON format             
                      console.log(jsonresponse); 
                      //console.log(jsonresponse.members);
                      //alert(response);
                      if(jsonresponse.members.length === 0)
                      {
                          alert("There is no ablum in database!");                         
                          $("#loginSubmitButton",form).removeAttr("disabled" ,"disabled");
                      }
                      else
                      {  
                          for(i = 0; i<jsonresponse.photos.length;i++)
                          {                           
                             directloadItem(jsonresponse.photos[i],i);
                          }
                          
                          var numGrid = Math.floor((jsonresponse.members.length)/2);
                          //console.log(numGrid);
                          for(k = 0; k<=numGrid;k++)
                          {                           
                              //$("#loadalbum").append("<div id= grid"+k+" class= ui-grid-a ui-responsive>");
                              directloadAlbum(jsonresponse.members,k);
                              //$("#loadalbum").append("</div>");
                          }
                          
                      }

                  }
                  else
                  {
                      alert("There is a problem in the request!");
                      
                      var form = $("#loginForm");         
                      $("#loginSubmitButton", form).attr("disabled", "disabled");
                  }
                      
              }       
          }; 
          xmlhttp.open("GET",url,true);
          xmlhttp.setRequestHeader("X-Gallery-Request-Method", "GET");
          xmlhttp.setRequestHeader("X-Gallery-Request-Key", res);
          console.log("Set RequestHeader!");
          xmlhttp.send();
          console.log("Send Request! ");
          $.mobile.changePage("#welcomeback");
          
}

function directloadAlbum(membersArray , i)
{  
       
        $("#loadalbum").append("<div id= grid"+i+" class= ui-grid-a ui-responsive>");
         createpage(membersArray[2*i].item_id,membersArray[2*i].title,membersArray[2*i].children);
         var gridid = "#grid"+i;
        $(gridid).append("<div class= ui-block-a><div class= albumcontainer border=2>\n\
 <a href=#album"+membersArray[2*i].item_id+"><img src="+membersArray[2*i].thumb_url_public+"alt= Loading></a> \n\
<p>Album Name: <strong>"+ membersArray[2*i].title +"</strong> </p>\n\
<p>Tag: <strong>"+ membersArray[2*i].tagsTable_name +"</strong> </p>\n\
<p>Owner:<strong>"+membersArray[2*i].usersTable_name+"</strong> </p>\n\
<p>Rating:<strong></strong>  </p></div>");
        /*$(gridid).append("<img src="+membersArray[2*i].thumb_url_public+" alt= Loading >");
        //$(gridid).append("<p>Album Name: <strong>"+ membersArray[2*i].title +"</strong> </p>");
        //$(gridid).append("<p>Tag: <strong>"+ membersArray[2*i].tagsTable_name +"</strong> </p>");
        //$(gridid).append("<p>Owner:<strong></strong>  </p>");
        //$(gridid).append("<p>Rating:<strong></strong>  </p>");
        //$(gridid).append("</div></div>");
        */
       createpage(membersArray[2*i+1].item_id,membersArray[2*i].title,membersArray[2*i+1].children);
       $(gridid).append("<div class= ui-block-b><div class= albumcontainer border=2>\n\
 <a href=#album"+membersArray[2*i+1].item_id+"><img src="+membersArray[2*i+1].thumb_url_public+"alt= Loading></a>\n\
<p>Album Name: <strong>"+ membersArray[2*i+1].title +"</strong> </p>\n\
<p>Tag: <strong>"+ membersArray[2*i+1].tagsTable_name +"</strong> </p>\n\
<p>Owner:<strong>"+membersArray[2*i+1].usersTable_name+"</strong>  </p>\n\
<p>Rating:<strong></strong>  </p></div>");
       
        /*
        $(gridid).append("<div class= ui-block-b><div class= albumcontainer>");
        $(gridid).append("<img src="+membersArray[2*i+1].thumb_url_public+" alt= Loading >");
        $(gridid).append("<p>Album Name: <strong>"+ membersArray[2*i+1].title +"</strong> </p>");
        $(gridid).append("<p>Tag: <strong>"+ membersArray[2*i+1].tagsTable_name +"</strong> </p>");
        $(gridid).append("<p>Owner:<strong></strong>  </p>");
        $(gridid).append("<p>Rating:<strong></strong>  </p>");
        //$(gridid).append("</div></div>");
        */
         $("#loadalbum").append("</div>");
}

function createpage(album_id,title,photoarray)
{
  if( window.location.hash === '#welcomeback')
  {  $('body').append("<div id=album"+ album_id +"  class=album_photo  data-role='page'>\n\
<div data-role= header data-position= fixed><h1><span><strong>AlbumShow</strong></span></h1>\n\
<a href=#welcomeback data-icon=back class='ui-btn ui-icon-back ui-btn-icon-left' >Back</a></div>\n\
<div data-role='content'><h2>Album Name:" + title + " <h2><br>\n\
<ul id=album"+ album_id +"_photos  data-role='listview'><li>Photos are listed below:</li></ul><br></div>\n\
</div>");
    var listviewid = "#album"+album_id+"_photos";
    for(i = 0; i< photoarray.length;i++)
    {
        $(listviewid).append("<li><img src= "+photoarray[i].thumb_url_public +" alt = LOADING... ></li>");
    }
    
    //window.location.hash = 'album'+album_id;
    //$.mobile.initializePage();
}
   
}


function directloadItem(imgobject , i )
{
    var imgsrc = imgobject.thumb_url_public;
    var imgname = imgobject.name;

    /* 
    //We don't load imgs in main page now!
    
    var imgObj = "#img"+i;
    $("#loadimg").append("<img class = image id = img"+ i + " alt= Loading...>");
    
    $(imgObj).attr("src", imgsrc);
    
    */
    $("#searchlist").append("<li class = searchlist ><a href= #Popup" + i+ " data-rel= popup class= ui-btn ui-btn-inline ui-corner-all>" + imgname + "</a></li>");
    $("#searchpagepopup").append("<div data-role= popup id=Popup" + i+ " class = searchpopup ui-content><p><img src="+ imgsrc +"></p></div>");
    
}

function loadItem(res, url,i){
      // Now we don't need this function anymore
      // b/c we have optimized RestApi, and get objective img url with one communication
          var xmlhttp = new XMLHttpRequest();
          //var url = "http://192.168.56.101/gallery3/index.php/rest/item" + id;               
          xmlhttp.onreadystatechange=function()
          {
              if (xmlhttp.readyState===4)
              {
                  if(xmlhttp.status===200)
                  { 
                      var response = xmlhttp.responseText;
                     //console.log(response);                
                      var jsonresponse = JSON.parse(response);         
                      //Change to javascript object format             
                      console.log(jsonresponse);                     
                      var imgsrc = jsonresponse.entity.file_url_public;                
                      //Get imgurl from jsonresponse
                      var imgname = jsonresponse.entity.name;
                      //Get imgname from jsonresponse
                      console.log(imgname);
                      var n = imgname.indexOf(".");
                      var imgname = imgname.substr(0, n);
                      //Get img name without suffix
                      console.log(imgsrc);
                      //$("#"+"img1").attr("src",imgsrc);   
                     // $("#img1_name").html(imgname);
                      //$("#loadimg").append("<img id ="+ imgsrc + ">");
                      $("#searchlist").append("<li><a href= #Popup" + i+ " data-rel= popup class=ui-btn ui-btn-inline ui-corner-all>" + imgname + "</a></li>");
                      $("#searchpagepopup").append("<div data-role= popup id=Popup" + i+ " class = ui-content><p><img src="+ imgsrc +"></p></div>");
                      
                      var imgObj = "#img"+i;
                      console.log(imgObj);
                      $(imgObj).attr("src", imgsrc);
                     //$( "img[name*='gallery3/var/']").attr("src" , imgsrc);
                  }
                   
              }       
          };
          //$("#loadimg").append("<img id = img"+ i + " alt= Loading>");
          $("#loadimg").append("<img class = image id = img"+ i + " alt= Loading...>");
          xmlhttp.open("GET",url,true);
          xmlhttp.setRequestHeader("X-Gallery-Request-Method", "GET");
          xmlhttp.setRequestHeader("X-Gallery-Request-Key", res);
          console.log("Set RequestHeader!");
          xmlhttp.send();
          console.log("Send Request! ");  
}

var app = {
    // Application Constructor
    initialize: function() {
        this.bindEvents();
           
    },
    // Bind Event Listeners
    // Bind any events that are required on startup. Common events are:
    // 'load', 'deviceready', 'offline', and 'online'.
    bindEvents: function() {
        document.addEventListener('deviceready', this.onDeviceReady, false);
    },
    // deviceready Event Handler
    // The scope of 'this' is the event. In order to call the 'receivedEvent'
    // function, we must explicitly call 'app.receivedEvent(...);'
    onDeviceReady: function() {
        console.log(document);

        $( "#launcherPage" ).replaceWith(""); // We need to remove "#launcherpage" and let albumPage to be the first data- role = "page"            
        $.mobile.changePage("#albumPage");//We can also remove this operation, because albumPage is the first page in DOM
        console.log("DeviceReady and Change to albumPage");
        
        $("#gotologin").on("click" , function(){               
        $.mobile.changePage("#loginPage");
        console.log("bind button to loginPage");
        
        $("#loginForm").on("submit", handleLogin);});
         
        $("#logout").on("click",function()
        {
            clearhtmlDom();
            $.mobile.changePage("#loginPage");
        });
        $("#quit").on("click",function(){
            navigator.app.exitApp();
        });
        //checkPreAuth();
    }
};

