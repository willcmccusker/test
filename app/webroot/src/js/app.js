var testChart;
var tab = false;
var poppedUp = false;
var drawComplete = true;
var searchPopup = function(){
	if(poppedUp){
		return false;
	}else{
		poppedUp = true;
	}
	$("#citySearch input").focus();
	$("body").addClass("no-scroll");
	$("#citySearch").addClass("poppedUp");
	$(".closeCitySearch").off("click").on("click", function(){
		searchPopdown();
	});
};
var searchPopdown = function(){
	$("#citySearch input").val("").blur();
	$("body").removeClass("no-scroll");
	$("#citySearch").removeClass("poppedUp");
	poppedUp = false;
};

var buildGraphsInterval = setInterval(function(){
	if($(".city-graphic.done").length == $(".city-graphic").length){
		clearInterval(buildGraphsInterval);
	}else{
		if($(".city-graphic.ready:not(.done)").length > 0){
			$(".city-graphic.ready:not(.done)").each(function(){
				if(!drawComplete){

				}else{
					$(this).addClass("done");
					switchGraph($(this).attr("id"));
				}
			});
			Waypoint.refreshAll();	
		}
	}
},600);

// var refreshData = function(id){
// 	var chart = $("#"+id).data("chart");
// 	var data = jQuery.extend(true, {}, chart.config.data);
// 	console.log(data);
// 	$(chart.data.datasets).each(function(){
// 		this.data = [];
// 	});
// 	console.log(chart.config.data);
// 	chart.config.options.animation.onComplete = function(){
// 		console.log("animaiton complete");
// 		console.log(data);
// 		console.log(chart.config);
// 		chart.config.data.datasets = data.datasets;
// 		chart.update();
// 	};
// 	chart.update();
// };

var switchGraph = function(id){
	console.log("build "+id);
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
			console.log(id+" doesn't have a function");
	}
};
var loadNextFlag = function(){
	var lazy = $(".lazyimg").first();
	if(lazy.length === 0){
		return;
	}
	var img = new Image();
	img.onload = function(){
		$(lazy).attr("src", $(lazy).data("src")).removeClass("lazyimg");
		loadNextFlag();
	};
	img.onerror = function(){
		$(lazy).removeClass("lazyimg");
		loadNextFlag();
	};
	img.src = $(lazy).data("src");
};

