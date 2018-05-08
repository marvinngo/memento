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

class App extends React.Component {
    constructor(props) {
        super(props);

        this.state = { loggedUser: '' };

        this.handleLoginUser = this.handleLoginUser.bind(this);
        this.handleLogoutUser = this.handleLogoutUser.bind(this);
    }

    handleLoginUser(user) {
        fetch('./signin.php')
            .then(
                function (response) {
                    if (response.status == 200) {
                        response.json().then(function (username) {
                            if (user == username) {
                                this.setState({
                                    loggedUser: user
                                });
                            }
                        });
                    } else {
                        return;
                    }

                }
            );

    }

    handleLogoutUser() {
        this.setState({
            loggedUser: ''
        });
    }

    render() {
        return (
            <LoginUser user={this.state.loggedUser} onLoginUser={this.handleLoginUser} onLogoutUser={this.handleLogoutUser} />
        );
    }
}

ReactDOM.render(
    <App />,
    document.body
);