var charts;
var testChart;
var tab = false;
var poppedUp = false;
var drawComplete = true;
var chartObjects = {};
var allMaps = {};
var isMobile = function(){
	return $(window).width() < 767;
};
var isTablet = function(){
	return $(window).width() < 1024;
};

var searchPopup = function(){
	if(poppedUp){
		return false;
	}else{
		poppedUp = true;
		$(".header").addClass("poppedUp");
	}
	loadNextFlag();

	$("nav").removeClass("navOpen");

	$("#citySearch input").focus();
	$("body").addClass("no-scroll");
	$("#citySearch").addClass("poppedUp");
	$(".closeCitySearch").off("click").on("click", function(e){
		e.stopPropagation();
		searchPopdown();
	});
};
var searchPopdown = function(){
	$("#citySearch input").blur();
	$("body").removeClass("no-scroll");
	$("#citySearch").removeClass("poppedUp");
	poppedUp = false;
	$(".header").removeClass("poppedUp");
};
var setFooter = function(){
	if(isMobile()){
		$("body").css("padding-bottom", "");
	}else{
		var h = $("footer").outerHeight();
		$("body").css("padding-bottom", h);
	}
};

$(document).ready(function(){

	if(isTablet()){
		// grab an element
		var heady = document.querySelector("header");
		// construct an instance of Headroom, passing the element
		var headroom  = new Headroom(heady);
		// initialise
		headroom.init(); 
	}

	L.mapbox.accessToken = 'pk.eyJ1Ijoid2lsbGNtY2N1c2tlciIsImEiOiJjaXF0c2hseGswMDZtZnhuaHlwdmdiOXM1In0._0qo-NTp7TGotAhL6sa4Og';

	$(".mobile-map-cover").on("click", function(){
		if(isTablet()){
			$(this).addClass("clicked-map");

		}
	});

	$(window).resize(function(){
		setFooter();
	});
	setFooter();
	// loadNextFlag();
	visibleGraph();

	$("#citySearch input").on("focus click", function(){
		searchPopup();
	});
	$("#citySearch").on("click", function(){
		if(!poppedUp){
			searchPopup();
		}
	});

	$(document).on("keyup", function(e) {
		if(e.keyCode == 91){
			tab = false;
		}
	});
	$(document).on("keydown", function(e) {
		if(tab){
			return;
		}
		if($("#data-table input").is(':focus')){
			return;
		}
		if(e.keyCode == 91){
			tab = true;
			setTimeout(function(){
				tab = false;
			}, 1000);
			return;
		}
		if (e.keyCode == 27 && poppedUp) {
			searchPopdown();
			return;
		}
	    var regex = new RegExp("^[a-zA-Z0-9]+$");
	    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
	    if (regex.test(str) && !poppedUp) {
		     	searchPopup();
	    }
	});
	var citySearch = new List('citySearch', {valueNames: ['popup-city-country', 'popup-city-city', 'popup-city-region' ]});
	citySearch.on("updated", function(){
		if($("#citySearch input").val() !== ""){
			$("#citySearch").removeClass("unlisted");
		}else{
			$("#citySearch").addClass("unlisted");
		}
	});

	$("nav").click(function(e){
		if(!isTablet()){
			return;
		}
		$("nav").toggleClass("navOpen");
	});
	$(".region").click(function(){
		if(!isTablet()){
			return false;
		}
		var className = $(this).parent()[0].className;
		$("#cityList").toggleClass(className);
	});


	// Chart.defaults.global.animation.duration = 0;
	var route = window.location.href.split("//")[1].split("/").filter(function(e){ return e === 0 || e; });
	var model = false;
	var controller = "index";
	var params = false;
	$(route).each(function(i,e){
		switch(i){
			case(0):
				//domain
			break;
			case(1):
				switch(e){
					case("cities"):
						model = "cities";
						controller = "index";
					break;
					case("about"):
						model = "pages";
						controller = "about";
					break;
					case("data"):
						model = "cities";
						controller = "data";
					break;
					default:
					model = e;
				}
			break;
			case(2):
				controller = e;
			break;
			case(3):
				params = [e];
			break;
			default:
				params.push(e);
		}
	});

	switch(model){
		case("cities"):
			switch(controller){
				case("index"):
					//filter list

				break;
				case("data"):
					//table
					 var dataList = new List('data-table',
					 	{valueNames: ['country', 'name' ],
					 	page: 10,
						plugins: [
							ListPagination({})
						]
					 });

					 $(".per-page select").on("change", function(){
					 	dataList.page = $(this).val();
					 	dataList.update();

					 });


					$(".show-methodology").click(function(){
						if($(this).html() == "Show Methodology"){
							$(this).html("Hide Methodology");
						}else{
							$(this).html("Show Methodology");
						}
						$(".methodology").slideToggle();
					});
					$(".show-links").click(function(){
						$(this).toggleClass("showing-link");
						var next = $(this).next(".expansion-links");
						$(next).css("z-index", 2);
						$(".hide-on-desktop .expansion-links").not(next).prev().removeClass("showing-link").next().css("z-index", 1).slideUp();
						$(next).slideToggle();
					});
				break;
				case("view"):
					$(window).on("scroll", visibleGraph);

					$('.periodToggle').change(function(event) {
						$(this).parents(".map-legend-years").find(".current-year").removeClass("current-year");
						if($(this).is(":checked")){
							$(this).parent().addClass("current-year");
						}
						var target = $(event.target).data("target");
						var prefix = $('.' + target +'.periodToggle:checked').val();
						var targetMap = allMaps[target];
						var t1Layer = allMaps[target + '_' + 't1_layer'];
						var t2Layer = allMaps[target + '_' + 't2_layer'];
						var t3Layer = allMaps[target + '_' + 't3_layer'];
						var style = allMaps[target + 'Style'];

						if(prefix == 't1'){
							targetMap.addLayer(t1Layer);
							targetMap.removeLayer(t2Layer);
							if(t3Layer){targetMap.removeLayer(t3Layer);}
						}else if(prefix == 't2'){
							targetMap.addLayer(t2Layer);
							targetMap.removeLayer(t1Layer);
							if(t3Layer){targetMap.removeLayer(t3Layer);}
						}else{
							targetMap.addLayer(t3Layer);
							targetMap.removeLayer(t1Layer);
							targetMap.removeLayer(t2Layer);
						}

						if(style){style.bringToFront();}

						$('.' + target + '.layerToggle').each(function(index, el){
							selectedLayer = allMaps[target + '_' + prefix + '_' + $(el).prop('name')];
							
							if($(this).is(":checked")){
								if(!targetMap.hasLayer(selectedLayer)){
									targetMap.addLayer(selectedLayer);
								}
								selectedLayer.setOpacity(1);
							}else{
								if(targetMap.hasLayer(selectedLayer)){
									selectedLayer.setOpacity(0);
									targetMap.removeLayer(selectedLayer);
								}
								// selectedLayer.setOpacity(0).removeLayer();
								// selectedLayer.setOpacity(0);
							}
						});
					});

					$('.layerToggle').change(function() {
						$(this).parent().toggleClass("checked");
						var target = $(event.target).data("target");
						var targetMap = allMaps[target];
						var prefix = $('.' + target +'.periodToggle:checked').val();
						var layer = allMaps[target + '_' + prefix + '_' + $(this).prop('name')];
						var style = allMaps[target + 'Style'];
						if($(this).is(':checked')) {
							if(!targetMap.hasLayer(layer)){
								targetMap.addLayer(layer);
							}
							layer.setOpacity(1).bringToFront();
							if(style){style.bringToFront();}
						}else{
							if(targetMap.hasLayer(layer)){
								layer.setOpacity(0).bringToBack();
								targetMap.removeLayer(layer);
							}
						}
					});




					charts = {
						"urban_extent_composition_stacked_bar" : {
							labels : ["T1", "T2", "T3"],
							datasets:[
								{
									backgroundColor: "#B4A4AF",
									borderWidth : 0,
									label: ["Urban Built Up"],
									data : [city.DataSet.urban_extent_composition_urban_t1,
									city.DataSet.urban_extent_composition_urban_t2,
									city.DataSet.urban_extent_composition_urban_t3]
								},
								{
									backgroundColor: "#BDB8C2",
									borderWidth : 0,
									label: ["Suburban Built Up"],
									data : [city.DataSet.urban_extent_composition_suburban_t1,
									city.DataSet.urban_extent_composition_suburban_t2,
									city.DataSet.urban_extent_composition_suburban_t3]
								},
								{
									backgroundColor: "#C6CCD4",
									borderWidth : 0,
									label: ["Rural Built Up"],
									data : [city.DataSet.urban_extent_composition_rural_t1,
									city.DataSet.urban_extent_composition_rural_t2,
									city.DataSet.urban_extent_composition_rural_t3]
								},
								{
									backgroundColor: "#CDE0E4",
									borderWidth : 0,
									label: ["Urbanized Open Space"],
									data : [city.DataSet.urban_extent_composition_open_t1,
									city.DataSet.urban_extent_composition_open_t2,
									city.DataSet.urban_extent_composition_open_t3]
								}
							]
						},
						"roads_width_stacked_bar" : {
							labels : [city.City.t1.substr(0,4)+"-"+city.City.t2.substr(0,4), city.City.t2.substr(0,4)+"-"+city.City.t3.substr(0,4)],
							datasets:[
								{
									backgroundColor : '#889A9A',
									borderWidth : 0,
									label : '<4m',
									data : [city.DataSet.roads_width_under_4m_pre_1990 * 100,
									city.DataSet.roads_width_under_4m_1990_2015 * 100 ]
								},
								{
									backgroundColor : '#93AFA9',
									borderWidth : 0,
									label : '4-8m',
									data : [city.DataSet.roads_width_4_8m_pre_1990 * 100,
									city.DataSet.roads_width_4_8m_1990_2015 * 100 ]
								},
								{
									backgroundColor : '#9FC3B5',
									borderWidth : 0,
									label : '8-12m',
									data : [city.DataSet.roads_width_8_12m_pre_1990 * 100,
									city.DataSet.roads_width_8_12m_1990_2015 * 100 ]
								},
								{
									backgroundColor : '#AED7C0',
									borderWidth : 0,
									label : '12-16m',
									data : [city.DataSet.roads_width_12_16m_pre_1990 * 100,
									city.DataSet.roads_width_12_16m_1990_2015 * 100 ]
								},
								{
									backgroundColor : '#BFECCA',
									borderWidth : 0,
									label : '>16m',
									data : [city.DataSet.roads_width_over_16m_pre_1990 * 100,
									city.DataSet.roads_width_over_16m_1990_2015 * 100 ]
								}
							]
						},
						"arterial_roads" : {
							labels : ["City", "Region", "World"],
							datasets: [
								{
									label : "Wide",
									suffix : "_wide_",
									backgroundColor: '#F1E0DE',
									borderWidth : 0,
								},
								{
									label : "Narrow",
									suffix : "_narrow_",
									backgroundColor: '#E1C6C4',
									borderWidth : 0,
								},
								{
									label : "All",
									suffix : "_all_",
									backgroundColor: '#CEADA9',
									borderWidth : 0,
								},
							]
						},
						"blocks_and_plots_composition_special_stacked" : {
							labels : ['City', 'Region', 'World'],
							datasets : [
							{
								suffix :"_atomistic_",
								bgColor : "#889A9A",
								label : "Atomistic"
							},
							{
								suffix :"_informal_",
								bgColor : "#93AFA9",
								label : "Informal"
							},
							{
								suffix :"_formal_",
								bgColor : "#9FC3B5",
								label : "Formal"
							},
							{
								suffix :"_housing_",
								bgColor : "#AED7C0",
								label : "Housing"
							}
							]
						},
					};

					// var waypoints = $('.city-map').waypoint({
					// 	handler: function(direction) {
					// 		// alert("now");
					// 		if($(this.element).hasClass("leaflet-container")){
					// 			return;
					// 		}
					// 		switch(this.element.id){
					// 			case("urban_extent_t1_map"):

					// 				var map = L.mapbox.map('urban_extent_t1_map', 'mapbox.light', {
					// 					center: [city.City.latitude, city.City.longitude],
					// 					zoom: 11,
					// 					maxZoom: 16,
					// 					minZoom: 10,
					// 					scrollWheelZoom : false
					// 				});
					// 				/*var OpenStreetMap_Mapnik = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
					// 					maxZoom: 16,
					// 					minZoom: 10,
					// 					attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
					// 				}).addTo(map);*/

					// 				var outline = L.tileLayer('/tiles/show/'+city.City.name.toLowerCase()+'-urban_extent_t2_outline/{z}/{x}/{y}.png', {tms: true}).addTo(map);
					// 				var urban = L.tileLayer('/tiles/show/'+city.City.name.toLowerCase()+'-urban_extent_t2_urban/{z}/{x}/{y}.png', {tms: true});
					// 				var suburban = L.tileLayer('/tiles/show/'+city.City.name.toLowerCase()+'-urban_extent_t2_suburban/{z}/{x}/{y}.png', {tms: true});
					// 				var rural = L.tileLayer('/tiles/show/'+city.City.name.toLowerCase()+'-urban_extent_t2_rural/{z}/{x}/{y}.png', {tms: true});
					// 				var openSpace = L.tileLayer('/tiles/show/'+city.City.name.toLowerCase()+'-urban_extent_t2_open_space/{z}/{x}/{y}.png', {tms: true});

					// 				$('.layerToggle').change(function() {
					// 					/*jshint ignore:start */
					// 					var layer = eval($(this).prop('name'));
					// 					/*jshint ignore:end */
					// 					if($(this).is(':checked')) {
					// 						map.addLayer(layer);
					// 					}else{
					// 						map.removeLayer(layer);
					// 					}
					// 				});
					// 			break;
					// 			case("roads_map"):
					// 				make_roads_map();
					// 			break;
					// 			case("composition_of_added_area_map"):
					// 				make_composition_of_added_area_map();
					// 			break;
					// 	    }
					// 	},
					// 	offset : "100%"
					// });




					globalOptions = {
						deferred : {
							enabled:true,
							// delay : 500
						},
						maintainAspectRatio: false,
						// responsiveAnimationDuration : 500,
						title : {
							display:true
						},
						tooltips : {
							display : true,
							callbacks : {
								title : function(){
									return "";
								}
							}
						},
						animation : {
							onComplete : function(){
								drawComplete = true;
							}
						},
						legend : {
							display:false,
							position :  "right",
						},
						legendCallback : function(chart){

							var legend = $("<ul>").addClass("legend-ul");
							for(var i=0;i<chart.data.datasets.length; i++){
								data = chart.data.datasets[i];
								var color = chart.config.options.legend.labels.fontColor;

								$(legend).append(
									$("<li>").attr("style" , "color:"+color)
									.append(
										$("<div>").addClass("legend-click")
										.attr("style", "background-color:"+data.backgroundColor)
									).append(chart.data.datasets[i].label)
								);
							}
							return $(legend).outerHTML();
						},
						responsive : true,
						defaultFontFamily : "DINNextLTProLight",
						yAxes : {
							display: true
						},
						xAxes : {
							display: true
						}
					};
					Chart.defaults.global = MergeRecursive(Chart.defaults.global, globalOptions);

					$(".switchYear").click(function(){
						var canvas = $(this).parent().siblings("canvas");
						var id = $(canvas).attr("id");
						var chart = chartObjects[id];
						$(this).siblings(".switchYear").removeClass("activeYear");
						$(this).addClass("activeYear");
						data = $(this).data("year") == "1990" ? $(canvas).data("1990") : $(canvas).data("2015");
						// chart.data = data;
						// chart.chart.config.data = data;
						// chart.config.data =  MergeRecursive(chart.config.data, data);

						chart.config.data = data;
						chart.update();
					});

					$(".city-graphic").each(function(){
						switchGraph($(this).attr("id"));
					});
					$('a[href*="#"]:not([href="#"])').click(function() {
					    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
					      var target = $(this.hash);
					      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
					      if (target.length) {
					        $('html, body').animate({
					          scrollTop: target.offset().top
					        }, 1000);
					        return false;
					      }
					    }
					  });
				break;
				default:
			}
		break;
		case(false):
			//map
			startFrontMap();
		break;
		case("pages"):
			switch(controller){
				case("about"):

				break;
				default:
			}
		break;
		default:
	}

});

