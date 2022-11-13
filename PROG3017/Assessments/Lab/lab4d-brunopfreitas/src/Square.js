function Square(props) {
    return (
      <button 
        className={"square " + (props.winningRow ? "winning-row" : null)} 
        onClick={props.onClick}>
          {props.value}
      </button>
    );
  }

  export default Square

