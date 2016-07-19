import PlayerModel from 'PlayerModel';

const playerDataProvider = function () {
    const player = window.player;
    return new PlayerModel(player);
}

export default playerDataProvider;