var loadImage = function(lazy, callback){
	var img = new Image();
	img.onload = function(){
		if($(lazy).is("img")){
			$(lazy).attr("src", $(lazy).data("src")).removeClass("lazyimg");
		}else{
			$(lazy).css("background-image", "url('"+img.src+"')").removeClass("lazyimg");
		}
		if(typeof(callback) == "function"){
			callback();
		}
	};
	img.onerror = function(){
		$(lazy).removeClass("lazyimg");
		var asset = img.src.replace(/^.*[\\\/]/, '');
		$(".lazyimg[data-src$='"+asset+"'").removeClass("lazyimg");

		if(typeof(callback) == "function"){
			callback();
		}
	};
	img.src = $(lazy).data("src");
};

var loadNextFlag = function(){
	var lazy = $(".lazyimg").last();
	if(lazy.length === 0){
		return;
	}
	loadImage(lazy, function(){
		loadNextFlag();
	});
};





var switchGraph = function(id){
	switch(id){
		case("population_line"):
		case("density_built_up_line"):
		case("density_urban_extent_line"):
			makeLine(id, city);
		break;
		case("population_change_bar"):
		case("urban_extent_change_bar"):
		case("density_built_up_change_bar"):
		case("density_urban_extent_change_bar"):
			makeChart(id, city);
		break;
		case("roads_in_built_up_area_bar"):
		case("roads_average_width_bar"):
		case("blocks_plots_average_block_bar"):
			makeChart(id, city, true);
		break;
		case("urban_extent_composition_stacked_bar"):
			makeStacked(id, city);
		break;
		case("roads_width_stacked_bar"):
			makeStacked(id, city, true);
		break;
		case("arterial_roads_density_bar"):
		case("arterial_roads_walking_bar"):
		case("arterial_roads_beeline_bar"):
			makeRoadChart(id, city);
		break;
		case("blocks_plots_average_bar"):
			makeBlockChart(id, city);
		break;
		case("blocks_and_plots_composition_special_stacked"):
			makeSpecialStacked(id, city);
		break;
		default:
	}
	var chart = chartObjects[id];
	var legend = chart.generateLegend();
	$('#'+id).parent().next(".hold-legend").html(legend);//.on("click", chart.config.options.legend.onClick);

};

