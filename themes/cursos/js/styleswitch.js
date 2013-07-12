   //Style Sheet Switcher version 1.1 Oct 10th, 2006
    //Author: Dynamic Drive: http://www.dynamicdrive.com
    //Usage terms: http://www.dynamicdrive.com/notice.htm
    
    var manual_or_random="manual" //"manual" or "random"
    var randomsetting="3 days" //"eachtime", "sessiononly", or "x days (replace x with desired integer)". Only applicable if mode is random.
    
    //////No need to edit beyond here//////////////
    
    function getCookie(Name) { 
        var re=new RegExp(Name+"=[^;]+", "i"); //construct RE to search for target name/value pair
        if (document.cookie.match(re)) //if cookie found
            return document.cookie.match(re)[0].split("=")[1] //return its value
        return null
    }
    
    function setCookie(name, value, days) {
        var expireDate = new Date()
        //set "expstring" to either future or past date, to set or delete cookie, respectively
        var expstring=(typeof days!="undefined")? expireDate.setDate(expireDate.getDate()+parseInt(days)) : expireDate.setDate(expireDate.getDate()-5)
        document.cookie = name+"="+value+"; expires="+expireDate.toGMTString()+"; path=/";
    }
    
    function deleteCookie(name){
        setCookie(name, "moot")
    }
    
    
    function setStylesheet(title, randomize){ //Main stylesheet switcher function. Second parameter if defined causes a random alternate stylesheet (including none) to be enabled
        var i, cacheobj, altsheets=[""]
        for(i=0; (cacheobj=document.getElementsByTagName("link")[i]); i++) {
            if(cacheobj.getAttribute("rel").toLowerCase()=="alternate stylesheet" && cacheobj.getAttribute("title")) { //if this is an alternate stylesheet with title
                cacheobj.disabled = true
                altsheets.push(cacheobj) //store reference to alt stylesheets inside array
                if(cacheobj.getAttribute("title") == title) //enable alternate stylesheet with title that matches parameter
                    cacheobj.disabled = false //enable chosen style sheet
            }
        }
        if (typeof randomize!="undefined"){ //if second paramter is defined, randomly enable an alt style sheet (includes non)
            var randomnumber=Math.floor(Math.random()*altsheets.length)
            altsheets[randomnumber].disabled=false
        }
		
        return (typeof randomize!="undefined" && altsheets[randomnumber]!="")? altsheets[randomnumber].getAttribute("title") : "" //if in "random" mode, return "title" of randomly enabled alt stylesheet
    }
    
    function chooseStyle(styletitle, days){ //Interface function to switch style sheets plus save "title" attr of selected stylesheet to cookie
        if (document.getElementById){
            setStylesheet(styletitle)
            setCookie("mysheet", styletitle, days)
        }
    }
    
    function indicateSelected(element){ //Optional function that shows which style sheet is currently selected within group of radio buttons or select menu
        if (selectedtitle!=null && (element.type==undefined || element.type=="select-one")){ //if element is a radio button or select menu
            var element=(element.type=="select-one") ? element.options : element
            for (var i=0; i<element.length; i++){
                if (element[i].value==selectedtitle){ //if match found between form element value and cookie value
                    if (element[i].tagName=="OPTION") //if this is a select menu
                        element[i].selected=true
                    else //else if it's a radio button
                        element[i].checked=true
                    break
                }
            }
        }
    }
    
    function indicateSelectedOption(elements){ //Optional function that shows which style sheet is currently selected within group of radio buttons or select menu
		if (selectedtitle!=null){
			for(var i=0;elements[i];i++){
				if (elements[i].value == selectedtitle) elements[i].selected = true;
			}
		}
    }
    
    if (manual_or_random=="manual"){ //IF MANUAL MODE
        var selectedtitle=getCookie("mysheet")
		
        if (document.getElementById && selectedtitle!=null) { //load user chosen style sheet from cookie if there is one stored
            setStylesheet(selectedtitle)
		}
    }
    else if (manual_or_random=="random"){ //IF AUTO RANDOM MODE
        if (randomsetting=="eachtime")
            setStylesheet("", "random")
        else if (randomsetting=="sessiononly"){ //if "sessiononly" setting
            if (getCookie("mysheet_s")==null) //if "mysheet_s" session cookie is empty
                document.cookie="mysheet_s="+setStylesheet("", "random")+"; path=/" //activate random alt stylesheet while remembering its "title" value
            else
                setStylesheet(getCookie("mysheet_s")) //just activate random alt stylesheet stored in cookie
        }
        else if (randomsetting.search(/^[1-9]+ days/i)!=-1){ //if "x days" setting
            if (getCookie("mysheet_r")==null || parseInt(getCookie("mysheet_r_days"))!=parseInt(randomsetting)){ //if "mysheet_r" cookie is empty or admin has changed number of days to persist in "x days" variable
                setCookie("mysheet_r", setStylesheet("", "random"), parseInt(randomsetting)) //activate random alt stylesheet while remembering its "title" value
                setCookie("mysheet_r_days", randomsetting, parseInt(randomsetting)) //Also remember the number of days to persist per the "x days" variable
            }
            else
                setStylesheet(getCookie("mysheet_r")) //just activate random alt stylesheet stored in cookie
        } 
    }
    
	// select menu - set active item
	window.onload=function(){
		var select=document.getElementById("switchform").getElementsByTagName('option');
		indicateSelectedOption(select);
	}
    
	
jQuery.noConflict();
jQuery(document).ready	(function($) {
	
	var form_html='<form id="switchform"><div class="switchform_open" style="display: block; background-color: #666666; width: 51px; height: 51px; float: right; margin: -15px -60px 0 0; border-radius: 0px 5px 5px 0px; cursor: pointer;"><img src="img/btn_panel.png" width="51" height="51"></div><p>4 Predefined color skins</p><select name="switchcontrol" size="1" onChange="javascript: chooseStyle(this.options[this.selectedIndex].value, 5)"><option value="none" selected="selected">Orange Theme</option><option value="blue-theme">Blue Theme</option><option value="red-theme">Red Theme</option><option value="grenn-theme">Green Theme</option></select></form>';
	$("body").prepend(form_html);
	
	// color choice
	$(".switchform_open").bind('click', function(){
		var sw_width =$(this).parent("#switchform").outerWidth(true);
		if ($(this).parent("#switchform").css('left') == '0px') {	
			$(this).parent("#switchform").animate({
				left: '-'+sw_width+'px'
			}, 400);
		} else {
			$(this).parent("#switchform").animate({
				left: '0px'
			}, 400);
		}
	});
	
});