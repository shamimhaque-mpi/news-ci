/* placeholder typing animation start----------------------------------------------------------------------- */
/*Exm: <input type="email" name="email" placeholder="Your Email..." class="man_placeholder_typing_animation" data-man_speed="2000"  data-man_delay="2000">
/*Exm: <input type="email" name="email" placeholder="Your Email..." class="man_placeholder_typing_animation" data-man_speed=""  data-man_delay="">
/*Exm: <input type="email" name="email" placeholder="Your Email..." class="man_placeholder_typing_animation">
**/

var man_placeholder_typing_animation = document.querySelectorAll(".man_placeholder_typing_animation");
if(man_placeholder_typing_animation){
	man_placeholder_typing_animation = Array.isArray(man_placeholder_typing_animation) ? man_placeholder_typing_animation : Object.values(man_placeholder_typing_animation);
	man_placeholder_typing_animation.forEach((value, index)=>{
	    var placeholder_data = value.getAttribute('placeholder'),
	        Length           = placeholder_data.length, i=0,
	        speed            = 140,
	        delay			 = 400;

	    /* empty the placeholder */
	    value.setAttribute('placeholder','');

	    /*get speed from user*/
	    if (value.dataset.man_speed != undefined && value.dataset.man_speed != ""){
	        speed = value.dataset.man_speed;
	    }

	    /*get delay from user*/
	    if (value.dataset.man_delay != undefined && value.dataset.man_delay != ""){
	        delay = value.dataset.man_delay;
	    }

	    var isPaused = false;
	    setInterval(() => {
	    	if(isPaused==false){

	        	/* incress the index of i to get next char of placeholder value which is set to placeholder attribute in html */
		        i++;

		        /*set delay after animating all character of placeholder*/
		        if(i==Length){
		            isPaused = true;
		            setTimeout(function(){isPaused=false;}, delay);

		            /*remove cursor blinking when animation once finished*/
			        value.setAttribute('placeholder', placeholder_data.substring(0, i));
		        }else{
			        /* set new placeholder value with old value */
			        value.setAttribute('placeholder', placeholder_data.substring(0, i) +"|");
		        }

		        /* check the length of i with placeholder value length if thoes are equal then set i=0 and empty the placeholder */
		        if(i>Length){
		        	value.setAttribute('placeholder', '');
		            i=0;
		        }
		    }
	    }, speed);
	});
}
/* placeholder typing animation end  ----------------------------------------------------------------------- */






/*man lazy loader start----------------------------------------------------------------------*/
/*syntex: <img class="man_lazy_load" src="preloadImage" data-src="orginalImage" alt="">*/
let man_lazy_load = document.querySelectorAll('.man_lazy_load');
if(man_lazy_load){
	man_lazy_load = Array.isArray(man_lazy_load) ? man_lazy_load : Object.values(man_lazy_load);
	loadImage();
	function loadImage(){
	  man_lazy_load.forEach((img) => {
	    if(img.getBoundingClientRect().top<(window.innerHeight*2) && img.getBoundingClientRect().top>(-1*window.innerHeight)){
	    	let src = img.dataset.src;
	    	let image = new Image();
	    	image.src = src;

	    	img.removeAttribute('data-src');
	    	img.classList.remove('man_lazy');

	    	image.onload = function(){
	    	  img.setAttribute('src',src);
	    	}
	    }
	  });
	}
	window.addEventListener('scroll', function(){
		loadImage();
	});
	window.addEventListener('touchmove', function(){
		loadImage();
	});
}
/*man lazy loader end----------------------------------------------------------------------*/








/*man input field field character length counter start-------------------------------------------*/
/***
/*EX:
------------------------
/* <div class="man_input_counter" style="width: 100%;">
/* 	<input type="text" name="caption" data-mex="500" Placeholder="Product Name..." required class="form_control">
/* </div>
***/

window.addEventListener('load', man_input_counter);
man_input_counter();
function man_input_counter(){
	var input_length_chack = document.querySelectorAll(".man_input_counter input");

	if(input_length_chack){
		input_length_chack = Array.isArray(input_length_chack) ? input_length_chack : Object.values(input_length_chack);

		input_length_chack.forEach(function(single_input_length_chack, index){
			var max_length 	   = single_input_length_chack.dataset.mex,
				current_length = single_input_length_chack.value.length,

				input_length_chacker_output = document.createElement("span"),

				used_character 				= document.createElement("span"),
				text_used_character			= document.createTextNode(current_length);
			
				max_character  				= document.createElement("span"),
				text_max_character			= document.createTextNode("/"+max_length);

			// set class setAttribute for css style start
			input_length_chacker_output.setAttribute("class","input_length_chacker_output");
			used_character.setAttribute("class","used_character");
			max_character.setAttribute("class","max_character");
			// set class setAttribute for css style end
			

			// push style start
			single_input_length_chack.parentElement.style.cssText = "width: 100%;position: relative;";
			single_input_length_chack.style.cssText = "padding-right: 66px;";
			input_length_chacker_output.style.cssText = `
														 display: flex;
														 position: absolute;
														 top: 50%;
														 right: calc(0% + 10px);
														 transform: translateY(-50%);
														`;
			// push style end



			// append created element start
			used_character.appendChild(text_used_character);
			max_character.appendChild(text_max_character);
			
			input_length_chacker_output.appendChild(used_character);
			input_length_chacker_output.appendChild(max_character);

			single_input_length_chack.parentElement.appendChild(input_length_chacker_output);
			// append created element end



			single_input_length_chack.addEventListener('input', function(){

				max_length 	   = single_input_length_chack.dataset.mex;
				current_length = single_input_length_chack.value.length;

				// check input field charecter with max limit
				if(current_length>=max_length){
					/**
					/* if input field character length >= max_length change the color of counter to red and
					/* remove overflowed charecter
					***/
					input_length_chacker_output.style.color = "red";

					single_input_length_chack.value = single_input_length_chack.value.slice(0, max_length);
					current_length = single_input_length_chack.value.length;
				}else{
					// remove text color to normal after changing to red
					input_length_chacker_output.style.color = "";
				}
				// set used charecter length
				used_character.innerHTML = current_length;
				
			});
		});
	}
}
/*man input field other field character length counter end---------------------------------------*/










/*man auto width for table start-----------------------------------------------------------*/
/**
/* .man_auto_width this class is used to set necessary width according to children element
/* EX:  
/*-----------------
  <td class="man_auto_width">
  	<button>Edit</button>
  	<button>View</button>
  	<button>Delete</button>
  </td>
***/
window.addEventListener('load', function(){
	var man_auto_width = document.querySelectorAll(".man_auto_width");
	if(man_auto_width){
		man_auto_width = Array.isArray(man_auto_width) ? man_auto_width : Object.values(man_auto_width);

		man_auto_width.forEach((single_man_auto_width)=>{
			single_man_auto_width.style.width = single_man_auto_width.firstElementChild.scrollWidth+"px";
		});
	}
});
/*man auto width for table end-------------------------------------------------------------*/









