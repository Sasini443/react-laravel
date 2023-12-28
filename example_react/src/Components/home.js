import React from 'react'
import 'home.css';

const Home = () => {
  return (
    <div className='container'>
        <form>
  <div className="form-row">
  <div className="form-group col-md-6">
    <label for="inputAddress">UserName</label>
    <input type="text" className="form-control" id="inputName" placeholder="Name"></input>
  </div>
    <div className="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" className="form-control" id="inputEmail4" placeholder="Email"></input>
    </div>
    <div className="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" className="form-control" id="inputPassword4" placeholder="Password"></input>
    </div>
  </div>
  
  
  <button type="submit" className="btn btn-primary">Add member</button>
</form>
    </div>
  )
}

export default Home