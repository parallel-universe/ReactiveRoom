class HelloWorldApp {
    constructor(HelloWorldInterpreter) {
        console.log('here', HelloWorldInterpreter);
        this.HelloWorldInterpreter = HelloWorldInterpreter;
        console.log(HelloWorldInterpreter);
    }
    getInterpreter() {
        return this.HelloWorldInterpreter;
    }
}

export default HelloWorldApp;

