define([], function() {

	var init = function() {


		var getCarMakeList = function() {

			var promise = new Promise(function(resolve, reject) {

				fetch('/get-car-make', {
					method: 'GET'
				}).then(function(data) {
					if (data.ok) {
						data.json().then(function(response) {
							if (response) {
								resolve(response);
							} else {
								reject("error");
							}
						});
					} else {
						reject("errror");
					}
				}).catch(function(err) {
					reject(err);
				});
			});

			return promise;
		};

		return {
			getCarMakeList: getCarMakeList,
		};
	};

	return init;
});
