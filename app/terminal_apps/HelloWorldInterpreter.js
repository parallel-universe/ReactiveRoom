import playerDataProvider from 'playerDataProvider';

const HelloWorldInterpreter = function (command, terminal) {
    const response = commandReader(command);
    responseParser(response, terminal);
}

function responseParser (response, terminal) {
    if (typeof response === 'string') {
        terminal.echo(response);
    }
    if (response instanceof Array) {
        response.forEach((entry) => {
            terminal.echo(entry.print);
        });
    }
}

function commandReader (command) {
    if (command === 'getPlayer') {
        return getPlayer();
    }

    if (command === '' || command === 'help' || command === 'man' || command === '?') {
        return help();
    }

    if (command === 'getNetworkPeers') {
        return getNetworkPeers();
    }

    if (command.indexOf('connect') != -1) {
        return connect(command);
    }
}

function help () {
    return [
        { print: '[[!ub;#a74f4f;]available commands]' },
        { print: '\t [[!ub;#6daadc;]getPlayer]' },
        { print: '\t [[!ub;#6daadc;]getNetworkPeers]' },
        { print: '\t [[!ub;#6daadc;]connect <ipAddress>]' },
    ];
}

function connect (command) {
    const player = playerDataProvider();
    const commandParam = command.split(' ')[1];
    let connectionFeedback = [];
    player.get('terminal').network.terminals.forEach((entry) => {
        if (entry.ipAddress === commandParam) {
            // TODO: Add terminal text module to enable theming
            connectionFeedback = [
                { print: '[[!ub;#a74f4f;]remote connection established...]' },
                { print: '[[!ub;#a74f4f;]_reactiveroom central mainframe_]' },
                { print: `welcome [[;#6daadc;]${player.get('ipAddress')}]` }
            ];
        }
    });
    return connectionFeedback;
}

function getPlayer () {
    const player = playerDataProvider();
    return [
        { print: '[[!ub;#a74f4f;]player information:]' },
        { print: `\t id: [[;#6daadc;]${player.get('id')}]` },
        { print: `\t username: [[;#6daadc;]${player.get('username')}]` },
        { print: `\t ip: [[;#6daadc;]${player.get('terminal').ipAddress}]` },
        { print: `\t local network: [[;#6daadc;]${player.get('terminal').network.name}]` }
    ];
}

function getNetworkPeers () {
    const player = playerDataProvider();
    let response = [];
    player.get('terminal').network.terminals.forEach((entry) => {
        response = response.concat([
            { print: `\t ip: [[;#6daadc;]${entry.ipAddress}]` }
        ]);
    });
    return response;
}

export default HelloWorldInterpreter;