var stackedXAxes =  function(id){
	return [{
		stacked : id == "blocks_and_plots_composition_special_stacked" ? true : true,
		ticks: {
			beginAtZero : true,
			max : 100,
			callback: function(value, index, values) {

				if($("#"+id).data("multiply") !== undefined){
					value *= $("#"+id).data("multiply");
				}
				return   value+"%";
			}
		},
		gridLines : {
			display: false
		},
	}];
};

var stackedYAxes = function(id){
	return [{
		ticks: {
			beginAtZero:true
		},
		stacked : true,
		gridLines : {
			display: false
		},
		categoryPercentage : 0.6,
		barPercentage : 1,
	}];
};

var bigTooltip = function(amount, label, unit){
	amount = amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	return label+": "+amount+unit;
};

var percentageTooltip = function(amount, label, multiplyData){
	if(multiplyData !== undefined){
		amount *= multiplyData;
	}
	// return  label+": "+amount+"%";
	return  label+": "+(Math.floor(amount*100)/100)+"%";
};



var makeLine = function(prefix, city){
	var ctx = $("#"+prefix);
	var field = prefix.replace("_line", "");
	var data = {
			labels : [ city.City.t1, city.City.t2, city.City.t3],
			datasets: [{
				pointRadius: 5,
				borderJoinStyle : "miter",
				lineTension : 0,
				borderWidth : 1,
				borderColor : "#7b7b7b",
				pointBorderColor : "#7b7b7b",
				pointBorderWidth : 1,
				fill : false,
				label : ctx.data("title"),
				data : [city.DataSet[field+"_t1"], city.DataSet[field+"_t2"], city.DataSet[field+"_t3"]]
			}]
		};
	var max = Math.max.apply( Math, data.datasets[0].data );
	var min = Math.min.apply( Math, data.datasets[0].data.filter(Boolean));
	var log = Math.floor(Math.log(max)/Math.log(10));
	log = Math.pow(10, log);
	yMax = Math.ceil((max + min)/log) * log;

	var dateStart = new Date(city.City.t1);
	var dateEnd = new Date(city.City.t3);
	var dateSpan = dateEnd.getTime() - dateStart.getTime();
	var dateMin = new Date(dateStart.getTime() - dateSpan);
	var dateMax = new Date(dateEnd.getTime() + dateSpan);

	chartObjects[prefix] = new Chart(ctx, {
		type : "line",
		data : data,
		options: {
			tooltips : {
				callbacks : {
					label : function(tooltipItem, data) { 

						var label = tooltipItem.xLabel.substr(0,4);//+" "+data.datasets[tooltipItem.datasetIndex].label;
						var number  = tooltipItem.yLabel;

						return bigTooltip(number, label, $(ctx).data("unit"));
					}
				}
			},
			title: {
				text: $(ctx).data("title")
			},
			legend : {
				display: false
			},
			scales : {
				yAxes : [{
					ticks: {
						min : 0,
						max : yMax,
						callback: function(value, index, values) {
							return  value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
						}
					}
				}],
				xAxes : [{
					type : 'time',
					time : {
						displayFormats : {
							quarter : 'MMM YYYY'
						},
						min : new Date("1980-01-01"),//dateMin,
						max : new Date("2020-01-01"),//dateMax,
						unitStepSize : 5,
					},
/*
					ticks: {
		                callback: function(value, index, values) {
			                return value % 5 === 0 ? value : "";
		                }
					}*/
				}]
			}
		}
	});
};

