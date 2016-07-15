import playerModel from 'playerModel.js';
import networkCollection from 'networkCollection.js';
import hardwareCollection from 'hardwareCollection.js';
import softwareCollection from 'softwareCollection.js';

const playerService = function () {
    const playerModel = new playerModel();
    const networkCollection = new networkCollection();
    const hardwareCollection = new hardwareCollection();
    const softwareCollection = new softwareCollection();
    return {
        player: playerModel,
        network: networkCollection,
        hardware: hardwareCollection,
        software: softwareCollection
    };
}

export default playerService;
