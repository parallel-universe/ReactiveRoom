INSERT INTO `user` (`id`, `created`, `updated`, `username`, `email`, `password`)
VALUES
    ('6hKWplv05zVGyCp', NULL, NULL, 'player1', 'matt@basekit.com', NULL);

INSERT INTO `terminal` (`id`, `created`, `updated`, `name`, `ipAddress`, `hardwareId`, `softwareId`, `networkId`, `userId`)
VALUES
    ('AdewfWfweF', NULL, '2016-07-15 01:09:15', 'terminal', '192.168.0.67', 'htrwffwWfw', 'FWfweFwefwFWG', 'TtwFWew', '6hKWplv05zVGyCp');

INSERT INTO `software` (`id`, `created`, `updated`, `name`, `type`, `level`)
VALUES
    ('FWfweFwefwFWG', NULL, '2016-07-15 01:07:43', 'password cracker', 'executable', 1);

INSERT INTO `network` (`id`, `created`, `updated`, `name`)
VALUES
    ('TtwFWew', NULL, NULL, 'home network');

INSERT INTO `hardware` (`id`, `created`, `updated`, `name`, `type`, `level`)
VALUES
    ('htrwffwWfw', NULL, '2016-07-15 01:08:26', 'cpu', 'core', 1);

