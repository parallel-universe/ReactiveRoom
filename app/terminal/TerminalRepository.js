import TerminalView from 'TerminalView.js';
import TerminalModel from 'TerminalModel.js';

const TerminalRepository = {
    create() {
        return new TerminalView({
            model: new TerminalModel({
                name: 'terminal',
                id: 'sF24fFD'
            })
        });
    }
}

export default TerminalRepository;
