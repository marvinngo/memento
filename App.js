import React, { Component } from 'react';
import logo from './logo.svg';
import './App.css';
import {
  BrowserRouter as Router,
  Route,
  Link
} from 'react-router-dom';

class RootAppComponent extends React.Component {
  constructor(props) {
    super(props);
    this.state =
    { loggedUser: '',
      groups: ["testGroup"],
    };
    this.handleLoginUser = this.handleLoginUser.bind(this);
    this.handleLogoutUser = this.handleLogoutUser.bind(this);
    this.handleAddGroup = this.handleAddGroup.bind(this);
  }

  handleLoginUser(user) {
    this.setState({
      loggedUser: user
    });
  }

  handleLogoutUser() {
    this.setState({
      loggedUser: ''
    });
  }

  handleAddGroup(groupName) {
    this.setState((prevState, props) => {
      groups: prevState.groups.concat([groupName])
    });
  }

  render() {
    return (
      <Router>
        <div>
          <h2>{this.state.loggedUser ? "Logged in as " + this.state.loggedUser : "Not logged in"}</h2>
          <ul>
            <li><Link to="/">Home</Link></li>
            <li><Link to="/loginUser">Log in</Link></li>
            <li><Link to="/createGroup">Groups</Link></li>
            <li><Link to="/joinGroup">Join Group</Link></li>
          </ul>

          <hr />

          <Route exact path="/" component={Home} />
          <Route path="/loginUser">
            <LoginUser user={this.state.loggedUser} onLoginUser={this.handleLoginUser} onLogoutUser={this.handleLogoutUser} />
          </Route>

          <Route path="/createGroup">
            <AddGroup onAddGroup={this.handleAddGroup} groups={this.state.groups}/>
          </Route>
          <Route path="/joinGroup" component={joinGroup} />
        </div>
      </Router>
    );
  }
}

class LoginUser extends React.Component {
  constructor(props) {
    super(props);
    this.handleLoginUser = this.handleLoginUser.bind(this);
    this.handleLogoutUser = this.handleLogoutUser.bind(this);
  }

  handleLoginUser(user) {
    this.props.onLoginUser(user);
  }

  handleLogoutUser() {
    this.props.onLogoutUser();
  }

  render() {

    if (this.props.user) {
      return (
        <div>
          <h3>Welcome, {this.props.user}!</h3>
          <button onClick={this.handleLogoutUser} >log out</button>
        </div>
      );
    } else {
      return (
        <div>
          <h3>log in user</h3>
          <TextInput onRegister={this.handleLoginUser} />
        </div>
      );
    }
  }
}

class TextInput extends React.Component {
  constructor(props) {
    super(props);
    this.handleChange = this.handleChange.bind(this);
    this.handleRegister = this.handleRegister.bind(this);
    this.state = { text: '' };
  }

  handleChange(e) {
    this.setState({ text: e.target.value });
  }

  handleRegister(e) {
    this.props.onRegister(this.state.text);
  }

  render() {
    const text = this.state.text;
    return (
      <fieldset>
        <input onChange={this.handleChange} />
        <button onClick={this.handleRegister} >Register</button>
      </fieldset>
    );
  }
}

class AddGroup extends React.Component {
  constructor(props) {
    super(props);

    this.handleAddGroup = this.handleAddGroup.bind(this);
  }

  handleAddGroup(groupName) {
    this.props.onAddGroup(groupName);
  }

  render() {
    return (
      <div>
        <h3>Add a group!</h3>
        <TextInput onRegister={this.handleAddGroup} />
        <NumberList numbers={this.props.groups}/>
      </div>
    );
  }
}

class ListBindingDemo extends React.Component {
  constructor() {
    super();
    this.state = { list: [1, 2, 3] };

    this.handleChange = this.handleChange.bind(this);
    this.handleRegister = this.handleRegister.bind(this);
  }

  render() {
    return (
      <div>
        <h1>List Demo</h1>
        <input value={this.state.currentValue} onChange={this.handleChange} />
        <button onClick={this.handleRegister}>Register</button>
        <NumberList numbers={this.state.list} />
      </div>
    );
  }

  handleRegister() {
    this.setState({
      list: this.state.list.concat([this.state.currentValue])
    });
  }

  handleChange(evt) {
    this.setState({
      currentValue: evt.target.value
    });
  }
}

class NumberList extends React.Component {
  render() {
    const numbers = this.props.numbers;
    const listItems = numbers.map((number) =>
      <li key={number.toString()}>{number}</li>
    );
    return (
      <ul>{listItems}</ul>
    );
  }
}

const Home = () => (
  <div>
    <h2>Home</h2>
  </div>
)

const createGroup = () => (
  <div>
    <h2>Create Groups</h2>
    <ListBindingDemo />
  </div>
)

const joinGroup = () => (
  <div>
    <h2>Create Groups</h2>
    <ListBindingDemo />
  </div>
)

class App extends Component {
  render() {
    return (
      <RootAppComponent />
    );
  }
}

export default App;