var makeChart = function(prefix, city, side){
	side = typeof(side) == "undefined" ? false : true;
	var ctx = $("#"+prefix);
	var field = prefix.replace("_bar", "");
	var suffix_1 = side ? "_pre_1990" : "_t1_t2";
	var suffix_2 = side ? "_1990_2015" : "_t2_t3";
	var data = {
		labels: [/*"City",*/city.City.name,  /*"Region",*/ city.Region.name, "World"],
		datasets: [{
			label: side ? city.City.t1.substr(0,4)+"-"+city.City.t2.substr(0,4) : city.City.t1.substr(0,4)+"-"+city.City.t2.substr(0,4),//'T1-T2',
			backgroundColor: "#C8C0C3",
			borderWidth : 0,
			data : [city.DataSet[field+suffix_1], city.Region.DataSet[field+suffix_1], city.World.DataSet[field+suffix_1]]
		},{
			label: side ? city.City.t2.substr(0,4)+"-"+city.City.t3.substr(0,4) : city.City.t2.substr(0,4)+"-"+city.City.t3.substr(0,4),//'T2-T3',
			backgroundColor: "#F1E4DE",
			borderWidth : 0,
			data : [city.DataSet[field+suffix_2], city.Region.DataSet[field+suffix_2],  city.World.DataSet[field+suffix_2]]
		}
		]
	};

	var yAxes = [{
		ticks: {
			beginAtZero:true,
			callback: function(value, index, values) {
				if(side){
					if($(ctx).data("multiply") !== undefined){
						value *= $(ctx).data("multiply");
					}
					value = (Math.floor(value*100)/100).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					// value = newValue == 0 ? value : newValue;
					if($(ctx).data("unit") !== undefined){
						if($(ctx).data("unit") == "%" || $(ctx).data("unit") == "m"){
							value += $(ctx).data("unit");
						}
					}
					return value;
				}else{
					value = Math.floor(value*100)/100;
					// value = newValue == 0 ? value : newValue;
					return value+"%";
				}
			}
		},
	}];
	var xAxes = [{
		ticks: {
			beginAtZero:true,
			callback : function(value, index, values){
				return value.split(" ");
			}
		},
		gridLines : {
			display: false
		},
	}];
	chartObjects[prefix] = new Chart(ctx, {
		type: side ? 'horizontalBar' : 'bar',
		data: data,
		options: {
			legend : {
				labels : {
					fontColor: "#afafaf",
					boxWidth : 10,
				}
			},
			responsive : true,
			gridLines : {
					display: false
				},
			tooltips : {
				callbacks : {
					title : function(){
						return false;
					},
					label : function(tooltipItem, data){
						label = data.datasets[tooltipItem.datasetIndex].label;
						if(side){
							number = tooltipItem.xLabel;
							if($(ctx).data("unit") !== undefined){
								if($(ctx).data("unit") == "%"){
									return percentageTooltip(number, label, $(ctx).data("multiply"));
								}
							}

							return bigTooltip(number, label, $(ctx).data("unit"));
						}else{
							number = tooltipItem.yLabel;
							return percentageTooltip(number, label, $(ctx).data("multiply"));
						}
					}
				}
			},
			title: {
				text: $(ctx).data("title")
			},
			scales: {
				yAxes: side ? xAxes : yAxes,
				xAxes: side ? yAxes : xAxes
			}
		}
	});
};

