import React from 'react';
import Board from './Board';
import calculateWinner from './calculateWinner'

class Game extends React.Component {
    constructor(props) {
      super(props);
      this.state = {
        history: [
          {
            squares: Array(9).fill(null)
          }
        ],
        stepNumber: 0,
        xIsNext: true
      };
    }
  
    handleClick(i) {
      const history = this.state.history.slice(0, this.state.stepNumber + 1);
      const current = history[history.length - 1];
      const squares = current.squares.slice();
      if (calculateWinner(squares) || squares[i]) {
        return;
      }
      squares[i] = this.state.xIsNext ? "X" : "O";
      this.setState({
        history: history.concat([
          {
            squares: squares
          }
        ]),
        stepNumber: history.length,
        xIsNext: !this.state.xIsNext
      });
    }
  
    jumpTo(step) {
      this.setState({
        stepNumber: step,
        xIsNext: (step % 2) === 0
      });
    }
  
    render() {
      const history = this.state.history;
      const current = history[this.state.stepNumber];
      const winner = calculateWinner(current.squares);
      let draw = current.squares.filter( symbol => symbol===null);
      let xMoves = current.squares.filter( symbol => symbol==='X');
      let oMoves = current.squares.filter( symbol => symbol==='O');
      
  
      const moves = history.map((step, move) => {
        const desc = move ?
          'Go to move #' + move :
          'Go to game start';
        return (
          <li key={move}>
            <button onClick={() => this.jumpTo(move)}>{desc}</button>
          </li>
        );
      });
  
      let status;
      if (winner) {
        status = "Winner: " + winner.winner;
      } else if(draw.length===0) {
        status = `It's a draw!`
      } 
      else {
        status = "Next player: " + (this.state.xIsNext ? "X" : "O");
      }
  
      return (
        <div className="game">
          <div className="game-info">
            <div>{status}</div>
          </div>
          <div className="game-board">
            <Board
              winningRow={winner ? winner.match : []}
              squares={current.squares}
              onClick={i => this.handleClick(i)}
            />
          </div>
          <div className="game-history">
            <ol>{moves}</ol>
          </div>
          <div className="steps-info">
            <div>X move count is {xMoves.length}</div>
            <div>O move count is {oMoves.length}</div>
          </div>
        </div>
      );
    }
  }

  export default Game;