/*man select start ------------------------------------------------------------------------*/
/*Ex:
-----------------------
/* <select name="" class="man_select" required="" form="" multiple="">
/* 	<option value="" selected>-Select-</option>
/* 	<option>Test One</option>
/* 	<option>Test Two</option>
/* 	<optgroup label="Swedish Cars">
/* 	    <option value="volvo">Volvo</option>
/* 	    <option value="saab">Saab</option>
/*   	</optgroup>
/* </select>
/*******************/
/* For Engular:
-----------------------------------------
/*	<select name="" class="man_select" data-ngCallback="test(this)" required="" form="">
/*	    <option value="">-Select-</option>
/*	    <option>Test One</option>
/*	    <option>Test Two</option>
/*	    <optgroup label="Swedish Cars">
/*	        <option value="volvo">Volvo</option>
/*	        <option value="saab">Saab</option>
/*	    </optgroup>
/*	</select>
/****/

// window.addEventListener('DOMContentLoaded', );
window.addEventListener('DOMContentLoaded', load_man_select);

function load_man_select(){
    man_select_nameAttr = man_select_formAttr = man_select_requiredAttr = man_select_classAttr = man_select_titleAttr = man_select_disabledAttr = man_select_multipleAttr = callbackFunction = '';
    
	/*get data from select element and push to man custom element start-----*/
	var man_select = document.querySelectorAll('.man_select');
	if(man_select){
		man_select = Array.isArray(man_select) ? man_select : Object.values(man_select);

		var z_index = man_select.length;
		man_select.forEach(function(single_man_select, single_man_select_index){
			/* create an element as a container of man select-------------------*/
			var man_select_wrapper = document.createElement('div');
				man_select_wrapper.setAttribute('class', "man_select_z_index man_select_wrapper");

				man_select_nameAttr  	= (man_select[single_man_select_index].hasAttribute('name')) ? man_select[single_man_select_index].getAttribute('name') : '';
				/* remove name attribute from select tag*/
				single_man_select.removeAttribute('name');

				man_select_formAttr 	= (man_select[single_man_select_index].hasAttribute('form')) ? man_select[single_man_select_index].getAttribute('form') : '';
				man_select_requiredAttr = (man_select[single_man_select_index].hasAttribute('required')) ? man_select[single_man_select_index].getAttribute('required') : '';
				/* remove required attribute from select tag*/
				
				man_select_classAttr 	= (man_select[single_man_select_index].hasAttribute('class')) ? man_select[single_man_select_index].getAttribute('class') : '';
				man_select_classAttr    = man_select_classAttr.replace('man_select','') ;
				man_select_titleAttr 	= (man_select[single_man_select_index].hasAttribute('title')) ? man_select[single_man_select_index].getAttribute('title') : '';
				man_select_disabledAttr = (man_select[single_man_select_index].hasAttribute('disabled')) ? man_select[single_man_select_index].getAttribute('disabled') : '';
				man_select_multipleAttr = (man_select[single_man_select_index].hasAttribute('multiple')) ? man_select[single_man_select_index].getAttribute('multiple') : '';
				// callbackFunction        = (man_select[single_man_select_index].dataset.callback!==undefined) ? man_select[single_man_select_index].dataset.callback : '';

			single_man_select.parentElement.insertBefore(man_select_wrapper,single_man_select);


			/* insert basic element start--------------------------------------------------------------*/
			if(man_select_formAttr!=''){
				man_select_wrapper.innerHTML=`<input 
												style="width: 0;height: 0;overflow: hidden;position: absolute;left: 50%;top: 80%;opacity: 0;" 
												class="man_selected_value" 
												name=\"${man_select_nameAttr}\" 
												value="" 
												required=\"${man_select_requiredAttr}\" 
												form=\"${man_select_formAttr}\">`;
			// --------------------------------------------------------------
			}else{
				man_select_wrapper.innerHTML=`<input 
												style="width: 0;height: 0;overflow: hidden;position: absolute;left: 50%;top: 80%;opacity: 0;" 
												class="man_selected_value" 
												name=\"${man_select_nameAttr}\" 
												value="" ${man_select_requiredAttr} >`;
			// -----------------------------------------------------------------
			}

			/* check select tag has multiple attribute for adding an extra class 'multiple'*/
			if(single_man_select.hasAttribute('multiple')){
		 		man_select_wrapper.innerHTML+=`<div class=\"man_selected multiple ${man_select_classAttr}\" 
										title=\"${man_select_titleAttr}\"></div>`;
			}else{
		 		man_select_wrapper.innerHTML+=`<div class=\"man_selected ${man_select_classAttr}\" 
										title=\"${man_select_titleAttr}\"></div>`;
			}
			
			man_select_wrapper.innerHTML+=`<div class="man_select_option_wrapper">
										      <!-- earch box start -->
										      <div class="man_select_search_box">
										        <i class="icon"><svg id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;width: 16px;"><path d="M480.159,45.81H31.841C14.284,45.81,0,60.093,0,77.65v37.472c0,17.557,14.284,31.841,31.841,31.841h14.907L211.305,311.52v144.056c0,4.293,2.586,8.163,6.552,9.806c1.313,0.543,2.692,0.808,4.059,0.808c2.763,0,5.478-1.078,7.508-3.109l68.559-68.56c1.99-1.991,3.109-4.69,3.109-7.505v-75.498l164.554-164.555h14.514c17.557,0,31.841-14.284,31.841-31.841V77.65C512,60.093,497.716,45.81,480.159,45.81z M282.968,299.621c-2.096,2.096-3.128,4.85-3.104,7.597v75.404l-47.332,47.332V307.156c0.007-2.7271.027-5.455-3.107-7.536L76.768,146.963h358.857L282.968,299.621z M490.773,115.122c0,5.852-4.761,10.614-10.614,10.614H31.841c-5.852,0-10.614-4.761-10.614-10.614V77.65c0-5.852,4.761-10.614,10.614-10.614h448.319c5.852,0,10.614,4.761,10.614,10.614V115.122z"/></svg></i>
										        <input type="search" class="man_select_search_input" placeholder="Filter..." autocomplete="off" >
										      </div>
										      <!-- earch box end -->
												<ul class="man_option_list"></ul>
										  </div>`;
			/* insert basic element end----------------------------------------------------------------*/

			window.addEventListener('load',man_select_refresh(single_man_select_index));
		});
		
		/* clean hidden input value*/
		cleanHiddenInput();
	}
	/*get data from select element and push to man custom element end-------*/





	window.addEventListener('load', load_man_select_filter);
	function load_man_select_filter(){
		/*----man custom select's option filtering end----*/
		var man_select_search_input = document.querySelectorAll('.man_select_search_box>.man_select_search_input');
		if(man_select_search_input){
			man_select_search_input = Array.isArray(man_select_search_input) ? man_select_search_input : Object.values(man_select_search_input);
			man_select_search_input.forEach(function(single_input){
				single_input.addEventListener('input', function(){
					let searchData 			= single_input.value,
						manSelectOptionList = single_input.parentElement.nextElementSibling.children;
						manSelectOptionList = Array.isArray(manSelectOptionList) ? manSelectOptionList : Object.values(manSelectOptionList);
					
					
					manSelectOptionList.forEach(function(singleOption, index){
						let man_custom_option_group_block = true;
						if(singleOption.classList.contains('man_custom_option_group')==false){
							/*---this filter for ungrouped list start-----------*/
							var patt = new RegExp(searchData, "i");
							if(patt.test(singleOption.innerHTML)){
								singleOption.style.cssText = 'display:block';
							}else{
								singleOption.style.cssText = 'display:none';
							}
							/*---this filter for ungrouped list end--------------*/
						}else{
							/*---this filter for grouped list start--------------*/
							let groupedOption = singleOption.lastElementChild.children;/* get the li of li.man_custom_option_group*/
								groupedOption = Array.isArray(groupedOption) ? groupedOption : Object.values(groupedOption);

							groupedOption.forEach(function(singleGroupedOption){
								var patt = new RegExp(searchData, "i");
								if(patt.test(singleGroupedOption.innerHTML)){
									singleGroupedOption.style.cssText = 'display:block';
								}else{
									singleGroupedOption.style.cssText = 'display:none';
								}
							});
							/*---this filter for grouped list end--------------*/

							/*---- hide the group if it's ul has no block li start---*/
							for(var i=0; i<groupedOption.length; i++){
								if(groupedOption[i].style.display=='none'){
									man_custom_option_group_block = false;
								}else{
									man_custom_option_group_block = true;
									break;
								}
							}
							/*---- hide the group if it's ul has no block li end---*/
						}
						
						/* this condition mantains the group display block, none start ------*/
						if(singleOption.classList.contains('man_custom_option_group')){
							if(man_custom_option_group_block){
								singleOption.style.display = 'block';
							}else{
								singleOption.style.display = 'none';
							}
						}
						/* this condition mantains the group display block, none end --------*/
					});


				});
			});
		}
		/*----man custom select's option filtering start----*/
	}


	/* ----man custom select open and close managing start-------------- */
	var man_selected            = document.querySelectorAll(".man_select_wrapper>.man_selected"),
	    man_select_search_input = document.querySelectorAll(".man_select_wrapper .man_select_search_input");
	    
		man_selected            = Array.isArray(man_selected) ? man_selected : Object.values(man_selected);
		man_select_search_input = Array.isArray(man_select_search_input) ? man_select_search_input : Object.values(man_select_search_input);

	man_selected.forEach(function(single_man_selected, index){
		single_man_selected.addEventListener('click', function(){
			 //auto focus the search input start
			 man_select_search_input[index].focus(); 
			 //auto focus the search input end
		    
			let getChildrens = single_man_selected.nextElementSibling;
			if(getChildrens.classList.contains('active')){
				getChildrens.classList.remove('active')
			}else{
				/* remove all .man_selected's nextElementSibling's active class start*/
				man_selected.forEach(function(single_man_selected2){
					single_man_selected2.nextElementSibling.classList.remove('active');
				});
				/* remove all .man_selected's nextElementSibling's active class end*/
				getChildrens.classList.add('active')
			}
		});
	});
	/* ----man custom select open and close managing end---------------- */



	/*---close all man custom select start-------------*/
	window.addEventListener('click', function(event){
		if(event.target.classList.contains("man_selected")==false && event.target.classList.contains("man_select_search_input")==false &&  event.target.classList.contains("man_custom_option_group")==false){
			let man_select_option_wrapper = document.querySelectorAll(".man_select_wrapper>.man_select_option_wrapper");
			man_select_option_wrapper.forEach(function(man_select_option_wrapperSingle){
				man_select_option_wrapperSingle.classList.remove('active');
			});
		}
	});
	/*---close all man custom select end---------------*/
}