var makeStacked = function(prefix, city, vert){
	vert = typeof(vert) == "undefined" ? false : true;
	var ctx = $("#"+prefix);
	var field = prefix.replace("_stacked_bar", "");

	var data = charts[prefix];
	chartObjects[prefix] = new Chart(ctx, {
		type: vert ? 'bar' : 'horizontalBar',
		data: data,
		options: {
			legend : {
				labels : {
					fontColor: "#4A4A4A",
					boxWidth : 10,
				}
			},
			tooltips : {
				callbacks : {
					title : function(){
						return false;
					},
					label : function (tooltipItem, data){
						var label = data.datasets[tooltipItem.datasetIndex].label;
						var number = vert ? tooltipItem.yLabel : tooltipItem.xLabel;
						return percentageTooltip(number, label, $(ctx).data("multiply"));
					}
				}
			},
			title: {
				text: $(ctx).data("title")
			},
			scales: {
				yAxes: vert ? stackedXAxes(prefix) : stackedYAxes(prefix),
				xAxes: vert ? stackedYAxes(prefix) : stackedXAxes(prefix)
			}
		}
	});
};




var makeRoadChart = function(prefix, city){

	//1990_data
	//2015_data

	var ctx = $("#"+prefix);
	var field = prefix.replace("_bar", "");

	var data_1990 = {
		labels : charts.arterial_roads.labels,
		datasets : []
	};
	var data_2015 = {
		labels : charts.arterial_roads.labels,
		datasets : []
	};

	$(charts.arterial_roads.datasets).each(function(){
		var data = {
			backgroundColor : this.backgroundColor,
			borderWidth : 0,
			label : this.label,
			data: [city.DataSet[field+this.suffix+"pre_1990"], city.Region.DataSet[field+this.suffix+"pre_1990"], city.World.DataSet[field+this.suffix+"pre_1990"]]
		};
		data_1990.datasets.push(jQuery.extend({}, data));

		data.data = [city.DataSet[field+this.suffix+"1990_2015"], city.Region.DataSet[field+this.suffix+"1990_2015"], city.World.DataSet[field+this.suffix+"1990_2015"]];
		data_2015.datasets.push(jQuery.extend({}, data));
	});

	$(ctx).data("1990", data_1990);
	$(ctx).data("2015", data_2015);

	chartObjects[prefix] = new Chart(ctx, {
		type:  'horizontalBar',
		data: data_1990,
		options: {
			legend : {
				labels : {
					fontColor: "#afafaf",
					boxWidth : 10,
				}
			},
			gridLines : {
				display: false
			},
			tooltips : {
				callbacks : {
					title : function(){
						return false;
					},
					label :  function (tooltipItem, data){
						var label = data.datasets[tooltipItem.datasetIndex].label;
						var number =  tooltipItem.xLabel;
						if($(ctx).data("unit") == "%"){
							return percentageTooltip(number, label, $(ctx).data("multiply"));
						}else{
							return bigTooltip(number, label, $(ctx).data("unit"));
						}
					}
				}
			},
			title: {
				text: $(ctx).data("title")
			},
			scales: {
				yAxes: [{
				ticks: {
					beginAtZero:true
				},
				gridLines : {
					display: false
				},
			}],
				xAxes: [{
					ticks: {
						beginAtZero:true,
						// max : max,
						callback: function(value, index, values) {
							if($(ctx).data("multiply") !== undefined){
								value *= $(ctx).data("multiply");
							}
							value = Math.floor(value*100)/100;
							if($(ctx).data("unit") !== undefined){
								var unit = $(ctx).data("unit");
								if(unit == "%" || unit == "m"){
									value += $(ctx).data("unit");
								}
							}
							return value;
						}
					},
				}]
			}
		}
	});
};




