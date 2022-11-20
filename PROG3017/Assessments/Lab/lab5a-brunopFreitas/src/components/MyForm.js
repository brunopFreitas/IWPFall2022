import React from 'react';

export default class MyForm extends React.Component {
  constructor(props){
    super(props)
    this.state = {
        id: null,
        userId: null,
        title: '',
        body: ''
    }
  }

  handleSubmit = event => {
    event.preventDefault(); //suppress actual form submit

    //Complete this method
  }

  //add code to update state with form data here

  //add code to pre-populate the form here

  render() {

    //add any missing attributes and code in the return statement below

    return (
      <div className="container">
        <form className="form-signin" onSubmit={this.handleSubmit}>
            <h3>Post Id: </h3>
            <div className="form-group">
                <label htmlFor="title">Title</label>
                <input 
                    type="text" 
                    className="form-control" 
                    id="title" 
                    name="title" 
                    placeholder="Enter post title" 
                    
                />
            </div>
            <div className="form-group">
                <label htmlFor="inputBody2">Body</label>
                <textarea 
                    className="form-control" 
                    id="body" 
                    name="body"
                    rows="5"
                    placeholder="Enter post body"

                >
                </textarea>
            </div>
            <button type="submit" className="btn btn-primary">Submit</button>
        </form>
      </div>
    )
  }
}