function man_multiple_value_remove(event){
	let text 			   = (event.target.nextElementSibling.innerHTML),
		hiddenInput 	   = event.target.closest('.man_select_wrapper').firstElementChild,
		
		man_select_wrapper = event.target.closest('.man_select_wrapper'),
		OptList			   = man_select_wrapper.lastElementChild.lastElementChild.children;
		OptList        	   = Array.isArray(OptList) ? OptList : Object.values(OptList);
	
	/* remove the selected option's selected class start---------------------------------*/
	OptList.forEach(function(singleOpt){
		if(singleOpt.classList.contains('man_custom_option_group')){
			/* get group option*/
			let groupOpt = singleOpt.lastElementChild.children;
				groupOpt = Array.isArray(groupOpt) ? groupOpt : Object.values(groupOpt);

			groupOpt.forEach(function(singleGroupOpt){
				if(singleGroupOpt.innerHTML == text){
					singleGroupOpt.classList.remove('selected');

				/* remove the value from hidden input field start------------*/
					let li_value_to_delete_from_input_hidden = singleGroupOpt.dataset.value;
					hiddenInput.value = hiddenInput.value.replace(li_value_to_delete_from_input_hidden, '');
					cleanHiddenInput();
				/* remove the value from hidden input field end------------*/

				/* remove span from div.man_selected tag start----------*/
					event.target.closest('.man_selected.multiple').removeChild(event.target.parentElement);
				/* remove span from div.man_selected tag end------------*/
				}
			});
		}else{
			if(singleOpt.innerHTML == text){
				singleOpt.classList.remove('selected');

				/* remove the value from hidden input field start------------*/
					let li_value_to_delete_from_input_hidden = singleOpt.dataset.value;
					hiddenInput.value = hiddenInput.value.replace(li_value_to_delete_from_input_hidden, '');
					cleanHiddenInput();
				/* remove the value from hidden input field end-------------*/

				/* remove span from div.man_selected tag start----------*/
					event.target.closest('.man_selected.multiple').removeChild(event.target.parentElement);
				/* remove span from div.man_selected tag end------------*/

			}
		}
	});
	/* remove the selected option's selected class end---------------------------------*/
}


function cleanHiddenInput(){
	/* clean the value by removing ','*/
	let hidden_input_latest_value = document.querySelectorAll(".man_select_wrapper>.man_selected_value");
		hidden_input_latest_value = Array.isArray(hidden_input_latest_value) ? hidden_input_latest_value : Object.values(hidden_input_latest_value);
		
	hidden_input_latest_value.forEach(function(singleHiddenInput){
		singleHiddenInput.value = singleHiddenInput.value.replace(',,',',');

		// chacking that the last character == ',' if true then remove this
		if(singleHiddenInput.value[singleHiddenInput.value.length-1]==','){
			singleHiddenInput.value = singleHiddenInput.value.substr(0, (singleHiddenInput.value.length-1));
		}
		if(singleHiddenInput.value[0]==','){
			singleHiddenInput.value = singleHiddenInput.value.substr(1, (singleHiddenInput.value.length));
		}
	});
}
/*man select end ------------------------------------------------------------------------*/



/*man_select_refrash .man_select for update information start-----------------------*/
function man_select_refresh(man_select_index){
	var man_select = document.querySelectorAll(".man_select");
	if(man_select){
		if(man_select_index==false){
			// this method pass data from select tag to custom man_select start
			option_to_li_convert(man_select_index);
			// this method pass data from select tag to custom man_select end

			// this method work with custom man_select event to pass data to hidden input field and div.selected with multiple concept start
			make_useable(man_select_index);
			// this method work with custom man_select event to pass data to hidden input field and div.selected with multiple concept end
		}
	}
}
/*man_select_refrash .man_select for update information end  -----------------------*/



