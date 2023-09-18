define(['react', 'react-dom'], function(React, ReactDOM) {

	var initButton = function() {
		
	}

	const e = React.createElement;

	class RandomizeButton extends React.Component {
		constructor(props) {
			super(props);
			this.state = {
				randomize: false
			};

			this.handleClick = this.handleClick.bind(this);
		}

		handleClick() {
			this.setState({ randomize: true })
		}

		getRandomNumber() {
			const min = 1;
			const max = 100;
			const random = min + (Math.random() * (max - min));
			return random;
		}

		render() {
			if (this.state.randomize) {
				myChart.data.datasets.forEach(dataset => {
					dataset.data.forEach((data, index) =>  {
						dataset.data[index] = this.getRandomNumber();
					})
				});
				myChart.update();
			}

			return e(
				"button",{
					onClick: () => this.handleClick()
				},
				"Randomize"
			);
		}
	}

	const domContainer = document.querySelector("#randomize_button");
	ReactDOM.render(e(RandomizeButton), domContainer);

});
