import React from 'react'

export default class NameForm extends React.Component {
    constructor(props) {
      super(props);
      this.state = {
        name: '',
        age: '',
        favouritFood: '',
        isAvailable: ''
    };
      this.handleChange = this.handleChange.bind(this);
      this.handleSubmit = this.handleSubmit.bind(this);
    }
  
    handleChange(event) {    
        this.setState({
            [event.target.name]: event.target.value
        });  
    }
    handleSubmit(event) {
      alert('Data to submitted: ' + JSON.stringify(this.state));
      event.preventDefault();
    }
  
    render() {
      return (
        <form onSubmit={this.handleSubmit}>        
        <label>Name:<input type="text" name='name' value={this.state.name} onChange={this.handleChange} /></label>
        <br/>
        <label>Age:<input type="text" name='age' value={this.state.age} onChange={this.handleChange} /></label>
        <br/>
        <label>Favourit Food
        <select name='favouritFood' onChange={this.handleChange}>
            <option>Kale</option>
            <option>Tomatos</option>
            <option>Pequi</option>
        </select>
        </label>
        <br/>
        <label>
            Is Available:
            <input type='checkbox' name='isAvailable' onChange={this.handleChange}/>
        </label>
        <br/>
          <input type="submit" value="Submit" />
        </form>
      );
    }
  }