function make_useable(man_select_index){
	var man_select = document.querySelectorAll(".man_select");
	if(man_select){
		/*push data from man custom option list to input and div.man_selected div start-----------*/
		var man_select_options = man_select[man_select_index].previousElementSibling.lastElementChild.lastElementChild.children;
		man_select_options 	   = Array.isArray(man_select_options) ? man_select_options : Object.values(man_select_options);

		man_select_options.forEach(function(single_man_select_options){
			single_man_select_options.addEventListener('click', function(){
				var this_value 	  = this.dataset.value,
					this_innerHTML = this.innerHTML;

				/*now push the data from option list div.man_selected and input.man_selected_value*/

				/* push the selected option value into hidden input*/
				if(this.closest('.man_select_wrapper').nextElementSibling.hasAttribute("multiple")){
					single_man_select_options.classList.add('selected');
					if(this.closest(".man_select_wrapper").children[0].value.length==0){
						this.closest(".man_select_wrapper").children[0].value = this_value;
					}else{
						this.closest(".man_select_wrapper").children[0].value += ","+this_value;
					}
					/* push the selected option html into div.man_selected*/
					this.closest(".man_select_wrapper").children[1].innerHTML += `<span class="man_multiple_value"><span class="man_multiple_value_remove" onclick="man_multiple_value_remove(event)">+</span><span>${this_innerHTML}</span></span>`;
				}else{
					// remove all aselected class end--------------------------
					var all_li = single_man_select_options.parentElement.children;
					all_li	   = Array.isArray(all_li) ? all_li : Object.values(all_li);
					all_li.forEach(function(single_li){
						single_li.classList.remove('selected');
					});
					// remove all aselected class end--------------------------

					single_man_select_options.classList.add('selected');
					this.closest(".man_select_wrapper").children[0].value 	  = this_value;
					/* push the selected option html into div.man_selected*/
					this.closest(".man_select_wrapper").children[1].innerHTML = this_innerHTML;
				}
			});
		});
		/*push data from man custom option list to input and div.man_selected div end-----------*/
	}
}



function option_to_li_convert(index_man_select){
	var man_select = document.querySelectorAll(".man_select");
	if(man_select){
		/*get callback method name start*/
		var callbackFunction = '', methodEvent = '';
		if(man_select[index_man_select].hasAttribute('data-callback')){
			callbackFunction = man_select[index_man_select].dataset.callback;
			methodEvent = `onclick=${callbackFunction}`;
		}
		else if(man_select[index_man_select].hasAttribute('data-ngCallback')){
			callbackFunction = man_select[index_man_select].getAttribute('data-ngCallback');
			methodEvent = `ng-click=${callbackFunction}`;
		}
		/*get callback method name end*/
		

		var opt_option_list_ = '',
			options 		 = man_select[index_man_select].children;
		if(options.length>0){
			options = Array.isArray(options) ? options : Object.values(options);
		
			options.forEach(function(single_select_option, single_man_select_index){
				var current_man_select_wrapper = single_select_option.closest('select').previousElementSibling;
				/* get optgroup name*/
				if(single_select_option.nodeName=='OPTGROUP'){
					/* get optgroup children*/
					let optGroupOption 			   = single_select_option.children;
					optGroupOption	   			   = Array.isArray(optGroupOption) ? optGroupOption : Object.values(optGroupOption);
					
					/* push group options*/
					opt_option_list_ += `<li class="man_custom_option_group">
										 	<div class="man_custom_group_name">${single_select_option.label}</div>
										 	<ul>`;
												optGroupOption.forEach(function(group_single_option){
													/* collect option element data and stor to opt_option_list_*/
													if(group_single_option.nodeName=='OPTION'){
														/* check it has selected attribute or not ?*/
														if(group_single_option.hasAttribute('label')){
															opt_option_list_ += '<li '+methodEvent+' data-value="'+group_single_option.value+'">'+group_single_option.getAttribute('label')+'</li>';
														}else{
															if(group_single_option.hasAttribute('selected')){
																opt_option_list_ += '<li class="selected" '+methodEvent+' data-value="'+group_single_option.value+'">'+group_single_option.innerHTML+'</li>';

																/* check select tag has multiple attribute*/
																if(man_select[index_man_select].hasAttribute('multiple')){
																	/*now push the data from option list div.man_selected and input.man_selected_value*/;
																	if(current_man_select_wrapper.children[0].value.length==0){
																		current_man_select_wrapper.children[0].value = group_single_option.value;
																	}else{
																		current_man_select_wrapper.children[0].value += ","+group_single_option.value;
																	}
																	/* push the selected option html into div.man_selected*/
																	current_man_select_wrapper.children[1].innerHTML += `<span class="man_multiple_value"><span class="man_multiple_value_remove" onclick="man_multiple_value_remove(event)">+</span><span>${group_single_option.innerHTML}</span></span>`;
																}else{
																	/* push the selected html option into div.man_selected*/
																	current_man_select_wrapper.children[0].value 	 = group_single_option.value;
																	current_man_select_wrapper.children[1].innerHTML = group_single_option.innerHTML;
																}
															}else{
																opt_option_list_ += '<li '+methodEvent+' data-value="'+group_single_option.value+'">'+group_single_option.innerHTML+'</li>';
															}
														}
													}
												});
					opt_option_list_ += 	`</ul>
										</li>`;
					/* --------------------------------------------------------------------------------*/
				}else{
					/* collect option element data and stor to opt_option_list_*/
					if(single_select_option.nodeName=='OPTION'){
						/* check it has selected attribute or not ?*/
						if(single_select_option.hasAttribute('selected')){
							opt_option_list_ += '<li class="selected" '+methodEvent+' data-value="'+single_select_option.value+'">'+single_select_option.innerHTML+'</li>';

							/* check select tag has multiple attribute*/
							if(man_select[index_man_select].hasAttribute('multiple')){
								/*now push the data from option list div.man_selected and input.man_selected_value*/;
								if(current_man_select_wrapper.children[0].value.length==0){
									current_man_select_wrapper.children[0].value = single_select_option.value;
								}else{
									current_man_select_wrapper.children[0].value += ","+single_select_option.value;
								}
								/* push the selected option html into div.man_selected*/
								current_man_select_wrapper.children[1].innerHTML += `<span class="man_multiple_value"><span class="man_multiple_value_remove" onclick="man_multiple_value_remove(event)">+</span><span>${single_select_option.innerHTML}</span></span>`;
							}else{
								/* push the selected option value into hidden input*/
								current_man_select_wrapper.children[0].value 	 = single_select_option.value;
								/* push the selected option html into div.man_selected*/
								current_man_select_wrapper.children[1].innerHTML = single_select_option.innerHTML;
							}
						}else{
							opt_option_list_ += '<li '+methodEvent+' data-value="'+single_select_option.value+'">'+single_select_option.innerHTML+'</li>';/* push the selected html option into div.man_selected*/
						}
					}
				}
			});
			man_select[index_man_select].previousElementSibling.lastElementChild.lastElementChild.innerHTML = opt_option_list_;
		}
	}
}




// .man_select element ovserver for innerElementChange start
window.addEventListener('load', active_watcher);

active_watcher();
function active_watcher(){
	var man_select_watcher = document.querySelectorAll(".man_select");
	if(man_select_watcher){
		man_select_watcher = Array.isArray(man_select_watcher) ? man_select_watcher : Object.values(man_select_watcher);
		man_select_watcher.forEach(function(single_man_select_watcher, index){
			var observer = new MutationObserver(function(mutations) {
			  mutations.forEach(function(mutation) {
				option_to_li_convert(index);
				make_useable(index);
			  	set_man_select_z_index_for_best_positioning();
			  });
			});

			var config = {
			  attributes: true,
			  childList: true,
			  characterData: true
			};

			observer.observe(single_man_select_watcher, config);

			// otherwise
			observer.disconnect();
			observer.observe(single_man_select_watcher, config);
		});
	}
}
// .man_select element ovserver for innerElementChange end










































