class EventList extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            events: {},
            isLoaded: false
        }
    }

    componentDidMount() {
        fetch("eventsPlaceholder.php")
            .then(res => res.json())
            .then((events) => {
                console.log(events);
                this.setState({
                    events: events,
                    isLoaded: true
                });
                console.log(this.state);
            });
    }

    render() {
        const { events, isLoaded } = this.state;
        console.log("render events:", events);
        if (!isLoaded) {
            return <div>Loading...</div>
        } else {
            return (
                <ul>
                    {events.map(event => (
                        <li key={event.Event_Name}>
                            <EventEntry name={event.Event_Name} description={event.Event_Description} />
                        </li>
                    ))}
                </ul>
            );
        }
    }
}

class EventEntry extends React.Component {
    render() {
        return (
            <div>
                <h1>{this.props.name}</h1>
                <h2>{this.props.description}</h2>
            </div>
        );
    }
}

const JSXelement = <h1>This h1 was rendered by React!</h1>;

ReactDOM.render(
    <EventList />,
    document.getElementById('content')
)