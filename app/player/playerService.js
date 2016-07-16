import PlayerModel from 'playerModel.js';
import NetworkCollection from 'NetworkCollection.js';
import HardwareCollection from 'hardwareCollection.js';
import SoftwareCollection from 'softwareCollection.js';

const playerService = function () {
    const playerModel = new PlayerModel();
    const networkCollection = new NetworkCollection();
    const hardwareCollection = new HardwareCollection();
    const softwareCollection = new SoftwareCollection();
    return {
        player: playerModel,
        network: networkCollection,
        hardware: hardwareCollection,
        software: softwareCollection
    };
}

export default playerService;