/*man select table start ------------------------------------------------------------------------*/
var man_select_table = document.querySelectorAll(".man_select_table");
if(man_select_table){
  man_select_table = Array.isArray(man_select_table) ? man_select_table : Object.values(man_select_table);

  man_select_table.forEach(function(single_man_select_table){

  	// hide .man_select_table by display none
	single_man_select_table.style.cssText = "display: none;";

    var man_select_table_from_system = document.createElement("div");

    man_select_table_from_system.setAttribute("class", "man_select_z_index man_select_table_from_system");

    single_man_select_table.parentElement.insertBefore(man_select_table_from_system,single_man_select_table);


    // get all atrrbute of users table and push to input.man_select_table_from_system_input_value start
    var name_attr     = single_man_select_table.dataset.name,
        callback_attr = single_man_select_table.dataset.callback;
        required_attr = single_man_select_table.dataset.required;

    name_attr 	  = (name_attr!==undefined) 	? name_attr 	: '';
    callback_attr = (callback_attr!==undefined) ? callback_attr : '';
    required_attr = (required_attr!==undefined) ? required_attr : 'false';
    // get all atrrbute of users table and push to input.man_select_table_from_system_input_value end

    var man_select_table_from_system = '';
    if(required_attr=="true"){
	    man_select_table_from_system = `<input 
    										type="text" style="position: absolute;left: 50%;top: 80%;width: 0;height: 0;opacity: 0;" 
    										name="${name_attr}" 
    										required="true"
    										class="man_select_table_from_system_input_value">
                                          <table class="form-control man_table_selected">${single_man_select_table.firstElementChild.innerHTML}</table>
                                          <div class="man_select_table_from_system_data_wrapper">
                                            <div class="man_select_table_from_system_search">
                                              <div class="icon">
                                                <svg id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;width: 16px;">
                                                  <path d="M480.159,45.81H31.841C14.284,45.81,0,60.093,0,77.65v37.472c0,17.557,14.284,31.841,31.841,31.841h14.907L211.305,311.52v144.056c0,4.293,2.586,8.163,6.552,9.806c1.313,0.543,2.692,0.808,4.059,0.808c2.763,0,5.478-1.078,7.508-3.109l68.559-68.56c1.99-1.991,3.109-4.69,3.109-7.505v-75.498l164.554-164.555h14.514c17.557,0,31.841-14.284,31.841-31.841V77.65C512,60.093,497.716,45.81,480.159,45.81z M282.968,299.621c-2.096,2.096-3.128,4.85-3.104,7.597v75.404l-47.332,47.332V307.156c0.007-2.7271.027-5.455-3.107-7.536L76.768,146.963h358.857L282.968,299.621z M490.773,115.122c0,5.852-4.761,10.614-10.614,10.614H31.841c-5.852,0-10.614-4.761-10.614-10.614V77.65c0-5.852,4.761-10.614,10.614-10.614h448.319c5.852,0,10.614,4.761,10.614,10.614V115.122z"></path>
                                                </svg>
                                              </div>
                                              <input type="search" class="search_field" >
                                            </div>
                                            <table class="manselect_table_bordered">${single_man_select_table.lastElementChild.innerHTML}</table>
                                          </div>`;
		// -----------------------------------------------------------------------------
	}else{
	    man_select_table_from_system = `<input 
    										type="text" style="position: absolute;left: 50%;top: 80%;width: 0;height: 0;opacity: 0;" 
    										name="${name_attr}" 
    										class="man_select_table_from_system_input_value">
                                          <table class="form-control man_table_selected">${single_man_select_table.firstElementChild.innerHTML}</table>
                                          <div class="man_select_table_from_system_data_wrapper">
                                            <div class="man_select_table_from_system_search">
                                              <div class="icon">
                                                <svg id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;width: 16px;">
                                                  <path d="M480.159,45.81H31.841C14.284,45.81,0,60.093,0,77.65v37.472c0,17.557,14.284,31.841,31.841,31.841h14.907L211.305,311.52v144.056c0,4.293,2.586,8.163,6.552,9.806c1.313,0.543,2.692,0.808,4.059,0.808c2.763,0,5.478-1.078,7.508-3.109l68.559-68.56c1.99-1.991,3.109-4.69,3.109-7.505v-75.498l164.554-164.555h14.514c17.557,0,31.841-14.284,31.841-31.841V77.65C512,60.093,497.716,45.81,480.159,45.81z M282.968,299.621c-2.096,2.096-3.128,4.85-3.104,7.597v75.404l-47.332,47.332V307.156c0.007-2.7271.027-5.455-3.107-7.536L76.768,146.963h358.857L282.968,299.621z M490.773,115.122c0,5.852-4.761,10.614-10.614,10.614H31.841c-5.852,0-10.614-4.761-10.614-10.614V77.65c0-5.852,4.761-10.614,10.614-10.614h448.319c5.852,0,10.614,4.761,10.614,10.614V115.122z"></path>
                                                </svg>
                                              </div>
                                              <input type="search" class="search_field" >
                                            </div>
                                            <table class="manselect_table_bordered">${single_man_select_table.lastElementChild.innerHTML}</table>
                                          </div>`;
		// -----------------------------------------------------------------------------
	}

    // now push the computed element into  single_man_select_table.previousElementSibling start
    single_man_select_table.previousElementSibling.innerHTML=man_select_table_from_system;
    // now push the computed element into  single_man_select_table.previousElementSibling end
    
    // push call back method to all tr of tbody start
    table_child = single_man_select_table.previousElementSibling.lastElementChild.lastElementChild.children;

    table_child = Array.isArray(table_child) ? table_child : Object.values(table_child);

    table_child.forEach(function(single_table_child){
      if(single_table_child.nodeName=="TBODY"){
        var single_table_child_tr = single_table_child.children;
        single_table_child_tr = Array.isArray(single_table_child_tr) ? single_table_child_tr : Object.values(single_table_child_tr);

        single_table_child_tr.forEach(function(single_table_child_tr_single){
        	// set callback method to all system tr
        	single_table_child_tr_single.setAttribute("click", callback_attr);
        });
      }
    });
    // push call back method to all tr of tbody end
  });
}




var man_select_table_from_system = document.querySelectorAll(".man_select_table_from_system"),
    search_field                 = document.querySelectorAll(".search_field"),
    manselect_table_bordered_td  = document.querySelectorAll(".manselect_table_bordered td");

