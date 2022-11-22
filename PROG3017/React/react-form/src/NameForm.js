import React from 'react'

export default class NameForm extends React.Component {
    constructor(props) {
      super(props);
      this.state = {
        name: '',
        age: '', //asdfsadf
        favouriteFood: '',
        isAvailable: false
      }; //this is part of a Controlled Form
  
      this.handleChange = this.handleChange.bind(this);
      this.handleSubmit = this.handleSubmit.bind(this);
    }
  
    handleChange(event) {
        console.log(event.target.name)
        console.log(event.target.value)
        console.log(event.target.checked)
        console.log(event.target.type)

        switch(event.target.type){
            case 'checkbox':{
                this.setState({ [event.target.name]: event.target.checked });
                break;
            }
            default:{
                this.setState({ [event.target.name]: event.target.value });
            }
        }

    }

    componentDidMount(){
        //here is where we would retrieve any initial
        //data from an API ... fetch or axios...or others
    }
 
    handleSubmit(event) {
      alert('Data to submit: ' + JSON.stringify(this.state));
      event.preventDefault(); //prevent default behaviour of a form submit
                            //because we don't want the page to ever reload


        //we'd have some code that would send our collected data to
        //whereever it is intended..in our case...to our underlying API
    }
  
    render() {
      return (
        <form onSubmit={this.handleSubmit}>
          <label>
            Name:
            <input type="text" name="name" value={this.state.name} onChange={this.handleChange} />
          </label>
          <br/>
          <label>
            Age:
            <input type="number" name="age" value={this.state.age} onChange={this.handleChange} />
          </label>
          <br/>
          <label>
            Favourite Food:
            <select name="favouriteFood" onChange={ this.handleChange }>
                <option>Ice Cream</option>
                <option>Pizza</option>
                <option>Kale</option>
            </select>
          </label>
          <br/>
          <label>
            Is Available:
            <input type="checkbox" name="isAvailable" onChange={this.handleChange} />
          </label>
          <br/>
          <input type="submit" value="Submit" />
        </form>
      );
    }
  }

  export function foo(){

  }