$(document).ready(function(){

	loadNextFlag();

	$("#citySearch input").on("focus click", function(){
		searchPopup();
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



	// console.log(Chart.defaults.global);
	// Chart.defaults.global.bar.backgroundColor = '#F0F0F0';
	// Chart.defaults.global.defaultColor = "#F0F0F0";
	// Chart.defaults.global.legend.fullWidth = false;
	globalOptions = {
		title : {
			display:true
		},
		tooltips : {
			display : true
		},
		animation : {
			onComplete : function(){
				drawComplete = true;
			}
		},
		legend : {
			position : "right",
		},
		responsive : true,
		defaultFontFamily : "DINNextLTProLight",
		yAxes : {
			display: false
		}
	};
	Chart.defaults.global = MergeRecursive(Chart.defaults.global, globalOptions);


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
					// $("table").stupidtable();

					 var dataList = new List('data-table', 
					 	{
					 		valueNames: ['country', 'name' ],
					 		     page: 10,

							plugins: [
								ListPagination({})
							]
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


					var wayDown = $('.city-graphic').waypoint(function(direction) {
						if(direction == "down"){
							// buildGraph(this);	
							$(this.element).addClass("ready");
						}
					}, {
						offset: '80%',
						// enabled: false,
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
					//graphs
					// makeGraph("density_built_up_change", city);
					// makePlotly("density_built_up_change", city);
					// makeChartist("density_built_up_change", city);
				

				break;
				default:
			}
		/* falls through */
		case(false):
			//map
			L.TopoJSON = L.GeoJSON.extend({
			  addData: function(jsonData) {
			    if (jsonData.type === "Topology") {
			      for (var key in jsonData.objects) {
			        geojson = topojson.feature(jsonData, jsonData.objects[key]);
			        L.GeoJSON.prototype.addData.call(this, geojson);
			      }
			    }
			    else {
			      L.GeoJSON.prototype.addData.call(this, jsonData);
			    }
			  }
			});

			
		break;
		case("pages"):
			switch(controller){
				case("about"):

				break;
				default:
				console.log(controller);
			}
		break;
		default:
			console.log(model);
	}

});






var stackedXAxes = [{
	stacked : true,
	ticks: {
		beginAtZero : true,
		max : 100,
		callback: function(value, index, values) {
			return   value+"%";
		}
	},
	gridLines : {
		display: false
	},
}];
var stackedYAxes = [{
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

var charts = {
	"special_stacked" : {
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
	}
};






var bigTooltip = function(amount, label, unit){
	amount = amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	return label+": "+amount+unit;
};

var percentageTooltip = function(amount, label, multiplyData){
	if(multiplyData){
		amount *= 100;
	}
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
	console.log(data);
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



	var myChart = new Chart(ctx, {
		type : "line",
		data : data,
		options: {
			tooltips : {
/*				callbacks : {
					label : function(tooltipItem, data) { 
						var label = data.datasets[tooltipItem.datasetIndex].label;
						var number  = tooltipItem.yLabel;
						return bigTooltip(number, label, $(ctx).data("unit"));
					}
				}*/
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
						min : new Date("1975-01-01"),//dateMin,
						max : new Date("2030-01-01")//dateMax,
					},
					ticks: {
		                maxTicksLimit:10,
		                callback: function(value, index, values) {
			                return value;
		                }
					}
				}]
			}
		}
	});
	$(ctx).data("chart", myChart);
};

var makeChart = function(prefix, city, side){
	side = typeof(side) == "undefined" ? false : true;
	var ctx = $("#"+prefix);
	var field = prefix.replace("_bar", "");
	var suffix_1 = side ? "_pre_1990" : "_t1_t2";
	var suffix_2 = side ? "_1990_2015" : "_t2_t3";
	var data = {
		labels: ["City", "Region", "World"],
		datasets: [{
			label: side ? "Pre-1990" : city.City.t1.substr(0,4)+"-"+city.City.t2.substr(0,4),//'T1-T2',
			backgroundColor: "#C8C0C3",
			borderWidth : 0,
			data : [city.DataSet[field+suffix_1], city.Region.DataSet[field+suffix_1], city.World.DataSet[field+suffix_1]]
		},{
			label: side ? "1990-2015" : city.City.t2.substr(0,4)+"-"+city.City.t3.substr(0,4),//'T2-T3',
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
				return  side ? (Math.floor(value*100)/100).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") : (Math.floor(value*100)/100)+"%";
			}
		},
		// stacked : true,
	}];
	var xAxes = [{
		// stacked : true,
		ticks: {
			beginAtZero:true
		},
		gridLines : {
			display: false
		},
	}];
	var myChart = new Chart(ctx, {
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
			maintainAspectRation : true,
			gridLines : {
					display: false
				},
			tooltips : {
				callbacks : {
					label : function(tooltipItem, data){
							label = data.datasets[tooltipItem.datasetIndex].label;
						if(side){
							number = tooltipItem.xLabel;

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
	$(ctx).data("chart", myChart);
};

var makeRoadChart = function(prefix, city){

	//1990_data
	//2015_data

	var ctx = $("#"+prefix);
	var field = prefix.replace("_bar", "");
	var data = {
		labels : ["City", "Region", "World"],
		datasets: [
			{
				label : "Wide",
				backgroundColor: '#F1E0DE',
				borderWidth : 0,
				borderColor : 'rgba(142, 179, 237, 1)',
				data: [city.DataSet[field+"_wide_1990_2015"], city.Region.DataSet[field+"_wide_pre_1990"], city.World.DataSet[field+"_wide_pre_1990"]]
			},
			{
				label : "Narrow",
				backgroundColor: '#E1C6C4',
				borderWidth : 0,
				borderColor : 'rgba(87, 145, 117, 1)',
				data: [city.DataSet[field+"_narrow_1990_2015"], city.Region.DataSet[field+"_narrow_1990_2015"], city.World.DataSet[field+"_narrow_1990_2015"]]
			},
			{
				label : "All",
				backgroundColor: '#CEADA9',
				borderWidth : 0,
				borderColor : 'rgba(242, 166, 1, 1)',
				data: [city.DataSet[field+"_all_1990_2015"], city.Region.DataSet[field+"_all_1990_2015"], city.World.DataSet[field+"_all_1990_2015"]]
			},
		]
	};
	var xAxes = [{
		scaleLabel : {
			// fontFamily: "DINNextLTProLight",
			fontColor: "#afafaf",
			display: false,
			labelString: "",
		},
		ticks: {
			beginAtZero:true,
			// max : max,
			callback: function(value, index, values) {
				return Math.floor(value*100)/100 ;
			}
		},
	}];
	var yAxes = [{
		ticks: {
			beginAtZero:true
		},
		gridLines : {
			display: false
		},
	}];
	var myChart = new Chart(ctx, {
		type:  'horizontalBar',
		data: data,
		options: {
			legend : {
				labels : {
					fontColor: "#afafaf",
					boxWidth : 10,
				}
			},
			responsive : true,
			maintainAspectRation : true,
			gridLines : {
					display: false
				},
			tooltips : {
				display : true
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
	$(ctx).data("chart", myChart);
};



var makeStacked = function(prefix, city, vert){
	vert = typeof(vert) == "undefined" ? false : true;
	var ctx = $("#"+prefix);
	var field = prefix.replace("_stacked_bar", "");

	var data = vert ? {
		labels : ["Pre-1990", "1990-2015"],
		datasets:[
			{
				backgroundColor : '#889A9A',
				borderWidth : 0,
				borderColor : 'rgba(94, 151, 246, 1)',
				label : '<4m',
				data : [city.DataSet[field+"_under_4m_pre_1990"], city.DataSet[field+"_under_4m_1990_2015"] ]
			},
			{
				backgroundColor : '#93AFA9',
				borderWidth : 0,
				borderColor : 'rgba(87, 145, 117, 1)',
				label : '4-8m',
				data : [city.DataSet[field+"_4_8m_pre_1990"], city.DataSet[field+"_4_8m_1990_2015"] ]
			},
			{
				backgroundColor : '#9FC3B5',
				borderWidth : 0,
				borderColor : 'rgba(242, 166, 1, 1)',
				label : '8-12m',
				data : [city.DataSet[field+"_8_12m_pre_1990"], city.DataSet[field+"_8_12m_1990_2015"] ]
			},
			{
				backgroundColor : '#AED7C0',
				borderWidth : 0,
				borderColor : 'rgba(39, 48, 56, 1)',
				label : '12-16m',
				data : [city.DataSet[field+"_12_16m_pre_1990"], city.DataSet[field+"_12_16m_1990_2015"] ]
			},
			{
				backgroundColor : '#BFECCA',
				borderWidth : 0,
				borderColor : 'rgba(171, 71, 188, 1)',
				label : '>16m',
				data : [city.DataSet[field+"_over_16m_pre_1990"], city.DataSet[field+"_over_16m_1990_2015"] ]
			}
		]

	}
	: {
		labels : ["T1", "T2", "T3"],
		datasets:[
			{
				backgroundColor: "#B4A4AF",
				borderWidth : 0,
				borderColor: "rgba(120, 172, 255 ,1)",
				label: ["Urban Built Up"],
				data : [city.DataSet[field+"_urban_t1"], city.DataSet[field+"_urban_t2"], city.DataSet[field+"_urban_t3"]]
			},
			{
				backgroundColor: "#BDB8C2",
				borderWidth : 0,
				borderColor: "rgba(87, 145, 117, 1)",
				label: ["Suburban Built Up"],
				data : [city.DataSet[field+"_suburban_t1"], city.DataSet[field+"_suburban_t2"], city.DataSet[field+"_suburban_t3"]]
			},
			{
				backgroundColor: "#C6CCD4",
				borderWidth : 0,
				borderColor: "rgba(151, 194, 125, 1)",
				label: ["Rural Built Up"],
				data : [city.DataSet[field+"_rural_t1"], city.DataSet[field+"_rural_t2"], city.DataSet[field+"_rural_t3"]]
			},
			{
				backgroundColor: "#CDE0E4",
				borderWidth : 0,
				borderColor: "rgba(39, 48, 56, 1)",
				label: ["Urbanized Open Space"],
				data : [city.DataSet[field+"_open_t1"], city.DataSet[field+"_open_t2"], city.DataSet[field+"_open_t3"]]
			}
		]
	};


	//legendTemplate takes a template as a string, you can populate the template with values from your dataset 
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

	var myChart = new Chart(ctx, {
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
				display : true
			},
			title: {
				text: $(ctx).data("title")
			},
			scales: {
				yAxes: vert ? stackedXAxes : stackedYAxes,
				xAxes: vert ? stackedYAxes : stackedXAxes
			}
		}
	});
	$(ctx).data("chart", myChart);
};


var makeSpecialStacked = function(prefix, city){
	var ctx = $("#"+prefix);
	var field = prefix.replace("_special_stacked", "");

	var data_1990 = {
		labels : charts.special_stacked.labels,
		datasets : []
	};
	var data_2015 = {
		labels : charts.special_stacked.labels,
		datasets : []
	};

	$(charts.special_stacked.datasets).each(function(){
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

	
	console.log(data_1990);
	var myChart = new Chart(ctx, {
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
					label : function(tooltipItem, data) { 
						return false;

					},
					afterBody : function (tooltipItem, data){
						label = data.datasets[tooltipItem[0].datasetIndex].label;
						var folded = fold(label, 20, true);
						return percentageTooltip(tooltipItem[0].xLabel, folded, false);
					}
				}
			},
			title: {
				text: $(ctx).data("title")
			},
			scales : {
				yAxes : stackedYAxes,
				xAxes : stackedXAxes
			}
		}
	});
	$(ctx).data("chart", myChart);
	$(ctx).data("1990", data_1990);
	$(ctx).data("2015", data_2015);
};



var makeBlockChart = function(prefix, city){
	var ctx = $("#"+prefix);
	var field = prefix.replace("_bar", "");
	var data = {
		labels : ["Informal", "Formal"],
		datasets: [
			{
				label : "Pre-1990",
				backgroundColor: 'rgba(229,223,227,1.0)',
				borderWidth : 0,
				data: [city.DataSet[field+"_informal_plot_pre_1990"], city.Region.DataSet[field+"_formal_plot_pre_1990"]]
			},
			{
				label : "Narrow",
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
				return Math.floor(value*100)/100 ;
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
	var myChart = new Chart(ctx, {
		type:  'bar',
		data: data,
		options: {
			legend : {
				labels : {
					fontColor: "#afafaf",
					boxWidth : 10,
				}
			},
			maintainAspectRatio : true, //??????
			tooltips : {
/*				callbacks : {
					label : function(a, b){

					}
				}*/
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
	$(ctx).data("chart", myChart);

};






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