if(search_field && manselect_table_bordered_td){
  search_field                = Array.isArray(search_field) ? search_field : Object.values(search_field);
  manselect_table_bordered_td = Array.isArray(manselect_table_bordered_td) ? manselect_table_bordered_td : Object.values(manselect_table_bordered_td);
  
  search_field.forEach(function(single_search_field, index){
    single_search_field.addEventListener('input', function(){
      
      manselect_table_bordered_td.forEach(function(single_manselect_table_bordered_td){
        if(single_manselect_table_bordered_td.closest('table')==single_search_field.parentElement.nextElementSibling){
          single_manselect_table_bordered_td.parentElement.style.display = 'none';
        }
      })
      
      //filter all td
      manselect_table_bordered_td.forEach(function(single_manselect_table_bordered_td){
        if(single_manselect_table_bordered_td.closest('table')==single_search_field.parentElement.nextElementSibling){
          var search_key = single_search_field.value.toLowerCase(),
              searchTo   = single_manselect_table_bordered_td.innerText.toLowerCase();
          
          if(searchTo.indexOf(search_key)>-1){
             single_manselect_table_bordered_td.parentElement.style.display = '';
          }
        }
      });
    });
  });
  
  
  // man_select table toggle start
  var man_table_selected = document.querySelectorAll(".man_table_selected");
  if(man_table_selected){
    man_table_selected = Array.isArray("man_table_selected") ? man_table_selected : Object.values(man_table_selected);
    man_table_selected.forEach(function(single_man_table_selected){
      single_man_table_selected.addEventListener('click', function(){
         
        if(this.nextElementSibling.classList.contains('active')){
          this.nextElementSibling.classList.remove('active');
        }else{
          // remove all active class from all select table start
          man_table_selected.forEach(function(single_man_table_selected){
              single_man_table_selected.nextElementSibling.classList.remove('active')
          });
          // remove all active class from all select table end
          this.nextElementSibling.classList.add('active');
        }
      });
    });
    
    window.addEventListener('click', function(event){
      if(event.target.closest('.man_select_table_from_system')==null){
          // remove all active class from all select table start
          man_table_selected.forEach(function(single_man_table_selected){
              single_man_table_selected.nextElementSibling.classList.remove('active')
          });
          // remove all active class from all select table start
      }
    });
    
  }
  // man_select table toggle start
}



// pass data to selected start
var man_select_tr      = document.querySelectorAll(".man_select_table_from_system .man_select_table_from_system_data_wrapper .manselect_table_bordered tr"),
man_table_selected_tr = document.querySelectorAll(".man_table_selected tbody tr");
if(man_select_tr && man_table_selected){
  man_select_tr         = Array.isArray(man_select_tr) ? man_select_tr : Object.values(man_select_tr);
  man_table_selected_tr = Array.isArray(man_table_selected_tr) ? man_table_selected_tr : Object.values(man_table_selected_tr);
  man_select_tr.forEach(function(single_man_select_tr, index){
    single_man_select_tr.addEventListener('click', function(){
      if(single_man_select_tr.hasAttribute('disabled')==false){
        
        // remove selected class from all tr start
        single_man_select_tr_siblings = single_man_select_tr.parentElement.children;
        single_man_select_tr_siblings = Array.isArray(single_man_select_tr_siblings) ? single_man_select_tr_siblings : Object.values(single_man_select_tr_siblings);
        single_man_select_tr_siblings.forEach(function(single_siblings){
          single_siblings.classList.remove('selected');
        });
        // remove selected class from all tr end

        // add a class to understand that this already selected and push this tr to .man_table_selected start
          single_man_select_tr.classList.add('selected');
          single_man_select_tr.closest('.man_select_table_from_system').children[1].innerHTML = single_man_select_tr.innerHTML;
        // add a class to understand that this already selected and push this tr to .man_table_selected end

        // push the tr value attribute data to input field start
        if(single_man_select_tr.closest('.man_select_table_from_system').firstElementChild.classList.contains("man_select_table_from_system_input_value")){
          single_man_select_tr.closest('.man_select_table_from_system').firstElementChild.value=single_man_select_tr.dataset.value;
        }
        // push the tr value attribute data to input field end

        // now remove active class from .man_select_table_from_system_data_wrapper to close select table start
        single_man_select_tr.closest(".man_select_table_from_system").lastElementChild.classList.remove('active');
        // now remove active class from .man_select_table_from_system_data_wrapper to close select table end
      }
    });
  }); 
}
/*man select table end ---------------------------------------------------------------*/


/*set z-index to the man select for layer maintaining start-----------------*/
window.addEventListener('load',set_man_select_z_index_for_best_positioning);
function set_man_select_z_index_for_best_positioning(){
	// set dynamic z-index for all man_select_table_from_system
	var man_select_z_index = document.querySelectorAll(".man_select_z_index");
	if(man_select_z_index){
	  man_select_z_index = Array.isArray(man_select_z_index) ? man_select_z_index : Object.values(man_select_z_index);
	  top_index = man_select_z_index.length;
	  man_select_z_index.forEach(function(single_man_select_z_index, index){
	    single_man_select_z_index.style.zIndex = (top_index-index);
	  });
	}	
}
/*set z-index to the man select for layer maintaining end-----------------*/













/***
/*Ex:
-----------------------------------------
/* <input type="file" id="upload">
/* <script>
/* 	var data = new activateCropper({
/* 		inputField: upload,
/* 		cropper: {
/* 			minSize: [100,100],
/* 			maxSize: [200,200]
/* 		},
/* 		preview: {
/* 			display: true,
/* 			size: [400,400]
/* 		}
/* 	});
/* 
/* 	data.getImg(250,250);
/* </script>
**/

"use strict"
var man_settings = {};
function activateCropper(option){
	/*cropper min and max width,height start-----------------*/
	man_settings.cropper_min_width 	= (option.cropper.minSize !== undefined && option.cropper.minSize[0] !== undefined) ? option.cropper.minSize[0] : 100;
	man_settings.cropper_min_height = (option.cropper.minSize !== undefined && option.cropper.minSize[1] !== undefined) ? option.cropper.minSize[1] : 100;

	man_settings.cropper_max_width 	= (option.cropper.maxSize !== undefined && option.cropper.maxSize[0] !== undefined) ? option.cropper.maxSize[0] : 200;
	man_settings.cropper_max_height = (option.cropper.maxSize !== undefined && option.cropper.maxSize[1] !== undefined) ? option.cropper.maxSize[1] : 200;
	/*cropper min and max width,height start-----------------*/


	/*cropped image preview size start------------------------*/
	man_settings.canvas_width  = (option.preview.size !== undefined && option.preview.size[0] !== undefined) ? option.preview.size[0] : 300;
	man_settings.canvas_height = (option.preview.size !== undefined && option.preview.size[1] !== undefined) ? option.preview.size[1] : 300;
	/*cropped image preview size end--------------------------*/


	man_settings.display = (option.preview.display !== undefined) ? option.preview.display : false;


	/*add addEventListener to user's inputField start-------------------------*/
	if(option.inputField!==undefined){
		man_settings.inputField = option.inputField;
		man_settings.inputField.addEventListener('change', get_base64_img);
	}else{
		alert("<input type='file' id='your_id_name' > is missing for man_image_cropper");
	}
	/*add addEventListener to user's inputField end---------------------------*/



	/*return a base64 image to user with specific width,height start*/
	this.getImg = function(width=200,height=200){
		console.log(width, height);
	}
	/*return a base64 image to user with specific width,height end*/
}





/*get base64 image source from input field start------------------------------------*/
function get_base64_img(){
	var file 	    = man_settings.inputField.files[0],
		image_src   = '',
		file_reader = new FileReader();

	if(file){
		file_reader.readAsDataURL(file);
	}

	file_reader.addEventListener('load', function(){
		image_src = file_reader.result;

		/*push the image base64 code man_settings start*/
		man_settings.src = image_src;
		/*push the image base64 code man_settings end*/


		/*generate man_cropper start--------*/
		man_cropper_container();
		/*generate man_cropper end----------*/

	});
}
/*get base64 image source from input field end--------------------------------------*/