var makeSpecialStacked = function(prefix, city){
	var ctx = $("#"+prefix);
	var field = prefix.replace("_special_stacked", "");

	var data_1990 = {
		labels : charts[prefix].labels,
		datasets : []
	};
	var data_2015 = {
		labels : charts[prefix].labels,
		datasets : []
	};

	$(charts[prefix].datasets).each(function(){
		var data = {
			backgroundColor : this.bgColor,
			borderWidth : 0,
			label : this.label,
			data : [city.DataSet[field+this.suffix+"pre_1990"], city.Region.DataSet[field+this.suffix+"pre_1990"],  city.World.DataSet[field+this.suffix+"pre_1990"]]
		};
		data_1990.datasets.push(jQuery.extend({}, data));
		data.data = [city.DataSet[field+this.suffix+"1990_2015"], city.Region.DataSet[field+this.suffix+"1990_2015"],  city.World.DataSet[field+this.suffix+"1990_2015"]];
		data_2015.datasets.push(jQuery.extend({}, data));
	});


	$(ctx).data("1990", data_1990);
	$(ctx).data("2015", data_2015);

	chartObjects[prefix] = new Chart(ctx, {
		type: 'horizontalBar',
		data: data_1990,
		options: {
			legend : {
				labels : {
					fontColor: "#4A4A4A",
					boxWidth : 10,
				}
			},
			tooltips : {
				callbacks : {
					title: function(){
						return false;
					},
					label : function(tooltipItem, data) { 

						label = data.datasets[tooltipItem.datasetIndex].label;

						amount = tooltipItem.xLabel;

						// var folded = fold(label, 20, true);
						return percentageTooltip(amount, label);
					}
				}
			},
			title: {
				text: $(ctx).data("title")
			},
			scales : {
				yAxes : stackedYAxes(prefix),
				xAxes : stackedXAxes(prefix)
			}
		}
	});
};



