$(document).ready(function(){

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
		case(false):
			//map
			console.log("map");
		break;
		case("cities"):
			switch(controller){
				case("index"):
					//filter list
					var cityList = new List('cityList', {valueNames: [ 'city', 'region' ]});
				break;
				case("data"):
					//table
					$("table").stupidtable();
				break;
				case("view"):
					//graphs
				break;
				default:
			}
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