function man_cropper_container(){
	// create wrapper
	var man_cropper_wrapper = document.createElement("div");

	// push the wrapper before man_image_cropper input field
	man_settings.inputField.parentElement.insertBefore(man_cropper_wrapper,man_settings.inputField);

	man_cropper_wrapper.innerHTML = `<canvas class="man_canvas"></canvas>
										<input type="range" class="resizer" min="1" max="5" step="any" value="1">
										<div class="man_crop_box">
											<img class="man_crop_img" src="${man_settings.src}" alt="">
											<div class="man_crop_img_cover"></div>
											<img class="man_crop_cliped_img" src="${man_settings.src}" alt="">
											<div class="man_cropper" style="width:${man_settings.cropper_min_width}px;height:${man_settings.cropper_min_height}px">
												<div class="man_resizer man_top_left_control"></div>
												<!-- <div class="man_resizer man_top_middle_control"></div> -->
												<div class="man_resizer man_top_right_control"></div>
												
												<!-- <div class="man_resizer man_middle_left_control"></div> -->
												<!-- <div class="man_resizer man_middle_right_control"></div> -->
												
												<div class="man_resizer man_bottom_left_control"></div>
												<!-- <div class="man_resizer man_bottom_middle_control"></div> -->
												<div class="man_resizer man_bottom_right_control"></div>

												<div class="croperDashed one"></div>
												<div class="croperDashed two"></div>
											</div>
										</div>`;



	/*select mancropper inside html start*/
	man_settings.man_crop_box 		 = man_cropper_wrapper.lastElementChild;
	man_settings.man_cropper 		 = man_settings.man_crop_box.lastElementChild;
	man_settings.man_crop_cliped_img = man_settings.man_cropper.previousElementSibling;
	man_settings.canvas 			 = man_cropper_wrapper.firstElementChild;
	/*select mancropper inside html end*/


	man_settings.man_cropper.style.cssText = `top:${man_settings.man_cropper.offsetTop}px;left:${man_settings.man_cropper.offsetLeft}px;width:${man_settings.cropper_min_width}px; height:${man_settings.cropper_min_height}px`;
	/*select mancropper inside data start*/
	
	// clip the image start
	image_clipping();
	// clip the image end


	/*setBoundary for cropper start*/
	setBoundary();
	/*setBoundary for cropper end*/


	/*man_cropper move activation start*/
	man_settings.man_cropper.addEventListener('mousedown', mouseDown, true);
	/*man_cropper move activation end*/
	print_to_canvas();
}





/*this method clipped the image after page load and when move the cropper start*/
function image_clipping(){
	var top 	= (man_settings.man_cropper.offsetTop<=0) ? (-1*man_settings.man_crop_cliped_img.offsetTop) : (man_settings.man_cropper.offsetTop+(-1*man_settings.man_crop_cliped_img.offsetTop)),
		left 	= (man_settings.man_cropper.offsetLeft<=0) ? (-1*man_settings.man_crop_cliped_img.offsetLeft) : (man_settings.man_cropper.offsetLeft+(-1*man_settings.man_crop_cliped_img.offsetLeft)),
		width 	= (man_settings.man_cropper.offsetWidth+left),
		height 	= (man_settings.man_cropper.offsetHeight+top);
	man_settings.man_crop_cliped_img.style.cssText = `clip: rect(${top}px, ${width}px, ${height}px, ${left}px)`;

	/*left boundary set start*/
	if(man_settings.man_cropper.offsetLeft){
		man_settings.man_crop_cliped_img.style.cssText = `clip: rect(${top}px, ${width}px, ${height}px, ${left}px)`;
	}
	/*left boundary set end*/

	/*top boundary set start*/
	if(man_settings.man_cropper.offsetTop){
		man_settings.man_crop_cliped_img.style.cssText = `clip: rect(${top}px, ${width}px, ${height}px, ${left}px)`;
	}
	/*top boundary set end*/

	/*bottom boundary set start*/
	if((height+man_settings.man_crop_cliped_img.offsetTop)>=man_settings.man_crop_box.offsetHeight){
		height = (man_settings.man_crop_box.offsetHeight-man_settings.man_crop_cliped_img.offsetTop);
		top    = (height-man_settings.man_cropper.offsetHeight);
		man_settings.man_crop_cliped_img.style.cssText = `clip: rect(${top}px, ${width}px, ${height}px, ${left}px)`;
	}
	/*bottom boundary set end*/

	/*right boundary set start*/
	if((width+man_settings.man_crop_cliped_img.offsetLeft)>=man_settings.man_crop_box.offsetWidth){
		width = (man_settings.man_crop_box.offsetWidth-man_settings.man_crop_cliped_img.offsetLeft);
		left  = (width-man_settings.man_cropper.offsetWidth);
		man_settings.man_crop_cliped_img.style.cssText = `clip: rect(${top}px, ${width}px, ${height}px, ${left}px)`;
	}
	/*right boundary set end*/
}
/*this method clipped the image after page load and when move the cropper end*/



/*cropper box mover start-------------------------------------------*/
var first_mouseX_pos,first_mouseY_pos,cropperTop,cropperLeft;
function mouseDown(){
	first_mouseX_pos  = event.clientX;
	first_mouseY_pos  = event.clientY;
	cropperTop		  = man_settings.man_cropper.offsetTop;
	cropperLeft		  = man_settings.man_cropper.offsetLeft;

	man_settings.man_cropper.addEventListener("mousemove",mouseMove);
	window.addEventListener('mouseup', function(){release_man_cropper();});
	


	function mouseMove(){
		var current_mouseX_pos = event.clientX,
			current_mouseY_pos = event.clientY,
			xDistance		   = (current_mouseX_pos-first_mouseX_pos),
			yDistance		   = (current_mouseY_pos-first_mouseY_pos);

		man_settings.man_cropper.style.cssText = `height:${man_settings.cropper_min_height}px;width:${man_settings.cropper_min_width}px;top:${cropperTop+yDistance}px; left:${cropperLeft+xDistance}px`;
		

		/*update clipped image style start*/
		image_clipping();
		/*update clipped image style end  */

		// set boundary for man cropper box start
		setBoundary();
		// set boundary for man cropper box end

		// print to canvas end
		print_to_canvas()
		// print to canvas end
	}

	function release_man_cropper(){
		man_settings.man_cropper.removeEventListener('mousemove', mouseMove);
		window.removeEventListener('mouseup', release_man_cropper);
	}
}

/*cropper box mover end---------------------------------------------*/



/*ths method calculate man_cropper boundary start*/
function setBoundary(){
	var cropper_left   = man_settings.man_cropper.offsetLeft,
		cropper_top    = man_settings.man_cropper.offsetTop,
		cropper_width  = man_settings.man_cropper.offsetWidth,
		cropper_height = man_settings.man_cropper.offsetHeight;

	// left boundary set start------------------
	if(cropper_left<0){
		cropper_left = 0;
		man_settings.man_cropper.style.cssText = `height:${cropper_height}px; width:${cropper_width}px; top:${cropper_top}px; left:${cropper_left}px`;
	}
	// left boundary set end--------------------

	// left boundary set start------------------
	if(cropper_top<0){
		cropper_top = 0;
		man_settings.man_cropper.style.cssText = `height:${cropper_height}px; width:${cropper_width}px; top:${cropper_top}px; left:${cropper_left}px`;
	}
	// left boundary set end--------------------

	// right boundary start--------------------
	if((cropper_left+cropper_width)>=man_settings.man_crop_box.offsetWidth){
		cropper_left = (man_settings.man_crop_box.offsetWidth-cropper_width);
		man_settings.man_cropper.style.cssText = `height:${cropper_height}px; width:${cropper_width}px; top:${cropper_top}px; left:${cropper_left}px`;
	}
	// right boundary end----------------------


	// bottom boundary start--------------------
	if((cropper_top+cropper_height)>=man_settings.man_crop_box.offsetHeight){
		cropper_top = (man_settings.man_crop_box.offsetHeight-cropper_height);
		man_settings.man_cropper.style.cssText = `height:${cropper_height}px; width:${cropper_width}px; top:${cropper_top}px; left:${cropper_left}px`;
	}
	// bottom boundary end----------------------
}
/*ths method calculate man_cropper boundary start*/




