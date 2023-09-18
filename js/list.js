
	const rootElement = document.getElementById("root")

	class ShoppingList extends React.Component { 

	render() { 
		return (
		<div className="shopping-list">
		<h1>Shopping List for {this.props.name}</h1>
		  <ul>
			<li>Instagram</li>
			<li>WhatsApp</li>
			<li>Oculus</li>
		  </ul>
		</div>
	  );
	  } 
	}

function App(){
	console.log("test");
  return(
  <div>
	<ShoppingList name="ReactJS Sample"/>
  </div>
  )
}

	ReactDOM.render(
	  <App />,
	  rootElements
	)