var makeBlockChart = function(prefix, city){
	var ctx = $("#"+prefix);
	var field = prefix.replace("_bar", "");
	var data = {
		labels : ["Informal", "Formal"],
		datasets: [
			{
				label : city.City.t1.substr(0,4)+"-"+city.City.t2.substr(0,4),
				backgroundColor: 'rgba(229,223,227,1.0)',
				borderWidth : 0,
				data: [city.DataSet[field+"_informal_plot_pre_1990"], city.Region.DataSet[field+"_formal_plot_pre_1990"]]
			},
			{
				label : city.City.t2.substr(0,4)+"-"+city.City.t3.substr(0,4),
				backgroundColor: 'rgba(176,171,174,1.0)',
				borderWidth : 0,
				data: [city.DataSet[field+"_informal_plot_1990_2015"], city.Region.DataSet[field+"_formal_plot_1990_2015"]]
			},
		]
	};
	var yAxes = [{
		ticks: {
			beginAtZero:true,
			callback: function(value, index, values) {
				return (Math.floor(value*100)/100).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			}
		},
	}];
	var xAxes = [{
		ticks: {
			beginAtZero:true
		},
		gridLines : {
			display: false
		},
	}];
	chartObjects[prefix] = new Chart(ctx, {
		type:  'bar',
		data: data,
		options: {
			legend : {
				labels : {
					fontColor: "#afafaf",
					boxWidth : 10,
				}
			},
			tooltips : {
				callbacks : {
					label : function(tooltipItem, data) {
						label = data.datasets[tooltipItem.datasetIndex].label;
						// var folded = fold(label, 20, true);
						return bigTooltip(tooltipItem.yLabel, label, $(ctx).data("unit"));
					}
				}
			},
			title: {
				text: $(ctx).data("title")
			},
			scales: {
				yAxes: yAxes,
				xAxes: xAxes
			}
		}
	});
};


	// legendTemplate takes a template as a string, you can populate the template with values from your dataset
	// var options = {
	// legendTemplate : '<ul>'
	// 				+'<% for (var i=0; i<datasets.length; i++) { %>'
	// 				+'<li>'
	// 				+'<span style=\"background-color:<%=datasets[i].lineColor%>\"></span>'
	// 				+'<% if (datasets[i].label) { %><%= datasets[i].label %><% } %>'
	// 				+'</li>'
	// 			+'<% } %>'
	// 			+'</ul>'
	// }

	//don't forget to pass options in when creating new Chart
	// var lineChart = new Chart(element).Line(data, options);

	//then you just need to generate the legend
	// var legend = lineChart.generateLegend();

	//and append it to your page somewhere
	// $('#chart').append(legend);