/*this method print the selected part of image into a canvas start*/
function print_to_canvas(){
	var img_original_width 	= man_settings.man_crop_cliped_img.naturalWidth,
		img_original_height = man_settings.man_crop_cliped_img.naturalHeight,
		img_current_width	= man_settings.man_crop_cliped_img.offsetWidth,
		img_current_height	= man_settings.man_crop_cliped_img.offsetHeight,
		image_x_ratio 		= (img_original_width/img_current_width),
		image_y_ratio 		= (img_original_height/img_current_height);

		man_settings.canvas.width  = man_settings.canvas_width;
		man_settings.canvas.height = man_settings.canvas_height;


	var top 	= (man_settings.man_cropper.offsetTop+(-1*man_settings.man_crop_cliped_img.offsetTop)),
		left 	= (man_settings.man_cropper.offsetLeft+(-1*man_settings.man_crop_cliped_img.offsetLeft)),
		width 	= man_settings.man_cropper.offsetWidth,
		height 	= man_settings.man_cropper.offsetHeight,
		ctx 	= man_settings.canvas.getContext("2d");


	ctx.clearRect(0,0,man_settings.canvas.width,man_settings.canvas.height);
	ctx.drawImage(man_settings.man_crop_cliped_img, (left*image_x_ratio), (top*image_y_ratio), (width*image_x_ratio), (height*image_y_ratio), 0, 0, man_settings.canvas.width, man_settings.canvas.height);
}
/*this method print the selected part of image into a canvas start*/






















/*****
/* <div class="man_price_range" data-min="0" data-max="300" step="2" data-control="2"></div>
/* <div class="man_price_rang_from_system">
/* 	<div class="man_price_active_color"></div>
/* 	<div class="man_price_rang_from_system_min"></div>
/* 	<div class="man_price_rang_from_system_max"></div>
/* </div>
****/
var man_price_rang_from_system         = document.querySelectorAll(".man_price_rang_from_system"),
    man_price_active_color = document.querySelectorAll(".man_price_active_color"),
    man_price_rang_from_system_max    = document.querySelectorAll(".man_price_rang_from_system_max"),
    man_price_rang_from_system_min    = document.querySelectorAll(".man_price_rang_from_system_min");

if(man_price_rang_from_system && man_price_active_color){
  man_price_rang_from_system = Array.isArray(man_price_rang_from_system) ? man_price_rang_from_system : Object.values(man_price_rang_from_system);
  
  man_price_rang_from_system.forEach(function(single_man_price_rang, index){
    set_man_price_active_color(index);
  });
}


/*work with min price range start---------------------------------*/
if(man_price_rang_from_system_min){
  man_price_rang_from_system_min = Array.isArray(man_price_rang_from_system_min) ? man_price_rang_from_system_min : Object.values(man_price_rang_from_system_min);
  man_price_rang_from_system_min.forEach(function(single_man_price_rang_from_system_min, index){
    
    single_man_price_rang_from_system_min.addEventListener("mousedown", function(event){
      var prevX         = event.clientX,
          min_rang_left = single_man_price_rang_from_system_min.offsetLeft;
      
      window.addEventListener('mousemove', mouse_move);
      window.addEventListener('mouseup', mouse_up);
      
      function mouse_move(event){
        var currentX = event.clientX,
            distance = (currentX-prevX),
            left     = (distance+min_rang_left);


        /*work with boundary start*/
          // left boundary start
          if(left<0){
            left = 0;
          }
          // left boundary end

          // right boundary start
          if(single_man_price_rang_from_system_min.offsetLeft>=man_price_rang_from_system_max[index].offsetLeft){
            left = (man_price_rang_from_system_max[index].offsetLeft);
          }
          // right boundary end
        /*work with boundary end--*/


        /*change the position of min rang circale start*/
        single_man_price_rang_from_system_min.style.left = `${left}px`;
        /*change the position of min rang circale end*/

        /*update the style of div.man_price_active_color when change the position of min range start*/ 
        set_man_price_active_color(index);
        /*update the style of div.man_price_active_color when change the position of min range end*/ 
      }
      
      
      function mouse_up(){
        window.removeEventListener('mousemove', mouse_move);
        window.removeEventListener('mouseup', mouse_up);
      }
      
    });
  });
}
/*work with min price range end-----------------------------------*/




/*work with max price range start---------------------------------*/
if(man_price_rang_from_system_max){
  man_price_rang_from_system_max = Array.isArray(man_price_rang_from_system_max) ? man_price_rang_from_system_max : Object.values(man_price_rang_from_system_max);
  man_price_rang_from_system_max.forEach(function(single_man_price_rang_from_system_max, index){

    single_man_price_rang_from_system_max.addEventListener("mousedown", function(event){
      var prevX         = event.clientX,
          min_rang_left = single_man_price_rang_from_system_max.offsetLeft;
      
      window.addEventListener('mousemove', mouse_move);
      window.addEventListener('mouseup', mouse_up);
      
      function mouse_move(event){
        var currentX = event.clientX,
            distance = (currentX-prevX),
            left     = (distance+min_rang_left);


        // set boundary start
          // left boundary start
          if(left<=man_price_rang_from_system_min[index].offsetLeft){
            left = man_price_rang_from_system_min[index].offsetLeft;
          }
          // left boundary end

          // right boundary start
          if(man_price_rang_from_system_max[index].parentElement.offsetWidth<=left){
            left = man_price_rang_from_system_max[index].parentElement.offsetWidth;
          }
          // right boundary end
        // set boundary end


        /*change the position of max rang circale start*/
        single_man_price_rang_from_system_max.style.left=`${left}px`;
        /*change the position of max rang circale end*/


        /*update the style of div.man_price_active_color when change the position of max range start*/ 
        set_man_price_active_color(index);
        /*update the style of div.man_price_active_color when change the position of max range end*/ 
      }
      
      
      function mouse_up(){
        window.removeEventListener('mousemove', mouse_move);
        window.removeEventListener('mouseup', mouse_up);
      }
      
    });
  });
}
/*work with max price range end-----------------------------------*/



/*this method work with colored rangbar start*/
function set_man_price_active_color(index){
  var range_min_left = man_price_rang_from_system_min[index].offsetLeft+(man_price_rang_from_system_min[index].offsetWidth/2),
      range_max_left = man_price_rang_from_system_max[index].offsetLeft,
      distence       = (range_max_left-range_min_left);
  
    man_price_active_color[index].style.left  = `${range_min_left}px`;

    if(man_price_rang_from_system_max[index].offsetLeft==man_price_rang_from_system_min[index].offsetLeft){
      man_price_active_color[index].style.width = `0px`;
    }else{
      man_price_active_color[index].style.width = `${distence}px`;
    }
}
/*this method work with colored rangbar end*/