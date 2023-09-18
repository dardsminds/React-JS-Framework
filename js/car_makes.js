define(['react', 'react-dom','data_service'], function(React, ReactDOM, DataService) {

	"use strict";

	var data_service = new DataService();

	let displayCarMakes = function(data) {
		const e = React.createElement;

		class CarMakeList extends React.Component {
			constructor(props) {
				super(props);
			}

			getList() {
				var makelist = [];

				var makes_data = data.map(doc => Object.values(doc));
				makes_data.forEach((d, index) => {
					makelist.push(d[1]);
				});

				return makelist;
			}

			render() {

				return e(
					"ul",
					null,
					this.getList().map(function(listValue){
						return React.createElement("li", null, listValue);
					})
				);
			}

		}

		const domContainer = document.querySelector("#car_make_list");
		ReactDOM.render(e(CarMakeList), domContainer);

	};

	data_service.getCarMakeList().then(function(response) {
		displayCarMakes(response)
	}).catch(function(error) {
		console.log(error);
	});

});