/*
* Recursively merge properties of two objects
*/
function MergeRecursive(obj1, obj2) {

  for (var p in obj2) {
    try {
      // Property in destination object set; update its value.
      if ( obj2[p].constructor==Object ) {
        obj1[p] = MergeRecursive(obj1[p], obj2[p]);
      } else {
        obj1[p] = obj2[p];
      }
    } catch(e) {
      // Property in destination object not set; create it and set its value.
      obj1[p] = obj2[p];

    }
  }
  return obj1;
}


//
// Folds a string at a specified length, optionally attempting
// to insert newlines after whitespace characters.
//
// s          -  input string
// n          -  number of chars at which to separate lines
// useSpaces  -  if true, attempt to insert newlines at whitespace
// a          -  array used to build result
//
// Returns an array of strings that are no longer than n
// characters long.  If a is specified as an array, the lines
// found in s will be pushed onto the end of a.
//
// If s is huge and n is very small, this metho will have
// problems... StackOverflow.
//

function fold(s, n, useSpaces, a) {
    a = a || [];
    if (s.length <= n) {
        a.push(s);
        return a;
    }
    var line = s.substring(0, n);
    if (! useSpaces) { // insert newlines anywhere
        a.push(line);
        return fold(s.substring(n), n, useSpaces, a);
    }
    else { // attempt to insert newlines after whitespace
        var lastSpaceRgx = /\s(?!.*\s)/;
        var idx = line.search(lastSpaceRgx);
        var nextIdx = n;
        if (idx > 0) {
            line = line.substring(0, idx);
            nextIdx = idx;
        }
        a.push(line);
        return fold(s.substring(nextIdx), n, useSpaces, a);
    }
}
$.fn.outerHTML = function(){

    // IE, Chrome & Safari will comply with the non-standard outerHTML, all others (FF) will have a fall-back for cloning
    return (!this.length) ? this : (this[0].outerHTML || (
      function(el){
          var div = document.createElement('div');
          div.appendChild(el.cloneNode(true));
          var contents = div.innerHTML;
          div = null;
          return contents;
    })(this[0]));

};

var debounce = function(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
};

var visibleGraph = debounce(function() {
	// All the taxing stuff you do

	$(".lazyimg").filter(":onScreen").filter(":visible").each(function(){
		$(this).removeClass(".lazyimg");
		loadImage(this);
	});

	var maps = $(".city-map:not(.map-built)").filter(":onScreen");
	if(maps.length > 0){
		$(maps).addClass("map-built");
		$(maps).each(function(){
			switch($(this).attr("id")){
				case("urban_extent_t1_map"):
					urban_extent_t1_map();
				break;
				case("composition_of_added_area_map"):
					composition_of_added_area_map();
				break;
				case("roads_map"):
					roads_map();
				break;
				case("arterial_map"):
					arterial_map();
				break;
				case("blocks_map"):
					blocks_map();
				break;
				default:
					alert(id+" map doesnt have a build funciton");
			}
		});
	}
}, 500);



